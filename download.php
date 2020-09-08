<?php 
require 'partials/_dbconnect.php';

// $sql = "SELECT * FROM `homework`";
// $result = mysqli_query($conn,$sql);
// $files = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_GET['file_id'])){
    $iid = $_GET['file_id'];

    $sql = "SELECT * FROM `homework` WHERE id = '$iid'";

    $result = mysqli_query($conn,$sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/'.$file['file_name'];

    if(file_exists($filepath)){
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma:public');
        header('Content-Length:'. filesize('uploads/'.$file['file_name']));
        readfile('uploads/' . $file['file_name']);

        
    }
}



?>