<?php
    require('database.php');
    require('sessionCheck.php');
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $cost_price = $_POST['cost_price'];
    $category = $_POST['category'];
    $sales_price = $_POST['sales_price'];

    $sql = "INSERT INTO `products`(`product_name`, `quantity`, `cost_price`, `sales_price`, `category_id`) VALUES ('$name','$quantity','$cost_price','$sales_price','$category')";
    $conn->query($sql);
    header('Location: ../manageProducts.php');
?>