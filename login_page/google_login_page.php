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
    <title>Google Login Page</title>
</head>
<body>
    <main class="inputContainer">
        <img src="../images/google_page.png" alt="" width="98" height="33">
        <h2 class="login">Login</h2>
        <h4 class="use">Use your Google Account</h4> <!-- Perbaikan typo di sini -->
        <form id="loginForm" action="login_process.php" method="POST">
            <input type="text" class="gInput" name="email" placeholder="Email">
            <input type="password" class="gInput" name="password" placeholder="Password">
            <!-- Tambahkan elemen formulir lainnya sesuai kebutuhan -->
        </form>
        <div class="forgotContainer">
            <h5 class="forgot">Forgot Email?</h5>
        </div>
        <h4 class="guest">Not Your Computer? Use Guest Mode to Sign in Privately. <span> Learn More</span></h4>
        <div class="buttonContainer">
            <a href="google_register_page.php" class="btnCreate"> Create Account</a>
            <a href="javascript:void(0);" class="btnNext" onclick="document.getElementById('loginForm').submit();">Login</a>
        </div>
    </main>
</body>
</html>
