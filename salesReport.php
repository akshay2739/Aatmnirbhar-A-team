<?php
include('include/database.php');
include('include/sessionCheck.php');
include('include/bootstrap.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('sideNav.html'); ?>
    <form action="runQuery.php" method="post">
        <label for="showOrders">Show orders from:</label>
        <select name="orderTime" id="orderTime">
            <option val="today">Today</option>
            <option val="yesterday">Yesterday</option>
            <option val="week">This Week</option>
            <option val="month">This Month</option>
            <option val="year">This Year</option>
            <option val="all">All Time</option>
        </select><br>
        <label for="category">Category Name</label>
        <input type="text" name="category" id="category" placeholder="Category">
        <br>
        <label for="product">Product Name</label>
        <input type="text" name="product" id="product" placeholder="Product">
        <br>
    </form>
    <table>
        <!-- table display here -->
    </table>
</body>
</html>