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
    <?php include_once('include/header.php'); ?>
    <form action="" method="post">
        
    <label for="product">Product Name</label>
        <input type="text" name="product" id="product" placeholder="Product" onkeyup="getReport()">
        <br>
        <input type="radio" name="times" id="recent" value="fixed" onchange="change(this.value)" checked>Recent
        <input type="radio" name="times" id="custom" value="custom" onchange="change(this.value)">Custom
        <div id="fixed">
        <label for="showOrders">Show orders from:</label>
        <select name="orderTime" id="orderTime" onchange="getReport(this.value)">
            <option selected disabled>Select</option>
            <option val="today">Today</option>
            <option val="yesterday">Yesterday</option>
            <option val="week">This Week</option>
            <option val="month">This Month</option>
            <option val="year">This Year</option>
            <option val="all">All Time</option>
        </select>
        </div>
        <div id="customs" style="display:none">
            From: <input type="date" id="from" onchange="openNext()"> To: <input type="date" id="to" onchange="getReport()">
        </div>
        <label for="category">Category Name</label>
        <input type="text" name="category" id="category" placeholder="Category" onkeyup="getReport()"><br>
        <label for="status">Status:</label>
        <select name="status" id="status" onchange="getReport(this.value)">
            <option selected disabled>Select</option>
            <option val="COMPLETED">COMPLETED</option>
            <option val="PENDING">PENDING</option>
        </select><br>
        <br>
        <br>
        <input type="reset" value="Reset Filters">
    </form>
    <div id="content"></div>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script>
    function openNext(){
        document.getElementById("to").focus();
    }
    function change(vals){
        if (document.getElementById('recent').checked) {
        document.getElementById('fixed').style.display = 'block';
        document.getElementById('customs').style.display = 'none';
    } else {
        document.getElementById('fixed').style.display = 'none';
        document.getElementById('customs').style.display = 'block';
    }
    }
        function getReport(val){
            if (document.getElementById('recent').checked) {
            date = document.getElementById("orderTime").value;
            status = document.getElementById("status").value;
            if(status==="Select")
                status="";
            $.ajax({
                type: "GET",
                url: "getData.php",
                data: {
                    "filter":date,
                    "name": document.getElementById("product").value,
                    "cat": document.getElementById("category").value,
                    "status": status
                },
                success: function(data){
                    console.log(data);
                    document.getElementById("content").innerHTML="";
                    document.getElementById("content").innerHTML=data;
                }
            });
        }
        else{
            from = document.getElementById("from").value;
            to = document.getElementById("to").value;
            status = document.getElementById("status").value;
            if(status==="Select")
                status="";
            $.ajax({
                type: "GET",
                url: "getData.php",
                data: {
                    "from":from,
                    "to":to,
                    "name": document.getElementById("product").value,
                    "cat": document.getElementById("category").value,
                    "status": status
                },
                success: function(data){
                    console.log(data);
                    document.getElementById("content").innerHTML="";
                    document.getElementById("content").innerHTML=data;
                }
            });
        }
        }
    </script>
</body>
</html>