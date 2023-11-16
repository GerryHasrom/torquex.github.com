<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesia Map</title>
    <style>
#map-container {
    position: relative;
    width: 80%;
    margin: 40px auto;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease, transform 0.2s ease; /* Menambahkan transisi untuk perubahan transform */
}

#map-container:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px); /* Menggeser map ke atas saat dihover */
}

#map {
    height: 400px;
    width: 100%;
    margin-top: 60px; /* Menambahkan margin atas */
}

.header {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    color: #000000;
    padding: 10px;
    font-size: 1.5rem;
    transition: background-color 0.3s ease;
    font-family: Arial, Helvetica, sans-serif;
}


#map-container:hover .header {
    background-color: #555; /* Warna latar header saat dihover */
}

    </style>
</head>
<body>
    <div class="header">Our Company Location</div>
    <div id="map-container">
        <div id="map"></div>
    </div>
    <script>
        function initMap() {
            var map = L.map('map', {
                center: [-2.5489, 118.0149],
                zoom: 5,
                maxBounds: L.latLngBounds([-11.0, 94.0], [6.0, 141.0]),
                minZoom: 5,
                maxZoom: 5,
                zoomControl: false
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var locations = [
                { name: 'Main Company in Samarinda', coordinates: [-0.5097589165426218, 117.1499471219165] },
                { name: 'Torquex in Jakarta', coordinates: [-6.181242498423538, 106.83312262676931]},
                { name: 'Torquex in Medan', coordinates: [3.5849693353819068, 98.67293757986418] },
                { name: 'Torquex in Palu', coordinates: [-0.9217131889584571, 119.89098950883344] },
                { name: 'Torquex in Semarang', coordinates: [-7.034385307129251, 110.44246575815586] }
            ];

            locations.forEach(location => {
                var marker = L.marker(location.coordinates).addTo(map);

                marker.bindTooltip("<b>" + location.name + "</b>").openTooltip();
            });
        }

        document.addEventListener('DOMContentLoaded', initMap);
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</body>
</html>
