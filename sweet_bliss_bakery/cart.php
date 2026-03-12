<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>
<style>
table{
    width:70%;
    margin:40px auto;
    border-collapse:collapse;
}
th,td{
    padding:12px;
    border:1px solid #ccc;
    text-align:center;
}
th{
    background:#7b4a2e;
    color:white;
}
a{
    text-decoration:none;
    color:#7b4a2e;
    font-weight:bold;
}
</style>
</head>
<body>

<h2 style="text-align:center;">🛒 My Cart</h2>

<table>
<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

<?php
$total = 0;

if(!empty($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $item){
        $sub = $item['price'] * $item['qty'];
        $total += $sub;
?>
<tr>
    <td><?= $item['name'] ?></td>
    <td>₹<?= $item['price'] ?></td>
    <td><?= $item['qty'] ?></td>
    <td>₹<?= $sub ?></td>
</tr>
<?php
    }
}else{
    echo "<tr><td colspan='4'>Cart is empty</td></tr>";
}
?>

<tr>
    <th colspan="3">Grand Total</th>
    <th>₹<?= $total ?></th>
</tr>
</table>

<center>
<a href="/sweet_bliss_bakery/user_home.php#products">
    ⬅ Continue Shopping
</a>
</center>

<?php if(!empty($_SESSION['cart'])){ ?>
    <br><br>
    <center>
        <a href="checkout.php"
   style="
   display:inline-block;
   padding:14px 35px;
   background:#c97c5d;
   color:white;
   border-radius:12px;
   font-size:18px;
   font-weight:bold;
   text-decoration:none;
   box-shadow:0 6px 18px rgba(0,0,0,0.3);
   ">
   🛍 Buy Now
</a>
    </center>
<?php } ?>


</body>
</html>
