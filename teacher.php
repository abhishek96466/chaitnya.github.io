<?php

require 'partials/_dbconnect.php';

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: logout.php");
    exit;
}
if(!isset($_SESSION['teacher']) || $_SESSION['teacher']!=true){
    header("location: logout.php");
    exit;
}
// $username=$_SESSION['username'];
$sno = $_GET['id'];
// $sno = $_SESSION['sno'];
$update = false;


if(isset($_POST['update'])){
    $name  = $_POST['user_name'];
    $password = $_POST['user_password'];
    $email = $_POST['user_email'];
    $dob= $_POST['user_dob'];
    $mobNo = $_POST['user_mobileNo'];
    $pincode = $_POST['user_pincode'];
    $address = $_POST['teacher_address'];

    
    
    if($_FILES["user_img"]["tmp_name"]){
        $img_type = $_FILES["user_img"]["type"];
        $image = addslashes(file_get_contents($_FILES["user_img"]["tmp_name"]));

        if(substr($img_type,0,5) == "image"){
            $sql2 = "UPDATE `teacher` SET `teacher_name` = '$name',`teacher_dob` = '$dob',`teacher_email` = '$email',`teacher_password` = '$password',`teacher_mobNo` = '$mobNo',`teacher_pincode` = '$pincode',`teacher_address` = '$address', `teacher_image` = '$image', `teacher_img_type`='$img_type' WHERE `teacher`.`teacher_sno` = $sno";

            if($result2 = mysqli_query($conn,$sql2)){
                $update = true;
            }
            else{
                echo '<script type="text/javascript"> alert("Only Images are allowed")</script>';
            }     
        }
    }
    else{
        $sql2 = "UPDATE `teacher` SET `teacher_name` = '$name',`teacher_dob` = '$dob',`teacher_email` = '$email',`teacher_password` = '$password',`teacher_mobNo` = '$mobNo',`teacher_pincode` = '$pincode',`teacher_address` = '$address' WHERE `teacher`.`teacher_sno` = $sno";

            if($result2 = mysqli_query($conn,$sql2)){
                $update = true;
            }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

    <link rel="stylesheet" href="css/style.css">

    <title>Chaitnya Public School</title>
</head>

<body>
<input type="checkbox" id="check" checked>
<?php

        include 'partials/_logged_header.php';
        include 'partials/_sidebar.php';

    ?>

<div class="logged_page_content">
<?php
    if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Successfully Updated.</strong> 
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }

    $sql = "SELECT * FROM teacher WHERE teacher_sno = '$sno'";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $sno = $row['teacher_sno'];
        $name = $row['teacher_name'];
        $password = $row['teacher_password'];
        $mobNo = $row['teacher_mobNo'];
        $email = $row['teacher_email'];
        $dob = $row['teacher_dob'];
        $pincode = $row['teacher_pincode'];
        $address = $row['teacher_address'];
        $img_type = $row['teacher_img_type'];
        $image = $row['teacher_image'];
}
 ?>
<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <div class="user_image col-11 mx-auto">
                <h1>Profile</h1>
                <?php echo '<img src="data:'.$img_type.';base64,'.base64_encode($image).'" alt="user img">' ?>
            
            <div class="form-group mb-4">
                <input type="file" class="form-control py-4" placeholder="Your Image" name="user_img" id="user_img">
            </div>
        </div>
            <div class="row user_details mx-auto">
                <div class="col-md-5 col-11 part1">
                    <div class="form-group mb-4">
                        <label for="user_name">Name</label>
                        <input type="text" class="form-control py-4" placeholder="Name" name="user_name" id="user_name" value="<?php echo $name ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="user_dob">Date Of Birth</label>
                        <input type="date" class="form-control py-4" placeholder="Your Date Of Birth" name="user_dob" id="user_dob" value="<?php echo $dob ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="user_email">Email</label>
                        <input type="email" class="form-control py-4" placeholder="Email" name="user_email" id="user_email" value="<?php echo $email ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="user_password">Password</label>
                        <input type="text" class="form-control py-4" placeholder="Password" name="user_password" id="user_password" value="<?php echo $password ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="user_mobileNo">Mobile Number</label>
                        <input type="number" class="form-control py-4" placeholder="Your Mobile-No without 0 and +91" name="user_mobileNo" id="user_mobileNo" value="<?php echo $mobNo ?>">
                    </div>
                </div>
                <div class="col-md-5 col-11 part2">
                    
                    
                    <div class="form-group mb-4">
                        <label for="user_pincode">Pincode</label>
                        <input type="number" class="form-control py-4" placeholder="Your Pincode" name="user_pincode" id="user_pincode" value="<?php echo $pincode ?>">
                    </div>
                     <div class="form-group">
                         <label for="teacher_address">Address</label>
                        <textarea id="teacher_address" cols="30" rows="14" class="form-control" placeholder="Address" name="teacher_address"><?php echo $address ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="width: 50%; margin-left: 25%;" value="Update" name="update" id="update" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
</div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
</body>

</html>