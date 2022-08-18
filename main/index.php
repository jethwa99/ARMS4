<?php
include('dbcon.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Student Result | Index</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <h3>ARMS</h3>
                </a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#features-sec">FEATURES</a></li>
                    <li><a href="#faculty-sec">DEVELOPERS</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="home-sec" id="home">
        <div class="overlay">
            <div class="container">
                <div class="row text-center ">

                    <div class="col-lg-12  col-md-12 col-sm-12">

                        <div class="flexslider set-flexi" id="main-section">
                            <ul class="slides move-me">

                                <li>
                                    <h1>ATTENDANC AND RESULT</h1>
                                    
                                    <a href="login.php" class="btn btn-primary btn-lg">
                                        Login
                                    </a>

                                </li>

                                <li>
                                    <h1>MANAGEMENT SYSTEM</h1>
                                    <a href="login.php" class="btn btn-primary btn-lg">
                                        Login
                                    </a>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="tag-line">
        <div class="container">
            <div class="row  text-center">

                <div class="col-lg-12  col-md-12 col-sm-12">

                    <h2 data-scroll-reveal="enter from the bottom after 0.1s"><i class="fa fa-circle-o-notch"></i>
                        WELCOME TO THE ARMS <i class="fa fa-circle-o-notch"></i> </h2>
                </div>
            </div>
        </div>

    </div>

    <div id="features-sec" class="container set-pad">
        <div class="row text-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line">FEATURE LIST </h1>
                <h4 data-scroll-reveal="enter from the bottom after 0.3s">
                    SOME OF OUR FEATURE
                    <h4 />
            </div>

        </div>



        <div class="row">


            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
                <div class="about-div">
                    <i class="fa fa-calendar fa-4x icon-round-border"></i>
                    <h3>ONLINE ATTENDANC MANAGEMENT</h3>
                    <hr />
                    <hr />
                    <p>


                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                <div class="about-div">
                    <i class="fa fa-graduation-cap fa-4x icon-round-border"></i>
                    <h3>ONLINE RESULT MANAGEMENT</h3>
                    <hr />
                    <hr />
                    <p>


                    </p>

                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.6s">
                <div class="about-div">
                    <i class="fa fa-edit fa-4x icon-round-border"></i>
                    <h3>LEAVE APPLICATION SYSTEM</h3>
                    <hr />
                    <hr />
                    <p>

                    </p>

                </div>
            </div>


        </div>
    </div>

    <div id="faculty-sec">
        <div class="container set-pad">
            <div class="row text-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">DEVELOPE BY </h1>
                    <p data-scroll-reveal="enter from the bottom after 0.3s">

                    </p>
                </div>

            </div>


            <div class="row">


                <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
                    <div class="faculty-div">
                        <img src="assets/img/faculty/profile.png" class="img-rounded" height="200" width="200" />
                        <h3>OM TAWDE </h3>
                        <hr />
                        <h4>Desigining <br /> FrontEnd</h4>
                        <p>


                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                    <div class="faculty-div">
                        <img src="assets/img/faculty/profile.png" class="img-rounded" height="200" width="200" />
                        <h3>AYAZ KHOJA</h3>
                        <hr />
                        <h4>Desigining <br /> FrontEnd</h4>
                        <p>


                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.6s">
                    <div class="faculty-div">
                        <img src="assets/img/faculty/profile.png" class="img-rounded" height="200" width="200" />
                        <h3>ABHISHEK SINH JETHWA</h3>
                        <hr />
                        <h4>Database <br /> BackEnd</h4>
                        <p>


                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <div class="container">
        <div class="row set-row-pad">
            <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 " data-scroll-reveal="enter from the bottom after 0.4s">

                <h2><strong>Our Location </strong></h2>
                <hr />
                <div>
                    <h4>SRK INT. OF MANAGEMENT AND TECHNOLOGI <br>ANJAR ,KUTCH</h4>
                    <h4>INDIA</h4>
                    <h4><strong>Call:</strong> + 91-9328-0534-73</h4>
                    <h4><strong>Email: </strong>info@yourdomain.com</h4>
                </div>


            </div>
            <div class=" col-lg-4 col-md-4 col-sm-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" data-scroll-reveal="enter from the bottom after 0.4s">

                <h2><strong>Social Conectivity </strong></h2>
                <hr />
                <div>
                    <a href="#"> <i style="font-size:24px" class="fa fa-facebook"></i> </a>
                    &emsp;<a href="#"> <i style="font-size:24px" class="fa fa-instagram"></i></a>
                    &emsp;<a href="#"> <i style="font-size:24px" class="fa fa-twitter"></i></a>
                </div>
            </div>


        </div>
    </div>

    <div id="footer">
        &copy 2014 yourdomain.com | All Rights Reserved |
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.flexslider.js"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>