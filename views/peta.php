<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Wisata</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            position: absolute;
            top: 20px;
            right: 20px;
            width: auto;
            max-width: 300px;
            z-index: 1000;
        }

        .map-title {
            font-size: 34px;
            font-weight: 700;
            color: white;
            text-align: center;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
        }

        .tips {
            font-size: 16px;
            font-weight: 600;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px;
            border-radius: 10px;
            margin-top: 5px;
            text-align: center;
        }

        #map {
            flex: 1;
        }

        .leaflet-popup-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .btn-tiket {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white !important;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .btn-tiket:hover {
            background-color: #0056b3;
            color: white !important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="map-title">Peta Wisata Indonesia</div>
    <div class="tips">ketuk icon untuk detail wisata.</div>
</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([-1.015, 115.665], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    const icongunung = L.icon({
        iconUrl: 'https://png.pngtree.com/png-vector/20220624/ourmid/pngtree-pointing-mountain-icon-simple-vector-png-image_5189102.png',
        iconSize: [35, 35],
        iconAnchor: [12, 27],
        popupAnchor: [5, -30]
    });

    const iconpantai = L.icon({
        iconUrl: 'https://cdn-icons-png.freepik.com/512/88/88956.png',
        iconSize: [35, 35],
        iconAnchor: [12, 27],
        popupAnchor: [5, -30]
    });

    var wisataData = <?php echo json_encode($wisata); ?>;

    wisataData.forEach(function(wisata) {
        var popupContent = "<div>";
        
        if (wisata.gambar) {
            popupContent += "<img src='" + wisata.gambar + "' alt='" + wisata.nama + "' />";
        }

        popupContent += "<b>" + wisata.nama + "</b><br>" +
                        "<i>" + wisata.jenis + "</i><br><br>" +
                        "<b>Harga: Rp " + wisata.harga + "</b><br>" +
                        "<p>" + wisata.deskripsi + "</p>";

        popupContent += "<a href='" + '<?= site_url("user/pesan_tiket/") ?>/' + wisata.id + "' class='btn-tiket'>Pesan Tiket</a>";

        popupContent += "</div>";

        var markerIcon;

        if (wisata.jenis && wisata.jenis.toLowerCase() === 'gunung') {
            markerIcon = icongunung;
        } else if (wisata.jenis && wisata.jenis.toLowerCase() === 'pantai') {
            markerIcon = iconpantai;
        } else {
            markerIcon = L.icon({
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                iconSize: [25, 41], 
                iconAnchor: [12, 41],
                popupAnchor: [0, -41]
            });
        }

        L.marker([wisata.latitude, wisata.longitude], { icon: markerIcon })
            .addTo(map)
            .bindPopup(popupContent);
    });
</script>
</body>
</html>