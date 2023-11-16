<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torquex Website</title>
    <style>
        .sub-menu-wrap {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .sub-menu {
            padding: 10px;
        }

        .login-btn {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .login-btn:hover {
            background-color: #333;
            transform: scale(1.05);
        }

        .cart-image {
          margin-right: -45px;
        }

        .search-input {
          right: 50px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <nav>
            <a href="#home" alt="Logo" class="logo" style="color: orange;">TORQUEX</a>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#map">Location</a></li>
                <li><a href="#our-team">Our Team</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
                <li><a href="index4.php">Gallery</a></li>
                <li><a href="index2.php">Go to Shop</a></li>
            </ul>

            <!-- Search input and button -->
            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-input" onkeydown="searchOnEnter(event)">
                <button class="search-btn" onclick="searchFunction()">Search</button>

            </div>

            <!-- Cart -->
            <a href="cart.php"><button><img class="cart-image" src="images/cart.png"></button></a>

            <div class="user-cart-container">
                <button class="login-btn" onclick="redirectToLogin('logintorquex.php')">Login</button>

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="images/account.png" alt="User Avatar">
                            <h3>Gerry Hasrom</h3>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        </nav>
    </div>

    <script>
        function toggleMenu() {
            var subMenu = document.getElementById("subMenu");
            subMenu.style.display = (subMenu.style.display === "block") ? "none" : "block";
        }

        function redirectToLogin(url) {
            window.location.href = url;
        }

        function searchOnEnter(event) {
            if (event.key === 'Enter') {
                window.location.href = 'index3.php';
            }
        }

 
    function searchFunction() {
        var inputElement = document.querySelector('.search-input');
        var searchTerm = inputElement.value;

        // Redirect ke halaman index3.php dengan parameter pencarian
        window.location.href = 'index3.php?carName=' + encodeURIComponent(searchTerm);
    }


    </script>
</body>
</html>
