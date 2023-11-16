<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: none;
            color: #333;
        }

        .car-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .car {
            position: relative;
            width: 100px; /* Ganti nilai ini sesuai kebutuhan */
            height: 350px; /* Ganti nilai ini sesuai kebutuhan */
            margin: 10px;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .car img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Setiap gambar memiliki ukuran yang sama */
            border-bottom: 2px solid #333;
        }

        .car .car-name {
            padding: 10px;
            text-align: center;
            background-color: #333;
            color: #fff;
        }

        .car .info {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .car:hover .info {
            opacity: 1;
        }

        /* Effect-2 */
        .car:nth-child(2n), .car:nth-child(2n-1) {
            overflow: hidden;
            width: calc(40% - 20px); /* Setiap baris hanya ada 2 kartu */
        }

        .car:nth-child(2n-1) .car-info {
            color: hsl(0, 0%, 90%);
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            transform: translate(-50%, -50%);
        }

        .car:nth-child(2n-1) .car-heading {
            font-size: 2rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: .8;
            font-weight: 900;
            transform: scale(2);
            opacity: 0;
            transition: .5s;
        }

        .car:nth-child(2n-1) .car-text {
            font-size: 1rem;
            opacity: .6;
            padding-left: 0;
            transform: scale(1.2);
            opacity: 0;
            transition: .4s;
        }

        .car:nth-child(2n-1):hover .car-heading,
        .car:nth-child(2n-1):hover .car-text {
            opacity: .8;
            transform: scale(1);
        }

        .info {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
    opacity: 0;
    transition: opacity 0.3s;
}

.car:nth-child(odd) {
    margin-right: 80px; /* Atur margin right untuk elemen dengan indeks ganjil */
}

.car:nth-child(even) {
    margin-left: 10px; /* Atur margin left untuk elemen dengan indeks genap */
}

.car:hover .info {
    opacity: 1;
}

.car-text {
    font-size: 1rem;
    opacity: .6;
    padding-left: 0;
    transform: scale(1.2);
    opacity: 0;
    transition: .4s;

    color: #FFA500; /* Warna teks car-text, dapat disesuaikan dengan preferensi Anda */
}

.car:nth-child(odd) .car-text {
            margin-left: 30px; /* Atur margin kanan untuk elemen dengan indeks ganjil */
        }


.car:nth-child(even) .car-text {
    margin-left: 30px; /* Atur margin kiri untuk elemen dengan indeks genap */
}

.car:hover .car-text {
    opacity: .8;
    transform: scale(1);
}

.car:nth-child(2n) .car-heading {
    font-size: 2rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    opacity: .8;
    font-weight: 900;
    transform: scale(2);
    opacity: 0;
    transition: .5s;
}

.car:nth-child(2n):hover .car-heading {
    opacity: .8;
    transform: scale(1);
}


    </style>
</head>
<body>
    <header>
        <h1>We Make Best World Sports Cars</h1>
    </header>

    <div class="car-container">
        <!-- Repeat the structure for all 8 cars -->
        <div class="car">
            <img src="images/content1.jpg" alt="Car 1">
            <div class="car-name">Car 1</div>
            <div class="info">
                <h2 class="car-heading">Ferrari</h2>
                <p class="car-text">Ferrari adalah ikon dalam dunia mobil balap,
                     dikenal karena desain elegan, performa luar biasa, dan suara mesin yang khas. Merek ini memiliki sejarah panjang dalam balapan dan terkenal sebagai simbol status dan kecepatan.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content2.jpg" alt="Car 2">
            <div class="car-name">Car 2</div>
            <div class="info">
                <h2 class="car-heading">Porsche</h2>
                <p class="car-text"> Porsche menggabungkan kecepatan dan kemewahan dalam setiap modelnya. Merek ini terkenal dengan mobil-mobil sport yang elegan dan handal, dengan fokus pada teknologi canggih dan pengalaman berkendara yang memukau.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content3.jpg" alt="Car 3">
            <div class="car-name">Car 3</div>
            <div class="info">
                <h2 class="car-heading">McLaren</h2>
                <p class="car-text"> McLaren dikenal sebagai pionir teknologi dan inovasi dalam dunia mobil balap. Mereka memproduksi mobil-mobil super cepat dengan desain aerodinamis yang canggih dan performa tinggi yang luar biasa.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content4.jpg" alt="Car 4">
            <div class="car-name">Car 4</div>
            <div class="info">
                <h2 class="car-heading">Bugatti</h2>
                <p class="car-text">Bugatti adalah simbol kemewahan dan kecepatan. Mobil-mobil Bugatti, seperti Chiron, menjadi ikon dalam dunia mobil super dengan kecepatan tertinggi dan desain yang sangat eksklusif.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content5.jpg" alt="Car 5">
            <div class="car-name">Car 5</div>
            <div class="info">
                <h2 class="car-heading">Lamborghini</h2>
                <p class="car-text">Lamborghini terkenal karena mobil-mobil sport yang ekstrim dan desain yang futuristik. Merek ini sering diidentifikasi dengan warna-warna terang dan pintu gull-wing yang khas.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content6.jpg" alt="Car 6">
            <div class="car-name">Car 6</div>
            <div class="info">
                <h2 class="car-heading">Aston Martin</h2>
                <p class="car-text">Aston Martin menyajikan kombinasi antara keindahan dan kecepatan. Mobil-mobil mereka menciptakan perpaduan sempurna antara mobil sport dan mobil mewah, menawarkan pengalaman berkendara yang luar biasa.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content7.jpg" alt="Car 7">
            <div class="car-name">car 7</div>
            <div class="info">
                <h2 class="car-heading">Alpha Romeo</h2>
                <p class="car-text">Alfa Romeo memiliki warisan balap yang kuat dan dikenal dengan mobil-mobil yang elegan dan bertenaga. Merek ini menawarkan perpaduan antara gaya Italia yang klasik dan performa yang dinamis.</p>
            </div>
        </div>

        <div class="car">
            <img src="images/content8.jpg" alt="Car 8">
            <div class="car-name">Car 8</div>
            <div class="info">
                <h2 class="car-heading">Other Cars</h2>
                <p class="car-text">Siapa yang memegang mobil balap ini, kami pecinta mobil balap</p>
            </div>
        </div>
        <!-- Repeat the above structure for the remaining cars -->
    </div>

    <script>
        // Add your JavaScript for any additional functionality or animations here
    </script>
</body>
</html>
