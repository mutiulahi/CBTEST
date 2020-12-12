<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('Location:index.php');
}
//db connection
$dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
    if(mysqli_connect_error()) {
        die('Database Faild'.mysqli_connect_error());
    }
    // session that identify lecturer
    $idUploader = $_SESSION['identityP'];
    $idSubject = $_SESSION['subj'];
    $idLevel = $_SESSION['level'];
    $idDepartment = $_SESSION['department'];

    $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
    $queryIdentity = "SELECT * FROM question_details WHERE lecturer = '$idUploader' AND level = '$idLevel' AND department = '$idDepartment' AND subject= '$idSubject'";
       $identityQuery = mysqli_query($dbconnect, $queryIdentity);
       while ($row = mysqli_fetch_array($identityQuery)) {
           $uploaders[] = $row['lecturer'];
           $subject[] = $row['subject'];
           $level[] = $row['level'];
           $department[] = $row['department'];
           $NumQuestion[] = $row['numberQues'];
           $seasion[] = $row['seasion'];
           
       } 

//select the que

    $uploadedQuestion = "SELECT COUNT(id) FROM questionupload WHERE uploaders = '$idUploader' AND level = '$idLevel' AND department = '$idDepartment' AND course_code = '$idSubject' ";
    $numQuery = mysqli_query($dbconnect, $uploadedQuestion);
    while ($num = mysqli_fetch_array($numQuery)) {
        $numberUploadedQ = $num[0];
         if($numberUploadedQ >=0){
            $numberUploadedQ= $numberUploadedQ +1;
                               
         }
    }
    

             
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>CBTEST</title>
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

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Notika icon CSS
		============================================ -->

    <link rel="stylesheet" href="style.css">



    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder
    <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="index.html" class="site-logo">
            <img src="img/logo.png" alt="">
        </a>
        
        <ul class="main-menu">
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>
		</ul>

    </header>
    <!-- Header section end -->
    <div class='nav-question'>

 <span><a href="">Home /</a>Upload</span> 

</div>
        <?php
        
        
            if(isset($_POST['submit'])) {
                $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                if(mysqli_connect_error()) {
                    die('Database Faild'.mysqli_connect_error());
                }
                

                $nameUploader = $uploaders[0];
                $Uploadedseasion = $seasion[0]; 
                $nameSubject = $subject[0];
                $nameLevel = $level[0];
                $nameDepartment = $department[0];
                
                $numberID = $nameLevel.'_'.$nameDepartment.'_'.$nameSubject;

               for ($pst=$numberUploadedQ; $pst<=$NumQuestion[0]; $pst++) { 

                $ques []= $_POST['question'.$pst.''];
                $optionA[] = $_POST['OptionA'.$pst.''];
                $optionB[] = $_POST['OptionB'.$pst.''];
                $optionC[] = $_POST['OptionC'.$pst.''];
                $optionD[] = $_POST['OptionD'.$pst.''];
                $answer[] = $_POST['answer'.$pst.''];
                
               }
               $counter = 0;
               $total = sizeof($ques);
               while ($counter <= $total) {

                   if (!empty($ques[$counter]) ){
                            $passedQuestions = $ques[$counter];
                            $passedOptionsA = $optionA[$counter];
                            $passedOptionsB = $optionB[$counter];
                            $passedOptionsC = $optionC[$counter];
                            $passedOptionsD = $optionD[$counter];
                            $answerP = $answer[$counter];

                            // $answer = $answer[$counter];
                            $queryQ = "INSERT INTO questionupload (questionID, seasion, uploaders, questions, optionA, optionB, optionC, optionD, 
                            level, department, course_code, answers) VALUES('$numberID', '$Uploadedseasion', '$nameUploader','$passedQuestions',
                             '$passedOptionsA', '$passedOptionsC', '$passedOptionsC', '$passedOptionsD', '$nameLevel',
                              '$nameDepartment', '$nameSubject' ,'$answerP')";
                    if(mysqli_query($dbconnect, $queryQ)) {
                        echo"<script type=\"text/javascript\"> 
                            alert(\"Successful !\");
                            window.location = \"uploadQues.php\"</script>";
                    }
                   }
                   $counter = $counter+1;
                   
               }
           
                
            }

        ?>
    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-pro wizard-cts-st">
                    <ul>
                        <?php                    
						for($i=$numberUploadedQ; $i<=$NumQuestion[0]; $i++)
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
                 for($q=$numberUploadedQ; $q<=$NumQuestion[0]; $q++) {

                     $qlink = "tab".$q;
                
                    
                     echo   '<div class="tab-pane wizard-ctn" id="'.$qlink.'">
                                <form  action="uploadQues.php" method="POST">
                                    <div class="row question-from">
                                        <div class="col-md-8 " style="margin-left: 16%;">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="question'.$q.'" id="" cols="10" rows="50" style="height:200px"
                                                    placeholder="Type Question"  ></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionA'.$q.'" placeholder="Option A"  >
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionB'.$q.'" placeholder="Option B"  >
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionC'.$q.'" placeholder="Option C"  >
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionD'.$q.'" placeholder="Option D"  >
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="answer'.$q.'" placeholder="Enter correct answer"  >
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>';
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