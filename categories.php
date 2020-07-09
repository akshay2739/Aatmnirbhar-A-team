<?php
require_once('include/database.php');
require_once('include/bootstrap.php');
include('include/sessionCheck.php');
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}
$sql = "SELECT * FROM `categories` ORDER BY `category_id`";
$res = $conn -> query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once('include/sideNav.html') ?>
    <form action="include/addCategorie.inc.php" method="POST">
        <input type="text" name="categorie">
        <input type="submit" name="add" value="Add Categorie">
    </form>

    <table>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>    
            <th>Actions</th>
        </tr>
        <?php while(($r = $res->fetch_assoc())){ ?>
            <tr>
                <td><?php echo $r['category_id'] ?></td>
                <td><?php echo $r['category_name']?></td>
                <td> <a href='edit_category.php?id=<?php echo $r['category_id']; ?>'> Edit </a>
                <a href='delete_category.php?id=<?php echo $r['category_id']; ?>'> Delete </a>
                <td> <a href='manageProducts.php?id=<?php echo $r['category_id']; ?>'> View Products </a></td>
            </tr>
        <?php } ?> 
    </table>
</body>
</html>


