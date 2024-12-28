<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Music Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Spotify Music Search</h1>
        <!-- Search Form -->
        <form id="searchForm" class="mb-4">
            <div class="input-group">
                <input type="text" id="query" class="form-control" placeholder="Search for a track..." required>
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>

        <!-- Results Container -->
        <div id="resultsContainer" class="row">
            <!-- Tracks will be dynamically rendered here -->
        </div>
    </div>

    <script>
        // JavaScript for handling AJAX search
        $(document).ready(function () {
            $('#searchForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the form from refreshing the page
                const query = $('#query').val(); // Get the user's input

                // Clear previous results
                $('#resultsContainer').html('<p class="text-center">Searching...</p>');

                // AJAX request to fetch tracks
                $.ajax({
                    url: "{{ route('spotify.search') }}", // Your route for the search
                    method: "POST",
                    data: {
                        query: query,
                        _token: "{{ csrf_token() }}" // Pass CSRF token for security
                    },
                    success: function (response) {
                        const tracks = response.tracks; // Adjust this to match your response structure
                        const container = $('#resultsContainer');
                        container.empty(); // Clear the container

                        if (tracks.length > 0) {
                            tracks.forEach(track => {
                                const card = `
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <img src="${track.album.images[0].url}" class="card-img-top" alt="${track.name}">
                                            <div class="card-body">
                                                <h5 class="card-title">${track.name}</h5>
                                                <p class="card-text">Artist: ${track.artists[0].name}</p>
                                                <a href="${track.external_urls.spotify}" target="_blank" class="btn btn-success w-100">Listen on Spotify</a>
                                            </div>
                                        </div>
                                    </div>`;
                                container.append(card);
                            });
                        } else {
                            container.html('<p class="text-center">No tracks found. Please try another search.</p>');
                        }
                    },
                    error: function () {
                        $('#resultsContainer').html('<p class="text-danger text-center">An error occurred. Please try again.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>