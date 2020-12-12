<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('Location:index.php');
}

$idlecturer = $_SESSION['identity'];
// echo $idlecturer;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CBTEST | Dashboard</title>
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
        
        <ul class="main-menu">
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="result.php">Result</a></li>
			<li><a href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>
            <!-- <a href="" class="hr-btn2"><img src="img/premium/1.jpg" alt="logo" srcset=""></a> -->

		</ul>

    </header>
    <!-- Header section end -->

   
    <div class='nav-question'>

        <span><a href="dashboard.php">Home /</a>dashboard</span>

    </div>
    
    <div class="nav-me">
        <div class='icon-me'> <i class="fa fa-dashboard"> </i></div>
        <span>Dashboard</span>
    </div>

    <div class="main-me">
        <div class="widget-me">
            <div>
                <a href=""><span>Result</span></a>
            </div>
            <div>
                <a href=""><span>Student</span></a>
            </div>
            <div>
                <a href=""><span>New Question</span></a>
            </div>
        </div>
        <div class="table-head">
            <div>
                <h4>Questions</h4>
                <!-- upload new question button -->
                <form action="dashboard.php" method="POST">
                    <button type="submit" name="upload">Upload new Question </button>   
                </form>
            </div>
            <table>
                <tr class="head-table">
                    <th>Subject</th>
                    <th>Level</th>
                    <th>Department</th>
                    <th>No. of Questions</th>
                    <th>Status</th>
                    <th>Edit</th>
                
                </tr>
              
                 <?php
                        $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                        if(mysqli_connect_error()) {
                            die('Database Faild'.mysqli_connect_error());
                        }
                        $questionsArray = array();
                        $questionsNumberArray = array();
                        $questionsLevelArray = array();
                        $queryQuestio = "SELECT  * FROM question_details WHERE lecturer = '$idlecturer'";
                        $numQuery = mysqli_query($dbconnect, $queryQuestio);
                        while($rowNumQ = mysqli_fetch_array($numQuery)) {
                            $questionsArray[] = $rowNumQ['subject'];
                            $questionsNumberArray[] = $rowNumQ['numberQues'];
                            $questionsLevelArray[] = $rowNumQ['level'];
                            $questionsDepartmentArray[] = $rowNumQ['department'];
                            $questionsIDArray[] = $rowNumQ['questionID'];
                    } 

                    $size = sizeof($questionsArray);
                     for ($qarray= 0; $qarray<$size; $qarray++){
                        echo"<tr class='tr'>";
                        if (empty($questionsArray)){
                            echo"<h1>no</h1>";
                        }
                        echo'<td>'.$questionsArray[$qarray].'</td>';
                        echo'<td>'.$questionsLevelArray[$qarray].'</td>';
                        echo'<td>'.$questionsDepartmentArray[$qarray].'</td>';

                        $queA = $questionsArray[$qarray];
                        $queNA = $questionsLevelArray[$qarray];
                        $queID = $questionsIDArray[$qarray];
                    $queryQues = "SELECT  count(course_code) FROM questionupload WHERE uploaders = '$idlecturer' AND course_code = '$queA' AND level = '$queNA'";
                    $num = mysqli_query($dbconnect, $queryQues);
                    while($rowN = mysqli_fetch_array($num)) {
                        $questionsIdArray = $rowN[0];

                        echo'<td>'.$questionsNumberArray[$qarray].'/'.$questionsIdArray.'</td>';
                        if ($questionsIdArray == $questionsNumberArray[$qarray]){
                            $button = "Completed";
                        }
                        else {
                            $button = "Not complete";

                        }
                    }
                        
                        echo'
                        <form action="dashboard.php" method="POST">
                            <td><button id="buttom'.$qarray.'" name="button" value="'.$queID.'">'.$button.'</button></td>
                        </form>';
                        echo'
                        <form action="dashboard.php" method="POST">
                            <td><button id="buttom'.$qarray.'" name="editButton" value="'.$queID.'">Edit</button></td>
                        </form>';
                        echo'</tr>';
                        
                        
                     }        
            
                     
                     if(isset($_POST['button']))
                    {

                        $idUploader = array();
                        $idSubject = array();
                        $idLevel = array();
                        $idDepartment = array();

                        $buttonID = $_POST['button'];
                        $queryChange  = "SELECT  * FROM question_details WHERE lecturer = '$idlecturer' AND questionID = '$buttonID'";

                        $resultChange = mysqli_query($dbconnect, $queryChange);
                        while($rowChange = mysqli_fetch_array($resultChange)) {
                            $idUploader[] = $rowChange['lecturer'];
                            $idSubject[] = $rowChange['subject'];
                            $idLevel[] = $rowChange['level'];
                            $idDepartment[] = $rowChange['department'];
                            
                     }

                     if(TRUE)
                    {
                        
                          echo  $_SESSION['logged'] = true;
                          echo  $_SESSION['identityP'] = $idUploader[0];
                          echo  $_SESSION['subj'] = $idSubject[0];
                          echo  $_SESSION['level'] = $idLevel[0];
                          echo  $_SESSION['department'] = $idDepartment[0];

                            echo "<script type=\"text/javascript\">
						alert(\"Well Done Sir\");
						window.location = \"uploadQues.php\"
					    </script>";
                    }
                    else {
                            echo 'error';
                        }                       
                    }


                     //upload new question php code
                     if(isset($_POST['upload']))
                    {
                            $_SESSION['identityP'] = $idUploader[0];
                            echo "<script type=\"text/javascript\">
						alert(\"Well Done Sir\");
						window.location = \"options.php\"
                    </script>";
                }
                    
                ?> 

                    
                    
            </table>

    </div>

    </div>

    
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

    <script>
    for (count=0; count>=0; count++) {

        var name = "buttom"+count
    var btn = document.getElementById(name);
    if (btn.innerHTML.match("Not complete")) {
        btn.style.color = "red";
    }
}
    </script>
</body>

</html>