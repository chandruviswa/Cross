<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"select id,name from add_user where user_name='".$user_check."'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['name'];
if(!isset($login_session))
{
	mysqli_close($con);
	header('Location: index.php');  
}
?>