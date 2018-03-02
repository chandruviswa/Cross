<?php
include('include/connect.php');
session_start(); 
	$error='';
if(isset($_POST['submit'])) 
{
	if(empty($_POST['user_name']) || empty($_POST['password']))
	{
	$error = "Username or Password is invalid";
	}
	else
	{
		$username=$_POST['user_name'];
		$password=$_POST['password'];
        $curnt_date = date("Y-m-d");
        $current_time=date("H:i:s");

        $current_timeOne=date("12:00:00");

        if ( $current_time<  $current_timeOne)
        {
            $shift_id = "1";
        }
        else
        {
            $shift_id = "2";
        }
		
		//$qry=mysql_query("SELECT COUNT(det_id) as counts FROM shift_details where closing_date=''");
		//$num_rows = mysql_fetch_array($qry);
		//if($num_rows['counts']==1)
		//{
			$query = mysql_query("select * from add_user where password='".$password."' AND user_name='".$username."'", $connection);
			$rows = mysql_num_rows($query);
			if($rows == 1) 
			{

                $rowval=mysql_fetch_array($query);
			    $shiftQuery=mysql_query("SELECT * FROM `shift_details` WHERE (emp_id='".$rowval['emp_id']."' or shift_id='". $shift_id ."') and (opening_date='". $curnt_date ."' and closing_date='".$curnt_date."') limit 0,1");
			    $shiftarry=mysql_fetch_array($shiftQuery);
			    if(empty($shiftarry)){
                    $_SESSION['login_user']=$username;

                    $_SESSION['user_id']=$rowval['emp_id'];
                }else{
			        echo "<script>alert('Today shift Already closed');</script>";
                }

				
				//header("location: wform.php"); 
			} 
			else 
			{
				$error = "Username or Password is invalid";
			}
			//mysql_close($connection);  
		//}
		//else
		//{
		//	$error = "Cashier NOT LOGGED IN";
		//}
		mysql_close($connection); 
	}
}
else
{
	//session_destroy();
}
if(isset($_SESSION['login_user']))
{
		header("location: shift_preview.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="user-scalable=yes, width=device-width" />

<title>FS_CANTEEN</title>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="animate/animate.min.css">
<style>

input[type=text] {
width:210px;

margin-top:8px;
border:1px solid #fff;

font-size:20px;
font-family:raleway;
color:#fff;
background-image:url(images/user.png);
background-position: 7px 7px;
background-repeat: no-repeat;
padding-left:-3%;
margin-right: auto;
margin-bottom: 0;
margin-left: auto;
background-color:transparent;
font-weight:bold;
}
input[type=password]{
width:210px;
padding:10px;
margin-top:8px;
border:1px solid #fff;
padding-left:5px;
font-size:20px;
font-family:raleway;
color:#fff;
background-image:url(images/pass.png);
background-position: 7px 7px;
background-repeat: no-repeat;
padding-left:30px;
margin-right: auto;
margin-bottom: 0;
margin-left: auto;
background-color:transparent;
font-weight:bold;
}

</style>

    <style>
        form {
            margin-top: 10%;
            /*border: 3px solid #f1f1f1;*/
        }

        input[type=text], input[type=password] {
            align-content: center;
            text-align: center;
            width: 20%;
            padding: 12px 30px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: white;
        }

        button {
            background-color: #256AE3;
            color: white;
            padding: 14px 30px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            width: 10%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;

        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>

</head>

<body class="animated slideInLeft" style="background: url(images/bgfine.png)" >
<!---->
<!--<div class="top-content" style="text-align:center;">-->
<!--        	-->
<!--            <div class="inner-bg">-->
<!--                <div class="container" style="width:100%;">-->
<!--                    <div class="row">-->
<!--                        <div class="col-sm-8 col-sm-offset-2 text">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-sm-6 col-sm-offset-3 form-box" style="width:100%; margin-left:0%;">-->
<!--                        	<div class="form-top">-->
<!--                        		<div class="form-top-left">-->
<!--                        		</div>-->
<!--                        		<div class="form-top-right">-->
<!--                        			<i class="fa fa-key"></i>-->
<!--                        		</div>-->
<!--                            </div>-->
<!--                            <div class="form-bottom">-->
<!--                            <img id="cir" src="images/finallogo.png"  alt="Logo" width="150" height="150">-->
<!--			                    <form role="form" action="" method="post" class="login-form">-->
<!--			                    	<div class="form-group">-->
<!--                                   		<label class="sr-only" for="form-username">Username</label>-->
<!--			                        	<input type="text" required="required" autofocus="autofocus" name="user_name" placeholder="Username..." class="form-username form-control" id="form-username">-->
<!--                                        <i class="fa fa-user form-control-feedback"></i>-->
<!--			                        </div>-->
<!--			                        <div class="form-group">-->
<!--			                        	<label class="sr-only" for="form-password">Password</label>-->
<!--			                        	<input type="password" required="required" name="password" placeholder="Password..." class="form-password form-control" id="form-password">-->
<!--			                        </div>-->
<!--			                        <button type="submit" name="submit" class="btn btn-success" style=" font-size:20px; border-color:#fff; color:#000000; width:210px; font-weight:bold;">Login</button>-->
<!--                                    <br/><span style="color:#FFF; font-weight:bold; font-size:16px;">--><?php //echo $error; ?><!--</span>-->
<!--			                    </form>-->
<!--		                    </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--        </div>-->


<form role="form" action="" method="post" class="login-form">
    <div class="imgcontainer">
        <img src="images/finallogo.png" alt="Avatar" class="avatar">
        <div style="" class="container">
        <label style="color: #256AE3"><b>Username</b></label>
        <input  style="color: #256AE3" type="text" placeholder="Username" class="form-username form-control" autofocus="autofocus" name="user_name"  required>

        <label style="color: #256AE3"><b>Password</b></label>
        <input type="password" required="required" name="password" style="color: #256AE3" placeholder="Password" class="form-username form-control" required>
        <div style="clear: both"></div>

        <button  type="submit" name="submit" >Login</button>
        <br/><span style="color:#FFF; font-weight:bold; font-size:16px;"><?php echo $error; ?></span>
        </div>
    </div>





<!--    <div class="container" style="background-color:#f1f1f1">-->
<!--        <button  type="button" class="cancelbtn">Cancel</button>-->
<!--        <span class="psw">Forgot <a href="#">password?</a></span>-->
<!--    </div>-->
</form>

</body>
</html>