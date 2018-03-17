<?php

include('config.php');
include('session.php');
$a = "";
if(isset($_SESSION['username']))
{
    $a = $_SESSION['username'];
}

	

?>
<!doctype html>
<html lang="en">

<head>
    <title>Profile | Falcon Square</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
<!--    <link rel="stylesheet" href="assets/css/demo.css">-->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
    </style>
</head>
<body>
<form method="post">
	<!-- WRAPPER -->
	<div id="">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div style="width: 250px;height: 50px;margin-top: -20px" class="brand">
                <a href="index.php"><img src="assets/img/finallogo.png" alt="Klorofil Logo" class="img-responsive"></a>
            </div>
            <div class="container-fluid">

                <div id="navbar-menu" class="toggled">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png"
                                                                                            class="img-circle"
                                                                                            alt="Avatar">
                                <span><?php echo $a; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a>
                                </li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <!--                            <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>-->
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>




		
		<div style="margin-top: 5%" class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
										<h3 class="name"><?php echo $a?></h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Total customer</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Total visits</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Positive</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->

								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">

                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">Basic Info</h4>
                                        <ul class="list-unstyled list-justify">
                                            <li>Birthdate <span>24 Aug, 2016</span></li>
                                            <li>Mobile <span>(124) 823409234</span></li>
                                            <li>Email <span><?php echo $a?>@fsmanagers.com</span></li>
                                            <li>Website <span><a href="http://www.falconsqr.com/">www.falconsqr.com</a></span></li>
                                        </ul>
                                    </div>
                                    <div class="profile-info">
                                        <h4 class="heading">Social</h4>
                                        <ul class="list-inline social-icons">
                                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="profile-info">
                                        <h4 class="heading">About</h4>
                                        <p>Interactively fashion excellent information after distinctive outsourcing.</p>
                                    </div>
                                    <!--<div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>-->
                                </div>
<!--								<h4 class="heading">--><?php //echo $a?><!--'s Awards</h4>-->
<!--								<!-- AWARDS -->
<!--								<div class="awards">-->
<!--									<div class="row">-->
<!--										<div class="col-md-3 col-sm-6">-->
<!--											<div class="award-item">-->
<!--												<div class="hexagon">-->
<!--													<span class="lnr lnr-sun award-icon"></span>-->
<!--												</div>-->
<!--												<span>Most Bright Idea</span>-->
<!--											</div>-->
<!--										</div>-->
<!--										<div class="col-md-3 col-sm-6">-->
<!--											<div class="award-item">-->
<!--												<div class="hexagon">-->
<!--													<span class="lnr lnr-clock award-icon"></span>-->
<!--												</div>-->
<!--												<span>Most On-Time</span>-->
<!--											</div>-->
<!--										</div>-->
<!--										<div class="col-md-3 col-sm-6">-->
<!--											<div class="award-item">-->
<!--												<div class="hexagon">-->
<!--													<span class="lnr lnr-magic-wand award-icon"></span>-->
<!--												</div>-->
<!--												<span>Problem Solver</span>-->
<!--											</div>-->
<!--										</div>-->
<!--										<div class="col-md-3 col-sm-6">-->
<!--											<div class="award-item">-->
<!--												<div class="hexagon">-->
<!--													<span class="lnr lnr-heart award-icon"></span>-->
<!--												</div>-->
<!--												<span>Most Loved</span>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>


	</div>
</form>
    <?php
    include('footer.php');
    ?>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
