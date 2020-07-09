<?php

    require_once('include/database.php');
    include('include/sessionCheck.php');

?>

<!-- HTML FOR DISPLAY OF SALES -->

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

<!-- 
 -->
