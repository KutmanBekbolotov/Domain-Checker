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
        <form action="{{ route('spotify.search') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="query" class="form-label">Enter Song or Artist:</label>
                <input type="text" id="query" name="query" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>
    </div>
</body>
</html>
 