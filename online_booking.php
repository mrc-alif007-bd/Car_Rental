<?php include("inc/db_config.php");
$car_name = $_REQUEST['name'];
$car_id = $_REQUEST['id'];
$car_price = $_REQUEST['price'];
session_start(); ?>
<!DOCTYPE html>
<html class=""><head>
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

    <style>
        .online-booking-form input, .online-booking-form .input-group select, .online-booking-form select, .online-booking-form textarea {

    color: #000000ff !important;
}
    </style>
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
    <div id="site-loader" class="load-complete">
        <div class="loader">
            <div class="loader-inner ball-clip-rotate">
                <div></div>
            </div>
        </div>
    </div><a id="top"></a>
    <div class="main-container">
        <?php include("inc/navbar.php"); ?>
        <div id="page-banner" class="page-banner blog-banner container-fluid no-padding">
            <div class="page-heading">
                <h3>Online Taxi Booking</h3>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active"><a href="#">Booking</a></li>
                </ol>
            </div>
        </div><div class="container-fluid no-padding page-content book-taxi-online-form">
            <div class="section-padding"></div>
            <div class="container">
                <div class="col-md-9 blog-area">
                    <div class="section-header">
                        <h3>Book Your Taxi Online</h3>
                    </div>

                    <?php
                    if (isset($_POST['submit'])) {
                        extract($_POST);
                        $c_name = $_SESSION['name'];
                        $c_id = $_SESSION['user_id'];
                        
                        $invoice_id = 'INV-' . mt_rand(100000, 999999); 
                        $sql = "INSERT INTO bookings (car_id, client_name, client_id, nid, start_date, end_date, pick_address, drop_address, total_amount, booking_status, invoice_id) 
                                VALUES('$car_id', '$c_name', '$c_id', '$nid', '$pick_date', '$drop_date', '$pick_address', '$drop_address', '$car_price', 'Pendding', '$invoice_id')";
                        
                        $record = $db->query($sql);
                        
                        echo '<div class="alert alert-success text-center" style="margin-top:20px;">
                                <i class="fa fa-check-circle"></i> <strong>Success!</strong> Booking Successful. Your Invoice ID is: <strong>'.$invoice_id.'</strong>
                            </div>';
                    }

                    ?>

                    <form xz class="online-booking-form row" method="post">

                        <h4>Booking Details</h4>

                        <div class="form-group col-md-6">
                            <label for="">NID Number</label><br>
                            <input type="text" class="form-control" name="nid" id="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Pickup Date</label>
                            <input class="form-control" type="date" name="pick_date" required />
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

                        

                        

                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-primary">Book</button>
                            <div class="form-group col-md-6">
                            
                            <button type="submit" ><a href="admin/dashboard_cleint.php">go to your dashboard</a></button>
                        </div>
                        </div>

                        
                    </form>
                </div>


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
                    </aside><aside class="widget recent-post">
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
                    </aside></div></div><div class="section-padding"></div>
        </div><?php include("inc/footer.php"); ?>
        </div><script src="js/jquery.min.js"></script>

    <script src="libraries/modernizr/modernizr.js"></script>

    <script src="libraries/bootstrap/bootstrap.min.js"></script><script src="libraries/bootstrap/bootstrap-datetimepicker.min.js"></script><script src="js/jquery.easing.min.js"></script>

    <script src="libraries/appear/jquery.appear.js"></script>

    <script src="libraries/owl-carousel/owl.carousel.min.js"></script>

    <script src="libraries/number/jquery.animateNumber.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

    <script defer src="libraries/flexslider/jquery.flexslider.js"></script>

    <script src="js/functions.js"></script>
</body>

</html>