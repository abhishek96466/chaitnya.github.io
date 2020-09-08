<?php
// $id = $_GET['id'];
// $catid = $_GET['catid'];
$id = $_SESSION['sno'];
$catid = $_SESSION['catid'];

if($catid == 0){
    $sql = "SELECT * FROM `students` WHERE student_sno='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['student_name'];
    $image = $row['student_image'];
    $img_type = $row['student_img_type'];
    $class = $row['student_class'];
}
if($catid == 1){
    $sql = "SELECT * FROM `teacher` WHERE teacher_sno='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['teacher_name'];
    $image = $row['teacher_image'];
    $img_type = $row['teacher_img_type'];
}
if($catid == 2){
    $sql = "SELECT * FROM `teacher` WHERE teacher_sno='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['teacher_name'];
    $image = $row['teacher_image'];
    $img_type = $row['teacher_img_type'];
}

?>

<div class="sidebar">
        <label for="check">
            <i class="fa fa-bars" id="sidebar_btn"></i>
        </label>
        <center class="col-md-10">
        <?php echo '<img src="data:'.$img_type.';base64,'.base64_encode($image).'" alt="user img" class="main_img">' ?>
            <h4><?php echo $name; ?></h4>
        </center>

        <?php

        if($catid==0){
            echo '
                <a href="student.php?id='.$id.'&catid='.$catid.'"><i class="fa fa-user-circle" aria-hidden="true"></i><span>Profile</span></a>
                <a href="classes.php?work=1"><i class="fa fa-file-word-o" aria-hidden="true"></i><span>HomeWork</span></a>
                <a href="showResult.php?class='.$class.'"><i class="fa fa-info-circle"></i><span>Result</span></a>
                </div>';
        }

        if($catid==1){
            echo '
                <a href="teacher.php?id='.$id.'&catid='.$catid.'"><i class="fa fa-user-circle" aria-hidden="true"></i></i><span>Profile</span></a>
                <a href="classes.php?work=1"><i class="fa fa-file-word-o" aria-hidden="true"></i><span>HomeWork</span></a>
                <a href="classes.php?work=0"><i class="fa fa-info-circle"></i><span>Student Detail</span></a>
                <a href="teacherDetail.php?catid=1"><i class="fa fa-address-book" aria-hidden="true"></i><span>Teacher Detail</span></a>
                <a href="addHomework.php"><i class="fa fa-book" aria-hidden="true"></i><span>Upload work</span></a>
                </div>';
        }
        if($catid==2){
            echo '
                <a href="teacher.php?id='.$id.'&catid='.$catid.'"><i class="fa fa-user-circle" aria-hidden="true"></i><span>Profile</span></a>
                <a href="classes.php?work=1"><i class="fa fa-file-word-o" aria-hidden="true"></i><span>HomeWork</span></a>
                <a href="classes.php?work=0"><i class="fa fa-info-circle"></i><span>Student Detail</span></a>
                <a href="teacherDetail.php?catid=2"><i class="fa fa-address-book" aria-hidden="true"></i><span>Teacher Detail</span></a>
                <a href="add.php"><i class="fa fa-plus-square" aria-hidden="true"></i><span>Add User</span></a>
                <a href="addHomework.php"><i class="fa fa-book" aria-hidden="true"></i><span>Upload work</span></a>
                </div>';
        }
        ?>
        