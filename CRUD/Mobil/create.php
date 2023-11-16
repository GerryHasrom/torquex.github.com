<!-- create.php -->
<?php
require('../../CRUD/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $namaMobil = $_POST["nama_mobil"];
    $harga = $_POST["harga"];

    // File upload
    $targetDir = "../images/";
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["gambar"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Query untuk menambahkan data mobil
    $sql = "INSERT INTO mobil (nama_mobil, harga, gambar) VALUES ('$namaMobil', $harga, '$targetFile')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data mobil berhasil ditambahkan.";
        header("Location: data_mobil.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
</head>
<body>
    <h2>Tambah Mobil</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="nama_mobil">Nama Mobil:</label>
        <input type="text" name="nama_mobil" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required><br>

        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" accept="image/*" required><br>

        <!-- ... tambahkan input untuk variabel lain sesuai kolom tabel -->

        <button type="submit">Tambah Mobil</button>
    </form>
</body>
</html>
