<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <div class="container">
        <h1>Create New Product</h1>

        <!-- Форма для добавления товара -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" required step="0.01">
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
