<?php
session_start();
if(!isset($_SESSION['passed'])){
    header('Location:index.php');
}
//db connection
$dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
    if(mysqli_connect_error()) {
        die('Database Faild'.mysqli_connect_error());
    }
   


    $Depart = $_SESSION['departmentC'];
    $Level = $_SESSION['levelC'];
    $Seasion = $_SESSION['Seasion'] ;

    
    $QuestionsArray = array();
    $ArrayOptionA = array();
    $ArrayOptionB = array();
    $ArrayOptionC = array();
    $ArrayOptionD = array();
    
    $queryQuestion = "SELECT * FROM questionupload WHERE department = '$Depart' AND level = '$Level' AND seasion = '$Seasion'";
    $ResultQues = mysqli_query($dbconnect, $queryQuestion);
    while($rowQues = mysqli_fetch_array($ResultQues)){
        $QuestionsArray[] = $rowQues['questions'];
        $ArrayOptionA[] = $rowQues['optionA'];
        $ArrayOptionB[] = $rowQues['optionB'];
        $ArrayOptionC[] = $rowQues['optionC'];
        $ArrayOptionD[] = $rowQues['optionD'];
    }

//select the que

    $uploadedQuestion = "SELECT COUNT(id) FROM questionupload WHERE department = '$Depart' AND level = '$Level' AND seasion = '$Seasion'";
    $numQuery = mysqli_query($dbconnect, $uploadedQuestion);
    while ($num = mysqli_fetch_array($numQuery)) {
        $numberUploadedQ = $num[0];
         if($numberUploadedQ >=0){
            $numberUploadedQT= $numberUploadedQ;
            // echo $numberUploadedQT;   
         }
    }

             
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CBTEST</title>
    <meta charset="UTF-8">
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

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon">

    <link rel="stylesheet" href="style.css">



    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder-->
    <div id="preloder">
        <div class="loader"></div>
    </div> 

    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="index.html" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
        <div class="header-right">
            <a href="#" class="hr-btn">Time left</a>
            <a href="#" class="time">12:00</a>
        </div>

    </header>
    <!-- Header section end -->
    <div class='nav-question'>

 <span><a href="">Home /</a>Upload</span> 

