<?php
require_once('include/database.php');
include('include/sessionCheck.php');
?>

<?php

    $id=$_GET['id'];
    $sql="SELECT * FROM `categories` WHERE `category_id`='$id'";
    $result=$conn->query($sql);
    $result = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
</head>
<body>
    <p>WARNING: DELETING CATEGORY WILL ALSO PRODUCTS IN IT</p>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label for="name">Enter name of category:</label>
        <input type="text" name="name" id="name">
        <input type="submit" value="YES I WANT TO DELETE" name='delete'>
    </form>
</body>
</html>
<?php
if(isset($_POST['delete'])){
    $name = $_POST['name'];
    $dbname = $result['category_name'];
    if($name!=$dbname){
        echo "<p>Error: name incorrect</p>";
    }else{
        $sql = "DELETE FROM `categories` WHERE `category_id`='$id' AND `category_name`='$name'";
        $conn->query($sql);
        header('Location: categories.php');
    }
}
?>