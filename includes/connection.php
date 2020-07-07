<?php
//edit according to database
$host = 'localhost';
$db   = 'warehouse-management';
$user = 'root';
$pass = '';
try {
     $conn = mysqli_connect($host, $user, $pass, $db);
} catch (Exception $e) {
     echo $e;
}
?>