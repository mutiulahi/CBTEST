<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Upload options</title>
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
        <a href="index
		.html" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
        <div class="header-right" style="margin-top: -20px;">
            <a href="" class="hr-btn1"><i class="fa fa-sign-out"></i> log out</a>
            <a href="" class="hr-btn2"><img src="img/premium/1.jpg" alt="logo" srcset=""></a>

        </div>
        </div>

    </header>
    <!-- Header section end -->

    <!--Login section -->
    <div class='nav-question'>

        <span><a href="">Home /</a>Setting</span>

    </div>
    <?php
       if(isset($_POST['submit'])){
        $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
        if(mysqli_connect_error()) {
            die('Database Faild'.mysqli_connect_error());
        }
            $level = $_POST['level'];
            $department = $_POST['department'];
            $numberQuestion = $_POST['number_question'];
            $subject = $_POST['subject'];
            $uploader = 'Tescode';

        $queryQuestion = "INSERT INTO question_details (numberQues, level, department, subject, lecturer)VALUES('$numberQuestion', '$level', '$department', '$subject', '$uploader') ";
        $numQuery = mysqli_query($dbconnect, $queryQuestion);
       if($numQuery){
           $_SESSION['identity'] = $uploader;
           header('Location:uploadQues.php');
       }
       else {
           echo 'error';
       }                       
       }           
    ?>
    <div class="control-me col-md-6" style="margin-top: 20px;">
        <form class="question-from" action="options.php" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <select name="level" id="" class="form-control">
                        <option value="">Level</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <input type="text" name="department" id="" class="form-control" placeholder="Department">
                </div>
                <div class="col-md-12">
                    <input type="number" name="number_question" id="" class="form-control" placeholder="Number of questions">
                </div>
                <div class="col-md-12">
                    <input type="text" name="subject" id="" class="form-control" placeholder="Course code / Subject">
                </div>


                <div class="col-md-12" style="margin-top: 15px;">
                    <button class="site-btn" name="submit">save and continue <i
                            class="fa fa-angle-double-right"></i></button>
                </div>


            </div>
        </form>
    </div>

    <!-- Login section end -->
    <!-- Footer section -->
    <?php
		include 'includes/footer.php';
	?>
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