<?php

    require_once('include/database.php');
    require_once('include/bootstrap.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="height:100vh">
    <div class=" h-100 d-flex justify-content-center align-items-center">
        <form action="signup.php" method="post" class="bg-white p-5 shadow-lg form-group">
            <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
            
            <input type="text" name="username" placeholder="username" class="form-control mb-2" required>
            
            <input name="password" id="password" type="password" placeholder="Password" class="form-control mb-2" onkeyup='check();' required>

            <input type="password" name="confirm_password" id="confirm_password" class="form-control mb-2" placeholder="confirm password:" onkeyup='check();' required> 
            <span id='message'></span>
            
            <input type="submit" name="signup" class="form-control text-white bg-success" value="Sign up">
        </form>
    </div>
</body>
</html>


    <!-- if is_active = 1 then user is active else user is not active -->

<?php

    if(isset($_POST['signup'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['confirm_password'];
        if($cpassword==$password)
        {
            $sql="insert into users (name,username,password,is_active) values('$name','$username',md5('$password'),1)";
            $result=$conn->query($sql);

        }
    }


?>
<script>

var check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'matching';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';
    }
  } 
</script>