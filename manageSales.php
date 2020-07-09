<?php

    require_once('include/database.php');
    include('include/sessionCheck.php');

?>


<?php
   

    if(isset($_SESSION['id'])){
        echo '<script>alert("Status Updated");</script>';

        unset($_SESSION['id']);
    }

?>

<!-- HTML FOR DISPLAY OF SALES -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once('include/header.php') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-uppercase">Manage sales</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center text-center">
                        
                            <tr>
                                <th>No.</th>
                                <th>TOTAL</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Update Status</th>
                            </tr>
                            <?php
                                $index=0;
                                $sql1="select * from sales order by id desc";
                                $result1=$conn->query($sql1);
                                while($r=$result1->fetch_assoc()){
                                    $index=$index+1;
                                ?>
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td><?php echo $r['price']; ?></td>
                                        <td><?php echo $r['date']; ?></td>
                                        <td><?php echo $r['status']; ?></td>
                                        <td><a href='update_status.php ? id=<?php echo $r['id']; ?>' class="btn btn-primary text-uppercase">change </a></td>

                                    </tr>
                                
                                <?php
                                    
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<!-- 
 -->
