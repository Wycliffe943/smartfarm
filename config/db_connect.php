<?php 
 $conn = mysqli_connect('localhost', 'wycliffe', 'Rih@nna3', 'smart_farm');

 //check connection
 if(!$conn){
     echo 'Connection error: ' . mysqli_connect_error();
 }


 // Alternative way to connect
/*

define('DB_HOST', 'localhost');
define('DB_USER', 'wycliffe');
define('DB_PASS', 'Rih@nna3');
define('DB_NAME', 'php_dev');


create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

check connection

if($conn->connect_error) {
    die('Connection failed ' . $conn->connect_error);
}
*/