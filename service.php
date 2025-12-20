<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<?php include("inc/db_config.php"); ?>
<!DOCTYPE html>
<html class=""><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">

	<title>National Cab - Taxi Company HTML5 Template</title>

	<link rel="icon" type="image/x-icon" href="images//favicon.ico" />

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images//apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images//apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images//apple-touch-icon-57x57-precomposed.png">

	<link rel="stylesheet" type="text/css" href="libraries/loader/loaders.min.css">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100italic,100,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/bootstrap-datetimepicker.min.css">

	<link rel="stylesheet" type="text/css" href="libraries/fonts/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="libraries/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="libraries/owl-carousel/owl.theme.css">

	<link rel="stylesheet" type="text/css" href="libraries/flexslider/flexslider.css">

	<link rel="stylesheet" type="text/css" href="libraries/animate/animate.min.css">

	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/navigation-menu.css">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/shortcodes.css">

	<!-- 🔧 GAP FIX (ONLY ADDITION) -->
	<style>
		.car-list .choose-us-box {
			height: 420px;
			margin-bottom: 30px;
			text-align: center;
		}

		.car-list .choose-us-box img {
			width: 100%;
			height: 200px;
			object-fit: cover;
		}

		.car-list .row::after {
			content: "";
			display: block;
			clear: both;
		}
	</style>

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">

	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div>

	<a id="top"></a>

	<div class="main-container">

		<?php include("inc/navbar.php"); ?>

		<div id="page-banner" class="page-banner faq-banner container-fluid no-padding">
			<div class="page-heading">
				<h3>Service</h3>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active"><a href="#">Our Services</a></li>
				</ol>
			</div>
		</div>

		<div class="container-fluid no-padding car-list">
			<div class="section-padding"></div>

			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3>Our Fleet</h3>
						<h2>Available Cars</h2>
						<img src="images/icon/title-separator.png" alt="separator">
					</div>
				</div>

				<div class="row" style="margin-top:30px;">

					<?php
					$sql = "SELECT * FROM cars WHERE status = 'available' ORDER BY car_id DESC";
					$rawData = $db->query($sql);
					while ($row = $rawData->fetch_object()):
					?>
						<div class="col-md-4 col-sm-6">
							<div class="choose-us-box">
								<img src="admin/<?php echo $row->image ?>" class="img-responsive">
								<h4><?php echo $row->car_name ?></h4>
								<p><?php echo $row->status ?></p>
								<h4><?php echo $row->rent_price ?></h4>
								<a href="online_booking.php?name=<?php echo $row->car_name ?>&id=<?php echo $row->car_id ?>&price=<?php echo $row->rent_price ?>"
								   class="btn btn-warning"
								   onclick="<?php if (!isset($_SESSION['cleint_login'])) {
										echo "alert('Please Login First'); return false;";
								   } ?>">
									Book Now
								</a>
							</div>
						</div>
					<?php
					endwhile;
					$db->close();
					?>
				</div>
			</div>

			<div class="section-padding"></div>
		</div>

		<?php include("inc/footer.php"); ?>

	</div>

	<script src="js/jquery.min.js"></script>
	<script src="libraries/modernizr/modernizr.js"></script>
	<script src="libraries/bootstrap/bootstrap.min.js"></script>
	<script src="libraries/bootstrap/bootstrap-datetimepicker.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="libraries/appear/jquery.appear.js"></script>
	<script src="libraries/owl-carousel/owl.carousel.min.js"></script>
	<script src="libraries/number/jquery.animateNumber.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<script defer src="libraries/flexslider/jquery.flexslider.js"></script>
	<script src="js/functions.js"></script>

</body>
</html>
