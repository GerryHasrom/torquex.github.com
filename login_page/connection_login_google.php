<?php
$host = "localhost";
$user = "root"; // Ganti dengan nama pengguna database Anda
$pass = ""; // Ganti dengan kata sandi database Anda
$db = "torquex";

// Buat koneksi ke database
$connection = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi database gagal: " . $connection->connect_error);
}
?>
