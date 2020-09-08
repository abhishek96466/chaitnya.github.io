<?php
// error_reporting(0);
  require 'partials/_dbconnect.php';

  


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style.css">



</head>

<body>
    <div class="profile_slide">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
              $sql = "SELECT * FROM teacher";
              $result = mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result)){
                $name = $row['teacher_name'];
                $image = $row['teacher_image'];
                if($row['teacher_img_type']){
                  echo '<div class="swiper-slide"><img src="data:'.$row['teacher_img_type'].';base64,'.base64_encode($image).'" alt="teacher img">
                      <h1>'.$name.'</h1>
                      </div>';
                }
                else{
                  echo '<div class="swiper-slide"><img src="img/logo.jpg" alt="teacher img">
                      <h1>'.$name.'</h1>
                      </div>';
                }
              }

        ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: true,
        },
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
    </script>

</body>

</html>
