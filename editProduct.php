<?php
$pid = $_GET['id'];
require('includes/connection.php');
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
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="product_name">Name</label>
        <input type="text" required name="product_name" id="product_name" value=<?php echo($row['product_name'])?>> <br>

        <label for="category">Category</label>
        <select required name="category_id" id="category_id">
            <?php
            require('includes/connection.php');
            $sql2 = "SELECT * FROM `categories`";
            $res2 = $conn->query($sql2);
            while($row2=$res2->fetch_assoc()){
                echo '<option value='.$row2['category_id'].'>'.$row2['category_name'].'</option>';
            }
            ?>
        </select><br>

        <label for="quantity">Stock</label>
        <input type="text" required name="quantity" id="quantity" value=<?php echo($row['quantity'])?>><br>

        <label for="cost_price">Buying Price</label>
        <input type="text" required name="cost_price" id="cost_price" value=<?php echo($row['cost_price'])?>><br>

        <label for="sales_price">Selling Price</label>
        <input type="text" required name="sales_price" id="sales_price" value=<?php echo($row['sales_price'])?>><br>

        <input type="submit" name='submit' value="Submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $cost_price = $_POST['cost_price'];
    $sales_price = $_POST['sales_price'];
    $sql = "UPDATE `products` SET `product_name`='$name',`quantity`='$quantity',`cost_price`='$cost_price',`sales_price`='$sales_price,`category_id`='$category_id' WHERE `product_id`='$pid'";
    $conn->query($sql);
}
?>