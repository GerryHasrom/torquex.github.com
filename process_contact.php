<?php
include 'koneksi.php';

// Ambil data dari formulir
$username = $_POST['username'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Lakukan validasi data jika diperlukan

// Query untuk memasukkan data ke dalam tabel "contact_us"
$sql = "INSERT INTO contact_us (username, email, subject, message) VALUES ('$username', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dimasukkan ke dalam database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
