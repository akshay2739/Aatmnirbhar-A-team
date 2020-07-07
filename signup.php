<?php

    require_once('include/database.php');

?>

<form action="signup.php" method="post">
    
    name: <input type="text" name="name" required>
    <br><br>
    username: <input type="text" name="username" required>
    <br><br>
    password : <input name="password" id="password" type="password" onkeyup='check();' required>

    <br><br>
    confirm password:<input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' required> 
    <span id='message'></span>
<br>
    
    <input type="submit" name="signup" value="login">
</form>

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