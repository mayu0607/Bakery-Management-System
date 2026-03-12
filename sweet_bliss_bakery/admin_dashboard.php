<?php
session_start();

/* Check login */
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

/* Check admin role */
if ($_SESSION['role'] !== 'admin') {
    header("Location: user_home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>🍰 Sweet Bliss Bakery – Admin Panel</header>

<div class="dashboard">
    <div class="card">
        <h2>Welcome Admin 👩‍🍳</h2>
        <p>Manage your bakery with ease</p>

        <div class="menu">
            <a href="add_product.php">➕ Add Product</a>
            <a href="view_products.php">🎂 View Products</a>
            <a href="view_orders.php">📦 View Orders</a>
            <a href="logout.php" class="logout">🚪 Logout</a>
        </div>
    </div>
</div>

</body>
</html>
