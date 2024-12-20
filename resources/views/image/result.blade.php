<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsplash Image Result</title>
</head>
<body>
    <h1>Result for: {{ $query }}</h1>

    <!-- Отображение изображения -->
    <img src="{{ $imageUrl }}" alt="Image" style="width: 80%; max-width: 500px;">
    
    <!-- Кнопка для возвращения на форму -->
    <a href="{{ route('image.get') }}">Search again</a>
</body>
</html>