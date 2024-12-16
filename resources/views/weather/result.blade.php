<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Погода</title>
</head>
<body>
    <h1>

        <p><strong>Температура</strong>{{$weather['main']['temp']}} C</p>
        <p><strong>Описание</strong>{{$weather['weather']['0']['description']}} C</p>
        <p><strong>Влажность</strong>{{$weather['main']['humidity']}} %</p>
        <p><strong>Скорость ветра</strong>{{$weather['wind']['speed']}} m/c</p>   

    </h1>
</body>
</html>