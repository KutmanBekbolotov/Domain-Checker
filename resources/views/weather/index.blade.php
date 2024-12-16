<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>проверка погоды </h1>
    <form action="{{route('weather.get')}}" method="post"></form>
    @csrf
    <label for="city">Введите название города:</label>
    <input type="text" name="city" id="city">
    <button type="submit">Узнать город</button>
    @if ($errors->any())
        <div>
            <strong>{{$errors->first}}</strong>
        </div>
        @endif
</body>
</htl>