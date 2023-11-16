<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Koneksi ke database (sesuaikan dengan informasi koneksi Anda)
    $conn = new mysqli("localhost", "root", "", "torquex");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Cari pengguna berdasarkan alamat email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $storedPassword = $user["password"];  // Dapatkan kata sandi dari database

        // Verifikasi kata sandi
        if ($password === $storedPassword) {
            // Kata sandi valid, arahkan ke halaman index.php
            header("Location: ../index.php");
            exit;
        }
    }

    // Jika tidak ada pengguna yang cocok atau kata sandi tidak valid, tampilkan pesan kesalahan
    echo "Kata sandi salah atau alamat email tidak ditemukan. Silakan periksa kembali.";

    $stmt->close();
    $conn->close();
}
?>