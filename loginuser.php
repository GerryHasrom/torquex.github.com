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
            background-color: #f1f1f1;
        }

        .login-box {
            background: linear-gradient(to right, #6A11CB, #2575FC);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: cardAnimation 1s ease-in-out;
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
            color: #fff;
            margin-bottom: 30px;
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

        a {
            color: #4285F4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logo {
            width: 80px;
            margin-bottom: 20px;
        }

        /* Typing Animation */
        h2::after {
            content: '|';
            animation: typing 0.7s infinite;
        }

        @keyframes typing {
            0%,
            100% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
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

            .logo {
                width: 60px;
            }
        }
    
        h2::after {
                    content: '|';
                    animation: typing 0.7s infinite;
                    display: inline-block;
                    vertical-align: bottom;
                }

                @keyframes typing {
                    0%,
                    100% {
                        opacity: 0;
                    }
                    50% {
                        opacity: 1;
                    }
                }
    </style>
</head>
<body>
    <!-- Google Login Section -->
    <div class="login-box">
    <img src="images/google.png">
        <h2> Sign In to Torquex </h2>
        <a href="login_page/google_login_page.php">
            <button>Sign in With Google</button>
        </a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const textElement = document.querySelector("h2");
            const text = "Sign In to Torquex";

            let index = 0;

            function type() {
                textElement.textContent = text.slice(0, index);
                index++;

                if (index <= text.length) {
                    setTimeout(type, 200);
                }
            }

            type();
        });
    </script>
</body>
</html>
