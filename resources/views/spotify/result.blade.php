<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Темный фон */
            color: #FFFFFF; /* Светлый текст */
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #1DB954; /* Зеленый цвет Spotify */
            font-weight: bold;
        }
        .card {
            background-color: #181818; /* Темный цвет для карточек */
            border: none;
        }
        .card-title, .card-text {
            color: #FFFFFF; /* Светлый текст */
        }
        .btn-success {
            background-color: #1DB954; /* Зеленый цвет Spotify */
            border-color: #1DB954;
        }
        .btn-success:hover {
            background-color: #1ED760; /* Чуть светлее для hover */
            border-color: #1ED760;
        }
        .card-img-top {
            border-radius: 5px;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        .container {
            padding: 20px;
            max-width: 1200px;
        }
        .row {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Search Results for "{{ $query }}"</h1>
        <div class="row mt-4">
            @foreach ($tracks as $track)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $track['album']['images'][0]['url'] }}" class="card-img-top" alt="{{ $track['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $track['name'] }}</h5>
                            <p class="card-text">Artist: {{ $track['artists'][0]['name'] }}</p>
                            <a href="{{ $track['external_urls']['spotify'] }}" target="_blank" class="btn btn-success w-100">Listen on Spotify</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
