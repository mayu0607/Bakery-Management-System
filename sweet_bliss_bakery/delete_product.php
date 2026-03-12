<?php
session_start();
$conn = mysqli_connect("localhost","root","","bakery_db");

// Only admin allowed
if($_SESSION['role'] != 'admin'){
    header("Location: user_home.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM products WHERE id=$id");

header("Location: view_products.php");
?>