<?php
session_start();
include '../include/connect.php';
$incre=0;
$incre2=0;
$x=1;
$first="";
$y=0;
$z=0;
$qqry="select * from item_cat";
$qqry_ex=mysql_query($qqry);
$num=mysql_num_rows($qqry_ex);
while($qqry_val=mysql_fetch_array($qqry_ex))
{
	$z++;
	if($y==0)
	{
		$y=1;
		$first=$qqry_val['item_cat'];
	}
	if($incre!=1)
	{
		if($qqry_val['item_cat']==$_SESSION['item_cat'])
		{
			$incre=1;
		}
	}
	else
	{
		$_SESSION['item_cat']=$qqry_val['item_cat'];
		if($incre==1)
		{
			$incre2=1;
		}
	}
	if($incre2==1)
	{
		break;
	}


	if($num==$z)
	{
		$_SESSION['item_cat']=$first;
	}
}
header('Location:../items.php');
?>