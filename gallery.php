<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <style>
        body {
            margin: 0;
            background: #000;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }

        #carousel {
            perspective: 1200px;
            background: #100000;
            padding-top: 20%;
            font-size: 0;
            margin-bottom: 3rem;
            overflow: hidden;
            position: relative;
        }

        #carousel-text {
            position: absolute;
            top: 50%; /* Tengah vertikal */
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 2rem;
            text-align: center;
            width: 100%;
        }

        #spinner-container {
            position: relative;
            margin-top: -10%;
        }

        #spinner {
            transform-style: preserve-3d;
            height: 300px;
            transform-origin: 50% 50% -800px;
            transition: 1s;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #spinner img {
            width: 33.33%;
            max-width: 425px;
            position: absolute;
            left: 33.33%;
            transform-origin: 50% 50% -800px;
            outline: 1px solid transparent;
            transition: transform 0.3s ease;
        }

        #spinner img:hover {
            transform: scale(1.1);
        }

        #spinner img:nth-child(1) {
            transform: rotateY(0deg);
        }

        #spinner img:nth-child(2) {
            transform: rotateY(-45deg);
        }

        #spinner img:nth-child(3) {
            transform: rotateY(-90deg);
        }

        #spinner img:nth-child(4) {
            transform: rotateY(-135deg);
        }

        #spinner img:nth-child(5) {
            transform: rotateY(-180deg);
        }

        #spinner img:nth-child(6) {
            transform: rotateY(-225deg);
        }

        #spinner img:nth-child(7) {
            transform: rotateY(-270deg);
        }

        #spinner img:nth-child(8) {
            transform: rotateY(-315deg);
        }

        #spinner img:nth-child(9) {
            transform: rotateY(-360deg);
        }

        #spinner img:nth-child(10) {
            transform: rotateY(-405deg);
        }

        #spinner img:nth-child(11) {
            transform: rotateY(-450deg);
        }

        #spinner img:nth-child(12) {
            transform: rotateY(-495deg);
        }

        .arrow-container {
            position: absolute;
            top: 50%;
            width: 10%;
            margin: 0 2%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            transform: translateY(-50%);
        }

        .arrow {
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            outline: none;
            transition: background 0.3s ease;
            margin-bottom: 10px;
        }

        .arrow:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        #carousel ~ span {
            color: #fff;
            margin: 2%;
            display: inline-block;
            text-decoration: none;
            font-size: 2rem;
            transition: 0.6s color;
            position: relative;
            border-bottom: none;
            line-height: 0;
        }

        #carousel ~ span:hover {
            color: #888;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Photo Gallery</h1>

    <div id="carousel">
        <div id="carousel-text">Any Cars</div>
        <div id="spinner-container">
            <figure id="spinner">
                <?php
                $imagePaths = [
                    "images/gallery1.jpg",
                    "images/gallery2.jpeg",
                    "images/gallery3.png",
                    "images/gallery4.jpeg",
                    "images/gallery5.jpg",
                    "images/gallery6.jpg",
                    "images/gallery7.jpg",
                ];

                foreach ($imagePaths as $path) {
                    echo "<img src='$path' alt='Gallery Photo'>";
                }
                ?>
            </figure>
            <div class="arrow-container">
                <!-- Tombol sebelumnya -->
                <button class="arrow" onclick="prevImage()">&#8249;</button>
                <!-- Tombol selanjutnya -->
                <button class="arrow" onclick="nextImage()">&#8250;</button>
            </div>
        </div>
    </div>

    <script>
        var angle = 0;

        function galleryspin() {
            spinner = document.querySelector("#spinner");
            angle = angle - 30; // Memperbesar sudut rotasi
            spinner.setAttribute("style", "-webkit-transform: rotateY(" + angle + "deg); -moz-transform: rotateY(" + angle + "deg); transform: rotateY(" + angle + "deg);");
        }

        function prevImage() {
            angle += 45; // Memperbesar sudut rotasi
            galleryspin();
        }

        function nextImage() {
            angle -= 45; // Memperbesar sudut rotasi
            galleryspin();
        }
    </script>

</body>

</html>
