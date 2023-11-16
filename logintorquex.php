<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page Torquex</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff; 
        }

        .login-container {
            text-align: center;
            background-color: #6A11CB; 
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            color: #fff; /* Set text color to white */
        }

        button {
            background-color: #4285F4;
            color: #fff;
            border: none;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #2d74da;
            transform: scale(1.1);
        }

        section {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: black;
        }

        p {
            font-size: 16px;
            color: brown;
        }

        h1 {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>🚀 Welcome to Torquex 🚀</h1>
        <button onclick="redirectToLogin('login.php')">Login as Admin</button>
        <button onclick="redirectToLogin('loginuser.php')">Login as User</button>

        <section>
            <h2>Exploring the Torquex Universe</h2>
            <p>This area is designated for visitors. To embark on your journey and access admin or user-related content, kindly choose the appropriate gateway above.</p>
        </section>
    </div>

    <script>
        function redirectToLogin(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
