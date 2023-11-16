<!-- delete.php -->

<?php
require('../../CRUD/connection.php');

// Jika ada parameter id pada URL, hapus data mobil berdasarkan id
if (isset($_GET['id'])) {
    $idMobil = $_GET['id'];
    $sql = "DELETE FROM mobil WHERE id_mobil=$idMobil";

    if ($conn->query($sql) === TRUE) {
        echo "Data mobil berhasil dihapus.";
        header("Location: data_mobil.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
