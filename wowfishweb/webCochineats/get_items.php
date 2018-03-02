<?php
include ('session.php');
include ('config.php');


	//include('../session.php');
	//include('../include/connect.php');
	

	//$item_cat = $_SESSION['item_cat'];
	//$a = $_SESSION['a'];
	//$b = $_SESSION['b'];
	
/*	$var=$_GET['val'];
	if(isset($var))
	{
		$getname=mysql_query("select item,unit_price from item_master where itm_code='".$var."'")or die(mysql_error());
		$acc_id_val=mysql_fetch_array($getname);
		$iname=$acc_id_val['item'];
		$unit_price=$acc_id_val['unit_price'];
	}*/
	$iname=$_GET['val'];
$item_cat=$_GET['vala'];
	//$table=$a;
	//$chair=$b;
	
	if(!key_exists($item_cat,$_SESSION['main']))
	{
		$_SESSION['main'][$item_cat][$iname] = "1";
	}
	else
	{
		if(isset($_SESSION['main'][$item_cat][$iname]))
		{
			$_SESSION['main'][$item_cat][$iname]++;
		}
		else
		{
			$_SESSION['main'][$item_cat][$iname]="1";
		}
	}




	
//	echo "<pre>";
//	print_r($_SESSION['main']);
//	echo "</pre>";
?>