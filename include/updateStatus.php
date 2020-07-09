<?php
require_once('database.php');
$status=$_POST['status'];

if(isset($_POST['update'])){
    $sql="UPDATE `sales` SET `status`='$status' WHERE id='".$_POST['id']."'";
}
$conn->query($sql);
echo '<script>alert("Updated");</script>';
header('Location: ../manageSales.php');
?>