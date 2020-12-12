<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
<title>CBTEST | Setting</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />


    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="logout.php" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
        <div class="header-right" style="margin-top: -20px;">
            <a href="logout.php" class="hr-btn1"><i class="fa fa-sign-out"></i> log out</a>
            <a href="" class="hr-btn2"><img src="img/premium/1.jpg" alt="logo" srcset=""></a>

        </div>
        </div>

    </header>
    <!-- Header section end -->

    <!--Login section -->
    <div class='nav-question'>

<center><h1>SORRY!<br> YOU HAVE UPLOADED QUESTION FOR THE SELECTED DETAILS</h1>
<span style="color: blue; font-size:30px;">correct your mistake by <a style="color: red; font-size:30px;"  href="options.php">linking back</a></span></center>

    </div>

    <!-- Login section end -->
    <!-- Footer section -->
    
    <!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>