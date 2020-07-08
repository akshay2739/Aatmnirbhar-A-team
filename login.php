<?php

    require_once('include/database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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
            header("location: home.php"); 
        }
        else{
            echo"Either Your Password is Wrong or You haven't Created Your Account";
             
        }
    }

?>