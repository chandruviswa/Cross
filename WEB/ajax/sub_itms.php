<?php
	include('../session.php');
	include('../include/connect.php');
	
	$item_cat = $_SESSION['item_cat']; 
	$a = $_SESSION['a'];
	$b = $_SESSION['b'];
	
	/*$var=$_GET['val'];
	if(isset($var))
	{
		$getname=mysql_query("select item from item_master where itm_code='".$var."'")or die(mysql_error());
		$acc_id_val=mysql_fetch_array($getname);
		$iname=$acc_id_val['item'];
	}*/
	$iname=$_GET['val'];
	$table=$a;
	$chair=$b;
	if(!key_exists($item_cat,$_SESSION['main'][$table][$chair]))
	{
		$_SESSION['main'][$table][$chair][$item_cat][$iname] = "0";
	}
	else
	{	
		if(isset($_SESSION['main'][$table][$chair][$item_cat][$iname]))
		{
			if($_SESSION['main'][$table][$chair][$item_cat][$iname]>0)
			{
				$_SESSION['main'][$table][$chair][$item_cat][$iname]--;
			}
			else
			{
				$_SESSION['main'][$table][$chair][$item_cat][$iname]=0;
			}
		}
		/*else
		{
			$_SESSION['main'][$table][$chair][$item_cat][$iname]['qty']="0";
		}*/
	}
	echo "<pre>";
	print_r($_SESSION['main']);
	echo "</pre>";
?>