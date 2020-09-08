<?php
error_reporting(0);
$server="localhost";
$username="root";
$password="";
$database="chaitnya";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "Error " . mysqli_connect_error();
}


?>