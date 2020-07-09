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
    <?php include('sideNav.html'); ?>
    <h2>Update</h2>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" >
        <input type="text" name="name" value="<?php echo $r['category_name'] ?>" >
        <input type="submit" value="Update" name="update"> 
    </form>
</body>
</html>

<!-- *******HTML FOR INPUT FIELD IN UPDATE********* -->

<?php
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $sql="update categories set category_name='$name' where category_id='$id' ";
    echo $sql;
    $result=$conn->query($sql);
    header('location: categories.php');
}
?>