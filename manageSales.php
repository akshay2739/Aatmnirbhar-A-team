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
    <title>Document</title>
</head>
<body>
    <?php include_once('include/header.php') ?>
    <table>
    
        <tr>
            <th>No.</th>
            <th>TOTAL</th>
            <th>Date</th>
        </tr>
        <?php
            $index=0;
            $sql1="select * from sales order by date";
            $result1=$conn->query($sql1);
            while($r=$result1->fetch_assoc()){
                $index=$index+1;
            ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $r['price']; ?></td>
                    <td><?php echo $r['date']; ?></td>
                    <td><a href='show_order.php ? id=<?php echo $r['id']; ?>'>Select </a></td>

                </tr>
            
            <?php
                
            }
        ?>
    </table>
</body>
</html>


<!-- 
 -->
