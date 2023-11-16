<?php
// Memastikan sesi belum dimulai sebelumnya
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Fungsi untuk menghitung total barang di keranjang
function countCartItems() {
    if (isset($_SESSION['cart'])) {
        return array_sum(array_column($_SESSION['cart'], 'quantity'));
    } else {
        return 0;
    }
}
?>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="cart.php">Keranjang (<?php echo countCartItems(); ?>)</a></li>
        </ul>
    </nav>
</header>
