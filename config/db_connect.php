<?php 
 $conn = mysqli_connect();

 //check connection
 if(!$conn){
     echo 'Connection error: ' . mysqli_connect_error();
 }


 // Alternative way to connect
/*




create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

check connection

if($conn->connect_error) {
    die('Connection failed ' . $conn->connect_error);
}
*/
