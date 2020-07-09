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
    else if(isset($_GET["getProducts"])){
        $cid=$_GET['category_id'];
        $res =$conn->query("SELECT * FROM `products` WHERE category_id=$cid");
        if($res){
            if(mysqli_num_rows($res)>0){
                echo "<select name='prods' id='prods' onchange='getProductDetails(this.value)'>";
                echo "<option selected disabled>Select Product</option>";
                while($product = $res->fetch_assoc()){
                    echo '<option value="'.$product["product_id"].'">'.$product["product_name"].'</option>';
                }
                echo "</select>";
            }
            else{
                echo "No Products in this category";
            }
        }
    }
    else if(isset($_GET["getProductDetail"])){
        $id = $_GET["product_id"];
        $res =$conn->query("SELECT * FROM `products` WHERE product_id=$id");
        if($res){
            if(mysqli_num_rows($res)>0){
                $prod = $res->fetch_assoc();
                echo "Current Stock: ".$prod['quantity']."<br>";
                echo "<p>Sales Price: <span id='price'>".$prod['sales_price']."</span><p>";
                echo '<label for="quantity">Enter Quantity</label>';
                echo '<input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required onkeyup="displayTotal(this.value)">';
                echo '<input type="button" id="'.$prod["product_id"].'" class="btn btn-primary" value="Add" name="add" onclick="confirmSale('.$prod["product_id"].')">';
            }
            else{
                echo "";
            }
        }
    }
?>