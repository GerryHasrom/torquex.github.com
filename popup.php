<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopUp</title>
    <!-- Internal CSS -->
    <style>
        /* Your existing styles */

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 10000;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            width: 80%;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close-btn" id="close-btn">&times;</span>
            <h2>Welcome to Torquex Sport Cars Store</h2>
            <p>Thank you for visiting our website! Relax in the glow of luxury.</p>
        </div>
    </div>

    <!-- Internal JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const popup = document.getElementById('popup');
            const closeBtn = document.getElementById('close-btn');

            setTimeout(() => {
                popup.style.display = 'block';
            }, 3000);

            closeBtn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        });
    </script>
</body>
</html>
