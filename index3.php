<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TORQUEX SPORT CARS</title>
    <!-- Hubungkan CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
    /* Gaya tambahan untuk halaman index3.php */
        .cars-card.highlight {
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
        }

        .cars-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        </style>
</head>
<body>
  
<!-- gnti -->
  <?php include('navbar2.php'); ?>
  <?php include('cars.php'); ?> 
  <?php include('footer.php'); ?>
  <body>
    <!-- Konten lainnya ... -->

    <script>
        // ... Fungsi JavaScript yang sudah ada ...

        // Fungsi untuk menyorot hasil pencarian pada halaman index3.php
        function highlightSearchResults() {
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

        // Panggil fungsi untuk menyorot hasil pencarian saat halaman dimuat
        highlightSearchResults();
    </script>
  <!-- Hubungkan Javascript -->
  <script type="text/javascript" src="script.js"></script>

</body>
</html>
