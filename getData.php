<?php
    require('include/database.php');
    if(isset($_GET["filter"])){
        $filter=$_GET['filter'];
        $qry="";
        if($filter=="Today"){
            $qry = "SELECT * FROM sales WHERE DATE(date) = DATE(NOW()) ORDER BY `date` DESC";
        }
        else if($filter=="Yesterday"){
            $qry = "SELECT * FROM sales WHERE DATE(date) = DATE(NOW())-1 ORDER BY `date` DESC";
        }
        else if($filter=="This Week"){
            $qry="SELECT * FROM sales WHERE YEARWEEK(date) = YEARWEEK(NOW()) ORDER BY `date` DESC";
        }
        else if($filter=="This Month"){
            $qry="SELECT * FROM sales WHERE MONTH(date) = MONTH(NOW()) ORDER BY `date` DESC";
        }
        else if($filter=="This Year"){
            $qry="SELECT * FROM sales WHERE YEAR(date) = YEAR(NOW()) ORDER BY `date` DESC";
        }
        else{
            $qry = "SELECT * FROM sales ORDER BY `date` DESC";
        }
        $res=$conn->query($qry);
        $total=0.0;
        echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Product Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Total Amount</th>";
        echo "<th>Date</th>";
        echo "</tr>";
        while($sales = $res->fetch_assoc()){
            $total+=floatval($sales["price"]);
            echo "<tr>";
                echo "<td>".$sales['id']."<td>";
                echo "<td>".$sales['p_name']."<td>";
                echo "<td>".$sales['qty']."<td>";
                echo "<td>".$sales['price']."<td>";
                echo "<td>".$sales['date']."<td>";
            echo "</tr>";
        }
        echo "<tr><th>Total Revenue:</th><td>$total<td></tr>";
        echo "</table>";

    }
?>