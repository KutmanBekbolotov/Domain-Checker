<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find City Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Search for a City</h1>
        <form method="POST" action="{{ route('map.search') }}" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="city" class="form-label">City Name</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city name" required>
            </div>
            <button type="submit" class="btn btn-primary">Find Map</button>
        </form>
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</body>
</html>
