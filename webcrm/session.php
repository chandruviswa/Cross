<?php
include('config.php');
session_start();
$user_check=$_SESSION['username'];
$ses_sql=mysqli_query($con,"select user_id,username from add_user where name='".$user_check."'" );
$row = mysqli_fetch_array($ses_sql);
$login_session =$row['username'];
if(empty($login_session)){
    $query=mysqli_query($con,"select id,username from add_lead where name='".$user_check."'" );
    $rows = mysqli_fetch_array($query);
    $login_session =$rows['username'];

    if(empty($login_session)){
        $queryOne=mysqli_query($con,"select id,username from admin where name='".$user_check."'" );
        $rowso = mysqli_fetch_array($queryOne);
        $login_session =$rowso['username'];
    }

}


if(!isset($login_session))
{


	mysql_close($con);
	header('Location: index.php');  
}
?>