<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Videos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .card {
        transition: transform 0.3s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    }
    </style>

</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">YouTube Videos</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($videos as $video)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $video['thumbnail'] }}" class="card-img-top" alt="{{ $video['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $video['title'] }}</h5>
                            <a href="{{ $video['url'] }}" target="_blank" class="btn btn-primary w-100">Watch on YouTube</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
