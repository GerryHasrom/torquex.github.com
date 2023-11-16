<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Perbaikan typo di sini -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Zen+Kaku+Gothic+Antique:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="google_login_page.css">
    <title>Google Register Page</title>
</head>
<body>
    <main class="inputContainer">
        <img src="../images/google_page.png" alt="" width="98" height="33">
        <h2 class="login">Register</h2>
        <h4 class="use">Create a new Google Account</h4> <!-- Perbaikan typo di sini -->
        <form id="registerForm" action="register_process.php" method="POST">
            <input type="text" class="gInput" name="email" placeholder="Email">
            <input type="password" class="gInput" name="password" placeholder="Password">
            <!-- Tambahkan elemen formulir lainnya sesuai kebutuhan -->
        </form>
        <div class="forgotContainer">
            <!-- Tambahkan elemen lain jika diperlukan -->
        </div>
        <h4 class="guest">Not Your Computer? Use Guest Mode to Sign in Privately. <span> Learn More</span></h4>
        <div class="buttonContainer">
            <a href="javascript:void(0);" class="btnNext" onclick="document.getElementById('registerForm').submit();">Register</a>
        </div>
    </main>
</body>
</html>
