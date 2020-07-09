<?php
    require('include/database.php');
    include('include/sessionCheck.php');
    if(isset($_POST["add"])){
        $pid=$_POST['id'];
        $qty=$_POST['quantity'];
        $res =$conn->query("SELECT * FROM `products` INNER JOIN categories on products.category_id=categories.category_id where product_id=$pid");
        $product = $res->fetch_assoc();
        if(intval($qty)<=$product["quantity"])
        {
            if(intval($qty)>0){
            $pname=$product['product_name'];
            $pcat=$product['category_name'];
            $total_amount = floatval($product["sales_price"])*floatval($qty);
            $res = $conn->query("INSERT INTO sales(p_name,p_category,qty,price) VALUES ('$pname','$pcat','$qty','$total_amount')");
            $res2 = $conn->query("UPDATE `products` SET `quantity`=(quantity-".$qty.") WHERE product_id=$pid");
            $response=array("status"=>"1","head"=>"Created","msg"=>"Order Placed");
            echo json_encode($response);
            }
            else{
                $response=array("status"=>"0","msg"=>"Enter quantity 1 or more","quantity"=>$qty);
                echo json_encode($response);
            }
        }
        else{
            $response=array("status"=>"0","msg"=>"Not enough stock","quantity"=>$qty);
            echo json_encode($response);
        }
    }
?>