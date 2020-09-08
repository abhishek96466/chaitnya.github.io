<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

require 'partials/_dbconnect.php';

$catid = $_SESSION['catid'];
$work = $_GET['work'];
// echo $catid;

// $id = $_GET['class_id'];

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
    
    <div class="row classes mx-auto">
        
        <div class="col-md-6 col-10 class_inner">
            <h1>Classes</h1>
            <?php 
            if($work == 0){
                echo '<a href="studentDetail.php?class=-1&catid='.$catid.'">L.K.G</a>
                    <a href="studentDetail.php?class=0&catid='.$catid.'" >U.K.G</a>
                    <a href="studentDetail.php?class=1&catid='.$catid.'">1</a>
                    <a href="studentDetail.php?class=2&catid='.$catid.'">2</a>
                    <a href="studentDetail.php?class=3&catid='.$catid.'">3</a>
                    <a href="studentDetail.php?class=4&catid='.$catid.'">4</a>
                    <a href="studentDetail.php?class=5&catid='.$catid.'">5</a>
                    <a href="studentDetail.php?class=6&catid='.$catid.'">6</a>
                    <a href="studentDetail.php?class=7&catid='.$catid.'">7</a>
                    <a href="studentDetail.php?class=8&catid='.$catid.'">8</a>' ;
            }

            if($work == 1){
                echo '<a href="showWork.php?class=-1">L.K.G</a>
                    <a href="showWork.php?class=0">U.K.G</a>
                    <a href="showWork.php?class=1">1</a>
                    <a href="showWork.php?class=2">2</a>
                    <a href="showWork.php?class=3">3</a>
                    <a href="showWork.php?class=4">4</a>
                    <a href="showWork.php?class=5">5</a>
                    <a href="showWork.php?class=6">6</a>
                    <a href="showWork.php?class=7">7</a>
                    <a href="showWork.php?class=8">8</a>' ;

            }
            ?>
        </div>
    </div>
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