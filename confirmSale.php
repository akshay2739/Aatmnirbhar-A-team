<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<?php
    session_start();
    require('include/database.php');
    if(isset($_POST["confirm"])){
        $productsToAdd=$_SESSION['cart'];
        $total_amount=$_POST["total"];
        $total_amount=floatval($total_amount);
        $res = $conn->query("INSERT INTO sales(price) VALUES ('$total_amount')");
        $sales_id=$conn->insert_id;
        foreach($productsToAdd as $pid=>$pvalues){
            $res = $conn->query("INSERT INTO `ordered_products`(`product_id`, `sales_id`, `quantity`, `total_amount`) VALUES ($pid,$sales_id,".$pvalues['quantity'].",".$pvalues['price'].")");
            $res2 = $conn->query("UPDATE `products` SET `quantity`=(quantity-".$pvalues['quantity'].") WHERE product_id=$pid");
        }
        session_unset('cart');
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo "<script>swal({
            title: '',
            text: 'Order Created',
            icon: 'success',
        }).then((value) => {
            location.replace('manageSales.php');

        });</script>";
    }
?>
    
    </body>
</html>