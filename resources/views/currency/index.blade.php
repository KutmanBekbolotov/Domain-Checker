<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Conversion</title>
</head>
<body>
    <h1>Currency to KGS Conversion</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('currencies.post') }}" method="POST">
        @csrf
        <label for="query">Enter Currency Code (e.g., USD, EUR):</label>
        <input type="text" id="query" name="query" required>
        <button type="submit">Get Rate</button>
    </form>
</body>
</html>
