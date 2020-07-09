<?php
require('include/database.php');
include('include/sessionCheck.php');
include('include/bootstrap.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<body>
    <?php include_once('include/header.php') ?>
    <form action="include/addProduct.inc.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" required id="name"> <br>

        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" required id="quantity"> <br>

        <label for="name">Category</label>
        <select name='category' required>
        <?php
            $sql2 = "SELECT * FROM `categories`";
            $res2 = $conn->query($sql2);
            while($row2=$res2->fetch_assoc()){
                echo '<option value='.$row2['category_id'].'>'.$row2['category_name'].'</option>';
            }
        ?></select> <br>

        <label for="cost_price">Cost Price</label>
        <input type="text" required name="cost_price" id="cost_price"> <br>

        <label for="sales_price">Selling Price</label>
        <input type="text" required name="sales_price" id="sales_price"> <br>

        <input type="submit" value="Add" name="submit">
    </form>
</body>
</html>