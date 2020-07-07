<?php

require_once('include/database.php');

?>
<?php

    $id=$_GET['id'];

    $sql="select * from categories where id='$id' ";
    $result=$conn->query($sql);
    $r=$result->fetch_assoc();
    $name=$r['name'];
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
        $sql="update categories set name='$name' where id='$id' ";
        $result=$conn->query($sql);
        header('location: categories.php');
        
    }

?>