<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Our Team Section</title>
    <style>
        .team-section {
            text-align: center;
        }

        .team-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 2em 1em;
        }

        .team-column {
            flex: 0 0 calc(33.33% - 1em);
            margin-bottom: 2em;
            box-sizing: border-box;
        }

        .team-h1 {
            font-size: 3.5em;
            color: #1f003b;
        }

        .team-card {
            box-shadow: 0 0 2.4em rgba(25, 0, 58, 0.1);
            padding: 1.5em;
            border-radius: 0.6em;
            color: #1f003b;
            cursor: pointer;
            transition: 0.3s;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            height: 100%; /* Tinggi kartu 100% dari kontennya */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .team-img-container {
            width: 8em;
            height: 8em;
            background-color: #a993ff;
            padding: 0.5em;
            border-radius: 50%;
            margin: 0 auto 1em auto;
        }

        .team-img {
            width: 100%;
            border-radius: 50%;
        }

        .team-h3 {
            font-weight: 500;
            margin-bottom: 0.5em; /* Margin bawah untuk jarak antara nama dan jabatan */
        }

        .team-p {
            font-weight: 300;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 2px;
        }

        .team-description {
            margin-top: 1em;
            font-size: 1em;
        }

        .team-icons {
            display: none;
        }

        .team-card:hover {
            background: linear-gradient(#6045ea, #8567f7);
            color: #ffffff;
        }

        .team-card:hover .team-img-container {
            transform: scale(1.15);
        }
    </style>
</head>

<body>
    <div class="team-section" id="our-team">
        <h1 class="team-h1">Our Team</h1>
        <div class="team-row">
            <div class="team-column">
                <div class="team-card">
                    <div class="team-img-container">
                        <img src="images/about_us_2.png" class="team-img" />
                    </div>
                    <h3 class="team-h3">Gerry Hasrom</h3>
                    <p class="team-p">CEO</p>
                    <p class="team-description">"Pada Project web ini saya berperan dalam Back-End, membuat form login admin dan user, mengelola database, dan ide website"</p>
                </div>
            </div>
            <div class="team-column">
                <div class="team-card">
                    <div class="team-img-container">
                        <img src="images/about_us_3.png" class="team-img" />
                    </div>
                    <h3 class="team-h3">Rheza Gerard</h3>
                    <p class="team-p">COO</p>
                    <p class="team-description">"Pada Project web ini saya berperan dalam Front-End, dalam membuat halaman tampilan selain pada landing page"</p>
                </div>
            </div>
            <div class="team-column">
                <div class="team-card">
                    <div class="team-img-container">
                        <img src="images/about_us_1.png" class="team-img" />
                    </div>
                    <h3 class="team-h3">Azhar Nur Hakim</h3>
                    <p class="team-p">CTO</p>
                    <p class="team-description">"Pada project web ini saya berperan dalam Front-End juga, membuat tampilan pada landing page"</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
