<?php

include ('config.php');
session_start();
if(isset($_POST['login'])){


    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        // get a product from products table
        $result = mysqli_query($con,"SELECT * FROM `add_user` WHERE  username='$username' AND password = '$password'");

        if (!empty($result)) {
            // check for empty result
            if (mysqli_num_rows($result) > 0) {


                $resultOne = mysqli_fetch_array($result);

                $_SESSION['username']=$resultOne["name"];
                $_SESSION['sid']=$resultOne["user_id"];
                $_SESSION['aid']="0";
                $_SESSION['eid']="0";


            } else {
                // no product found

                $resultTwo = mysqli_query($con,"SELECT * FROM `add_lead` WHERE  username='$username' AND password = '$password'");

                if (!empty($resultTwo)) {
                    // check for empty result
                    if (mysqli_num_rows($resultTwo) > 0) {

                        $resultThree = mysqli_fetch_array($resultTwo);
                       // $curnt_date = date("Y-m-d");
                        //$response["users"] = array();
                        $_SESSION['username']=$resultThree["name"];
                        $_SESSION['sid']=$resultThree["sid"];
                        $_SESSION['aid']=$resultThree["aid"];
                        $_SESSION['eid']=$resultThree["id"];



                    } else {
                        $resultFour = mysqli_query($con,"SELECT * FROM `admin` WHERE  username='$username' AND password = '$password'");

                        if (!empty($resultFour)) {
                            // check for empty result
                            if (mysqli_num_rows($resultFour) > 0) {
                                $response["success"] = 1;
                                $response["message"] = "Successfully Sign in";

                                $resultFive = mysqli_fetch_array($resultFour);
                                $curnt_date = date("Y-m-d");

                                $_SESSION['username'] = $resultFive["name"];
                                $_SESSION['sid'] = $resultFive["sid"];
                                $_SESSION['aid'] = $resultFive["id"];
                                $_SESSION['eid'] = "0";

                            } else {
                                echo "<script>alert('INVALID Username and Password')</script>";
                            }

                        }else {
                            // no product found
                            echo "<script>alert('INVALID Username and Password')</script>";
                        }
                    }
                } else {
                    // no product found
                    echo "<script>alert('INVALID Username and Password')</script>";
                }

            }
        } else {
            echo "<script>alert('INVALID Username and Password')</script>";


        }
    } else {
        echo "<script>alert('Required field(s) is missing')</script>";

    }




}


if(isset($_SESSION['username']))
{
	
	if($_SESSION['eid'] =="0" && $_SESSION['aid'] =="0"){
    header("location: dashboard.php");
	}else if($_SESSION['eid'] =="0"){
        header("location: sdashboard.php");
	}else{
        header("location: employeedashboard.php");
    }
}

?>


<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | FALCON SQUARE</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
<!--	<link rel="stylesheet" href="assets/css/demo.css">-->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img style="height: 100px;width: 250px" src="assets/img/finallogo.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form method="post" class="form-auth-small" action="index.php">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" class="form-control" id="signin-email" name="username" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password"  placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" name="login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
<!--								<div class="bottom">-->
<!--									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>-->
<!--								</div>-->
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
<!--                            <img align="center" style="width: 250px;height: 125px;margin-left: 25%" src="assets/img/finallogo.png">-->
							<h1 style="color: white;font-weight: normal;text-align: center" class="heading">    CUSTOMER RELATIONSHIP MANAGEMENT</h1>
							<p style="text-align: center">by</p>
                            <p style="text-align: center;color: white;font-weight: normal;margin-top: 10px">FALCON SQUARE</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
