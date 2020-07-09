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
    <table>
    
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
                    <td><button><a href='update_status.php ? id=<?php echo $r['id']; ?>'>change </a></button></td>

                </tr>
            
            <?php
                
            }
        ?>
    </table>
</body>
</html>


<!-- 
 -->
