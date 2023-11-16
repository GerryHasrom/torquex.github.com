<?php
require_once "connection_login_google.php"; // Sertakan file connection.php untuk mendapatkan informasi koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Koneksi ke database (sesuaikan dengan informasi koneksi Anda)
    $conn = new mysqli("localhost", "root", "", "torquex");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Periksa apakah email sudah terdaftar
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email sudah terdaftar. Silakan gunakan email lain.";
    } else {
        // Simpan data ke database tanpa perubahan
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);  // Tidak ada hashing

        if ($stmt->execute()) {
            echo "Pendaftaran berhasil. Silakan login.";

            // Setelah pendaftaran berhasil, arahkan pengguna ke halaman login
            header("Location: google_login_page.php");
            exit;
        } else {
            echo "Terjadi kesalahan saat menyimpan data: " . $conn->error;
        }
    }

    // Tutup koneksi database
    $stmt->close();
    $conn->close();
}
?>