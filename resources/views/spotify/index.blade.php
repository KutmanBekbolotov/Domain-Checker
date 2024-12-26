<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Music Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Spotify Music Search</h1>
        <form action="{{ route('spotify.index') }}" method="GET" class="mt-4">
            <div class="mb-3">
                <label for="query" class="form-label">Enter Song or Artist:</label>
                <input type="text" id="query" name="query" class="form-control" value="{{ request('query') }}" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>

        @if(isset($searchResults))
            <div class="mt-5">
                <h2>Search Results:</h2>
                <div class="row">
                    @foreach($searchResults['tracks']['items'] as $track)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if(!empty($track['album']['images']))
                                    <img src="{{ $track['album']['images'][0]['url'] }}" class="card-img-top" alt="Album Cover">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $track['name'] }}</h5>
                                    <p class="card-text">
                                        Artist: {{ $track['artists'][0]['name'] }}<br>
                                        Album: {{ $track['album']['name'] }}
                                    </p>
                                    <a href="{{ $track['external_urls']['spotify'] }}" class="btn btn-success" target="_blank">
                                        Listen on Spotify
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</body>
</html>