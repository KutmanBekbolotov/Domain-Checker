<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domian-Checker</title>
</head>
<body>
    <h1>Domian-Checker</h1>
    <form action="{{ route('check.domain') }}" method=POST>
        @csrf
        <input type="text" name="domain" placeholder="example.com" required>
        <button type="submit">Check</button>
    </form>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</body>
</html>
