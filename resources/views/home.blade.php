<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>

    <div>
        <h2>Available Services:</h2>
        <ul>
            <li><a href="{{ route('weather.index') }}">Weather Checker</a></li>
            <li><a href="{{ route('image.get') }}">Image Search</a></li>
            <li><a href="{{ route('domain.index') }}">Domain Checker</a></li>
            <li><a href="{{ route('currencies.index') }}">Currency</a></li>
            
        </ul>
    </div>
</body>
</html>
