<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <h1>Result of checking domain: {{ $domain }}</h1>
    <p>
        Status: {{ $isAvailable === 'AVAILABLE' ? 'Available' : 'Not Available' }}
    </p>
    <a href="{{ route('home') }}">Check another domain</a>
</body>
</html>