<?php

    $conn=mysqli_connect("localhost","root","","warehouse");
    if(mysqli_connect_error())
    {
        die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }

?>