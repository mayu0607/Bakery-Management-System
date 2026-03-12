<?php
$conn = mysqli_connect("localhost","root","","bakery_db");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - View Orders</title>
<style>

body{
    font-family:Segoe UI;
    background:#fffaf3;
}
table{
    width:95%;
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
</style>
</head>
<body>

<h2 style="text-align:center;">📦 Customer Orders</h2>

<table>
<tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Mobile</th>
    <th>Products</th>
    <th>Total</th>
    <th>Status</th>
    <th>Date</th>
</tr>

<?php
$res = mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");

if(mysqli_num_rows($res)==0){
    echo "<tr><td colspan='7'>No Orders Found</td></tr>";
}

while($row = mysqli_fetch_assoc($res)){
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['customer_name'] ?></td>
    <td><?= $row['mobile'] ?></td>
    <td><?= $row['products'] ?></td>
    <td>₹<?= $row['total'] ?></td>
    <td><?= $row['status'] ?></td>
    <td><?= $row['order_date'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
