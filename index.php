<?php

    require_once('include/database.php');
    require_once('include/bootstrap.php');
    require_once('include/sessionCheck.php')
    
?>
<link href="style.css" rel="stylesheet" type="Text/css">
<?php
    $sql="SELECT * FROM `users`";
    $result=$conn->query($sql);
    $user = mysqli_num_rows($result);
    
    $sql="SELECT * FROM `categories`";
    $result=$conn->query($sql);
    $categories = mysqli_num_rows($result);
    
    $sql="SELECT * FROM `products`";
    $result=$conn->query($sql);
    $products = mysqli_num_rows($result);
    
    $sql="SELECT * FROM `sales`";
    $result=$conn->query($sql);
    $sales = mysqli_num_rows($result);

?>

<h2>Number of Users:- <?php echo $user; ?> </h2>
<h2>Number of Categories:- <?php echo $categories; ?> </h2>
<h2>Number of Products:- <?php echo $products; ?> </h2>
<h2>Number of Sales:- <?php echo $sales; ?> </h2>
<br>
<br>
<br>
<br>

<!-- ***********Recently Added Products**************** -->
<div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span><h2>Recently Added Products</h2></span>
        </strong>
      </div>
      <div class="panel-body" >

        <div class="list-group" >

<?php

    $sql= "select * from products order by product_id desc limit 5";
    $result=$conn->query($sql);
    while($r=$result->fetch_assoc()){
        $category_id=$r['category_id'];
        $sql1="select * from categories where category_id='$category_id'";
        $result1=$conn->query($sql1);
        while($r1=$result1->fetch_assoc()){
            $category=$r1['category_name'];
        }
?>

    <a class="list-group-item clearfix" href="editProduct.php?id=<?php echo $r['product_id'];?>">
        <h4 class="list-group-item-heading">
        
            <?php echo "name:- ".$r['product_name']?>
        </h4>
            <span class="label label-warning pull-right">
                ₹<?php echo $r['sales_price']; ?>
            </span>
        
        <span class="list-group-item-text pull-right" style="float: right;">
            <?php echo "Category:- ".$category; ?>
        </span>
    </a>

<?php        
    }

?>
  </div>
</div>
</div>
</div>

<!-- ******************Recently added Products End************** -->
<br>
<br>
<br>
<br>

<!-- ************Latest Sale Start************************** -->

<h2>LATEST SALES</h2>
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Date</th>
        <th>Total Sale<br>₹</th>
    </tr>
<?php
    $index=0;

    $sql="select * from sales order by id desc limit 5";
    $result=$conn->query($sql);
    while($r=$result->fetch_assoc())
    {
        $index++;
        $time = $r['date'];
        $date= explode (" ", $time);
        // echo "<h2>".$date[0]."</h2>";
?>

    <tr>
        <td><?php echo $index; ?> </td>
        <td><?php echo $r['p_name']; ?> </td>
        <td><?php echo $date[0]; ?> </td>
        <td><?php echo $r['price']; ?> </td>
    </tr>

<?php

    }

?>
</table>

<!-- **************Latest Sales End****************** -->

<br>
<br>
<br>
<br>

<!--************ Heighest Selling Products start************* -->

<h2>Highest Saleing Products</h2>
<table>
    <tr>
        <td>Product Name</td>
        <td>Total Sold</td>
        <td>Total Quantity</td>
    </tr>

<?php

    $sql="select * , COUNT(*) FROM sales group by p_name order by COUNT(*) desc limit 3";
    $result=$conn->query($sql);
    while($r=$result->fetch_assoc()){
        $name=$r['p_name'];
        $sql1="select * from products where product_name='$name'";
        $result1=$conn->query($sql1);
        $qty=0;
        while($r1=$result1->fetch_assoc()){
            $qty+=$r1['quantity'];
        }
?>

    <tr>
        <td><?php echo $r['p_name'];  ?></td>
        <td><?php echo $r['COUNT(*)'];  ?></td>
        <td><?php echo $qty;  ?></td>
    </tr>

<?php
    }

?>

<!-- *******Hishest Saleing Products -->
