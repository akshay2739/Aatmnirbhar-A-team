<?php
require_once('include/database.php');
?>

<?php

    $id=$_GET['id'];
    $sql="delete from categories where id='$id'";
    $result=$conn->query($sql);
    echo 'deleted';

?>