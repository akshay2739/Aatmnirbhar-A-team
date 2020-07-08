<?php

require_once('include/database.php');

?>
<?php

    $id=$_GET['id'];

    $sql="select * from categories where category_id='$id' ";
    $result=$conn->query($sql);
    $r=$result->fetch_assoc();
    $name=$r['category_name'];
    echo $name;
    session_start();    
    if(!isset($_SESSION['id'])){
        $_SESSION['id']=$id;
    }
    else{
        $id=$_SESSION['id'];
    }
   

?>

<!-- *******HTML FOR INPUT FIELD IN UPDATE********* -->
<h2>Update</h2>
<form action="edit_category.php" method="POST" >
    <input type="text" name="name" value=<?php echo $name ?> >
    <input type="submit" value="Update" name="update"> 
</form>

<?php

    if(isset($_POST['update'])){

    

        $name=$_POST['name'];
        $sql="update categories set category_name='$name' where category_id='$id' ";
        $result=$conn->query($sql);
        header('location: categories.php');
        
    }

?>