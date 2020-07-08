<?php 
    require_once('include/bootstrap.php');
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">Dashboard</a>
            <a href="categories.php">Categories</a>
            <a href="addProduct.php">Products</a>
            <a href="addSales.php">Sales</a>
            <p>Hello</p>
        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    </body>
</html> 



