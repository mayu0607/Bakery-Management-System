<?php
session_start();
$conn = mysqli_connect("localhost","root","","bakery_db");

if(!$conn){
    die("Database connection failed");
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$name   = $_POST['name'];
$mobile = $_POST['mobile'];

$products = "";
$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $sub = $item['price'] * $item['qty'];
    $total += $sub;
    $products .= $item['name']." (".$item['qty']."), ";
}

$query = "INSERT INTO orders 
(customer_name, mobile, products, total, status)
VALUES 
('$name', '$mobile', '$products', '$total', 'Pending')";

$result = mysqli_query($conn, $query);

if(!$result){
    die("Order not saved: " . mysqli_error($conn));
}

// clear cart
unset($_SESSION['cart']);

// redirect
header("Location: order_success.php");
exit();
?>
