<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map of {{ $city }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Map of {{ $city }}</h1>
        <div id="map" style="height: 500px;" class="mt-4"></div>
        <a href="{{ route('map.index') }}" class="btn btn-secondary mt-4">Search Another City</a>
    </div>
    <script>
        // Инициализация карты
        const map = L.map('map').setView([{{ $coordinates['lat'] }}, {{ $coordinates['lng'] }}], 13);

        // Добавление слоя карты
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Добавление маркера
        L.marker([{{ $coordinates['lat'] }}, {{ $coordinates['lng'] }}]).addTo(map)
            .bindPopup("{{ $city }}")
            .openPopup();
    </script>
</body>
</html>
