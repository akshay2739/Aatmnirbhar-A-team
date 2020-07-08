<?php

    require_once('include/database.php');

?>

<?php

    $order_id=$_GET['id'];
    echo $order_id;
?>
<h2>Bill ID : <?php echo $order_id; ?></h2>
<table>
    <tr>
        <td>No.</td>
        <td>Product Name</td>
        <td>Quantity</td>
        <td>Total</td>
    </tr>
<?php
$index=0; 
$total=0;
    $sql2="select * from  ordered_Products where sales_id='$order_id'";
    $result2=$conn->query($sql2);
    while($r2=$result2->fetch_assoc()){
        $product_id=$r2['product_id'];
        $sql3="select * from products where product_id='$product_id'";
        $result3=$conn->query($sql3);
        while($r3=$result3->fetch_assoc()){
            $index++;
            $total+=$r2['total_amount'];
?>
    
            <tr>
                <td><?php echo $index;  ?></td>
                <td><?php echo $r3['product_name'];  ?></td>
                <td><?php echo $r2['quantity'];  ?></td>
                <td><?php echo $r2['total_amount'];  ?></td>


            </tr>
<?php
        }
    }

?>
</table>

<h2>Total:- <?php echo $total;  ?></h2>