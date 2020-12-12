<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Student Signin</title>
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
    <?php
		include 'includes/menu.php'
	?>
    <!-- Header section end -->

   
    <div class="section-title">
        <h2>Student login</h2>
    </div>
    <div class="section"></div>
    <!--Login section -->
    <div class="control-me ">
        <?php
				if(isset($_POST['submit']))
				{
					$dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
					if(mysqli_connect_error()){
						die('Database Faild'.mysqli_connect_error());
					}
					$email = $_POST['email'];
					$matric = $_POST['matric'];


					$emailArray = array();
					$matricArray = array();
					$department = array();
					$level = array();
					$dbquery = "SELECT * FROM student_db WHERE email='$email' AND matric='$matric'";
					$dbresulted = mysqli_query($dbconnect, $dbquery);

					while($row = mysqli_fetch_array($dbresulted)){
						$emailArray[] = $row['email'];
                        $matricArray[] = $row['matric'];
                        $id = $row['id'];
                        $department[] = $row['department'];
                        $level[] = $row['level'];
					}
					if(empty($matricArray) && empty($emailArray)){
						echo "<h5 class='error'>invalid login details<h5>";
					}
					elseif($matricArray[0] === $matric && $emailArray[0] === $email)
					{
						$_SESSION['logged'] = true;
                        $_SESSION['idcard'] = $id;
                        $_SESSION['idDepartment'] = $department[0];
                        $_SESSION['idLevel'] = $level[0];
						header("Location:studentProfile.php");
					}
					
					}

			?>
        <form class="contact-from" action="" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <input type="email" placeholder="Your e-mail" name="email" required>
                </div>
                <div class="col-md-12">
                    <input type="text" placeholder="Your matric" name="matric" required>
                </div>
                <div class="col-md-12">
                    <button class="site-btn" name="submit">log in</button>
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