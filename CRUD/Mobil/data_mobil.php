<!-- read.php -->

<?php
require('../../CRUD/connection.php');

$sql = "SELECT * FROM mobil";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<section id='content' class='content'>";
    echo "<div class='content-cards'>";

    while ($row = $result->fetch_assoc()) {
        echo "<div class='content-row'>";
        echo "<div class='content-card'>";
        echo "<img src='images/" . $row["gambar"] . "' alt='" . $row["nama_mobil"] . "'>";
        echo "<h3>" . $row["nama_mobil"] . "</h3>";
        echo "Harga: <span class='animated-price'>" . number_format($row["harga"], 2, ',', '.') . "</span></p>";
        echo "<button class='btn-details'><a href='update.php?id=" . $row["id_mobil"] . "'>Edit</a></button>";
        echo "<button class='btn-details'><a href='delete.php?id=" . $row["id_mobil"] . "'>Hapus</a></button>";
        echo "</div></div>";
    }

    echo "</div></section>";
} else {
    echo "Tidak ada data mobil.";
}

$conn->close();
?>
