<?php
include('include/connect.php');
session_start(); 


$error='';
if(isset($_POST['submit'])) {
if(empty($_POST['user_name']) || empty($_POST['password'])){
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['user_name'];
$password=$_POST['password'];

$query = mysql_query("select * from add_user where password='".$password."' AND user_name='".$username."'", $connection);
$rows = mysql_num_rows($query);
if($rows == 1) {
$_SESSION['login_user']=$username; 
$rowval=mysql_fetch_array($query);
$_SESSION['user_id']=$rowval['emp_id'];
//header("location: wform.php"); 
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection);   
}
}
?>