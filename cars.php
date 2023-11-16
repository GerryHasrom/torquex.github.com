<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars Shop</title>

    <style>
        



         .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        /* Gaya untuk halaman Cars */
        body {
            background-color: #f8f8f8;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
        }
    
        .cars-cards{
            display: flex;
            justify-content: space-between;
        }
    

        .cars {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .cars-card {
            justify-content: space-between;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 15px;
            margin-top: 45px;
            text-align: center;
            width: 250px;
            transition: transform 0.3s ease;
        }

        .cars-card:hover {
            transform: scale(1.05);
        }

        .cars-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .cars-card h3 {
            color: #1f003b;
            margin-top: 10px;
        }

        .animated-price {
            font-weight: bold;
            font-size: 1.2em;
            color: #4caf50;
        }

        .btn-details {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn-details:hover {
            background-color: #45a049;
        }

        /* Gaya tambahan sesuai kebutuhan */
        .fun-fact {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            bottom: 0;
            margin-top: 75px;
        }

        .fun-fact p {
            font-size: 20px;
            margin: 0;
        }
    </style>
</head>
<script>
    function showConfirmation() {
        alert("Pesanan berhasil ditambahkan ke keranjang!");
    }
</script>

<body>
    <?php
    require('CRUD/cartcon.php');

    if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
        // Get the car ID from the URL parameter
        $id_mobil = $_GET['id'];

        // Include the database connection file
        require('CRUD/cartcon.php');

        // Fetch car data based on the ID
        $sql = "SELECT * FROM mobil WHERE id_mobil = '$id_mobil'";
        $result = $conn->query($sql);

        // If data is found, add it to the cart and pesanan table
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Create a new item to be added to the cart
            $cartItem = array(
                'id' => $row['id_mobil'],
                'nama' => $row['nama_mobil'],
                'harga' => $row['harga'],
                'stok' => $row['stok'],
                'quantity' => 1 // You can adjust the quantity as needed
            );

            // If the cart is not yet created, create a new one
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Add the item to the cart session
            $_SESSION['cart'][] = $cartItem;

            // Add the item to the "pesanan" table
            $nama_mobil = $row['nama_mobil'];
            $harga_total = $row['harga'];
            $sql_pesanan = "INSERT INTO pesanan (nama_mobil, harga) VALUES ('$nama_mobil', '$harga_total')";

            if ($conn->query($sql_pesanan) === TRUE) {
                // Display the notification
                echo "<script>showNotification();</script>";

                header('Location: index2.php');
                exit;
            } else {
                // Handle the case where the insertion into the pesanan table fails
                echo "Error: " . $sql_pesanan . "<br>" . $conn->error;
            }
        }
    }

    // Fetch car data again (if it wasn't fetched before)
    $sql = "SELECT * FROM mobil";
    $result = $conn->query($sql);

    // Display the car data
    if ($result && $result->num_rows > 0) {
        echo "<section id='cars' class='cars'>";
        echo "<div class='cars-cards'>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='cars-row'>";
            echo "<div class='cars-card'>";

            // Display the car image
            echo "<img src='images/" . $row["gambar"] . "' alt='" . $row["nama_mobil"] . "'>";

            echo "<h3>" . $row["nama_mobil"] . "</h3>";
            echo "Harga: <span class='animated-price'>" . number_format($row["harga"], 2, ',', '.') . "</span></p>";
            echo "Stok: " . $row["stok"] . "<br>";
            echo "<button id='button-buy' class='btn-details' onclick='showConfirmation()'><a href='cars.php?action=add&id=" . $row["id_mobil"] . "'>Beli Mobil!</a></button>";
            echo "</div></div>";
        }

        echo "</div></section>";
    }
    ?>


    <div class="fun-fact">
        <p>Did you know? Our cars are not just vehicles; they're a lifestyle.</p>
    </div>
</body>

</html>

