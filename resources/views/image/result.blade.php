<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insplash Image</title>
</head>
<body>
    <h1>Search Result for "{{$query}}"</h1>
    <img src="{{imageUrl}}" alt="Image from Unsplash">
    <a href="{{route('image.get')}}"> Search again</a>
</body>
</html>