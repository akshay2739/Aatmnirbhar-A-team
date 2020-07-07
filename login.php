<?php

    require_once('include/database.php');

?>

<form action="login.php" method="post">

    username: <input type="text" name="username">
    <br><br>
    password: <input type="password" name="password">
    <br><br>
    <input type="submit" name="login" value="login">
</form>

<?php

    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="select * from users where username='$username' AND  password=md5('$password')";
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)>0)
        {
            echo"Welcome";
            
        }
        else{
            echo"Either Your Password is Wrong or You haven't Created Your Account";
             
        }
    }

?>