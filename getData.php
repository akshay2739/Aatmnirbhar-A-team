<?php
    require('include/database.php');
    if(isset($_GET["filter"])){
        $filter=$_GET['filter'];
        $pname="";
        $pcat="";
        $status="";
        if(isset($_GET["name"]) && strlen(isset($_GET["name"]))>0){
            $pname=" AND p_name like '%".$_GET["name"]."%'";
        }
        if(isset($_GET["cat"]) && strlen(isset($_GET["cat"]))>0){
            $pcat=" AND p_category like '%".$_GET["cat"]."%'";
        }
        if(isset($_GET["status"]) && strlen(isset($_GET["status"]))>0){
            $status=" AND status like '%".$_GET["status"]."%'";
        }
        $qry="";
        if($filter=="Today"){
            $qry = "SELECT * FROM sales WHERE DATE(date) = DATE(NOW())".$pname.$pcat.$status." ORDER BY `date` ";
        }
        else if($filter=="Yesterday"){
            $qry = "SELECT * FROM sales WHERE DATE(date) = DATE(NOW())-1".$pname.$pcat.$status." ORDER BY `date` ";
        }
        else if($filter=="This Week"){
            $qry="SELECT * FROM sales WHERE YEARWEEK(date) = YEARWEEK(NOW())".$pname.$pcat.$status." ORDER BY `date` ";
        }
        else if($filter=="This Month"){
            $qry="SELECT * FROM sales WHERE MONTH(date) = MONTH(NOW())".$pname.$pcat.$status." ORDER BY `date` ";
        }
        else if($filter=="This Year"){
            $qry="SELECT * FROM sales WHERE YEAR(date) = YEAR(NOW())".$pname.$pcat.$status." ORDER BY `date` ";
        }
        else{
            $pname=" WHERE p_name like '%".$_GET["name"]."%'";
            $qry = "SELECT * FROM sales".$pname.$pcat.$status." ORDER BY `date`";
        }
    }
    else{
        $from=$_GET['from'];
        $to=$_GET['to'];
        $pname="";
        $pcat="";
        $status="";
        if(isset($_GET["name"]) && strlen(isset($_GET["name"]))>0){
            $pname=" AND p_name like '%".$_GET["name"]."%'";
        }
        if(isset($_GET["cat"]) && strlen(isset($_GET["cat"]))>0){
            $pcat=" AND p_category like '%".$_GET["cat"]."%'";
        }
        if(isset($_GET["status"]) && strlen(isset($_GET["status"]))>0){
            $status=" AND status like '%".$_GET["status"]."%'";
        }
        $qry="SELECT * FROM sales WHERE (date BETWEEN '$from' AND '$to')".$pname.$pcat.$status." ORDER BY `date`";
    }
    $res=$conn->query($qry);
        $total=0.0;
        if($res){
            if(mysqli_num_rows($res)>0){
            echo "<div class='card mt-5'>";
            echo "<div class='card-header'><h1 class='text-uppercase text-center'>Report</div>";
            echo "<div class='table-responsive'>";
            echo "<table class='table text-center'>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Product Name</th>";
            echo "<th>Category</th>";
            echo "<th>Quantity</th>";
            echo "<th>Total Amount</th>";
            echo "<th>Date</th>";
            echo "<th>Status</th>";
            echo "</tr>";
            $total=0;
            while($sales = $res->fetch_assoc()){
                $total+=floatval($sales["price"]);
                echo "<tr>";
                    echo "<td>".$sales['id']."</td>";
                    echo "<td>".$sales['p_name']."</td>";
                    echo "<td>".$sales['p_category']."</td>";
                    echo "<td>".$sales['qty']."</td>";
                    echo "<td>".$sales['price']."</td>";
                    echo "<td>".$sales['date']."</td>";
                    echo "<td>".$sales['status']."</td>";
                echo "</tr>";
            }
            // echo "<tr><th>Total Revenue:</th><td>$total<td></tr>";
            echo "</div>";
            echo "</table></div></div>";
        }
        else{
            echo "No record found";
        }
        }
        else{
            echo mysqli_error($conn);
            echo "No Data Found";
        }

?>