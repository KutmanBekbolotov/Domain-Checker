<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsplash Image Search</title>
</head>
<body>
    <h1>Search for an Image</h1>

    <!-- Форма для ввода запроса -->
    <form action="{{ route('image.post') }}" method="POST">
        @csrf
        <label for="query">Enter search term (e.g., nature, city, etc.):</label>
        <input type="text" name="query" id="query" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>