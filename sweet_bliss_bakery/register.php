<?php
$conn = mysqli_connect("localhost","root","","bakery_db");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(name,email,password,role)
              VALUES('$name','$email','$password','user')";

    if(mysqli_query($conn,$query)){
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Segoe UI',sans-serif;

    background:
    linear-gradient(rgba(255,245,230,0.6),rgba(255,245,230,0.6)),
    url("images/bg1.png") no-repeat center/cover;
}

/* Register Card */
.register-card{
    background:#fffaf3;
    width:380px;
    padding:35px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 18px 45px rgba(0,0,0,0.25);
    transition:0.3s;
}

.register-card:hover{
    transform:translateY(-8px);
    box-shadow:0 25px 60px rgba(0,0,0,0.35);
}

/* Title */
.register-card h2{
    color:#7b4a2e;
    margin-bottom:25px;
}

/* Inputs */
.register-card input{
    width:100%;
    padding:12px;
    margin:12px 0;
    border-radius:10px;
    border:1px solid #d4b8a6;
    font-size:15px;
    outline:none;
}

/* Button */
.register-card button{
    width:100%;
    padding:12px;
    margin-top:18px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#c97c5d,#f2b880);
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

.register-card button:hover{
    background:linear-gradient(135deg,#b5674b,#e8a96f);
    transform:scale(1.05);
}

/* Link */
.register-card a{
    display:block;
    margin-top:18px;
    text-decoration:none;
    color:#7b4a2e;
    font-weight:500;
}
</style>

</head>
<body>

<div class="register-card">
    <h2>🧁 User Registration</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <a href="login.php">Already have an account? Login</a>
</div>

</body>
</html>
