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
        <h1>All Posts</h1>

        <!-- Уведомление об успешном добавлении -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Лента постов -->
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($post->image_url)
                            <img src="{{ asset('storage/' . $post->image_url) }}" class="card-img-top" alt="Post Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posts available.</p>
            @endforelse
        </div>

        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">Add New Post</a>
    </div>
</body>
</html>
