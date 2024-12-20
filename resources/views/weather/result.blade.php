<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Погода в {{ $city }}</title>
</head>
<body>
    <h1>Погода в {{ $city }}</h1>

    <p><strong>Температура:</strong> {{ $weather['main']['temp'] }} °C</p>
    <p><strong>Описание:</strong> {{ $weather['weather'][0]['description'] }}</p>
    <p><strong>Влажность:</strong> {{ $weather['main']['humidity'] }}%</p>
    <p><strong>Скорость ветра:</strong> {{ $weather['wind']['speed'] }} м/с</p>

    <a href="{{ route('weather.index') }}">Назад</a>
</body>
</html>
