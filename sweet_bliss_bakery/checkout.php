<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout | Sweet Bliss Bakery</title>

<style>
body{
    margin:0;
    font-family:'Segoe UI', sans-serif;
    background:linear-gradient(rgba(255,245,230,0.8), rgba(255,245,230,0.8)),
               url("images/bg1.png") center/cover no-repeat;
}

/* Container */
.checkout-container{
    width:420px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:18px;
    box-shadow:0 20px 45px rgba(0,0,0,0.25);
}

/* Heading */
.checkout-container h2{
    text-align:center;
    color:#7b4a2e;
    margin-bottom:15px;
}

/* Order Box */
.order-box{
    background:#fffaf3;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
}

.order-box p{
    margin:6px 0;
    font-size:15px;
}

.total{
    font-weight:bold;
    font-size:18px;
    color:#7b4a2e;
    margin-top:10px;
    text-align:right;
}

/* Form */
input{
    width:100%;
    padding:12px;
    margin-top:12px;
    border-radius:10px;
    border:1px solid #d4b8a6;
    font-size:15px;
    outline:none;
}

/* Button */
button{
    width:100%;
    margin-top:20px;
    padding:12px;
    background:linear-gradient(135deg,#c97c5d,#f2b880);
    color:white;
    border:none;
    border-radius:12px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
    background:linear-gradient(135deg,#b5674b,#e8a96f);
}

/* Back link */
.back{
    text-align:center;
    margin-top:15px;
}
.back a{
    text-decoration:none;
    color:#7b4a2e;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="checkout-container">

    <h2>🧾 Order Summary</h2>

    <div class="order-box">
        <?php
        $total = 0;
        foreach($_SESSION['cart'] as $item){
            $sub = $item['price'] * $item['qty'];
            $total += $sub;
            echo "<p>🍰 {$item['name']} (x{$item['qty']}) - ₹{$sub}</p>";
        }
        ?>
        <hr>
        <div class="total">Total: ₹<?= $total ?></div>
    </div>

    <form method="POST" action="place_order.php">
        <input type="text" name="name" placeholder="Customer Name" required>
        <input type="text" name="mobile" placeholder="Mobile Number" required>

        <button type="submit">✅ Confirm Order</button>
    </form>

    <div class="back">
        <a href="cart.php">⬅ Back to Cart</a>
    </div>

</div>

</body>
</html>
