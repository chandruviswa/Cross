
<?php
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
    <title>Dashboard | FALCON SQUARE</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <!--    <link rel="stylesheet" href="assets/css/demo.css">-->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
<div id="wrapper">

    <nav style="height: 50px;" class="navbar navbar-default navbar-fixed-top">
        <div style="width: 250px;background-color: #252c35   ;height: 5px;margin-top: -20px" class="brand">
            <a  href="index.php"><img style="height: 40px;width: 120px" src="assets/img/w_logo.png" alt="Klorofil Logo" class="img-responsive"></a>
        </div>
        <div style="background-color: #252c35   ;height: 61px;" >
            <div style="margin-top: -10px" class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">

                    <li style="margin-top: -10px" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo  $a;?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                            <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                            <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="sdashboard.php"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

<!--                    <li><a href="staff.php" class=""><i class="lnr lnr-code"></i> <span>Staff management</span></a></li>-->
                    <li><a href="slead.php" class=""><i class="lnr lnr-code"></i> <span>Employee management</span></a></li>
                    <li><a href="branchreport.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Report management</span></a></li>
                    <li><a href="branchsales.php" class=""><i class="lnr lnr-cog"></i> <span>Sales management</span></a></li>
                    <li><a href="productlist.php" class=""><i class="lnr lnr-dice"></i> <span>Product management</span></a></li>
                    <li><a href="quotationlist.php" class=""><i class="lnr lnr-alarm"></i> <span>Quotation management</span></a></li>
                    <li><a href="taskmanagement.php" class=""><i class="lnr lnr-cloud-sync"></i> <span>Target management</span></a></li>
                    <li><a href="taskmanage.php" class=""><i class="lnr lnr-clock"></i> <span>Task management</span></a></li>

                </ul>
            </nav>



        </div>
    </div>
</div>
</body>