<?php
session_start();
$conn = mysqli_connect("localhost","root","","bakery_db");

// Disable cache (back problem avoid)
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Check DB connection
if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

// Allow only admin
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: view_products.php");
    exit();
}

// Check ID
if(!isset($_GET['id'])){
    echo "Invalid Product ID";
    exit();
}

$id = $_GET['id'];

// Fetch product
$result = mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo "Product not found!";
    exit();
}

// Update Logic
if(isset($_POST['update'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    if(!empty($_FILES['image']['name'])){

        $image = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($temp_name, "products/".$image);

        $update = "UPDATE products 
                   SET name='$name',
                       price='$price',
                       image='$image'
                   WHERE id='$id'";
    }
    else{
        $update = "UPDATE products 
                   SET name='$name',
                       price='$price'
                   WHERE id='$id'";
    }

    if(mysqli_query($conn,$update)){
    echo "<script>
            alert('Update Done Successfully');
            window.location='view_products.php';
          </script>";
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Product</title>
<style>
body{
    font-family: Arial;
}
form{
    width:350px;
    margin:50px auto;
    border:1px solid #ccc;
    padding:20px;
    border-radius:10px;
}
input{
    width:100%;
    padding:8px;
    margin:8px 0;
}
button{
    background:#d2691e;
    color:white;
    padding:10px;
    border:none;
    width:100%;
    cursor:pointer;
}
img{
    width:150px;
    margin:10px 0;
}
</style>
</head>
<body>

<h2 align="center">✏ Update Product</h2>

<form method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Current Image:</label><br>
    <img src="images/<?php echo $row['image']; ?>"><br>

    <label>Change Image:</label>
    <input type="file" name="image">

    <label>Product Name:</label>
    <input type="text" name="name" 
           value="<?php echo $row['name']; ?>" required>

    <label>Product Price:</label>
    <input type="text" name="price" 
           value="<?php echo $row['price']; ?>" required>

    <button type="submit" name="update">Update Product</button>

</form>

</body>
</html>