<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
if(!isset($_SESSION['teacher']) || $_SESSION['teacher']!=true){
    header("location: login.php");
    exit;
}

$by = $_SESSION['sno'];
$catid = $_SESSION['catid'];

require 'partials/_dbconnect.php';
$update = false;
$showerror = false;

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $filename = $_FILES['myfile']['name'];
    $destination = 'uploads/' . $filename;

    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];

    $size = $_FILES['myfile']['size'];

    if(!in_array($extension,['zip','pdf','png','jpg','jpeg'])){
        $showerror = "your file extension must be .zip, .pdf, .png, .jpg, .jpeg";
    }

    elseif($_FILES['myfile']['size'] > 50000000){
        $showerror = "File is too large";
    }

    else{
        if(move_uploaded_file($file,$destination)){
            $sql = "INSERT INTO `homework` (`name`,`class`,`subject`,`upload_by`,`file_name`,`size`) VALUES ('$name','$class','$subject','$by','$filename','$size')";

            if(mysqli_query($conn,$sql)){
                $update = true;
            }
            else{
                $showerror =  "Not uploaded";
            }
        }
    }
}

if(isset($_POST['show'])){
    $number = 'sharma.pankaj842@gmail.com';
    $sql = "UPDATE `teacher` SET `upload` = 1 WHERE teacher_email='$number'";

    if($result = mysqli_query($conn,$sql)){
        $update = true;
    }
}

if(isset($_POST['hide'])){
    $number = 'sharma.pankaj842@gmail.com';
    $sql = "UPDATE `teacher` SET `upload` = 0 WHERE teacher_email='$number'";

    if($result = mysqli_query($conn,$sql)){
        $update = true;
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
          <strong>Uploaded Successfully.</strong> 
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }
        if($showerror){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>File Not Uploaded Successfully.</strong>".$showerror."
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }

?>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
            <div class="row mx-auto homework">
                <h1>Upload Homework</h1>

                <div class="col-md-5 col-11">
                    <div class="form-group mb-4">
                        <label for="name">File Name</label>
                        <input type="text" class="form-control py-4" placeholder="Name" name="name" id="name" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="class">Class</label>
                        <input type="number" class="form-control py-4" placeholder="Class" name="class" id="class"
                            required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="name">Subject</label>
                        <input type="text" class="form-control py-4" placeholder="Subject" name="subject" id="subject"
                            required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="mobileNo">Your File</label>
                        <input type="file" class="form-control py-4" placeholder="Your File" name="myfile" id="myfile"
                            required>
                    </div>

                    <div class="form-group">
                        <input type="submit" style="width: 50%; margin-left: 25%;" value="Upload" name="save" id="save"
                            class="btn btn-primary">
                    </div>

                </div>
            </div>
        </form>


        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <?php  if($catid==2){ ?>
            <div class="row mx-auto homework">
                <h1>Result</h1>
                <div class="col-md-5 col-11">
                    <div class="form-group">
                        <input type="submit" style="width: 50%; margin-left: 25%;" value="Show" name="show" id="show"
                            class="btn btn-primary">
                    </div>
                    <br>
                    

                    <div class="form-group">
                        <input type="submit" style="width: 50%; margin-left: 25%;" value="Hide" name="hide" id="hide"
                            class="btn btn-primary">
                    </div>
                    <br>
                </div>
            </div>
            <?php  } ?>

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