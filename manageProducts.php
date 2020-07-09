<?php
require('include/sessionCheck.php');
require('include/database.php');
include('include/sessionCheck.php');
include('include/bootstrap.php');
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
    <?php include_once('include/header.php') ?>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p class="my-auto">All Products</p>
                <a href="addProduct.php" class="btn bg-primary text-white ">Add Product</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                                    <td><a class="btn btn-sm btn-warning text-white" href="editProduct.php?id='.$row['product_id'].'">Edit</a>
                                        <a class="btn btn-sm btn-danger text-white" href="deleteProduct.php?id='.$row['product_id'].'">Delete</a>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>
</html>