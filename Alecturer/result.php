<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Result page</title>
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
        <a href="dashboard.php" class="site-logo">
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
        <span><a href="dashboard.php">Home /</a>Result</span>
    </div>
    <div class="control-me-result">
        <form class="question-fro" action="result.php" method="POST">
            <div class="control-form">
                <select name="course" >
                    <option value="">for which course?</option>
                    <option value="MTH101">MTH101</option>
                    <option value="MTH101">MTH101</option>
                    <option value="MTH101">MTH101</option>
                </select>
                <select  name="department" >
                    <option value="">for which department?</option>
                    <option value="Computer">Computer</option>
                    <option value="Computer">Computer</option>
                    <option value="Computer">Computer</option>
                </select>
                <select name="seasion" >
                    <option value="">for which seasion?</option>
                    <option value="2020 / 2021">2020 / 2021</option>
                </select>
                <select name="level" >
                    <option value="">for which level?</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                </select>
                <button class="search-btn" name="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <div class="table-head" style="width:90%; margin-bottom:190px">
            <?php
                echo '<center><table style="width:100%">
                        <tr>
                            <th> S/N </th>
                            <th> MATRIC NUMBER </th>
                            <th> TOTAL SCORE </th>
                        </tr>';
                
                if(isset($_POST['submit']))
                {
                    $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                    if(mysqli_connect_error()) {
                        die('Database Faild'.mysqli_connect_error());
                    }
                    $DepartmentInput = $_POST['department'];
                    $LevelInput = $_POST['level'];
                    $SeasionInput = $_POST['seasion'];
                    $CourseInput = $_POST['course'];
                    $queryMatric = "SELECT * FROM result_tb WHERE department LIKE '$DepartmentInput' 
                    AND level LIKE '$LevelInput' AND seasion LIKE '$SeasionInput' AND course LIKE '$CourseInput'";
                    $matricQuery = mysqli_query($dbconnect, $queryMatric);
                    while($rowMatric = mysqli_fetch_array($matricQuery)) {

                        $matricArray = $rowMatric['matric'];
                        $ScoreArray = $rowMatric['score'];
                        echo"<tr>
                                <th> S/N </th>
                                <td> {$matricArray}</td>
                                <td> {$ScoreArray} </td>
                            </tr>";
                        // echo $matricArray;
                        // echo $ScoreArray;
                }  
                } 
            ?>
            </table></center>
        </div>
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