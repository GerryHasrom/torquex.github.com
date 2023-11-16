<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Torquex</title>
  <style>
  .user-cart-container {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1;
        top: 100%; /* Letakkan submenu di bawah tombol */
        right: 0; /* Atur submenu ke kanan tombol */
    }

    .user-cart-container:hover {
        display: block;
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
    </style>
</head>
<body>
<div class="navbar">
  <nav>
  <a href="#home" alt="Logo" class="logo" style="color: orange;">TORQUEX</a>

    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php">Cars</a></li>
      <li><a href="index.php">Location</a></li>
      <li><a href="index.php">Our Team</a></li>
      <li><a href="index.php">Contact Us</a></li>
      <li><a href="index2.php">Go to Shop</a></li>
    </ul>

    <!-- Search input and button -->
    <div class="search-container">
      <input type="text" placeholder="Search..." class="search-input">
      <button class="search-btn" onclick="searchFunction()">Search</button>
    </div>

    <!-- Cart -->
    <a href="cart.php"><button><img class="cart-image" src="images/cart.png"></button></a>

    <div class="user-cart-container">
      <button class="login-btn" onclick="redirectToLogin('logintorquex.php')">Login</button>


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
            window.location.href = 'index3.php?carName=' + encodeURIComponent(document.querySelector('.search-input').value);
        }
    }

    function highlightSearchResultsNavbar() {
        var urlParams = new URLSearchParams(window.location.search);
        var carName = urlParams.get('carName');

        // Jika ada parameter carName, berikan efek hover pada hasil pencarian
        if (carName) {
            var carsCards = document.querySelectorAll('.cars-card');

            carsCards.forEach(function(card) {
                var carTitle = card.querySelector('h3').innerText.toLowerCase();
                if (carTitle.includes(carName.toLowerCase())) {
                    card.classList.add('highlight');
                }
            });
        }
    }

    function searchFunction() {
        // Pindahkan fungsi highlight ke dalam fungsi searchFunction
        highlightSearchResultsNavbar();

        // Fungsi pencarian lainnya
        var inputElement = document.querySelector('.search-input');
        var searchTerm = inputElement.value;

        // Redirect ke halaman index3.php dengan parameter pencarian
        window.location.href = 'index3.php?carName=' + encodeURIComponent(searchTerm);
    }
</script>
</body>
</html>

</body>
</html>