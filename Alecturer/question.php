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
    <!-- Page Preloder -->
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
            <div class="user-panel">
                <a href="" class="submit">SUBMIT</a>
            </div>
        </div>

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


    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-pro wizard-cts-st">
                    <ul>
                        <?php
                        $dbconnect = mysqli_connect('localhost', 'root', '', 'cbt');
                        if(mysqli_connect_error()) {
                            die('Database Faild'.mysqli_connect_error());
                        }
                        $queryQuestion = "SELECT id FROM questionupload WHERE                                              nnnnnnnnnnnnnnnnnnnnnnnnnnnbnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn         nbnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn";
						for($i=1; $i<=60; $i++)
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
            <div class="tab-pane wizard-ctn" id="tab1">
                <p>11Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>


                <div class="options">
                    <label> <span class="opt">a</span> <input type='radio' value='$enter' name='$post_passed'>
                        <span>ndfkjknvksnvn</span> </label>
                    <label> <span class="opt">b</span> <input type='radio' value='$enter' name='$post_passed'>
                        <span>ndfkjknvksnvn</span> </label>
                    <label> <span class="opt">c</span> <input type='radio' value='$enter' name='$post_passed'>
                        <span>ndfkjknvksnvn</span> </label>
                    <label> <span class="opt">d</span> <input type='radio' value='$enter' name='$post_passed'>
                        <span>ndfkjknvksnvn</span> </label>
                </div>
            </div>
            <div class="tab-pane wizard-ctn" id="tab2">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit,
                    vel ornare augue. Nullam eu est malesuada.</p>
            </div>
            <div class="tab-pane wizard-ctn" id="tab3">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit,
                    vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed
                    sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
            </div>
            <div class="tab-pane wizard-ctn" id="tab4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit,
                    vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed
                    sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
            </div>
            <div class="tab-pane wizard-ctn" id="tab5">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit,
                    vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed
                    sit amet massa venenatis, tristique orci sed, eleifend arcu.</p>
            </div>
            <div class="tab-pane wizard-ctn" id="tab6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit.
                </p>
            </div>
            <div class="tab-pane wizard-ctn" id="tab7">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit,
                    vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed
                    sit amet massa venenatis, tristique orci sed, eleifend arcuRBBBB7.</p>
            </div>
            <div class="tab-pane wizard-ctn" id="tab8">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus purus sapien,
                    cursus et egestas at, volutpat sed dolor. Aliquam sollicitudin dui ac euismod
                    hendrerit. Phasellus quis lobortis dolor. Sed massa massa, sagittis nec
                    fermentum eu, volutpat non lectus. Nullam vitae tristique nunc. Aenean vel
                    placerat augue. Aliquam pharetra mauris neque, sitan amet egestas risus semper
                    non. Proin egestas egestas ex sed gravida. Suspendisse commodo nisl sit amet
                    risus volutpat volutpat. Phasellus vitae turpis a elit tinciduntansan ornare.
                    Praesent non libero quis libero scelerisque eleifend. Ut eleifend laoreet
                    vulputate.</p>
                <p class="wizard-mg-ctn">Duis eu eros vitae risus sollicitudin blandit in non nisi.
                    Phasellus rhoncus ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet
                    velit. Nam a scelerisque justo, id tristique diam. Aenean ut vestibulum velit,
                    vel ornare augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed
                    sit amet massa venenatis, tristique orci sed, eleifend arcuRBBBB8.</p>
            </div>
            <div class="wizard-action-pro">
                <ul class="wizard-nav-ac">
                    <li><a class="button-first a-prevent" href="#"><i class="fa fa-caret-left"></i></i></a>
                    </li>
                    <li><a class="button-previous a-prevent" href="#"><i class="fa fa-chevron-left"></i></i></a></li>
                    <li><a class="button-next a-prevent" href="#"><i class="fa fa-chevron-right"></i></a></li>
                    <li><a class="button-last a-prevent" href="#"><i class="fa fa-caret-right"></i></a>
                    </li>
                </ul>
            </div>
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