<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Conversion Result</title>
</head>
<body>
    <h1>Currency Conversion Result</h1>

    <p>The exchange rate of {{ $currency }} to KGS is: <strong>{{ $rate }}</strong></p>

    <a href="{{ route('currencies.index') }}">Back</a>
</body>
</html>
