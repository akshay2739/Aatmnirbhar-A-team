<?php
require_once('database.php');
$sql="UPDATE `sales` SET `status`='".$_GET['action']."' WHERE `id`='".$_GET['id']."'";
$conn->query($sql);
header('Location: ../manageSales.php');
?>