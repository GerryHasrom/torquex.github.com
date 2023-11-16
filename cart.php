<?php
session_start();
require('CRUD/cartcon.php');
require('headercart.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f9690e;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #f9690e;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type='submit'] {
            background-color: #f9690e;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type='submit']:hover {
            background-color: #333;
        }

        .empty-cart {
            text-align: center;
            margin-top: 50px;
            color: #555;
        }

        .empty-cart img {
            max-width: 100%;
            height: auto;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        li {
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #f9690e;
        }

        /* Subtle animation for the cart count */
        @keyframes scale {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        .cart-count {
            background-color: #f9690e;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            animation: scale 1s infinite;
        }
    </style>

<script>
    function confirmCheckout() {
            return confirm("Apakah Anda yakin ingin checkout?");
        }

     
</script>
</head>

<body>

<?php
echo "<h2>Keranjang Belanja</h2>";

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_mobil = $_GET['id'];
    $index = array_search($id_mobil, array_column($_SESSION['cart'], 'id'));

    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

function getStock($conn, $id_mobil) {
    $sql = "SELECT stok FROM mobil WHERE id_mobil = '$id_mobil'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['stok'];
    } else {
        return 0;
    }
}

function getTotalPrice($cart) {
    $totalPrice = 0;

    foreach ($cart as $item) {
        $totalPrice += $item['harga'] * $item['quantity'];
    }

    return $totalPrice;
}

if (isset($_POST['checkout'])) {
    // Implementasi logika checkout Anda di sini

    // Pastikan tabel "pesanan" ada di database Anda
    $sql_create_pesanan_table = "CREATE TABLE IF NOT EXISTS pesanan (
        id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
        nama_mobil VARCHAR(255) NOT NULL,
        harga DECIMAL(10, 2) NOT NULL
    )";

    if ($conn->query($sql_create_pesanan_table) !== TRUE) {
        echo "Error creating pesanan table: " . $conn->error;
    }

    // Masukkan detail pesanan ke tabel "pesanan" untuk setiap item di keranjang
    foreach ($_SESSION['cart'] as $item) {
        $nama_mobil = $item['nama'];
        $harga = $item['harga'];

        $sql_insert_pesanan = "INSERT INTO pesanan (nama_mobil, harga) VALUES ('$nama_mobil', '$harga')";

        if ($conn->query($sql_insert_pesanan) !== TRUE) {
            echo "Error inserting into pesanan table: " . $conn->error;
        }
    }

    // Bersihkan keranjang setelah checkout berhasil
    $_SESSION['cart'] = [];

    header("Location: cart.php");
    exit;
}

$stockData = array();
foreach ($_SESSION['cart'] as $item) {
    $id_mobil = $item['id'];
    $stockData[$id_mobil] = getStock($conn, $id_mobil);
}

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama Mobil</th><th>Harga</th><th>Stok</th><th>Quantity</th><th>Aksi</th></tr>";

    foreach ($_SESSION['cart'] as $item) {
        $id_mobil = $item['id'];

        echo "<tr>";
        echo "<td>" . (isset($item['id']) ? $item['id'] : 'N/A') . "</td>";
        echo "<td>" . (isset($item['nama']) ? $item['nama'] : 'N/A') . "</td>";
        echo "<td>" . (isset($item['harga']) ? number_format($item['harga'], 2, ',', '.') : 'N/A') . "</td>";
        $stok = isset($stockData[$id_mobil]) ? $stockData[$id_mobil] : 'N/A';
        echo "<td>" . $stok . "</td>";
        echo "<td>" . (isset($item['quantity']) ? $item['quantity'] : 'N/A') . "</td>";
        echo "<td><a href='cart.php?action=delete&id=" . $item['id'] . "'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";

    $totalPrice = getTotalPrice($_SESSION['cart']);
    echo "<p>Total Harga: " . number_format($totalPrice, 2, ',', '.') . "</p>";

    echo "<form method='post' action='cart.php' id='checkoutForm' onsubmit='return confirmCheckout()'>";
    echo "<input type='submit' name='checkout' value='Checkout'>";
    echo "</form>";
} else {
    // Display a more creative and stylized message for an empty cart
    echo "<div class='empty-cart'>";
    echo "<h3>Keranjang belanja kosong, mari temukan mobil impian Anda!</h3>";
    echo "<p>Teruskan penjelajahan Anda di <a href='catalog.php'>katalog mobil</a>.</p>";
    echo "</div>";
}

$conn->close();
?>


</body>


</html>
