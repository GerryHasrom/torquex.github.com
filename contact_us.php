<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        .contact-form-container {
            background-color: #6045ea;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 40%;
            text-align: center;
            float: left; /* Menentukan elemen ini akan mengapung di sebelah kiri */
            margin-left: 40px;
            margin-bottom: 40px;
        }

        .contact-h1 {
            font-size: 3.5em;
            color: #1f003b;
            margin-bottom: 20px;
            line-height: 1;
        }

        .contact-form-container form {
            display: flex;
            flex-direction: column;
        }

        .contact-form-container label {
            margin-bottom: 8px;
            color: #fff;
        }

        .contact-form-container input,
        .contact-form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .contact-form-container button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .contact-form-container button:hover {
            background-color: #45a049;
        }

        .description-container {
            width: 40%;
            background-color: none;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            float: right; 
            margin-right: 8%;
            margin-top: 10%;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .description-container {
            text-align: left;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            color: #333;
            animation: slideInRight 1s ease-in-out; /* Add slide-in animation */
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="contact-form-container" id="contact-us">
        <h1 class="contact-h1">Contact Us</h1>
        <form action="process_contact.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="description-container">
        <h2>Torquex Racing Cars</h2>
        <p>Experience the thrill of Torquex's high-performance racing cars, meticulously crafted for speed enthusiasts. Our cutting-edge technology, aerodynamic design, and powerful engines redefine the limits of automotive excellence. Each Torquex racing car is a masterpiece, engineered to dominate the racetrack and deliver an adrenaline-pumping experience like no other.</p>
    </div>

    <div class="clearfix"></div> 
</body>
</html>
