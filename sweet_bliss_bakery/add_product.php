<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>Add Bakery Product</header>

<div class="container">
    <div class="card">

        <form method="POST" action="save_product.php">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" placeholder="Price" required>
            <textarea name="description" placeholder="Product Description"></textarea>
            <input type="text" name="image" placeholder="Image name (cake.jpg)">

            <button type="submit">Save Product</button>
        </form>

    </div>
</div>

</body>
</html>
