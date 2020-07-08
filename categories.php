<?php

require_once('include/database.php');
session_start();
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}

?>


<!-- ******************HTML FOR INPUT FIELD*********************** -->

<form action="categories.php" method="POST">
   <input type="text" name="categorie">
   <input type="submit" name="add" value="Add Categorie">
</form>

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



