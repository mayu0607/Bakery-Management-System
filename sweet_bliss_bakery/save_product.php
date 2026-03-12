<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $query = "INSERT INTO products (name, price, description, image)
              VALUES ('$name', '$price', '$description', '$image')";

    if (mysqli_query($conn, $query)) {
        header("Location: view_products.php");
        exit();
    } else {
        echo "Error: Product not saved";
    }
}
?>
