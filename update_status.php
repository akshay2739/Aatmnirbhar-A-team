<?php

    require_once('include/database.php');
    include('include/sessionCheck.php');

?>

<?php
    session_start();
    if(!isset($_SESSION['id'])){
        $id=$_GET['id'];
        $_SESSION['id']=$id;
    }
    else{
        $id=$_SESSION['id'];
    }
?>

<form action="include/updateStatus.php" method="post">
    <input type="radio" name="status" value="PENDING"> Pending<br>
    <input type="radio" name="status" value="PACKED"> Packed<br>
    <input type="radio" name="status" value="SHIPPED"> Shipped<br>
    <input type="radio" name="status" value="DELIVERED"> Delivered<br>

    <input type="submit" name="update" value="Update Status">
    <input type="hidden" name="id" value="<?php echo($_GET['id']); ?>">

</form>

