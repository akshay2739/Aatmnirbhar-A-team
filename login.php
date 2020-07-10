<?php

    require_once('include/database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to WMS</title>
    <?php include('include/bootstrap.php'); ?>
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
            <form action="include/login.inc.php" method="post" class="form-group">
                <input type="text" name="username" class="form-control small mt-2 bg-light" placeholder="User name">
                
                <input type="password" name="password" class="form-control small mt-2 bg-light" placeholder="Password">
                
                <input type="submit" name="login" class="form-control mt-2 bg-success text-white" value="login">
                

                <!-- <div class="d-flex mt-2 small d-flex justify-content-center align-items-center">
                    <p class="my-auto small ">Not registered?</p>
                    <a class="ml-1 text-success font-weight-bold "href="signup.php">Create an Account</a>
                </div> -->
                

            </form>
        </div>
    </div>
    
    
</body>
</html>
