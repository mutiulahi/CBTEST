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


    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <!-- Page Preloder
    <div id="preloder">
        <div class="loader"></div>
    </div>
 -->
    <!-- Header section -->
    <?php
		include 'includes/menu.php'
	?>
    <!-- Header section end -->

    <!-- Playlist section -->
    <div class="section-tile">
        <h2>Student login</h2>
    </div>
    <div class="section"></div>
    <!--Login section -->
    <div class="control-me col-md-6">
        <?php
			
					$dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
					if(mysqli_connect_error()){
						die('Database Faild'.mysqli_connect_error());
					}
                    include "PHPExcel/IOFactory.php";
                    $html = "<table border='1'>";
                    $objPHPExcel = PHPExcel_IOFactory::load('C:\xampp\htdocs\cBT\Book.xlsx');
                    foreach ($objPHPExcel ->getWorksheetIterator() as $worksheet)
                    {
                        $highestRow = $worksheet->getHighestRow();
                        for ($row=2; $row<=$highestRow; $row++)
                        {
                            $html.="<tr>";
                            $name = mysqli_real_escape_string($dbconnect, $worksheet->getCellByColumnRow(0, $row)-> getValue());
                            $email = mysqli_real_escape_string($dbconnect, $worksheet->getCellByColumnRow(0, $row)-> getValue());
                            $age = mysqli_real_escape_string($dbconnect, $worksheet->getCellByColumnRow(0, $row)-> getValue());
                            $sql = "INSERT INTO test (name, email, age) VALUES ('$name', '$email','$age')";
                            mysqli_query($dbconnect,$sql);
                            $html .='<td>'.$name.'</td>';
                            $html .='<td>'.$email.'</td>';
                            $html .='<td>'.$age.'</td>';
                            $html .="</tr>";

                        }
                    } 
                    $html .='</table>';
                    echo $html;
                    echo '<br/>Data'; 
                    


					
		?>
        <form class="question-from" action="" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <textarea name="question" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="">Select </label>
                    <select name="" id="">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-12">
                    <input type="file" placeholder="Your matric" name="matric" required>
                </div>
                <div class="col-md-12">
                    <button class="site-btn" name="submit">start exam</button>
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