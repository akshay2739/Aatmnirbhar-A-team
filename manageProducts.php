<?php
require('include/sessionCheck.php');
require('include/database.php');
include('include/sessionCheck.php');
if(isset($_GET['id'])){
    $sql = "SELECT * FROM `products` INNER JOIN `categories` ON products.category_id=categories.category_id WHERE products.category_id='".$_GET['id']."'";
}else{
    $sql = "SELECT * FROM `products` INNER JOIN `categories` ON products.category_id=categories.category_id";
}
$res =$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
</head>
<body>

    <?php include_once('include/sideNav.html'); ?>

    <a href="addProduct.php">Add Product</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Cost Price</th>
            <th>Sales Price</th>
            <th>Action</th>
        </tr>
        <?php
        while($row = $res->fetch_assoc()){
            echo '<tr>
                <td>'.$row['product_name'].'</td>
                <td>'.$row['category_name'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['cost_price'].'</td>
                <td>'.$row['sales_price'].'</td>
                <td><a href="editProduct.php?id='.$row['product_id'].'">Edit</a>
                    <a href="deleteProduct.php?id='.$row['product_id'].'">Delete</a>
                </td>
            </tr>';
        }
        ?>
    </table>
</body>
</html>