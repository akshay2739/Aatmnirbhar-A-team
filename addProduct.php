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
    <div class="container">
        <div class="row p-2 justify-content-center">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header"><h1 class="text-center text-uppercase">Add Product</h1></div>
                        <div class="card-body">
                            <form action="include/addProduct.inc.php" method="post">
                                <input type="text" name="name" required id="name" class="form-control col-12 mt-2" placeholder="Product name">
                                
                                <input type="text" name="quantity" required id="quantity" class="form-control mt-2  col-12 " placeholder="Quantity"> 

                                <select name='category' class="form-control mt-2 col-12" placeholder="Select category" required>
                                <?php
                                    $sql2 = "SELECT * FROM `categories`";
                                    $res2 = $conn->query($sql2);
                                    while($row2=$res2->fetch_assoc()){
                                        echo '<option value='.$row2['category_id'].'>'.$row2['category_name'].'</option>';
                                    }
                                ?></select> 

                                <input type="text" required name="cost_price" id="cost_price" placeholder="Buying Price" class="form-control mt-2 col-12">

                                <input type="text" required name="sales_price" id="sales_price" placeholder="Selling Price" class="form-control mt-2 col-12">

                                <input type="submit" value="Add" name="add" class="form-control mt-2 mx-auto text-white bg-primary text-uppercase">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>