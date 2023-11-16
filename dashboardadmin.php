<?php
include("koneksi.php");

// Handle CRUD operations for users
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle new user submission
    if (isset($_POST['submit'])) {
        $newUsername = mysqli_real_escape_string($conn, $_POST['new_username']);
        $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);

        $insertQuery = "INSERT INTO user_on_admin (username, password) VALUES ('$newUsername', '$newPassword')";
        $conn->query($insertQuery);
    }

    // Handle user update
    elseif (isset($_POST['update'])) {
        $userIdUpdate = $_POST['user_id_update'];
        $editUsername = mysqli_real_escape_string($conn, $_POST['edit_username']);
        $editPassword = mysqli_real_escape_string($conn, $_POST['edit_password']);

        if (isset($userIdUpdate) && isset($editUsername)) {
            $updateQuery = "UPDATE user_on_admin SET username='$editUsername', password='$editPassword' WHERE id='$userIdUpdate'";
            $conn->query($updateQuery);
        }
    }

    // Handle user deletion
    elseif (isset($_POST['delete'])) {
        $userIdDelete = $_POST['user_id_delete'];

        if (isset($userIdDelete)) {
            $deleteQuery = "DELETE FROM user_on_admin WHERE id='$userIdDelete'";
            $conn->query($deleteQuery);
        }
    }

    // Handle CRUD operations for cars
    elseif (isset($_POST['submit_car'])) {
        $newCarName = mysqli_real_escape_string($conn, $_POST['new_car_name']);
        $newCarPrice = mysqli_real_escape_string($conn, $_POST['new_car_price']);
        $newCarStock = mysqli_real_escape_string($conn, $_POST['new_car_stock']);

        // Upload gambar
        $targetDir = "images/";
        $targetFile = $targetDir . basename($_FILES["new_car_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["new_car_image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["new_car_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFormats = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Generate a unique name for the file
        $uniqueFileName = uniqid() . "_" . basename($_FILES["new_car_image"]["name"]);
        $targetFile = $targetDir . $uniqueFileName;

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // try to upload file
            if (move_uploaded_file($_FILES["new_car_image"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars($uniqueFileName) . " has been uploaded.";
                // Insert data ke database
                $insertCarQuery = $conn->prepare("INSERT INTO mobil (nama_mobil, harga, stok, gambar) VALUES (?, ?, ?, ?)");
                $insertCarQuery->bind_param("ssss", $newCarName, $newCarPrice, $newCarStock, $uniqueFileName);
                $insertCarQuery->execute();
                $insertCarQuery->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Handle car update (tambah stok)
    elseif (isset($_POST['update_car_stok'])) {
        $carIdUpdateStok = $_POST['car_id_update'];
        $editCarStok = $_POST['edit_car_stok'];

        if (isset($carIdUpdateStok) && isset($editCarStok)) {
            $updateStokQuery = "UPDATE mobil SET stok = stok + $editCarStok WHERE id_mobil = '$carIdUpdateStok'";
            $conn->query($updateStokQuery);
        }
    }

    // Handle car deletion
    elseif (isset($_POST['delete_car'])) {
        $carIdDelete = $_POST['car_id_delete'];

        if (isset($carIdDelete)) {
            $deleteCarQuery = "DELETE FROM mobil WHERE id_mobil='$carIdDelete'";
            $conn->query($deleteCarQuery);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD ADMIN</title>
    <link rel="stylesheet" type="text/css" href="CSS/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <style>
        .action-cell {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
        .dashboard-section {
            display: none;
        }
    </style>
    <script>
        function showSection(sectionClass) {
        // Hide all sections
        var sections = document.getElementsByClassName('dashboard-section');
        for (var i = 0; i < sections.length; i++) {
            sections[i].style.display = 'none';
        }

        // Show the selected sections
        var selectedSections = document.getElementsByClassName(sectionClass);
        for (var i = 0; i < selectedSections.length; i++) {
            selectedSections[i].style.display = 'block';
        }
    }
    </script>
</head>

<body>

    <nav class="navbar">
        <h1 style="flex: 1; text-align: center;">DASHBOARD ADMIN</h1>
        <div class="navbar-right">
            <p href="logout.php"><u>LOGOUT</u></p>
        </div>
    </nav>

    <div class="sidebar">
        <ul>
        <li><a href="#" onclick="showSection('data-user')">Data User</a></li>
        <li><a href="#" onclick="showSection('data-mobil')">Data Mobil</a></li>
        <li><a href="#" onclick="showSection('data-pesanan')">Data Pesanan</a></li>
        </ul>
    </div>

    <section class="dashboard-section data-user">
        <h2 style="flex: 1; text-align: center;">Tambah User</h2>
        <form method="post" action="dashboardadmin.php">
            <label for="new_username">Username</label>
            <input type="text" name="new_username" id="new_username" required>
            <label for="new_password">Password</label>
            <input type="password" name="new_password" id="new_password" required>
            <button type="submit" name="submit">Tambah</button>
        </form>
    </section>

    <section class="dashboard-section data-user">
        <h2 style="flex:1; text-align:center;">Data User</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            <?php
            // Menampilkan data user
            $query = "SELECT * FROM user_on_admin";
            $result = $conn->query($query);
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo '<td class="action-cell">
                        <form method="post" action="dashboardadmin.php">
                            <input type="hidden" name="user_id_update" value="' . $row['id'] . '">
                            <input type="text" name="edit_username" placeholder="Edit Username" required>
                            <input type="password" name="edit_password" placeholder="Edit Password" required>
                            <button type="submit" name="update">Edit</button>
                        </form>
                        
                        <form method="post" action="dashboardadmin.php">
                            <input type="hidden" name="user_id_delete" value="' . $row['id'] . '">
                            <button type="submit" name="delete" class="delete-btn">Hapus</button>
                        </form>
                    </td>';
                echo "</tr>";
            }
            ?>
        </table>
    </section>

    <section class="dashboard-section data-mobil">
        <h2 style="flex: 1; text-align: center;">Tambah Mobil</h2>
        <form method="post" action="dashboardadmin.php" enctype="multipart/form-data">
            <label for="new_car_name">Nama Mobil</label>
            <input type="text" name="new_car_name" id="new_car_name" required>
            <label for="new_car_price">Harga</label>
            <input type="text" name="new_car_price" id="new_car_price" required>
            <label for="new_car_stock">Stok</label>
            <input type="text" name="new_car_stock" id="new_car_stock" required>
            <label for="new_car_image">Gambar</label>
            <input type="file" name="new_car_image" id="new_car_image" accept="image/*" required>
            <button type="submit" name="submit_car">Tambah Mobil</button>
        </form>
    </section>

    <section class="dashboard-section data-mobil">
        <h2 style="flex:1; text-align:center;">Data Mobil</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php
            // Menampilkan data mobil
            $queryCars = "SELECT * FROM mobil";
            $resultCars = $conn->query($queryCars);
            $noCars = 1;
            while ($rowCars = $resultCars->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $noCars++ . "</td>";
                echo "<td>" . $rowCars['nama_mobil'] . "</td>";
                echo "<td>" . number_format($rowCars['harga'], 2, ',', '.') . "</td>";
                echo "<td>" . $rowCars['stok'] . "</td>";
                echo "<td><img src='images/" . $rowCars['gambar'] . "' alt='" . $rowCars['nama_mobil'] . "' style='max-width: 100px; max-height: 100px;'></td>";
                echo '<td class="action-cell">
                        <form method="post" action="dashboardadmin.php">
                            <input type="hidden" name="car_id_update" value="' . $rowCars['id_mobil'] . '">
                            <input type="text" name="edit_car_stok" placeholder="Tambah Stok" required>
                            <button type="submit" name="update_car_stok">Tambah Stok</button>
                        </form>
                        <form method="post" action="dashboardadmin.php">
                            <input type="hidden" name="car_id_delete" value="' . $rowCars['id_mobil'] . '">
                            <button type="submit" name="delete_car">Hapus Mobil</button>
                        </form>
                    </td>';
                echo "</tr>";
            }
            ?>
        </table>
    </section>

    <section class="dashboard-section data-pesanan">
        <h2 style="flex:1; text-align:center;">Data Pesanan</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Harga</th>
            </tr>
            <?php
            // Menampilkan data pesanan
            $queryPesanan = "SELECT * FROM pesanan";
            $resultPesanan = $conn->query($queryPesanan);
            $noPesanan = 1;
            while ($rowPesanan = $resultPesanan->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $noPesanan++ . "</td>";
                echo "<td>" . $rowPesanan['nama_mobil'] . "</td>";
                echo "<td>" . number_format($rowPesanan['harga'], 2, ',', '.') . "</td>";
                echo "</tr>";
                // <input type="hidden" name="car_id_delete" value="' . $rowCars['id_mobil'] . '">
            }
            ?>
        </table>
    </section>


</body>



</html>

<?php
$conn->close();
?>
