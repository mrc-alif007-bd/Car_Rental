
<?php include("inc/db_config.php");
$car_name = $_REQUEST['name'];
$car_id = $_REQUEST['id'];
$car_price = $_REQUEST['price'];
session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class=""><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">

	<title>National Cab - Taxi Company HTML5 Template</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="images//favicon.ico" />

	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images//apple-touch-icon-114x114-precomposed.png">

	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images//apple-touch-icon-72x72-precomposed.png">

	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="images//apple-touch-icon-57x57-precomposed.png">

	<!-- Library - Loader CSS -->
	<link rel="stylesheet" type="text/css" href="libraries/loader/loaders.min.css">

	<!-- Library - Google Font Familys -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100italic,100,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Library - Bootstrap v3.3.5 -->
	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/bootstrap-datetimepicker.min.css">

	<!-- Font Icons -->
	<link rel="stylesheet" type="text/css" href="libraries/fonts/font-awesome.min.css">

	<!-- Library - OWL Carousel V.2.0 beta -->
	<link rel="stylesheet" type="text/css" href="libraries/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="libraries/owl-carousel/owl.theme.css">

	<!-- Library - FlexSlider v2.5.0 -->
	<link rel="stylesheet" type="text/css" href="libraries/flexslider/flexslider.css">

	<!-- Library - Animate CSS -->
	<link rel="stylesheet" type="text/css" href="libraries/animate/animate.min.css">

	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/navigation-menu.css">

	<!-- Custom - Theme CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/shortcodes.css">

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div><!-- Loader /- -->

	<a id="top"></a>
	<!-- Main Container -->
	<div class="main-container">
		<!-- Header -->
		<?php include("inc/navbar.php"); ?>
		<!-- Header /- -->

		<!-- Banner Section -->
		<div id="page-banner" class="page-banner blog-banner container-fluid no-padding">
			<div class="page-heading">
				<h3>Online Taxi Booking</h3>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li class="active"><a href="#">Booking</a></li>
				</ol>
			</div>
		</div><!-- Banner Section /- -->

		<!-- Page Content -->
		<div class="container-fluid no-padding page-content book-taxi-online-form">
			<!-- Page Content -->
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<!-- Blog Area -->
				<!-- Blog Area -->
				<div class="col-md-9 blog-area">
					<div class="section-header">
						<h3>Book Your Taxi Online</h3>
					</div>

					<!-- Online Booking Form -->
					 
					<?php
					if (isset($_POST['submit'])) {
						extract($_POST);
						$c_name = $_SESSION['name'];
						$c_email = $_SESSION['email'];
						$sql = "INSERT INTO bookings VALUES(NULL, '$car_id', '$car_name', '$pick_date', '$drop_date', '$car_price', 'Pendding', NULL)";
						$record = $db->query($sql); 
                        echo '<div class="alert alert-success text-center" style="margin-top:20px;">
            <i class="fa fa-check-circle"></i> <strong>Success!</strong> Booking Successful.
          </div>';
					}
					
					?>

					<form class="online-booking-form row" method="post">

						<h4>Booking Details</h4>

						<div class="form-group col-md-6">
							<label for="">NID Number</label><br>
							<input type="text" class="form-control" name="nid" id="">
						</div>

						<div class="form-group col-md-6">
							<label>Drop Date</label><br>
							<input type="date" class="form-control" name="drop_date" id="">
						</div>

						<div class="form-group col-md-6">
							<label>Pickup Address</label>
							<textarea name="pick_address" class="form-control" rows="5" required></textarea>
						</div>

						<div class="form-group col-md-6">
							<label>Drop Address</label>
							<textarea name="drop_address" class="form-control" rows="5" required></textarea>
						</div>

						<div class="form-group col-md-6">
							<label>Pickup Date</label>
							<input
								class="form-control"
								type="date"
								name="pick_date"
								required />
						</div>

						<div class="form-group col-md-6">
							<label>Payment Method</label>
							<select class="form-control" name="pay_method" required>
								<option value="">Select Payment Method</option>
								<option value="Debit">Debit</option>
								<option value="Credit">Credit</option>
								<option value="Online">Online</option>
							</select>
						</div>

						<div class="form-group col-md-6">
							<button type="submit" name="submit" class="btn btn-primary">Book</button>
						</div>

						<div class="form-group col-md-12">
							<input type="checkbox" required>
							<span>I agree to the Terms & Conditions</span>
						</div>
					</form>
				</div>


				<!-- Widget Area -->
				<div class="col-md-3 widget-area">
					<aside class="widget search-widget">
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="SEARCH">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</aside>
					<!-- Categories Widget -->
					<aside class="widget categories-widget">
						<div class="widget-title">
							<h3>Categories</h3>
						</div>
						<ul class="categories-type">
							<li>Taxi<span>09</span></li>
							<li>Party Contract<span>52</span></li>
							<li>Interstate Tour<span>36</span></li>
							<li>Reservation<span>78</span></li>
							<li>Cab<span>66</span></li>
							<li>Luxury Car<span>15</span></li>
						</ul>
					</aside><!-- Categories Widget/- -->
					<!-- Recent Post -->
					<aside class="widget recent-post">
						<div class="widget-title">
							<h3>Recent Post</h3>
						</div>
						<div class="recent-post-box">
							<div class="recent-title col-md-8 col-sm-10 col-xs-8 no-padding">
								<a href="#">poor mountaineer barely kept his family</a>
								<p>July 07, 2015</p>
							</div>
							<div class="recent-img col-md-4 col-sm-2 col-xs-4 no-padding">
								<a href="#"><img src="images/widget/recent/recent-1.jpg" alt="recent-1" /></a>
							</div>
						</div>
						<div class="recent-post-box">
							<div class="recent-title col-md-8 col-sm-10 col-xs-8 no-padding">
								<a href="#">card attached would say thank you for being</a>
								<p>July 07, 2015</p>
							</div>
							<div class="recent-img col-md-4 col-sm-2 col-xs-4 no-padding">
								<a href="#"><img src="images/widget/recent/recent-2.jpg" alt="recent-2" /></a>
							</div>
						</div>
						<div class="recent-post-box">
							<div class="recent-title col-md-8 col-sm-10 col-xs-8 no-padding">
								<a href="#">tell me how to get how to get to Sesame Street</a>
								<p>July 07, 2015</p>
							</div>
							<div class="recent-img col-md-4 col-sm-2 col-xs-4 no-padding">
								<a href="#"><img src="images/widget/recent/recent-3.jpg" alt="recent-3" /></a>
							</div>
						</div>
					</aside><!-- Recent Post/- -->
					<!-- Widget Tags -->
					<aside class="widget widget-tags">
						<div class="widget-title">
							<h3>popular tags</h3>
						</div>
						<div class="tags-content">
							<a href="#" title="Amazing">Amazing</a>
							<a href="#" title="Envato">Envato</a>
							<a href="#" title="Themes">Themes</a>
							<a href="#" title="Clean">Clean</a>
							<a href="#" title="Responsiveness">Responsiveness</a>
							<a href="#" title="SEO">SEO</a>
							<a href="#" title="Mobile">Mobile</a>
							<a href="#" title="IOS">IOS</a>
							<a href="#" title="Flat">Flat</a>
							<a href="#" title="Design">Design</a>
						</div>
					</aside><!-- Widget Tags/- -->
					<!-- Widget Flicker -->
					<aside class="widget widget-flicker">
						<div class="widget-title">
							<h3>flickr stream</h3>
						</div>
						<div class="flickr-item">
							<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=121438098@N03"></script>
						</div>
					</aside><!-- Widget Flicker/- -->
					<!-- Widget Archives -->
					<aside class="widget widget-archives">
						<div class="widget-title">
							<h3>archives</h3>
						</div>
						<ul class="archives-contnet">
							<li><a href="#"><span>11</span>March 2015</a></li>
							<li><a href="#"><span>36</span>January 2015</a></li>
							<li><a href="#"><span>18</span>December 2015</a></li>
							<li><a href="#"><span>11</span>September 2015</a></li>
							<li><a href="#"><span>20</span>August 2014</a></li>
							<li><a href="#"><span>12</span>July 2014</a></li>
						</ul>
					</aside><!-- Widget Archives/- -->
				</div><!-- Widget Area/- -->
			</div><!-- Container/- -->
			<div class="section-padding"></div>
		</div><!-- Page Content/- -->

		<!-- <footer>-->
		<?php include("inc/footer.php"); ?>
		<!--</footer> -->

	</div><!-- Main Container -->
	<!-- JQuery v1.11.3 -->
	<script src="js/jquery.min.js"></script>

	<!-- Library - Modernizer -->
	<script src="libraries/modernizr/modernizr.js"></script>

	<!-- Library - Bootstrap v3.3.5 -->
	<script src="libraries/bootstrap/bootstrap.min.js"></script><!-- Bootstrap JS File v3.3.5 -->
	<script src="libraries/bootstrap/bootstrap-datetimepicker.min.js"></script><!-- Bootstrap JS File v3.3.5 -->

	<!-- jQuery Easing v1.3 -->
	<script src="js/jquery.easing.min.js"></script>

	<!-- Library - jQuery.appear -->
	<script src="libraries/appear/jquery.appear.js"></script>

	<!-- Library - OWL Carousel V.2.0 beta -->
	<script src="libraries/owl-carousel/owl.carousel.min.js"></script>

	<!-- jQuery For Number Counter -->
	<script src="libraries/number/jquery.animateNumber.min.js"></script>

	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

	<!-- Library - FlexSlider v2.5.0 -->
	<script defer src="libraries/flexslider/jquery.flexslider.js"></script>

	<!-- Library - Theme JS -->
	<script src="js/functions.js"></script>
</body>

</html>