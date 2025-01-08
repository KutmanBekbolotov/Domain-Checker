<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Posts</h1>

        <!-- Кнопка для добавления нового поста -->
        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        </div>

        <!-- Лента постов -->
        @if ($posts->isEmpty())
            <p>No posts available. Start by creating one!</p>
        @else
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($post->image_url)
                                <img src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
