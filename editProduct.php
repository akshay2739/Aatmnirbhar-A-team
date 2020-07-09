<?php
$pid = $_GET['id'];
require('include/database.php');
include('include/sessionCheck.php');
$res =$conn->query("SELECT * FROM `products` WHERE `product_id`='$pid'");
$row = $res->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('include/header.php')?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <div class="card-header"><h1 class="text-uppercase text-center">Edit product</h1></div>

                        <div class="card-body">
                            
                            <input type="text" required name="product_name" id="product_name" value=<?php echo($row['product_name'])?> class="form-control" placeholder="Product name"> <br>

                            
                            <select required name="category_id" id="category_id" class="form-control">
                                <option>category</option>
                                <?php
                                require('include/database.php');
                                $sql2 = "SELECT * FROM `categories`";
                                $res2 = $conn->query($sql2);
                                while($row2=$res2->fetch_assoc()){
                                    echo '<option value='.$row2['category_id'].'>'.$row2['category_name'].'</option>';
                                }
                                ?>
                            </select><br>

                            <div class="row px-3">
                                <label class="col-md-6 pt-2" for="quantity">Stock</label>
                                <input class="col-md-6 form-control" type="text" required name="quantity" id="quantity" value=<?php echo($row['quantity'])?>><br>
                                <div class="w-100 py-2"></div>

                                <label class="col-md-6 pt-2" for="cost_price">Buying Price</label>
                                <input class="col-md-6 form-control" type="text" required name="cost_price" id="cost_price" value=<?php echo($row['cost_price'])?>><br>
                                <div class="w-100 py-2"></div>

                                <label class="col-md-6 pt-2" for="sales_price">Selling Price</label>
                                <input class="col-md-6 form-control" type="text" required name="sales_price" id="sales_price" value=<?php echo($row['sales_price'])?>><br>
                                <div class="w-100 py-2"></div>
                            </div>
                            <input type="submit" name='submit' class="form-control btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $cost_price = $_POST['cost_price'];
    $sales_price = $_POST['sales_price'];
    $sql = "UPDATE `products` SET `product_name`='$name',`quantity`='$quantity',`cost_price`='$cost_price',`sales_price`='$sales_price',`category_id`='$category_id' WHERE `product_id`='$pid'";
    $conn->query($sql);
}
?>