<?php
    require('database.php');
    require('sessionCheck.php');
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $cost_price = $_POST['cost_price'];
    $category = $_POST['category'];
    $sales_price = $_POST['sales_price'];

    if(isset($_POST['add'])){
        $sql = "INSERT INTO `products`(`product_name`, `quantity`, `cost_price`, `sales_price`, `category_id`) VALUES ('$name','$quantity','$cost_price','$sales_price','$category')";
    }elseif(isset($_POST['edit'])){
        $sql = "UPDATE `products` SET `product_name`='$name',`quantity`='$quantity',`cost_price`='$cost_price',`sales_price`='$sales_price',`category_id`='$category' WHERE `product_id`='".$_POST['id']."'";
    }
    //echo $sql;
    $conn->query($sql);
    header('Location: ../manageProducts.php');
?>