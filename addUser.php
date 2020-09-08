<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: logout.php");
    exit;
}
if(!isset($_SESSION['teacher']) || $_SESSION['teacher']!=true){
    header("location: logout.php");
    exit;
}
if($_SESSION['catid']!=2){
    header("location: logout.php");
    exit;
}

require 'partials/_dbconnect.php';
$cat = $_GET['cat'];
$update = false;
// echo $catid;
if(isset($_POST['add'])){

    if($cat == 0){

        $student_name = $_POST['name'];
        $student_class = $_POST['class'];
        $student_mobileNo = $_POST['mobileNo'];
        $student_password = $_POST['password'];

        $sql = "INSERT INTO `students`(`student_name`,`student_class`,`student_mobileNo`,`student_password`) VALUES('$student_name','$student_class','$student_mobileNo','$student_password')";

        $result = mysqli_query($conn,$sql);
        if($result){
            $update = true;
        }
    }

    if($cat == 1){
        $teacher_name = $_POST['name'];
        $teacher_mobileNo = $_POST['mobileNo'];
        $teacher_password = $_POST['password'];

        $sql = "INSERT INTO `teacher`(`teacher_name`,`teacher_mobNo`,`teacher_password`) VALUES('$teacher_name','$teacher_mobileNo','$teacher_password')";

        $result = mysqli_query($conn,$sql);
        if($result){
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
          <strong>Added Successfully.</strong> 
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }

?>
<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <!-- <div class="student_image col-11 mx-auto">
                
                <img src="img/user.jpg" alt="student img">
            
            <div class="form-group mb-4">
                <input type="file" class="form-control py-4" placeholder="Your Image" name="student_img" id="student_img">
            </div>
        </div> -->
            <div class="row mx-auto student_details">
                <?php 
                if($cat == 0){
                    echo '<h1>Add Student</h1>';
                }
                if($cat == 1){
                    echo '<h1>Add Teacher</h1>';
                }
                
                ?>
                <div class="col-md-5 col-11">
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control py-4" placeholder="Name" name="name" id="name" required>
                    </div>
                    <?php 

                    if($cat == 0){
                        echo '<div class="form-group mb-4">
                            <label for="class">Class</label>
                            <input type="number" class="form-control py-4" placeholder="Class" name="class" id="class" required>
                        </div>';
                    }
                    ?>
                    
                    <div class="form-group mb-4">
                        <label for="mobileNo">Mobile Number</label>
                        <input type="number" class="form-control py-4" placeholder="Mobile Number" name="mobileNo" id="mobileNo" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="text" class="form-control py-4" placeholder="Password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="width: 50%; margin-left: 25%;" value="Add" name="add" id="add" class="btn btn-primary">
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