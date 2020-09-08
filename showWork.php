<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: logout.php");
    exit;
}
require 'partials/_dbconnect.php';
include 'download.php';


$class = $_GET['class'];
$st = $_SESSION['catid'];

if(isset($_GET['delete'])){
    $sNo=$_GET['delete'];
    $delete=true;
    // echo $sNo;
    $sql1 = "SELECT * FROM `homework` WHERE `id` = '$sNo'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $image = $row1['file_name'];
    unlink("uploads/".$image);

    $sql= "DELETE from `homework` WHERE `id` = '$sNo'";
    $result=mysqli_query($conn,$sql);
  }

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
        <div class="row mx-auto detail_table col-11">
            <div class="col-md-9 col-11">
                <table class="table my-3 table_row table-hover" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    $sql = "SELECT * FROM `homework` WHERE class='$class'";
    $result = mysqli_query($conn,$sql);
    $files = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $sno=1;?>
<?php  foreach ($files as $file): ?>

<tr>
    <th class="table_sno" scope="row"><?php  echo $sno; ?></th>
    <td><?php  echo $file['name']; ?></td>
    <td><?php  echo $file['subject'] ; ?></td>
    <td><?php  echo $file['date'] ; ?></td>
    <td>
        <?php echo '<a href="showWork.php?class='.$class.'&file_id= '.$file['id'].'" class="btn btn-primary download">Download</a>';
        if($_SESSION['catid']!=0){
            echo '<button type="submit" class="btn btn-primary delete mx-3 button" id=d'. $file['id'] .'>Delete</button>';
        }
        $sno+=1?>
    </td>
</tr>

<?php  endforeach ; ?>

                    </tbody>
                </table>
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
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script>

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((elements) => {
        elements.addEventListener("click", (e) => {
            console.log("edit ", );
            sno = e.target.id.substr(1, );
            if (confirm("Are you Sure you want to delete!..")) {
                window.location = `showWork.php?class=<?php echo $class;?>&delete=${sno}`;
            } 
        })
    })
    </script>
</body>

</html>