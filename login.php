<!DOCTYPE html>
<html lang="en">
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
<body class="hold-transition login-page">
<div class="login-box">
  <?php if(isset($_POST['login'])){
    include_once("inc/db_config.php");
    extract($_POST);
    $password = md5($password);
    $sql = "SELECT * FROM admin WHERE username ='$email' AND password ='$password'";
    $record = $db->query($sql);
    $row = $record->fetch_assoc();
    //echo $record->num_rows;
    if($record->num_rows > 0){
      session_start();
      $_SESSION['loggedin'] = TRUE ;
      $_SESSION['email'] = $email ;
      $_SESSION['name'] = $row['name'] ;
      $_SESSION['photo'] = $row['photo'] ;

      header("Location:admin/dashboard.php");
    }
    else{
      //echo $record->num_rows;
    }
  } 
  ?>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>LOGIN Form</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

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
