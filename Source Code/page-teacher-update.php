<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<?php $id = $_GET['id'];?>
		<title>Page-Teacher-Update</title>
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
		<link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/superslides.css" rel="stylesheet" type="text/css" />

		<!-- REVOLUTION SLIDER -->
		<link href="assets/plugins/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" />

		<!-- Morenizr -->
		<script type="text/javascript" src="assets/plugins/modernizr.min.js"></script>
	</head>
	<body background="assets/images/coverpage4.jpg">
		<!-- TOP NAV -->
		<header id="topNav">
			<div class="container">

				<!-- Mobile Menu Button -->
				<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Logo text or image -->
				<a class="logo scrollTo" href="#wrapper">
					<img src="assets/images/logo.png"/>
				</a>

				<!-- Top Nav -->
				<div class="navbar-collapse nav-main-collapse collapse pull-right">
					<nav class="nav-main mega-menu">
						<ul class="nav nav-pills nav-main scroll-menu" id="topMain">
							<li class="active"><a href="page-teacher-details.php?id=<?php echo $id;?>">Teacher Details</a></li>
							<li><a href="index.php">Log Out</a></li>
						</ul>
					</nav>
				</div>
				<!-- /Top Nav -->


			</div>
		</header>

		<span id="header_shadow"></span>
		<!-- /TOP NAV -->

		<!-- WRAPPER -->
		<div id="wrapper">

			<div class="padding60">

				<!-- PAGE TITLE -->

				<section class="container">

					<div class="row">

						<?php
		                    include "dbconnect.php";
	                    		$sql = "SELECT * FROM staff s JOIN teacher t ON (t.sta_id = s.sta_id) WHERE t.sta_id = :sta_id ";
								$result = oci_parse($c,$sql);
								oci_bind_by_name($result,':sta_id',$id);
								oci_execute($result);
	                    	 	while($row = oci_fetch_array($result)){
		                   	?>

							<h2 align="center"><b>Update Teacher's Details</b></h2>

							<form name="teachersignupform" action="sql-page-teacher-update.php?id=<?php echo$id; ?>" method="post">
									<div class="col-md-6">
										Full Name<input type="text" name="stname" class="form-control" required="required" value="<?php echo $row['STA_NAME']?>"><br>

										IC Number<input type="text" name="stic" class="form-control" required="required" value="<?php echo $row['STA_IC']?>"><br>

										Email<input type="text" name="stemail" class="form-control" required="required" value="<?php echo $row['STA_EMAIL']?>"><br>

										Address<textarea name="staddress" class="form-control" required="required"><?php echo $row['STA_ADDRESS']?></textarea><br>

										School Name<input type="text" name="tcrschoolname" class="form-control" value="<?php echo $row['TEA_SCHOOL']?>"><br>

									</div>
									<div class="col-md-6">
										Phone Number<input type="text" name="stphone" class="form-control" required="required" value="<?php echo $row['STA_TELNUM']?>"><br>
										

										Teacher Highest Certificate
										<input type="text" name="tcrcertid" class="form-control" required="required" value="<?php echo $row['TEA_CERT']?>"><br>

										
									</div>

										<input type="button" value="Back" onclick="history.back()" class="btn btn-primary">

										<input type="submit" name="Submit" value="Update" class="btn btn-primary">
									</div>
									<br>
								</form>
							<?php }?>
						<!-- /LOGIN -->
					</div>
					<!-- /PASSWORD -->

					</div>

				</section>

			</div>
		</div>
		<!-- /WRAPPER -->


		<!-- FOOTER -->
		<footer>
			<!-- copyright , scrollTo Top -->
			<div class="footer-bar">
				<div class="container">
					<span class="copyright">Copyright &copy; Pusat Tuisyen Anjung Firasat . All Rights Reserved.</span>
					<a class="toTop" href="#topNav">BACK TO TOP <i class="fa fa-arrow-circle-up"></i></a>
				</div>
			</div>
			<!-- copyright , scrollTo Top -->

			<!-- footer content -->
			<div class="footer-content">
				<div class="container">

					<div class="row">

						<!-- FOOTER CONTACT INFO -->
						<div class="column col-md-6">
							CONTACT <strong>US</strong><br><br>

							<address class="font-opesans">
								<ul>
									<li class="footer-sprite address">
										No.3, Jalan Seri Duyong 1/2,<br>
										Ayer Molek 75460,<br>
										Melaka, Malaysia.<br>
									</li>
									<li class="footer-sprite phone">
										Tel	: 06-9681107<br>
										Fax : 06-8961107<br>
									</li>
									<li class="footer-sprite email">
										<a href="mailto:hadriizz@gmail.com">hadriizz@gmail.com</a>
									</li>
								</ul>
							</address>
						</div>
						<div class="column col-md-6">
								<ul>
									<p class="text-justify">ABOUT <strong>US</strong><br/><br/>Tuisyen Anjung Firasat is an established tuition center since the year 2006. Now, they have one kindergarten in Kandang Duyong that called Tadika Anjung Firasat. The tuition center provides classes that cover primary school as well as secondary school’s subjects (Year 1-6, Form 1-5). The classes are available on weekdays after school-hour as well as on weekends. Tuisyen Anjung Firasat offers various subjects that are set to be at their highest standards for creating high-quality students. The founder of these company is Mr. Halili bin Harun and he is a specialist in Science subject.</p>
								</ul>
							</div>
						<!-- /FOOTER CONTACT INFO -->

					</div>

				</div>
			</div>
			<!-- footer content -->

		</footer>
		<!-- /FOOTER -->



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
		<script type="text/javascript" src="assets/plugins/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="assets/plugins/superslides/dist/jquery.superslides.min.js"></script>
		<script type="text/javascript" src="assets/plugins/styleswitcher/styleswitcher.js"></script><!-- STYLESWITCHER - REMOVE ON PRODUCTION/DEVELOPMENT -->
		<script type="text/javascript" src="assets/plugins/mediaelement/build/mediaelement-and-player.min.js"></script>
		
		<!-- REVOLUTION SLIDER -->
		<script type="text/javascript" src="assets/plugins/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="assets/plugins/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="assets/js/slider_revolution.js"></script>

		<script type="text/javascript" src="assets/js/scripts.js"></script>

		<!-- ONEPAGE NAVIGATION -->
		<script type="text/javascript" src="assets/plugins/jquery.nav.min.js"></script>
		<script type="text/javascript">
			jQuery('#topMain').onePageNav({
				currentClass: 'active',
				changeHash: false,
				scrollSpeed: 750,
				scrollThreshold: 0.5,
				filter: ':not(.external)',
				easing: 'easeInOutExpo'
			});
		</script>



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