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
        <div class="container">
            <div class="row p-2">
                <input type="text" name="name" required id="name" class="form-control col-lg-12 mt-2 col-sm-12" placeholder="Product name">
                
                <input type="text" name="quantity" required id="quantity" class="form-control mt-2 col-lg-6 col-sm-12 " placeholder="Quantity"> 

                <select name='category' class="form-control mt-2 col-lg-6 col-sm-12" placeholder="Select catrgory" required>
                <?php
                    $sql2 = "SELECT * FROM `categories`";
                    $res2 = $conn->query($sql2);
                    while($row2=$res2->fetch_assoc()){
                        echo '<option value='.$row2['category_id'].'>'.$row2['category_name'].'</option>';
                    }
                ?></select> 

                <input type="text" required name="cost_price" id="cost_price" placeholder="Buying Price" class="form-control mt-2 col-lg-6 col-sm-12">

                <input type="text" required name="sales_price" id="sales_price" placeholder="Selling Price" class="form-control mt-2 col-lg-6 col-sm-12">

                <input type="submit" value="Add" name="add" class="form-control mt-2 col-3 text-white bg-success">
            </div>
        </div>
    </form>
</body>
</html>