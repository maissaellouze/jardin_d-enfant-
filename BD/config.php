<?php
$name="localhost";
$user="root";
$pass="";
$db_name="kidsje";
$conn=mysqli_connect($name,$user,$pass,$db_name);
if(!$conn){
    echo "connection failed !!";
}


?>
