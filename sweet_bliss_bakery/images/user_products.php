<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bakery_db");

if (!$conn) {
    die("Database connection failed");
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>🍰 Sweet Bliss Bakery – Products</header>

<div class="product-container">

<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="product-card">
        <img src="images/<?php echo $row['image']; ?>" alt="Product Image">
        <h3><?php echo $row['name']; ?></h3>
        <p>₹<?php echo $row['price']; ?></p>

        <form method="POST" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <button type="submit">🛒 Add to Cart</button>
        </form>
    </div>
<?php
    }
} else {
    echo "<p>No products available</p>";
}
?>

</div>

</body>
</html>
