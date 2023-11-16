<!-- update.php -->

<?php
require('../../CRUD/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $idMobil = $_POST["id_mobil"];
    $namaMobil = $_POST["nama_mobil"];
    $harga = $_POST["harga"];
    // ... tambahkan variabel lain sesuai kolom tabel

    // Query untuk mengupdate data mobil
    $sql = "UPDATE mobil SET nama_mobil='$namaMobil', harga=$harga WHERE id_mobil=$idMobil";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data mobil berhasil diupdate.";
        header("Location: data_mobil.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Jika ada parameter id pada URL, ambil data mobil berdasarkan id
if (isset($_GET['id'])) {
    $idMobil = $_GET['id'];
    $sql = "SELECT * FROM mobil WHERE id_mobil=$idMobil";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data mobil tidak ditemukan.";
        exit();
    }
}

// Tutup koneksi
$conn->close();
?>

<!-- Form untuk mengedit data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
</head>
<body>
    <h2>Edit Mobil</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil']; ?>">

        <label for="nama_mobil">Nama Mobil:</label>
        <input type="text" name="nama_mobil" value="<?php echo $row['nama_mobil']; ?>" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br>

        <!-- ... tambahkan input untuk variabel lain sesuai kolom tabel -->

        <button type="submit">Update Mobil</button>
    </form>
</body>
</html>
