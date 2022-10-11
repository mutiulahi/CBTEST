<?php
session_start();
if(!isset($_SESSION['logged'])){
    header("Location:index.php");
}

// $idDepart = $_SESSION['idDepartment'];
// $idLevel = $_SESSION['idLevel'];


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Student profile</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:fd300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="studentProfile.php" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
            <div class="header-right">
                <a href="logout.php" class="hr-btn1"><i class="fa fa-sign-out"></i> log out</a>

            </div>
        </div>

    </header>
    <!-- Header section end -->

    <!-- Player section -->
    <section class="player-section set-bg" data-setbg="img/payer-bg.jpg">
        <div class="player-box">
            <div class="tarck-thumb-warp">
                <div class="tarck-thumb">
                    <img class="blur" src="img/wave-thumb.png" alt="">
                </div>
            </div>
            
            <div class="wave-player-warp">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="wave-player-info">
                            <?php
                                $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                                    if(mysqli_connect_error()){
                                        die('Database Faild'.mysqli_connect_error());
                                    }
                                    $id = $_SESSION['idcard'];

                                    $seasion = date('Y');
                                    $seasiona = date('Y')+1;
                                    //echo $seasion;
                                    $thisSeasion = $seasion.' / '.$seasiona;
                                    
                                    $dbquery = "SELECT * FROM student_db WHERE id = $id ";
                                    $dbresulted = mysqli_query($dbconnect, $dbquery);

                                    while($row = mysqli_fetch_array($dbresulted)) {
                                        $email = $row['email'];
                                        $matric = $row['matric'];
                                        $name = $row['name'];
                                        $level = $row['level'];
                                        $department = $row['department'];
                                        $_SESSION['matric'] = $matric;
                                        $_SESSION['department'] = $level;
                                    }

                                    $selectQuestionDetail  = "SELECT subject, lecturer, level FROM question_details WHERE level= '$level' AND department ='$department' AND seasion = '$thisSeasion'";
                                    $resultQuestionDetail = mysqli_query($dbconnect, $selectQuestionDetail);

                                    while ($rowSub = mysqli_fetch_array($resultQuestionDetail)){
                                        $subject[] = $rowSub['subject'];
                                        $lecturer[] = $rowSub['lecturer'];
                                        $LEVEL[] = $rowSub['level'];
                                    }

                                       echo' <span>Student Details</span>
                                        <p>seasion :<span style="font-weight:600; color: #0a183d"> '.$thisSeasion.'</span></p>
                                        <h2>'.$name.'</h2><br>
                                        <h4>'.$email.'</h4><br>
                                        <h4>'.$matric.'</h4><br>
                                        <h4>'.$level.' level</h4><br>
                                        <h4>'.$department.'</h4><br>
                                        <p>Duration <span style="font-weight:600; color: #0a183d">: 3hr</span></p>';
                                       
                            ?>

                            <?php
                            if(isset($_POST['startExam'])){
                                $_SESSION['departmentC'] = $department;
                                $_SESSION['levelC'] = $level;
                                $_SESSION['matric'] = $matric;
                                $_SESSION['studentName'] = $name;
                                $_SESSION['Seasion'] = $thisSeasion;
                                $_SESSION['subject'] = $subject[0];
                                $_SESSION['lecturer'] = $lecturer[0];
                                $_SESSION['passed'] = true;
                                header('Location:question.php');
                            }
                            ?>


                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="songs-links">
                        <?php 
                            if(empty($subject) and empty($LEVEL))
                            {
                                $exam = 'No exam registered for this user.';
                                echo '<h5 id="exam">'.$exam.'</h5>';
                            }
                            else{
                                $exam = $subject[0];
                                echo '<h5 id="exam">'.$exam.'</h5>';
                            }
                            ?>
                            <form action="studentProfile.php" method="POST">
                                <button name='startExam' id = 'start'>START EXAM</button>
                                <button style="display:none" id = 'started'>START EXAM</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Player section end -->


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

    <!-- Audio Players js -->
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/wavesurfer.min.js"></script>

    <!-- Audio Players Initialization -->
    <script src="js/WaveSurferInit.js"></script>
    <script src="js/jplayerInit.js"></script>
    
    <script>
        var exam = document.getElementById("exam").innerHTML;
        if (exam.match('No exam registered for this user.')){
            var start = document.getElementById("start");
            var started = document.getElementById("started");
            start.style.display = 'none';
            started.style.display = 'inline-block';
            started.style.cursor = 'not-allowed';
        }
    </script>
</body>

</html>