<?php
session_start();
$conn = mysqli_connect("localhost","root","","bakery_db");

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){

        $row = mysqli_fetch_assoc($result);
        $_SESSION['role'] = trim($row['role']);

        if ($row['role'] == 'admin') {
    header("Location: admin_dashboard.php");
} else {
    header("Location: user_home.php");
}

        exit();

    }else{
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Bakery Login</title>
<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Segoe UI', sans-serif;
    background:
    linear-gradient(rgba(255,245,230,0.55), rgba(255,245,230,0.55)),
    url("images/bg1.png") no-repeat center/cover;
}
.login-card{
    background:#fffaf3;
    width:360px;
    padding:35px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 18px 45px rgba(0,0,0,0.25);
}
.login-card h2{color:#7b4a2e;}
.login-card input{
    width:100%;
    padding:12px;
    margin:12px 0;
    border-radius:10px;
    border:1px solid #d4b8a6;
}
.login-card button{
    width:100%;
    padding:12px;
    margin-top:18px;
    border:none;
    border-radius:12px;
    background:#c97c5d;
    color:white;
    cursor:pointer;
}
.error{color:red;}
</style>
</head>

<body>

<div class="login-card">
<h2>🍰 Login</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

<?php if($error!=""){ ?>
<p class="error"><?= $error ?></p>
<?php } ?>

</div>

</body>
</html>
