<?php

require_once('include/database.php');
session_start();
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}

?>


<!-- ******************HTML FOR INPUT FIELD*********************** -->

<form action="#" method="POST">
   <input type="text" name="category">
   <input type="submit" name="add" value="Add Category">
</form>

<!-- HTML FOR DISPLAY CATEGORIES -->

<table>
<?php
    $index=1;

    $sql="select * from categories order by id";
    $result=$conn->query($sql);
    while($r=$result->fetch_assoc())
    {
?>
        <tr>
            <td><?php echo $index;$index++; ?></td>
            <td><?php echo $r['name']?></td>
            <td> <a href='edit_category.php ? id=<?php echo $r['id']; ?>'> Edit </a>
            <td> <a href='delete_category.php ? id=<?php echo $r['id']; ?>'> Delete </a>
        
        </tr>
        
<?php
    }
    $id=$r['id'];

?>
</table>

<!-- PHP FOR INSERT CATEGOIE IN DATABASE -->

<?php

if(isset($_POST['add'])){
    $category=$_POST['category'];
    $sql="insert into categories (name) values('$category')";
    $result=$conn->query($sql);
    header('location:categories.php');
    
}

?>



