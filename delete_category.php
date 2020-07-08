<?php
require_once('include/database.php');
include('include/sessionCheck.php');
?>

<?php

    $id=$_GET['id'];
    $sql="delete from categories where category_id='$id'";
    $result=$conn->query($sql);
    header('location: categories.php');

?>