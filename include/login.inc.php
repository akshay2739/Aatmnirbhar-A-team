<?php
require('database.php');
if(isset($_POST['login'])){
    // header("location: signup.php");
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from users where username='$username' AND  password=md5('$password')";
    $result=$conn->query($sql);
    if(mysqli_num_rows($result)>0)
    {
        session_start();
        $_SESSION['user']=$username;
        header("location: ../index.php"); 
    }
    else{
        echo"Either Your Password is Wrong or You haven't Created Your Account";     
    }
}
?>