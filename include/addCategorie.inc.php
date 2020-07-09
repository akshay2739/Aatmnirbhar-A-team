<?php
require_once('database.php');
$categorie=$_POST['categorie'];

if(isset($_POST['add'])){
    $sql="INSERT INTO `categories` (`category_name`) VALUES('$categorie')";
}elseif(isset($_POST['update'])){
    $sql="UPDATE `categories` SET `category_name`='$categorie' WHERE category_id='".$_POST['id']."'";
}
$conn->query($sql);
header('Location: ../categories.php');
?>