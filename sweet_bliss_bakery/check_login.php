<?php
session_start();

if(!isset($_SESSION['user_logged_in'])){
    header("Location: register.php");
    exit();
}
else{
    header("Location: checkout.php");
    exit();
}
?>