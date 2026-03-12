<?php
session_start();

if(isset($_POST['id'])){

    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];

    // cart not created yet
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    // if product already in cart → qty++
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['qty'] += 1;
    }else{
        $_SESSION['cart'][$id] = [
            'name'  => $name,
            'price' => $price,
            'qty'   => 1
        ];
    }
}

header("Location: cart.php");
exit;
