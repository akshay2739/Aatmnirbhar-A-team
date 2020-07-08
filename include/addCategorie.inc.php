<?php
require_once('database.php');
$categorie=$_POST['categorie'];
$sql="INSERT into `categories` (`category_name`) VALUES('$categorie')";
$result=$conn->query($sql);
header('Location: ../categories.php');
?>