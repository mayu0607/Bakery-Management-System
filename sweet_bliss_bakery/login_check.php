<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "bakery_db";

$conn = mysqli_connect($host, $user, $pass, $db);

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if($row['role'] == 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: user_dashboard.php");
    }
} else {
    echo "<h2 style='color:red; text-align:center;'>Invalid Email or Password</h2>";
}
?>
