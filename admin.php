<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    $insert_query = "INSERT INTO user_on_admin (username, password) VALUES ('$newUsername', '$newPassword')";

    if ($conn->query($insert_query) === true) {
        header('Location: dashboardadmin.php');
        exit;
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $userIdUpdate = $_POST['user_id_update'];
    $editUsername = $_POST['edit_username'];
    $editPassword = $_POST['edit_password'];

    $update_query = "UPDATE user_on_admin SET username = '$editUsername', password = '$editPassword' WHERE id = $userIdUpdate";

    if ($conn->query($update_query) === true) {
        header('Location: dashboardadmin.php');
        exit;
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $userIdDelete = $_POST['user_id_delete'];

    $delete_query = "DELETE FROM user_on_admin WHERE id = $userIdDelete";

    if ($conn->query($delete_query) === true) {
        header('Location: dashboardadmin.php');
        exit;
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}
?>
