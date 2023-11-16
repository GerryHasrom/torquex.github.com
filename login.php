<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE TORQUEX</title>
    <link rel="stylesheet" type="text/css" href="./CSS/login.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }

        .login-box {
            background: linear-gradient(to right, #6A11CB, #2575FC);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: cardAnimation 1s ease-in-out;
            color: #fff; /* Set text color to white */
        }

        @keyframes cardAnimation {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h2 {
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4285F4;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #2d74da;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media screen and (max-width: 600px) {
            .login-box {
                padding: 20px;
            }

            h2 {
                font-size: 1.5em;
            }

            button {
                padding: 10px 15px;
            }
        }
    </style>

</head>
<body>
    <div class="login-box">
        <!-- Admin Login Section -->
        <h2> Admin Login </h2>
        <form action="admin_login.php" method="post">
            <input type="text" placeholder="Admin Username" name="admin_username">
            <input type="password" placeholder="Admin Password" name="admin_password">
            <button type="submit">Login as Admin</button>
        </form>
        <hr>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Login to Dashboard Admin!');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Get the entered username and password
        const usernameInput = document.querySelector('input[name="admin_username"]');
        const passwordInput = document.querySelector('input[name="admin_password"]');
        
        const enteredUsername = usernameInput.value;
        const enteredPassword = passwordInput.value;

        // Check if the entered username and password match the predefined values
        if (enteredUsername === "admin" && enteredPassword === "admin") {
            // If matched, redirect to the dashboardadmin.php page
            window.location.href = 'dashboardadmin.php';
        } else {
            // If not matched, display an alert (you can customize this)
            alert('Invalid username or password. Please try again.');
        }
    });
});


    </script>
</body>
</html>
