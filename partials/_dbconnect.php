<?php
error_reporting(0);
$server="sql309.epizy.com";
$username="	epiz_26689747";
$password="3Yn7vacDrI";
$database="epiz_26689747_chaitnya";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "Error " . mysqli_connect_error();
}


?>