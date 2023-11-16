<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome Footer</title>
    <style>

        .footer {
            background-color: #6045ea;
            color: #fff;
            padding: 20px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .footer:hover {
            background-color: #555;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .social-icons {
            list-style: none;
            padding: 0;
            display: flex;
        }

        .social-icons li {
            margin-right: 10px;
        }

        .social-icons a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #1abc9c;
        }

        .welcome {
            display: none;
        }
    </style>
</head>
<body>
    <div class="footer">
        <div class="footer-content">
            <p>© 2023 Awesome Website</p>
            <ul class="social-icons">
                <li><a href="#" target="_blank">Facebook</a></li>
                <li><a href="#" target="_blank">Twitter</a></li>
                <li><a href="#" target="_blank">Instagram</a></li>
                <li><a href="#" target="_blank">LinkedIn</a></li>
            </ul>
        </div>
        <p class="welcome">Welcome to Awesome Website</p>
        <p><a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
    </div>
</body>
</html>
