<?php
// Sertakan file koneksi
require('koneksi.php');

// Cek apakah halaman diakses dari formulir POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Ambil data dari formulir pembayaran
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];

    // Simpan data ke tabel pay tanpa prepared statements
    $sql = "INSERT INTO pay (full_name, email, address, city, state, card_number, exp_month) 
            VALUES ('$full_name', '$email', '$address', '$city', '$state', '$card_number', '$exp_month')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
} else {
    header("Location: index.php"); // Ganti 'index.php' dengan halaman utama Anda
    exit();
}
?>
