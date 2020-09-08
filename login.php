<?php

require 'partials/_dbconnect.php';
// include 'partials/_header.php';

$showerror = false;

if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $category = $_POST['category'];
    // check wheather this user exists or not

    if($category == 'student'){
        $sql = "SELECT * FROM students WHERE student_email = '$username' OR student_mobileNo = '$username'";
        $result = mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if ($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if($password==$row['student_password']){
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$row['student_name'];
                    $_SESSION['sno'] = $row['student_sno'];
                    $_SESSION['catid'] = 0;
                    $id = $row['student_sno'];
                    header("location: student.php?id=$id&catid=0"); 
                }
                else{
                $showerror="Invalid Credentials";
                }
        
            }
        }
        else{
            $showerror="Invalid Credentials";
        }
        
    }
    if($category == 'teacher'){
        $sql =  "SELECT * FROM teacher WHERE teacher_email = '$username' OR teacher_mobNo = '$username'";
        $result = mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if($password==$row['teacher_password']){
                    if($username == 'sharma.pankaj842@gmail.com'){
                        session_start();
                        $_SESSION['loggedin']=true;
                        $_SESSION['teacher'] = true;
                        $_SESSION['username']=$row['teacher_name'];
                        $_SESSION['sno'] = $row['teacher_sno'];
                        $id = $row['teacher_sno'];
                        $_SESSION['catid'] = 2;
                        header("location: teacher.php?id=$id&catid=2");
                        exit;
                    }
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['teacher'] = true;
                    $_SESSION['username']=$row['teacher_name'];
                    $_SESSION['sno'] = $row['teacher_sno'];
                    $id = $row['teacher_sno'];
                    $_SESSION['catid'] = 1;
                    header("location: teacher.php?id=$id&catid=1"); 
                }
                else{
                    $showerror="Invalid Credentials";
                }
        
            }
        }
        else{
        $showerror="Invalid Credentials";
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

    <title>Chaitanya Public School</title>
</head>

<body>
    
    <!-- <header class=" container-fluid nav_style" style="width:100vw;">
        <div class="row">
            <div class="col-md-12 col-12 mx-auto">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" alt="" id="logo" class="img-fluid">
                        <h1>Chaitnya</h1>
                        <h2>Public School</h2>
                    </a>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item login_nav">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header> -->
    <?php 
    if($showerror){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Unsuccessful.</strong>" . $showerror . "
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }
    ?>
    <!-- <div class="container-fluid mx-auto"> -->
    <div class="login_wrapper col-md-12">
    
        <div class="form-div animate__animated animate__backInDown">
        <a href="index.php"><img src="img/logo.jpg" class="login_img"></a>
            <h1>LOGIN</h1>
            <form class="form form_inner" action="/Chaitnya/login.php" method="post">
                <input type="text" name="username" id="username" placeholder="Email/Mobile number">
                <br>
                <input type="password" name="password" id="password" placeholder="Password">
                <br>
                <select name="category" id="category">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <!-- </div> -->

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