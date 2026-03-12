<?php
session_start();
$conn = mysqli_connect("localhost","root","","bakery_db");

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<style>
.product{
    border:1px solid #ccc;
    padding:15px;
    width:250px;
    display:inline-block;
    margin:15px;
    text-align:center;
    border-radius:10px;
}
button{
    background:#d2691e;
    color:white;
    padding:8px 15px;
    border:none;
    cursor:pointer;
    border-radius:5px;
}
a{
    text-decoration:none;
    padding:6px 10px;
    border-radius:5px;
    color:white;
}
.update{
    background:green;
}
.delete{
    background:red;
}
</style>
</head>
<body>

<h2 align="center">🍰 Our Products</h2>

<?php
while($row = mysqli_fetch_assoc($result)){
?>
<div class="product">
    <img src="images/<?= $row['image'] ?>" 
     style="width:200px; height:150px; object-fit:cover;">
    <h3><?= $row['name'] ?></h3>
    <p>Price: ₹<?= $row['price'] ?></p>

    <?php
    // 👩‍🍳 ADMIN SECTION
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    ?>
        <a href="update_product.php?id=<?= $row['id'] ?>" class="update">✏ Update</a>
        <a href="delete_product.php?id=<?= $row['id'] ?>" 
            class="delete"
             onclick="return confirm('Are you sure you want to delete this product?')">
                🗑 Delete
                </a>

    <?php
    } else {
    // 👤 USER SECTION
    ?>
        <form method="POST" action="add_to_cart.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="name" value="<?= $row['name'] ?>">
            <input type="hidden" name="price" value="<?= $row['price'] ?>">
            <input type="hidden" name="image" value="<?= $row['image'] ?>">
            <button type="submit">🛒 Add to Cart</button>
        </form>
    <?php } ?>

</div>
<?php } ?>

</body>
</html>