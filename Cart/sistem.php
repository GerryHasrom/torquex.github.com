<?php
// Sertakan file koneksi
require('../CRUD/cartcon.php');
require('../headercart.php');

// Cek apakah parameter id telah diterima
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_mobil = $_GET['id'];

    // Ambil data mobil berdasarkan id
    $sql = "SELECT * FROM mobil WHERE id_mobil = $id_mobil";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Data mobil ditemukan, tambahkan ke dalam keranjang
        $row = $result->fetch_assoc();
        
        $item = [
            'id' => $row['id_mobil'],
            'nama' => $row['nama_mobil'],
            'harga' => $row['harga'],
            'quantity' => 1,
        ];

        // Cek apakah keranjang belanja sudah ada
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Cek apakah item sudah ada di dalam keranjang
        $index = array_search($item['id'], array_column($_SESSION['cart'], 'id'));

        if ($index !== false) {
            // Jika item sudah ada, tambahkan quantity
            $_SESSION['cart'][$index]['quantity']++;
        } else {
            // Jika item belum ada, tambahkan ke dalam keranjang
            $_SESSION['cart'][] = $item;
        }

        // Redirect ke halaman utama
        header('Location: ../index.php');
        exit();
    } else {
        echo "Tidak ada data mobil dengan ID tersebut.";
    }
} else {
    echo "ID mobil tidak valid.";
}

// Tutup koneksi
$conn->close();
?>
