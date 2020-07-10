<?php
include('include/database.php');
include('include/sessionCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <?php include('include/bootstrap.php'); ?>
</head>
<body>
    <?php include_once('include/header.php'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-uppercase">
                        <h1>Sales Report</h1>
                    </div>
                
                    <div class="card-body">
                        <form action="" method="post"> 
                            <!-- <label for="product">Product Name</label> -->
                            <input type="text" name="product" id="product" placeholder="Product Name" class="form-control" onkeyup="getReport()">
                            <div class="radio-container form-control mt-4">
                                <input class="py-4 mx-2" type="radio" name="times" id="recent" value="fixed" onchange="change(this.value)" checked>Recent
                                <input class="py-4 mx-2" type="radio" name="times" id="custom" value="custom" onchange="change(this.value)">Custom
                            </div>
                            <div id="fixed" class="py-4">
                                
                                <select class="form-control" name="orderTime" id="orderTime" onchange="getReport(this.value)">
                                    <option selected disabled>Select</option>
                                    <option val="today">Today</option>
                                    <option val="yesterday">Yesterday</option>
                                    <option val="week">This Week</option>
                                    <option val="month">This Month</option>
                                    <option val="year">This Year</option>
                                    <option val="all">All Time</option>
                                </select>
                            </div>
                            <div id="customs" style="display:none" class="py-4 mx-auto">
                                From: <input type="date" id="from" class="form-control" onchange="openNext()"> 
                                To: <input type="date" id="to" class="form-control" onchange="getReport()">
                            </div>
                            <!-- <label for="category">Category Name</label> -->
                            <input class="form-control" type="text" name="category" id="category" placeholder="Category" onkeyup="getReport()"><br>
                            <!-- <label for="status">Status:</label> -->
                            <select class="form-control" name="status" id="status" onchange="getReport(this.value)">
                                <option selected disabled>Select</option>
                                <option val="COMPLETED">COMPLETED</option>
                                <option val="PENDING">PENDING</option>
                                <option val="PACKED">PACKED</option>
                                <option val="SHIPPED">SHIPPED</option>
                            </select>
                            <input type="reset" value="RESET FILTERS" class="form-control btn btn-primary mt-4">
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div id="content"></div>

        </div>
    </div>
        
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