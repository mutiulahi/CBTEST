<?php
session_start();
$dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
    if(mysqli_connect_error()) {
        die('Database Faild'.mysqli_connect_error());
    }
    $uploadedQuestion = "SELECT COUNT(id) FROM questionupload";
    $numQuery = mysqli_query($dbconnect, $uploadedQuestion);
    while ($num = mysqli_fetch_array($numQuery)) {
        $numberUploadedQ = $num[0];
         if($numberUploadedQ >=0){
            $numberUploadedQ= $numberUploadedQ +1;
                                
         }
    }
    
    $queryQuestion = "SELECT numberQues FROM question_details";
    $numQuery = mysqli_query($dbconnect, $queryQuestion);
    while ($row = mysqli_fetch_array($numQuery)) {
        $NumQuestion = $row['numberQues'];
                                
        }
   

        $uploader = array();
        $numberQues = array();
        $subject = array();
        $level = array();
        $department = array();
        $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
        $queryIdentity = "SELECT * FROM question_details WHERE lecturer = 'Tescode'";
           $identityQuery = mysqli_query($dbconnect, $queryIdentity);
           while ($row = mysqli_fetch_array($identityQuery)) {
               $uploaders[] = $row['lecturer'];
               $numberQues[] = $row['numberQues'];
               $subject[] = $row['subject'];
               $level[] = $row['level'];
               $department[] = $row['department'];
               
           }       
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>SolMusic | HTML Template</title>
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
			<li><a href="options">Home</a></li>
			<li><a href="#">Upload Questions</a></li>
			<li><a href="blog.html">Edit Question</a></li>
			<li><a href="contact.html"> <i class="fa fa-sign-out"></i> Log out</a></li>
		</ul>

    </header>
    <!-- Header section end -->

    <!-- Playlist section
	 <div class="wizard-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wizard-wrap-int">
                        <div class="wizard-hd">
                            <h2>Wizard</h2>
                            <p>This twitter bootstrap plugin builds a wizard out of a formatter tabable structure. It
                                allows to build a wizard functionality using buttons to go through the different wizard
                                steps and using events allows to hook into each
                                step individually.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class='nav-question'>

 <span><a href="">Home /</a>Upload</span> 

</div>
        <?php
        
        
            if(isset($_POST['submit'])) {
                $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                if(mysqli_connect_error()) {
                    die('Database Faild'.mysqli_connect_error());
                }
                $ques = array();
                $optionA = array();
                $optionB = array();
                $optionC = array();
                $optionD = array();
                $answer = array();
                $pass = array();
                
               for ($pst=$numberUploadedQ; $pst<=$NumQuestion; $pst++) { 

                $ques []= $_POST['question'.$pst.''];
                $optionA = $_POST['OptionA'.$pst.''];
                $optionB = $_POST['OptionB'.$pst.''];
                $optionC = $_POST['OptionC'.$pst.''];
                $optionD = $_POST['OptionD'.$pst.''];
                $answer = $_POST['answer'.$pst.''];
                
               }
               
               foreach ($ques as $input){
                   if (!empty($input)){
                            $pass[] = $input;
                            $queryQ = "INSERT INTO questionupload (questions) VALUES('$input')";
                    if(mysqli_query($dbconnect, $queryQ)) {
                        echo'done';
                        // echo"<script type=\"text/javascript\"> 
                        //     alert(\"Successful !\");
                        //     window.location = \"uploadQues.php\"</script>";
                    }
                   }
                   
               }
               echo sizeof($pass);
            //    for ($ps=0; $ps<=3; $ps++) {
            //    $pls =  $ques[$ps];
            //    $queryQ = "INSERT INTO questionupload (questions) VALUES('$pls')";
            //         if(mysqli_query($dbconnect, $queryQ)) {
            //             echo'done';
            //             // echo"<script type=\"text/javascript\"> 
            //             //     alert(\"Successful !\");
            //             //     window.location = \"uploadQues.php\"</script>";
            //         }
            //    }
                
            //    print_r($ques);
                

                // $uploader = $_POST['uploader'];
                // $subject = $_POST['subject'];
                // $level = $_POST['level'];
                // $dapartment = $_POST['dapartment'];
                // foreach($optionA as $key=> $inputOptionA){
                //     foreach($optionB as $key=> $inputOptionB){
                //         foreach($optionC as $key=> $inputOptionC) {
                //             foreach($optionD as $key=> $inputOptionD){
                //                 $queryQ = "INSERT INTO questionupload (questions, optionA) VALUES('$ques','$optionA')";
                //                 if(mysqli_query($dbconnect, $queryQ)) {
                //                     echo"<script type=\"text/javascript\"> 
                //                     alert(\"Successful !\");
                //                     window.location = \"uploadQues.php\"</script>";
                //                 }
                //             }
                //         }
                //     }
                // }
                // foreach( $ques as $inputQues ){    
                //     $queryQ = "INSERT INTO questionupload (questions) VALUES('$inputQues')";
                //                     if(mysqli_query($dbconnect, $queryQ)) {
                //                         // echo"<script type=\"text/javascript\"> 
                //                         // alert(\"Successful !\");
                //                         // window.location = \"uploadQues.php\"</script>";
                //                     }
                    
                // }
                
            }

        ?>
    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-pro wizard-cts-st">
                    <ul>
                        <?php                    
						for($i=$numberUploadedQ; $i<=$NumQuestion; $i++)
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
                 for($q=$numberUploadedQ; $q<=$NumQuestion; $q++) {

                     $qlink = "tab".$q;
                 
                    
                     echo   '<div class="tab-pane wizard-ctn" id="'.$qlink.'">
                                <form  action="uploadQues.php" method="POST">
                                    <div class="row question-from">
                                        <div class="col-md-8 " style="margin-left: 16%;">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="question'.$q.'" id="" cols="10" rows="50" style="height:200px"
                                                    placeholder="Type Question"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionA'.$q.'" placeholder="Option A">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionB'.$q.'" placeholder="Option B">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionC'.$q.'" placeholder="Option C">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="OptionD'.$q.'" placeholder="Option D">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="answer'.$q.'" placeholder="Enter correct answer">
                                            </div>

                                            <div class="col-md-12">
                                                <input type="text" class="form-control col-md-3" style="padding-left: 10px; font-size:12px;" name="uploader'.$q.'" value="'.$uploaders[0].'" disabled>
                                                <input type="text" class="form-control col-md-3" style="padding-left: 10px; font-size:12px;" name="subject" value="'.$subject[0].'" disabled>
                                                <input type="text" class="form-control col-md-3" style="padding-left: 10px; font-size:12px;" name="level" value="'.$level[0].'" disabled>
                                                <input type="text" class="form-control col-md-3" style="padding-left: 10px; font-size:12px;" name="department" value="'.$department[0].'" disabled>
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