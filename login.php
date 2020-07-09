<?php

    require_once('include/database.php');
    include('include/bootstrap.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>   
    /* @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap'); */
    *{
    /* font-family: 'Bebas neue', sans-serif; */
    letter-spacing:.05rem
    }
</style>
</head>
<body class="bg-light" style="height:100vh">
    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="bg-white p-5 shadow-lg">
            <form action="login.php" method="post" class="form-group">
                <input type="text" name="username" class="form-control small mt-2 bg-light" placeholder="User name">
                
                <input type="password" name="password" class="form-control small mt-2 bg-light" placeholder="Password">
                
                <input type="submit" name="login" class="form-control mt-2 bg-success text-white" value="login">
                

                <div class="d-flex mt-2 small d-flex justify-content-center align-items-center">
                    <p class="my-auto small ">Not registered?</p>
                    <a class="ml-1 text-success font-weight-bold "href="signup.php">Create an Account</a>
                </div></p>
                

            </form>
        </div>
    </div>
    
    
</body>
</html>



<?php

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
            header("location: index.php"); 
        }
        else{
            echo"Either Your Password is Wrong or You haven't Created Your Account";     
        }
    }

?>