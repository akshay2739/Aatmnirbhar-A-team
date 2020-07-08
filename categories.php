<?php

require_once('include/database.php');
require_once('include/bootstrap.php');
session_start();
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Dashboard</a>
        <a href="categories.php">Categories</a>
        <a href="addProduct.php">Products</a>
        <a href="addSales.php">Sales</a>
    </div>
    <div id="main">
        <h2>Sidenav Push Example</h2>
        <p>Click on the element below to open the side navigation menu, and push this content to the right.</p>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    </div>
    <form action="categories.php" method="POST">
        <input type="text" name="categorie">
        <input type="submit" name="add" value="Add Categorie">
    </form>
</form>
</body>
</html>

<!-- ******************HTML FOR INPUT FIELD*********************** -->



<!-- HTML FOR DISPLAY CATEGORIES -->

<table>
<?php
    $index=1;

    $sql="select * from categories order by category_id";
    $result=$conn->query($sql);
    while(($r = $result->fetch_assoc()) != null)
    {
?>
        <tr>
            <td><?php echo $index;$index++; ?></td>
            <td><?php echo $r['category_name']?></td>

            <td> <a href='edit_category.php ? id=<?php echo $r['category_id']; ?>'> Edit </a>
            <td> <a href='delete_category.php ? id=<?php echo $r['category_id']; ?>'> Delete </a>
=======
            <td> <a href='edit_category.php ? id=<?php echo $r['id']; ?>'> Edit </a>
            <td> <a href='delete_category.php ? id=<?php echo $r['id']; ?>'> Delete </a>

        
        </tr>
        
<?php
    }
    $id=$r['category_id'];

?>
</table>

<!-- PHP FOR INSERT CATEGOIE IN DATABASE -->

<?php

if(isset($_POST['add'])){
    $categorie=$_POST['categorie'];
    $sql="insert into categories (category_name) values('$categorie')";
    $result=$conn->query($sql);
    header('location:categories.php');
    
}

?>



