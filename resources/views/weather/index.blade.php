<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Погода</title>
</head>
<body>
    <h1>Проверка погоды</h1>
    <form action="{{ route('weather.get') }}" method="POST">
        @csrf
        <label for="city">Введите название города:</label>
        <input type="text" name="city" id="city" required>
        <button type="submit">Узнать погоду</button>
    </form>

    @if ($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
</body>
</html>
