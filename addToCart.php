<?php
    session_start();
    require('include/database.php');
    include('include/sessionCheck.php');
    if(isset($_GET["add"])){
        $id = $_GET["id"];
        $quantity=$_GET["quantity"];
        $res =$conn->query("SELECT * FROM `products` where product_id=$id");
        $product = $res->fetch_assoc();
        if(intval($quantity)<=$product["quantity"])
        {
            $response=array("status"=>"1","head"=>"Added","msg"=>"$quantity ".$product['product_name']."s added","quantity"=>$quantity);
            if(isset($_SESSION["cart"])){
                $array=$_SESSION["cart"];
                if(array_key_exists($id,$array)){
                    if(intval($quantity)==0){
                        unset($array[$id]);
                        $_SESSION['cart']=$array;
                        $response=array("status"=>"1","head"=>"Removed","msg"=>$product['product_name']." removed","quantity"=>$quantity);
                    }
                    else{
                        $total_price = (floatval($product["sales_price"])*floatval($quantity));
                        $_SESSION["cart"][$id]["quantity"]=intval($quantity);
                        $_SESSION["cart"][$id]["price"]=floatval($total_price);
                    }
                }
                else{
                    if(intval($quantity)>0){
                        $total_price = (floatval($product["sales_price"])*floatval($quantity));
                        $array+=[$product["product_id"]=>array("name"=>$product["product_name"],"quantity"=>$quantity,"price"=>$total_price)];
                        $_SESSION["cart"]=$array;
                    }
                    else{
                        $response=array("status"=>"0","msg"=>"Enter quantity 1 or more","quantity"=>$quantity);
                    }
                }
            }   
            else{
                if(intval($quantity)>0){
                    $total_price = (floatval($product["sales_price"])*floatval($quantity));
                    $array=array($product["product_id"]=>array("name"=>$product["product_name"],"quantity"=>$quantity,"price"=>$total_price));
                    $_SESSION["cart"]=$array;
                }
                else{
                    $response=array("status"=>"0","msg"=>"Enter quantity 1 or more","quantity"=>$quantity);
                }
            }
            if(empty($_SESSION['cart'])){
                session_unset('cart');
            }
            echo json_encode($response);
        }
        else{
            $response=array("status"=>"0","msg"=>"Not enough stock","quantity"=>$quantity);
            echo json_encode($response);
        }
        
    }
?>