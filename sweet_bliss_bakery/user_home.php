<?php
session_start();
$conn = mysqli_connect("localhost","root","","bakery_db");
?>

<!DOCTYPE html>
<html>
<head>
<title>Sweet Bliss Bakery</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background:#fff5e6;
}

/* Navbar */
nav{
    background:#7b4a2e;
    padding:15px;
    position:fixed;
    top:0;
    width:100%;
    z-index:1000;
}
nav a{
    color:white;
    margin:0 15px;
    text-decoration:none;
    font-weight:500;
}

/* Hero Section (FIRST PAGE BG IMAGE) */
.hero{
    height:100vh;
    background:
        linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
        url("images/bg1.png") no-repeat center/cover;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;
    padding-top:60px;
}
.hero h1{
    font-size:50px;
    padding:20px 30px;
    background:rgba(0,0,0,0.5);
    border-radius:12px;
}

/* Sections */
section{
    padding:80px;
}

/* Products */
.products{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}
.card{
    background:#fffaf3;
    border-radius:15px;
    padding:20px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
.card img{
    width:100%;
    height:200px;
    object-fit:cover;
    border-radius:12px;
}
.card h3{
    margin:10px 0;
    color:#7b4a2e;
}
.card p{
    font-weight:bold;
}
.card button{
    margin-top:10px;
    padding:10px 20px;
    border:none;
    border-radius:10px;
    background:#c97c5d;
    color:white;
    cursor:pointer;
}

/* Footer */
footer{
    background:#7b4a2e;
    color:white;
    text-align:center;
    padding:20px;
}

</style>

</head>
<body>

<!-- NAVBAR -->
<nav>
    <a href="#home">🏠Home</a>
    <a href="#products">🍰Products</a>
    <a href="cart.php">🛒Cart</a>
    <a href="#about">ℹ️About Us</a>
</nav>

<!-- HERO -->
<div class="hero" id="home">
    <h1>🍰 Sweet Bliss Bakery<br>Fresh & Delicious</h1>
</div>

<!-- PRODUCTS -->
<section id="products">
    <h2>Our Products</h2><br>

    <div class="products">
        
    <?php
    $res = mysqli_query($conn,"SELECT * FROM products");
    while($row = mysqli_fetch_assoc($res)){
    ?>
        <div class="card">
            <img src="images/<?= $row['image'] ?>">
            <h3><?= $row['name'] ?></h3>
            <p>₹<?= $row['price'] ?></p>

            <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="name" value="<?= $row['name'] ?>">
                <input type="hi dden" name="price" value="<?= $row['price'] ?>">
                <button>Add to Cart</button>
            </form>
        </div>
    <?php } ?>
    </div>
</section>

<!-- ABOUT -->
<section id="about">
    <h2>About Us</h2><br>
    <p>

        Sweet Bliss Bakery is a place where passion for baking meets quality and creativity. We specialize in freshly baked cakes, pastries, breads, and a wide variety of desserts that are prepared daily using premium-quality ingredients. Every product is crafted with care to ensure rich taste, freshness, and consistent quality.</p>

<p>
    
At Sweet Bliss Bakery, we strictly follow hygiene and food safety standards to provide our customers with safe and healthy products. Our bakers focus on maintaining the perfect balance between traditional recipes and modern baking techniques to deliver delightful flavors in every bite.
</p>
<p>
    
Customer satisfaction is our top priority. We believe in building long-term relationships with our customers by offering delicious products, timely service, and a pleasant shopping experience. Whether it is a birthday, celebration, or a simple craving for something sweet, Sweet Bliss Bakery is committed to making every moment special.
    </p>
</section>

<!-- FOOTER -->
<footer>
    <p>📍 Pune | 📞 9876543210</p>
    <p>© 2025 Sweet Bliss Bakery</p>
</footer>

</body>
</html>
