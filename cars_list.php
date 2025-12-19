<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<?php include("inc/db_config.php"); ?>
<!DOCTYPE html>
<html class="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>National Cab - Taxi Company HTML5 Template</title>

	<link rel="icon" type="image/x-icon" href="images//favicon.ico" />

	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="libraries/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- 🔧 FIX FOR GAPS -->
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
</head>

<body>

	<div class="main-container">

		<div class="container-fluid no-padding car-list">
			<div class="section-padding"></div>

			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
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
	<script src="libraries/bootstrap/bootstrap.min.js"></script>

</body>
</html>
