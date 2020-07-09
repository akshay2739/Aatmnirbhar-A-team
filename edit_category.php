<?php

require_once('include/database.php');
include('include/sessionCheck.php');
include('include/bootstrap.php');
$id = $_GET['id'];
?>
<?php
if(!isset($_POST['update'])){
    $sql="select * from categories where category_id='$id'";
    $result=$conn->query($sql);
    $r=$result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <?php include('include/header.php'); ?>
    <h2>Update</h2>
    <form action="include/addCategorie.inc.php" method="POST" >
        <input type="text" name="categorie" value="<?php echo $r['category_name'] ?>" required>
        <input type="hidden" name="id" value="<?php echo($_GET['id']) ?>">
        <input type="submit" value="Update" name="update"> 
    </form>
</body>
</html>