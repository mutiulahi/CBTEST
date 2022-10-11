<?php

session_start();
// if(!isset($_SESSION['finished'])) {
//     header('Location:index.php');
// }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Quetions setting</title>
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
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="studentProfile.php" class="site-logo">
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
    <!-- <div class="control-me">
        <form class="question-from" action="" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="course code / subject">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="department">
                    </div>
                    <div class="col-md-12">
                        <select name="" id="" class="form-control">
                            <option value="">for which level?</option>
                            <option value="1">100</option>
                            <option value="1">200</option>
                            <option value="1">300</option>
                        </select>
                    </div>


                    <div class="col-md-12">
                        <button class="site-btn" name="submit">Finish</button>
                    </div>

                </div>
            </div>
        </form>
    </div> -->
    <?php
            $matric = $_SESSION['matric'];
            $thisSeasion = $_SESSION['seasion'];
            $subject = $_SESSION['subject'];
            $department = $_SESSION['department'];
            $level = $_SESSION['level'];

            $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
            if(mysqli_connect_error()) {
                die('Database Faild'.mysqli_connect_error());
            }

            $DBusersAnswer = "SELECT optionS FROM answers WHERE department = '$department' AND level = '$level' AND 
            subject = '$subject' AND seasion = '$thisSeasion' AND matric = '$matric'";
            $numQueryR = mysqli_query($dbconnect, $DBusersAnswer);
            while($rowNumQT = mysqli_fetch_array($numQueryR)) {
                        $Array[] = $rowNumQT['optionS'];
                 } 
                //  print_r($Array);
            
            $DBcorrectAnswer = "SELECT answers, questions FROM questionupload WHERE department = '$department' AND level = '$level' AND course_code = '$subject' AND seasion = '$thisSeasion'";
            $numQuery = mysqli_query($dbconnect, $DBcorrectAnswer);
            while($rowNumQ = mysqli_fetch_array($numQuery)) {
                     $correctAnswers[] = $rowNumQ['answers'];
                     $corespondingQuestions[] = $rowNumQ['questions'];
              } 
            //   print_r($correctAnswers);
              $answerSize = sizeof($correctAnswers);
              $score = 0;
            //  echo " <table style='width:50%'>
            //     <tr>
            //         <th>Subject</th>
            //         <th>Level</th>
            //         <th>Department</th>
            //         <th>No. of Questions</th>
            //         <th>Status</th>
            //         <th>Edit</th>
                
            //     </tr>";
              for ($result=0; $result<$answerSize; $result++){
                  if($Array[$result] != $correctAnswers[$result]){
                    // echo '<tr>';
                    //     echo '<td>'.$corespondingQuestions[$result].'</td> 
                    //         <td>'.$Array[$result] .'</td>
                    //         <td> '. $correctAnswers[$result]. '</td>
                    //         <td>  wrong </td>';
                    // echo '</tr>';
                    continue;
                  }
                  else
                  {
                    $score++;

                //     echo '<tr>';
                //     echo '<td>'.$corespondingQuestions[$result].'</td>
                //             <td>'.$Array[$result] .'</td>
                //            <td> '. $correctAnswers[$result]. '</td>
                //            <td>  correct </td>';
                // echo '</tr>';
                  }
               
              }
            //   echo "<tr>";
            //   echo    "<td>".$score."</td>";
            //   echo "</tr>";
            
              echo "</table>";
              

    ?>

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