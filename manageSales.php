<?php
    require_once('include/database.php');
    include('include/sessionCheck.php');
?>

<!-- HTML FOR DISPLAY OF SALES -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <?php include('include/bootstrap.php'); ?>
</head>
<body>
    <?php include_once('include/header.php') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-uppercase">Sales</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center text-center">
                        
                            <tr>
                                <th>No.</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>TOTAL</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Change Status</th>
                            </tr>
                            <?php
                                $sql1="SELECT * FROM `sales` ORDER BY `id` DESC";
                                $result1=$conn->query($sql1);
                                while($r=$result1->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td><?php echo $r['p_name']; ?></td>
                                    <td><?php echo $r['qty']; ?></td>
                                    <td><?php echo $r['p_category']; ?></td>
                                    <td><?php echo $r['price']; ?></td>
                                    <td><?php echo $r['date']; ?></td>
                                    <td><?php echo $r['status']; ?>
                                    <td>
                                        <?php
                                            if($r['status']=='PENDING'){
                                                echo("<a href='include/updateSalesStatus.php?id=".$r['id']."&action=PACKED' class='btn btn-primary text-uppercase btn-success'>
                                                        PACKED<i class='fas fa-chevron-right'></i></a>");
                                            }elseif($r['status']=='PACKED'){
                                                echo("<a href='include/updateSalesStatus.php?id=".$r['id']."&action=PENDING' class='btn btn-primary text-uppercase btn-warning'>
                                                        <i class='fas fa-chevron-left'></i>PENDING</a>");
                                                echo("<a href='include/updateSalesStatus.php?id=".$r['id']."&action=SHIPPED' class='btn btn-primary text-uppercase  btn-success'>
                                                        SHIPPED<i class='fas fa-chevron-right'></i></a>");
                                            }elseif($r['status']=='SHIPPED'){
                                                echo("<a href='include/updateSalesStatus.php?id=".$r['id']."&action=PACKED' class='btn btn-primary text-uppercase btn-warning'>
                                                        <i class='fas fa-chevron-left'></i>PACKED</a>");
                                                echo("<a href='include/updateSalesStatus.php?id=".$r['id']."&action=COMPLETED' class='btn btn-primary text-uppercase  btn-success'>
                                                        COMPLETED<i class='fas fa-chevron-right'></i></a>");
                                            }elseif($r['status']=='COMPLETED'){
                                                echo("<a href='include/updateSalesStatus.php?id=".$r['id']."&action=SHIPPED' class='btn btn-primary text-uppercase btn-warning'>
                                                        <i class='fas fa-chevron-left'></i>SHIPPED</a>");
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