</div>
        <?php
        
            if(isset($_POST['submit'])) 
            {

                $department = $_SESSION['departmentC'];
                $level = $_SESSION['levelC'];
                $matric = $_SESSION['matric'];
                $name = $_SESSION['studentName'];
                $thisSeasion = $_SESSION['Seasion'];
                $subject = $_SESSION['subject'];
                $lacturer = $_SESSION['lecturer'];



                $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                if(mysqli_connect_error()) {
                    die('Database Faild'.mysqli_connect_error());
                }
                $Check_Pressent = "SELECT matric FROM answers WHERE seasion='$thisSeasion' AND level = '$level' AND matric = '$matric'";
                $ResultCheck = mysqli_query($dbconnect, $Check_Pressent);
                $COUNT = mysqli_fetch_array($ResultCheck);
                // echo $COUNT[0];
                if($COUNT >1){
                    session_destroy();
                    echo"<script type=\"text/javascript\"> 
                    alert(\"SORRY YOU CAN'T RETAKE THIS EXAM AGAIN WAIT FOR NEXT YEAR!!!\");
                    window.location = \"index.php\"</script>";
                }
                else
                {
                    $counter = 1;
                    for($u=0; $u<=$numberUploadedQT-1; $u++) 
                    {
                    $option = $_POST["answer{$u}"];

                    $queryQ = "INSERT INTO answers (subject, level, department, questionID, optionS, lecturer, seasion, matric) VALUES
                    ('$subject', '$Level', '$department', '$counter', '$option', '$lacturer', '$thisSeasion', '$matric')";
                        if(mysqli_query($dbconnect, $queryQ)) 
                        {
                            $_SESSION['matric'] = $matric;
                            $_SESSION['seasion'] = $thisSeasion;
                            $_SESSION['subject'] = $subject;
                            $_SESSION['level'] = $Level;
                            $_SESSION['department'] = $department;
                            $_SESSION['finished'] = true;
                        }

                        $counter = $counter+1;
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
                        for ($result=0; $result<$answerSize; $result++){
                            if($Array[$result] != $correctAnswers[$result]) {
                                
                                continue;
                            }
                            else
                            {
                                $score++;
                            }
                            
                        }
                        $InsertResult = "INSERT INTO result_tb (matric, score, department, course, level, seasion)VALUES
                        ('$matric', '$score', '$department', '$subject', '$level', '$thisSeasion')";
                                if(mysqli_query($dbconnect, $InsertResult)){
                                    $_SESSION['matric'] = $matric;
                                    $_SESSION['seasion'] = $thisSeasion;
                                    $_SESSION['subject'] = $subject;
                                    $_SESSION['level'] = $Level;
                                    $_SESSION['department'] = $department;
                                    $_SESSION['finished'] = true;

                                    echo"<script type=\"text/javascript\"> 
                                alert(\"Thank for participating !\");
                                window.location = \"setting.php\"</script>";
                                }
                }
            }
        ?>

    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-pro wizard-cts-st">
                    <ul>
                        <?php                    
						for($i=1; $i<=$numberUploadedQT; $i++)
						{
                           
							$link = "#tab".$i;
							echo'<li><a href="'.$link.'" data-toggle="tab">'.$i.'</a></li>';
                        }
                        
						?>

                    </ul>
                </div>
            </div>
        </div><br>
        <div class="tab-content container">
            <?php
            $error = array();
                 for($q=1; $q<=$numberUploadedQT; $q++) {
                        
                     $qlink = "tab".$q;
                        $ques= $q-1;

                    // echo $qlink;
                    
                     echo   '<div class="tab-pane wizard-ctn" id="'.$qlink.'">
                                <form  action="question.php" method="POST">
                                    <div class="row question-from">
                                        <div class="col-md-12 " style="margin-left: 1%;">';
                                        if(empty($QuestionsArray)){

                                            $error[]= '<center><h1>No Question registered for this User</h1></center>';
                                        }
                                        else
                                        {
                                        echo'<p>'.$QuestionsArray[$ques].'.</p>';
                                        
                                        echo'</div>
                                    </div>
                                    ';
                                    // if(empty($QuestionsArray)){
                                    //     // echo 'No Question registered for this User';
                                    //     break;
                                    // }else
                                    
                                        echo'
                                        <div class="options">
                                        <label> <span class="opt">a</span> <input type="radio" value="'.$ArrayOptionA[$ques].'" name="answer'.$ques.'">
                                            <span>'.$ArrayOptionA[$ques].'</span> </label>
                                        <label> <span class="opt">b</span> <input type="radio" value="'.$ArrayOptionB[$ques].'" name="answer'.$ques.'">
                                            <span>'.$ArrayOptionB[$ques].'</span> </label>
                                        <label> <span class="opt">c</span> <input type="radio" value="'.$ArrayOptionC[$ques].'" name="answer'.$ques.'">
                                            <span>'.$ArrayOptionC[$ques].'</span> </label>
                                        <label> <span class="opt">d</span> <input type="radio" value="'.$ArrayOptionD[$ques].'" name="answer'.$ques.'">
                                            <span>'.$ArrayOptionD[$ques].'</span> </label>
                                        </div>';}
                                    echo'</div>';
                    
                                
                 }
                 if(empty($error)){
                    $b = "noerror";
                 }
                 else {

                 echo $error[0];
                 echo "<a href='logout.php'>Please logout</a>";
                 echo   '<div class="tab-pane wizard-ctn" id="'.$qlink.'"><br><br><br><br><br><br><br><br>';

                     
                 }


                 
           ?>
            
            <div class="wizard-action-pro">
                <ul class="wizard-nav-ac">

                    <li>
                        <a class="button-first a-prevent" href="#"><i class="fa fa-caret-left"></i></a>
                    </li>

                    <li>
                        <a class="button-previous a-prevent" href="#"><i class="fa fa-chevron-left"></i></a>
                    </li>

                    <li>
                        <a class="button-next a-prevent" href="#"><i class="fa fa-chevron-right"></i></a>
                    </li>

                    <li>
                        <a class="button-last a-prevent" href="#"><i class="fa fa-caret-right"></i></a> 
                    </li>

                    <li>
                        <button name="submit" >submit</button>
                    </li>
                </ul>
            </div>
            </form>
        </div>
    </div>
    <!-- Playlist section end -->



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


    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap1.min.js"></script>


    <!--  wizard JS
		============================================ -->
    <script src="js/wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="js/wizard/wizard-active.js"></script>

</body>

</html>