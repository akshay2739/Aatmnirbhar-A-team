<?php
    require('include/database.php');
    include('include/sessionCheck.php');
    if(isset($_POST["add"])){
        $pid=$_POST['id'];
        $qty=$_POST['quantity'];
        $res =$conn->query("SELECT * FROM `products` where product_id=$pid");
        $product = $res->fetch_assoc();
        if(intval($qty)<=$product["quantity"])
        {
            $pname=$product['product_name'];
            $total_amount = floatval($product["sales_price"])*floatval($qty);
            $res = $conn->query("INSERT INTO sales(p_name,qty,price) VALUES ('$pname','$qty','$total_amount')");
            $res2 = $conn->query("UPDATE `products` SET `quantity`=(quantity-".$qty.") WHERE product_id=$pid");
            $response=array("status"=>"1","head"=>"Created","msg"=>"Order Placed");
            echo json_encode($response);
        }
        else{
            $response=array("status"=>"0","msg"=>"Not enough stock","quantity"=>$qty);
            echo json_encode($response);
        }
    }
?>