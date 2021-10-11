<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Student Login</title>
		<meta name="keywords" content="HTML5,CSS3,Template" />
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/superslides.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" /><!-- orange: default style -->
		<!--<link id="css_dark_skin" href="assets/css/layout-dark.css" rel="stylesheet" type="text/css" />--><!-- DARK SKIN -->
		
		
	</head>
	<body><!-- Available classes for body: boxed , pattern1...pattern10 . Background Image - example add: data-background="assets/images/boxed_background/1.jpg"  -->
	<header id="topNav">
			<div class="container">

				<!-- Mobile Menu Button -->
				<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Logo text or image -->
				<a class="logo scrollTo" href="#wrapper">
					<img src="assets/images/logo.png" alt="Atropos" />
				</a>

				<!-- Top Nav -->
				<div class="navbar-collapse nav-main-collapse collapse pull-right">
					<nav class="nav-main mega-menu">
						<ul class="nav nav-pills nav-main scroll-menu" id="topMain">
							<li class="dropdown">
								<a class="dropdown-toggle" href="index.php#subject">
									Subject <i class="fa fa-angle-down"></i>
								</a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="index.php#about">
									About Us <i class="fa fa-angle-down"></i>
								</a>								
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="index.php#teacher">
									About Teacher <i class="fa fa-angle-down"></i>
								</a>								
							</li>
							<li class="dropdown active">
								<a class="dropdown-toggle" href="#">
									Sign Up <i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="signup-student.php">Student</a></li>
									<li><a href="signup-staff.php">Staff</a></li>
								</ul>
							</li>
							<li class="dropdown active">
								<a class="dropdown-toggle" href="#">
									Log In <i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="login-student.php">Student</a></li>
									<li><a href="login-teacher.php">Teacher</a></li>
									<li><a href="login-admin.php">Admin</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
				<!-- /Top Nav -->

			</div>
		</header>

		<div class="special-page container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="center-box">
						
						<h1 >
							<b>PUSAT TUISYEN ANJUNG FIRASAT</b>
							
						</h1>
						<h2>
							STUDENT <b>LOGIN</b>
						</h2>

						<div class="row text-left">
							<div class="col-md-12">
								<form name="studentloginform" action="sql-login-student.php" method="post">
									<div align="center">
										<h4>Student ID</h4>
									
										<input type="text" name="id" class="form-control"><br>
									
										<h4>Password</h4>

										<input type="Password" name="pass" class="form-control">
									</div>
									<br>
									<div align="center">
										<a href="signup-student.php" class="btn btn-primary">Sign Up</a>

										<input type="submit" name="login" value="Login" class="btn btn-primary">
										
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>


		<section id="slider" class="nomargin-top fixed full-screen" data-autoplay="9000"><!-- data-autoplay = 'false' or miliseconds. Eg.: 5s = '5000' -->
			<ul class="slides-container">
				<li>
					<span class="overlay"></span>
					<div style="background-image: url('assets/images/cover_2.jpg');" class="fullscreen-img"></div>
				</li>
				<li>
					<span class="overlay"></span>
					<div style="background-image: url('assets/images/cover_1.jpg');" class="fullscreen-img"></div>
				</li>
				<li>
					<span class="overlay"></span>
					<div style="background-image: url('assets/images/cover_3.jpg');" class="fullscreen-img"></div>
				</li>
				<li>
					<span class="overlay"></span>
					<div style="background-image: url('assets/images/cover_4.jpg');" class="fullscreen-img"></div>
				</li>
			</ul>
		</section>
			


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript" src="assets/plugins/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery.cookie.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery.appear.js"></script>
		<script type="text/javascript" src="assets/plugins/jquery.isotope.js"></script>
		<script type="text/javascript" src="assets/plugins/masonry.js"></script>

		<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="assets/plugins/stellar/jquery.stellar.min.js"></script>
		<script type="text/javascript" src="assets/plugins/knob/js/jquery.knob.js"></script>
		<script type="text/javascript" src="assets/plugins/superslides/dist/jquery.superslides.min.js"></script>
		

		<script type="text/javascript" src="assets/js/scripts.js"></script>


		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
		<!--<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-XXXXX-X', 'domainname.com');
			ga('send', 'pageview');
		</script>
		-->

	</body>
</html>