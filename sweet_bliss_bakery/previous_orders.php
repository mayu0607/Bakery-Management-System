<?php
$conn = mysqli_connect("localhost","root","","bakery_db");
$mobile = $_GET['mobile'];
?>

<!DOCTYPE html>
<html>
<head>
<title>My Orders</title>
<style>
body{
    font-family:Segoe UI;
    background:#fffaf3;
}
.order-box{
    background:white;
    margin:20px auto;
    width:80%;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
h2{color:#7b4a2e;}
table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
th,td{
    padding:10px;
    border-bottom:1px solid #ccc;
}
th{background:#f3e1d2;}
</style>
</head>

<body>

<h1 align="center">🧾 My Previous Orders</h1>

<?php
$orders = mysqli_query($conn,
"SELECT * FROM orders WHERE customer_mobile='$mobile'
 ORDER BY order_date DESC");

while($order = mysqli_fetch_assoc($orders)){
?>

<div class="order-box">
    <h2>Order #<?= $order['id'] ?></h2>
    <p>Date: <?= $order['order_date'] ?></p>
    <p><b>Total: ₹<?= $order['total_amount'] ?></b></p>

    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $items = mysqli_query($conn,
        "SELECT * FROM order_items WHERE order_id='{$order['id']}'");

        while($item = mysqli_fetch_assoc($items)){
        ?>
        <tr>
            <td><?= $item['product_name'] ?></td>
            <td>₹<?= $item['price'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>₹<?= $item['price'] * $item['quantity'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php } ?>

</body>
</html>
