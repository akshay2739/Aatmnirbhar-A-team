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
    <form action="include/addProduct.inc.php" method="post">
        <label for="product_name">Name</label>
        <input type="text" required name="name" id="name" value="<?php echo($row['product_name'])?>"> <br>

        <label for="category">Category</label>
        <select required name="category" id="id">
            <?php
            $sql2 = "SELECT * FROM `categories`";
            $res2 = $conn->query($sql2);
            while($row2=$res2->fetch_assoc()){
                echo '<option value='.$row2['category_id'].'>'.$row2['category_name'].'</option>';
            }
            ?>
        </select><br>

        <label for="quantity">Stock</label>
        <input type="text" required name="quantity" id="quantity" value="<?php echo($row['quantity'])?>"><br>

        <label for="cost_price">Buying Price</label>
        <input type="text" required name="cost_price" id="cost_price" value="<?php echo($row['cost_price'])?>"><br>

        <label for="sales_price">Selling Price</label>
        <input type="text" required name="sales_price" id="sales_price" value="<?php echo($row['sales_price'])?>"><br>
        <input type="hidden" name="id" value="<?php echo($_GET['id']);?>">
        <input type="submit" name='edit' value="Submit">
    </form>
</body>
</html>