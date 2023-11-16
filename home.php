<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torquex Innovations Sport Cars</title>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato);

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        h1 {
            font-size: 35px;
            margin-bottom: 20px;
        }

        .typed {
            border-bottom: 2px solid transparent;
            font-size: 35px;
            display: inline-block;
            color: #ccc;
        }

        .typed-cursor {
            opacity: 1;
            animation: blink 0.7s infinite;
            font-size: 35px;
            color: #ccc;
            display: inline-block;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .home {
            background-color: #ffffff;
            text-align: center;
            position: relative;
            overflow: hidden;
            width: 100vw; /* Set to 100vw to ensure it takes the full viewport width */
            max-width: 100%; /* Set max-width to 100% to ensure it doesn't exceed the viewport width */
            margin-top: 0;
            z-index: 1;
        }


        .home-content {
            position: relative;
        }

        .home-card {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .video {
            width: 110%;
            height: 100vh;
            object-fit: cover;
            position: relative;
        }

        .video video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            width: 30%;
            text-align: center;
            transition: background-color 0.3s ease-in-out;
        }

        .card-overlay:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .card-overlay h1 {
            font-size: 38px;
            margin-bottom: 15px;
            color: #ccc;
        }

        .card-overlay p {
            font-size: 16px;
            margin-bottom: 5px;
            color: #ccc;
        }
    </style>
</head>

<body>
    <section id="home" class="home">
        <div class="home-content">
            <div class="home-card">
                <div class="video">
                    <video src="images/homepage.mp4" autoplay loop muted></video>
                </div>
                <div class="card-overlay">
                    <h1>
                        Welcome to Torquex
                        <span id="typed" class="typed"></span>
                        <span class="typed-cursor"></span>
                    </h1>
                    <p> ✔ Nice Cars </p>
                    <p> ✔ Mc Laren </p>
                    <p> ✔ Lamborghini </p>
                    <p> ✔ Bugatti </p>
                    <p> ✔ Supra GTR </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        new Typed('#typed', {
            strings: [
                ' Modern Sport Cars',
                ' Elegants Sport Cars',
                ' Innovations Sport Cars'
            ],
            typeSpeed: 90,
            delaySpeed: 90,
            loop: true,
        });
    </script>
</body>

</html>
