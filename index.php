<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=sans-serif">

    <link rel="stylesheet" href="css/style.css">

    <title>Chaitnya Public School</title>
</head>

<body onload = "myFunction()">
<div class="loader" id="loader">
    <div class="loader_inner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
    <!-- header part starts here -->
    <?php
        include 'partials/_header.php';

    ?>
    <!-- header part ends here -->

    <div class="container-fluid home_style" id="home">
        <div class="row mx-auto">
            <div class="col-md-11 col-12 mx-auto">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/quote1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/quote2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/quote3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Home part ends here -->

    <!-- About part starts here -->

    <div class="container-fluid bg-light" id="about">
        <div class="row">
            <div class="col-md-11 col-11 mx-auto">
                <div class="main_title">
                    <h1> About Us</h1>
                </div>
                <div class="row justify-content-around mt-5 gy-5">
                    <div class="about_card col-xxl-3 col-lg-4 col-md-4 col-11">
                        <div class="card_title">
                            <h1>Our Vision</h1>
                        </div>
                        <div class="card_content">
                            Chaitanya Public School holds the vision of imparting a world class educational experience
                            to the students by making continuous transformations as the new normal; by making commitment
                            to ever ideal goal of being a good school (guarantee of overall development of every
                            student) come true by 2025 and eventually be the site of the best learning practices for the
                            stake holders.
                        </div>
                    </div>
                    <div class="about_card col-xxl-3 col-lg-4 col-md-4 col-11">
                        <div class="card_title">
                            <h1>Our Moto</h1>
                        </div>
                        <div class="card_content">
                            ‘Service Before Self’ – Our motto is a vivid reflection of the mettle that goes into the
                            making of an institution or an organization. Our motto is a constant reminder that we should
                            serve others willingly, graciously and selflessly. We should not expect anything in return
                            for our service because there is a greater pleasure in giving than in receiving. We believe
                            in the saying, ‘Thy need is greater than mine’.
                        </div>
                    </div>
                    <div class="about_card col-xxl-3 col-lg-4 col-md-4 col-11">
                        <div class="card_title">
                            <h1>Our Mission</h1>
                        </div>
                        <div class="card_content">
                            The mission of our institution is to enlighten our students; empowering them with high
                            standards of scholastic and co-scholastic excellence; to lead the nurturance of the next
                            decade knowledge, skills, values and attitudes in them to ensure their self-actualization
                            and thereby becoming living examples of our motto “Service Before Self”.
                        </div>
                    </div>
                </div>
                <div class="faculty">
                    <h1 class="heading">Faculty</h1>
                    <?php
                        include 'faculty.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- About part ends here -->

    <!-- Gallery part starts here -->

    <div class="gallery" id="gallery">
        <div class="main_title">
            <h1> Gallery </h1>
        </div>
        <div class="responsive">
            <img src="img/home.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home3.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home4.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home5.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home6.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home7.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home8.jpg" width="300" height="200" alt="">
        </div>
        <div class="responsive">
            <img src="img/home9.jpg" width="300" height="200" alt="">
        </div>
    </div>

    <!-- Gallery part ends here -->

    <!-- Registraion part starts here -->
    <!-- <div class="container-fluid registration_sec" id="registration">
        <div class="row">
            <div class="col-11 col-md-11 mx-auto">
                <div class="main_title">
                    <h1> Registration </h1>
                </div>
                <form action="#" method="post">
                    <div class="row registration_form">
                        <div class="col-md-5 col-11 part1">
                            <div class="form-group mb-4">
                                <input type="text" class="form-control py-4" placeholder="Name" name="name" id="name"
                                    required="required">
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" class="form-control py-4" placeholder="Email" name="email"
                                    id="email" required="required">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control py-4" placeholder="Password" name="password"
                                    id="password" required="required">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control py-4" placeholder="Confirm Password"
                                    name="cpassword" id="cpassword" required="required">
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" class="form-control py-4" placeholder="Your Mobile-No"
                                    name="mobileNo" id="mobileNo" required="required">
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" class="form-control py-4" placeholder="Your Pincode" name="pincode"
                                    id="pincode" required="required">
                            </div>
                        </div>
                        <div class="col-md-5 col-11 part2">
                            <div class="form-group mb-4">
                                <input type="file" class="form-control py-4" placeholder="Your Image" name="image"
                                    id="image" required="required">
                            </div>

                            <div class="form-group">
                                <textarea id="address" cols="30" rows="14" class="form-control" placeholder="Address"
                                    name="address" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" style="width: 50%; margin-left: 25%;" value="Register"
                                    name="register" id="register" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- Registration part ends here -->

    <!-- Contact us part starts here -->

    <div class="container-fluid" id="contact">
        <div class="row">
            <div class="col-11 col-md-10 mx-auto">
                <div class="row justify-content-around contact_div">
                    <div class="col-lg-3 col-md-3 col-10 contact_share_div">
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i></p>
                        <br>
                        <p class="font-weight-bold"> cpslarha.2004@gmail.com </p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-10 contact_share_div">
                        <p><i class="fa fa-whatsapp" aria-hidden="true"></i></p>
                        <br>
                        <p class="font-weight-bold"> +91 94186 82360</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-10 contact_share_div">
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i></p>
                        <br>
                        <p class="font-weight-bold"> Galore-Larha,Hamirpur,HP </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact us part ends here -->

    <!-- social links part -->

<section class="my-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-1 col-2 socialsite_links">
                <a href="https://www.facebook.com/Chaitnya-Public-School-1013034982051946" target="_blank"><i class="fa fa-facebook-f fa-2x"></i></a>
            </div>
            <div class="col-lg-1 col-2 socialsite_links">
                <i class="fa fa-2x fa-instagram" aria-hidden="true"></i>
            </div>
            <!-- <div class="col-lg-1 col-2 socialsite_links">
                <i class="fa fa-2x fa-dribbble" aria-hidden="true"></i>
            </div>
            <div class="col-lg-1 col-2 socialsite_links">
                <i class="fa fa-2x fa-pinterest" aria-hidden="true"></i>
            </div>
            <div class="col-lg-1 col-2 socialsite_links">
                <i class="fa fa-2x fa-behance" aria-hidden="true"></i> -->
            </div>
        </div>
    </div>
</section>

<!-- footer starts here-->

<footer>
    <div class="footer">
        <p> Copyright &copy Chaitanya Public School 2020 | All Rights Reserved </p>
        <p> Design By - Abhii </p>
    </div>
</footer>

<!-- footer ends here-->

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

    <script>

        var preloader = document.getElementById('loader');

        function myFunction(){
            preloader.style.display = "none";
        }
    </script>
</body>

</html>