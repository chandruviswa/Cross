<?php
include('include/connect.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysql_query("select user_id,user_name from add_user where user_name='".$user_check."'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['user_name'];
if(!isset($login_session))
{
	mysql_close($connection);  
	header('Location: index.php');  
}
?>