<?php
error_reporting(0);
include('session.php');
include('include/connect.php');
	$a = "";
	$b = "";
	 $t = "";
	 $item_cat = "";
	if(isset($_POST['t'])){
		$_SESSION['ta'] ='1';
		$_SESSION['tb'] =$_POST['t'];
		$a=$_SESSION['ta'];
		$b =$_SESSION['tb'];
		
	}
	if(isset($_POST['item_cat']))
	 {
		 $_SESSION['titem_cat']=$_POST['item_cat']; 
		  $item_cat =$_SESSION['titem_cat'];
		   $_SESSION['tempCat']=$_POST['item_cat'];
	 }
	//finish order code
	
	if(isset($_POST['clear_all']))
	{
		$_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]='';unset($_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]);
	}
	date_default_timezone_set("Asia/Kolkata");
	
	
	
	if(isset($_POST['billUpdatetakes']))
	{
		echo "<script>alert('success')</script>";
		if(isset($_SESSION['user_id']) && isset($_SESSION['tBILLA']) && isset($_SESSION['tBILLB']))
		{
			
		$upstatus=mysql_query("UPDATE `takeaway` SET  `status` =  'Paid' WHERE  tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."'");
	}
	}
	
	
	
	if(isset($_POST['cashier']))
	{
		
		//$user=$_POST['user'];
//$mobile=$_POST['mobile'];
$tableId="";
$chairId="";
$salesID="";

		if(isset($_SESSION['user_id']) && isset($_SESSION['ta']) && isset($_SESSION['tb']))
		{
		
		//echo "<script>alert('success')</script>";
		        $tableId=$_SESSION['ta'];
				$chairId=$_SESSION['tb'];
				$salesID=$_SESSION['user_id'];
		//get tot amt without tax
		$ck2=mysql_query("select sum(amt) as amt from takeaway_details where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
		$ch2val=mysql_fetch_array($ck2);
		$ck2bill=$ch2val['amt'];
		
		//sum the taxs
		$sumtax=mysql_query("select sum(ser_tax) as service_tax, sum(vat) as vat_tax from takeaway where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
		$totservice=mysql_fetch_array($sumtax);
		$service_tax=$totservice['service_tax'];
		$vat_tax=$totservice['vat_tax'];
		
		$cash=$ck2bill+$service_tax+$vat_tax;
		//echo $ck2bill;
		
		//check the radio btn
		$upsubtot=mysql_query("update takeaway set sub_tot='".$ck2bill."', amt='".$ck2bill."', status='Unpaid', cash=0, card=0, buffet=0, credit_card=0, npb=0, rt=0 where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."' and sales_id='".$_SESSION['user_id']."'");
		
		//update kop_bill_detauils, past_bill, past_bill_details
		//$updateme=mysql_query("update kop_bill_details set full_print_status='1' where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
		
		//header('Location: cashier_bill.php');
		//$cust_edit=mysql_query("SELECT id,sum(amt) as amt FROM takeaway_details where sales_id='".$_SESSION['user_id']."' and tables='".$_SESSION['ta']."' and bill_no='0' and chair='".$_SESSION['tb']."'");
//$cust_edit_val=mysql_fetch_array($cust_edit);
//$bill_no=$cust_edit_val['id'];
//$amt=$cust_edit_val['amt'];
header("Location:takeaway_print.php?cust=1&&sales_id=".$salesID."&&table_id=".$tableId."&&chair_id=".$chairId."");

		$_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]='';unset($_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]);
		
	}
	}
	
	
	if(isset($_POST['kot']))
		
	
		{
			
			
			
			$full_amount_service=$_POST['full_amount_service'];
			$full_amount_vat=$_POST['full_amount_vat'];
								
			$acc_qry1=mysql_query("select eid from add_employee where designation='3'");
			$acc_id_val1=mysql_fetch_array($acc_qry1);
			$e_id=$acc_id_val1['eid'];
			
			$acc_qry2=mysql_query("select shift_id from shift_details where closing_date='' and closing_time=''");
			$acc_id_val2=mysql_fetch_array($acc_qry2);
			$shift=$acc_id_val2['shift_id'];
			$_SESSION['shifting']=$shift;
			
			$acc_qryz=mysql_query("select emp_id from shift_details where closing_date='' and closing_time=''");
			$acc_id_valz=mysql_fetch_array($acc_qryz);
			$e_id=$acc_id_valz['emp_id'];
			$_SESSION['eeid']=$e_id;
			
			$user_check=$_SESSION['login_user'];
			$acc_qry3=mysql_query("select emp_id from add_user where user_name='".$user_check."'");
			$acc_id_val3=mysql_fetch_array($acc_qry3);
			$sales_id=$acc_id_val3['emp_id'];
			$_SESSION['sales']=$sales_id;
			$code.="";
			$quantity.="";					
			$bill_no=null;
			
			
				foreach($_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']] as $value)
				{
					$unit_price=0;
					$full_print_status=0;
					$kop_bill_status=0;
					
					foreach($value as $key=>$value2)
					{	
						$totalval=0;
						$getname=mysql_query("select unit_price from item_master where itm_code='".$key."'")or die(mysql_error());
						$acc_id_val=mysql_fetch_array($getname);
						$unit_price=$acc_id_val['unit_price'];
						
						$getitem=mysql_query("select item,tax_cat,vat,cat from item_master where itm_code='".$key."'")or die(mysql_error());
						$acc_id_name=mysql_fetch_array($getitem);
						$item_nam=$acc_id_name['item'];
						
						$stax=$acc_id_name['tax_cat'];
						$vtax=$acc_id_name['vat'];
						$mycat=$acc_id_name['cat'];
						if($mycat==0)
						{
							$mycat="";
						}
						
						/*$se_tax=$unit_price*$stax/100;
						$va_tax=$unit_price*$vtax/100;*/
						
						$se_tax=$value2*$unit_price*$stax/100;
						$va_tax=$value2*$unit_price*$vtax/100;
												
						$totalval+=$value2 * $unit_price;					
						
						$myval=$totalval+$se_tax+$va_tax;
						//$myval=$unit_price+$se_tax+$va_tax;
						
						if(isset($value2) && $value2 !="" &&  $value2!= NULL &&  $value2!="0")
						{
							
							
	$add=mysql_query("insert into takeaway_details (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$_SESSION['ta']."','".$_SESSION['tb']."')");
	
	/* $add2=mysql_query("insert into kop_bill_details (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,ser_tax,vat_tax,service,vat,tot_amt,cat,full_print_status) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."',
	'".$stax."','".$vtax."','".$se_tax."','".$va_tax."','".$myval."','".$mycat."','".$full_print_status."')");	
	
	$add1=mysql_query("insert into kop_bill_print (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,kop_bill_status) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."','".$kop_bill_status."')");	
	
	$add3=mysql_query("insert into past_bill_print (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."')");	 */

						}
					}
				}


				if($add)
				{

					$bill_no='';$itm_code='';$item='';$unit='';$qty='';$amt='';$date='';
					$time='';$sales_id='';$e_id='';$shift='';$tables='';$chair='';

					unset($bill_no);unset($itm_code);unset($item);unset($unit);
					unset($qty);unset($amt);unset($date);unset($time);unset($sales_id);
					unset($e_id);unset($shift);unset($tables);unset($chair);
					
				}
				else
				{
			
				}

			$acc_qryq=mysql_query("select eid from add_employee where designation='3'");
			$acc_id_valq=mysql_fetch_array($acc_qryq);
			$e_id=$acc_id_valq['eid'];
			
			$acc_qryw=mysql_query("select shift_id from shift_details where closing_date='' and closing_time=''");
			$acc_id_vaw=mysql_fetch_array($acc_qryw);
			$shift=$acc_id_vaw['shift_id'];
			
			$user_checke=$_SESSION['login_user'];
			$acc_qryr=mysql_query("select emp_id from add_user where user_name='".$user_check."'");
			$acc_id_valr=mysql_fetch_array($acc_qryr);
			$sales_id=$acc_id_valr['emp_id'];
			
			$acc_qryz1=mysql_query("select emp_id from shift_details where closing_date='' and closing_time=''");
			$acc_id_valz1=mysql_fetch_array($acc_qryz1);
			$e_id=$acc_id_valz1['emp_id'];
			
			$bill=mysql_query("select * from takeaway where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
			$ck2=mysql_query("select sum(amt) as amt from past_bill_details where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
			
			$ch2val=mysql_fetch_array($ck2);
			$pbill=mysql_num_rows($bill);
			$ck2bill=$ch2val['amt'];
			
			$bill_no='';
			$full_amount_service=$_POST['full_amount_service'];
			$full_amount_vat=$_POST['full_amount_vat'];

			//sum the taxs
			$sumtax=mysql_query("select sum(ser_tax) as service_tax, sum(vat) as vat_tax from takeaway where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
			$totservice=mysql_num_rows($sumtax);
			$service_tax=$totservice['service_tax'];
			$vat_tax=$totservice['vat_tax'];
			
			$tot_service_tax=$service_tax+$full_amount_service;
			$tot_vat_tax=$vat_tax+$full_amount_vat;
			//$total_tax_amt=$full_amount_service+$full_amount_vat+$total_tax;
			$total_tax_amt=$tot_service_tax+$tot_vat_tax;	
			$ck2bill=round($ck2bill+$full_amount_service+$full_amount_vat);

		if($pbill<=0)
		{	
			$add=mysql_query("insert into takeaway  (bill_no,e_id,date,time,amt,sales_id,shift,tables,chair,ser_tax,vat,status) values('".$bill_no."','".$e_id."',CURDATE(),CURTIME(),'".$ck2bill."','".$sales_id."','".$shift."','".$_SESSION['ta']."','".$_SESSION['tb']."','".$full_amount_service."','".$full_amount_vat."','Unpaid')");
		}
		else
		{
			//sum the taxs
			$sumtax=mysql_query("select sum(ser_tax) as service_tax, sum(vat) as vat_tax from takeaway where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."'");
			$totservice=mysql_fetch_array($sumtax);
			$service_tax=$totservice['service_tax'];
			$vat_tax=$totservice['vat_tax'];
			
			$tot_service_tax=$service_tax+$full_amount_service;
			$tot_vat_tax=$vat_tax+$full_amount_vat;
			$total_tax_amt=$full_amount_service+$full_amount_vat+$total_tax;
			
			$ck2bill=round($ck2bill+$service_tax+$vat_tax);

			$add1=mysql_query("update takeaway set bill_no='".$bill_no."', e_id='".$e_id."', date=CURDATE(), time=CURTIME(), amt='".$ck2bill."', sales_id='".$sales_id."', shift='".$shift."', tables='".$_SESSION['ta']."', ser_tax='".$tot_service_tax."', vat='".$tot_vat_tax."' where bill_no='0' and tables='".$_SESSION['ta']."' and chair='".$_SESSION['tb']."' and sales_id='".$sales_id."'");
		}
		
		$_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]='';unset($_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]);
		}
	
	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="user-scalable=yes, width=device-width" />
<title>TAKE AWAY</title>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="animate/animate.min.css">
<script>
  function PrintDoc() 
	{
		//document.location.assign('index.php');
    }
</script>
<script>
//add Qty goes here...
var i = 0;
function buttonAdd1(x) {
	var x_n=x;
	get_itms(x_n);	
}
//sub Qty goes here...
function buttonSubtract1(x) {
	var x_n=x;
	sub_itms(x_n);
}
/*get_items code goes here*/

function get_itms(x)
{
	//document.location.assign('categories.php');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//document.location.assign('categories.php');
		}
	}
	xmlhttp.open("POST", "ajax/get_titems.php?val=" +x, true);
	xmlhttp.send();
}

function sub_itms(x)
{
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//document.location.assign('categories.php');
		}
	}
	xmlhttp.open("POST", "ajax/sub_titms.php?val=" +x, true);
	xmlhttp.send();
}

//search goes here

function overall_ser(x)
{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("ser").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST", "ajax/toverall_ajax.php?val=" +x.value, true);
	xmlhttp.send();
}

function post() {
     document.getElementById("myForm").reload();
	/* alert('sucess'); */

}
</script>
<style>
li
		{		
			list-style:none;
		}
		<!--body {font-family: "Lato", sans-serif;}-->
		body{
  background-color: #bdc3c7;
}

.tablink {
	margin-top:-1%;
    background-color: green;
    color: white;
	font-weight:bold;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 19px;
    width: 25%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content */
.tabcontent {
    color: white;
    display: none;
    padding: 50px;
    text-align: center;
}

#London {background-color:red;}
#Paris {background-color:green;}
#Tokyo {background-color:blue;}
#Oslo {background-color:orange;}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
   
    text-align: left;
    padding: 8px;
	width:33.33%
}


#box {
    max-width: 25em;
    height: 33em;
    background-color: #bdc3c7;
    overflow: auto;
    direction: ltr;
    text-align: justify;
}
#boxFive {
    max-width: 25em;
	 height: 33em;
    background-color: #bdc3c7;
    overflow: auto;
    direction: ltr;
    text-align: justify;
}
ul {
    columns: 2;
    -webkit-columns: 2;
    -moz-columns: 2;
}
.vox{
	background-color : green;
	min-width:25%;
	text-align:left;
	border: 1px solid #505050;
	padding:10px; 
	margin:10px
	border-color:transparent; 
	color:white;
font-weight:bold; font-size:18px;
}
.voxOne{
	background-color : #F3FF00;
	min-width:25%;
	text-align:left;
	border: 1px solid #505050;
	padding:10px; 
	margin:10px
	border-color:transparent; 
	color:black;
font-weight:bold; font-size:18px;
}
div#multicolumn1{
    -moz-column-count: 2;
    -moz-column-gap: 50%;
    -webkit-column-count: 2;
    -webkit-column-gap: 50%;
    column-count: 3;
    column-gap: 50%;
}
.column {
    float: left; 
	
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}





</style>

</head>

<body >
<div class="container navbar"  style="background-color:transparent; width:100%;">
    <div class="row" style="position: fixed; width: 100%; height: 50px;  top: 0; z-index: 1; ">
        <a href="tables.php"><span class="glyphicon glyphicon-arrow-left" style="margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>
        <a href="takeaway.php"><span class="" style="margin-left:10px;margin-top:5px; font-size:16px; color:#fff;background-color:green;border-radius : 5px;padding : 10px"> TABLE</a></span>
		<a href="takeaway.php"><span class="" style="margin-left:10px;margin-top:5px; font-size:16px; color:#fff;background-color:green;border-radius : 5px;padding : 10px">Restaurant</a></span>
		<input type="submit"   name="tableCurrent" id="taaable" 
 		    style="text-align:center;margin-right:15px;border: 0px solid #505050;width:5%; float:right; background-color:red; font-size:x-large; color:white; font-weight:bold; margin-left:0%;"  readonly="readonly" value="<?php echo $_SESSION['ta']."-".$_SESSION['tb'];?>" />
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="margin-right:10px;margin-top:5px; float:right; font-size:25px; color:#fff;"> </a></span>
        <a href="previous.php"><span class="glyphicon glyphicon-eye-open" style="margin-right:10px;margin-top:5px; float:right; font-size:25px; color:#fff;"> </a></span>
        <br/><br/><br/><h4 style="text-align:left; color:#fff; margin-top:-15px; font-weight:bold; font-size:18px;">  </h4>
    </div>
</div>
		
		<form method="post" role="form" action="" id="takeaway_frm">
		
		
		
		
		<input type="submit" style=" width: 60px;height:30px" id="chair" name=t value=<?php {echo "1";} ?>>
		<input type="submit" style=" width: 60px;height:30px;background-color:red" id="chair" name=t value=<?php {echo "2";} ?>>
		<input type="submit" style=" width: 60px;height:30px" id="chair" name=t value=<?php {echo "3";} ?>>
		<input type="submit" style=" width: 60px;height:30px" id="chair" name=t value=<?php {echo "4";} ?>>
		<input type="submit" style=" width: 60px;height:30px" id="chair" name=t value=<?php {echo "5";} ?>>
		
		
		<?php
$bendingBill=mysql_query("select bill_no,tables,chair from takeaway where status='Unpaid' ")or die(mysql_error());
if($bendingBill){
	while($rowss=mysql_fetch_array($bendingBill)){
		 //echo "<script>alert('success')</script>";
		
		 if($rowss['bill_no']==0){
			
			 
			 ?>
<input type="submit"   name="tableTemp" id="taable" 
 		    style="text-align:center;margin-right:15px;border: 0px solid #505050;width:5%; float:right; background-color:#F3FF00; font-size:x-large; color:white; font-weight:bold; margin-left:0%;"  readonly="readonly" value="<?php if(isset($rowss["tables"])){echo $rowss["tables"]."-".$rowss["chair"];}else{echo "0";}?>" />
			 <?php
			 
		 }else{
	?>	
	
	<input type="submit"   name="table" id="taable" 
 		    style="text-align:center;margin-right:15px;border: 0px solid #505050;width:5%; float:right; background-color:green; font-size:x-large; color:white; font-weight:bold; margin-left:0%;"  readonly="readonly" value="<?php if(isset($rowss["tables"])){echo $rowss["tables"]."-".$rowss["chair"];}else{echo "0";}?>" />
			
<?php
		 }
if(isset($_POST['table'])){
	
	$pieces = explode("-", $_POST['table']);
	
	$_SESSION['tBILLA'] = $pieces[0];
	$_SESSION['tBILLB'] = $pieces[1];	
}

if(isset($_POST['tableTemp'])){
	
	$pieces = explode("-", $_POST['tableTemp']);
	
	if(($pieces[0]==$_SESSION['ta'])&& ($pieces[1]==$_SESSION['tb']) ){
	$_SESSION['tBILLA'] = $pieces[0];
	$_SESSION['tBILLB'] = $pieces[1];
	
	}else{
	$_SESSION['ta']=$pieces[0];
	$_SESSION['tb']=$pieces[1];
	header("Refresh:0");
	
	//echo "<script>header("Refresh:0");</script>";
	}
}	

	

		
	}
}
			
			?>
		
		<button type="submit" name="clear_all" class="btn btn-success" style="float:right;padding:9px 9px; margin-left:0%;"><span class="glyphicon glyphicon-erase"></button>
            
            <p style="margin-right:10px;margin-top:5px; float:right; font-size:20px; color:#fff;"> <?php echo "Clear ALL";?></p>
		</form>
		
		
		




<button  class="tablink" onclick="openCity('CATEGORIES', this, 'red')" id="defaultOpen">CATEGORIES</button>
<button class="tablink" onclick="openCity('ITEMS', this, 'green')"><?php if(isset($_POST['item_cat'])){echo $_POST['item_cat'];}else{echo "ITEMS";   }?></button>
<button  class="tablink" onclick="openCity('SELECTED ITEMS', this, 'blue')">SELECTED ITEMS</button>
<button  class="tablink" onclick="openCity('SELECTED ITEMS', this, 'blue')">TAKE AWAY BILLS</button>


<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        
		
		<div style="width:100%;">
		<div class="col-md-12">
        <div class=" col-md-3">
		<form method="post" action="" id="categories" class="form-horizontal" role="form">

	<div id="box" class="container">
	    <?php
	    $cust_edit=mysql_query("select distinct itm_id,item_cat from item_cat");
        $cust_edit_num=mysql_num_rows($cust_edit);
        if($cust_edit_num>0)
        {
			$j=0;
            while($cust_edit_val=mysql_fetch_array($cust_edit))
			{
				$j++;
         ?>
  <div class="column" style="background-color:#aaa;margin-top:3%;margin-left:2%"> 
<input id="mine-btn" type="submit"  class="btn btn-sq-sm btn-info vox" name="item_cat" 
value="<?php if(isset($cust_edit_val['item_cat'])){echo $cust_edit_val['item_cat'];}?>">  </div> 
            <?php
				if($j==5)
				{
					$j=0;
			?>
					</tr>
					<tr>
			<?php
				}
			}
        }
		?>
</div>
</form>
		
</div>
		<div class=" col-md-3">
		<form method="post" action="" id="item" onsubmit="return true" class="form-horizontal" role="form">
		<div id="box" class="container">
		<table>
		<?php
		
		if(!empty($_SESSION['tempCat'])){
			$_POST['item_cat']=$_SESSION['tempCat'];
		}
		if (isset($_POST['item_cat']))
  	{
		$_SESSION['tempCat']=$_POST['item_cat'];
		
		$cust_edit_val_item="";
		//header("Location: items.php");
	 $aid=$_POST['item_cat'];
	
	$eidquery =mysql_query("select itm_id FROM `item_cat` WHERE item_cat='$aid'");
      $val="";
      if ($eidquery) {
            if (mysql_num_rows($eidquery) > 0) {
              while ($rows = mysql_fetch_array($eidquery)){
                  $aid = $rows["itm_id"];
              }
             }
           }else{
            $aid ="0";
           }
	

        $cust_edit=mysql_query("select itm_code,item,unit_price,tax_cat,vat,cat from item_master where itm_cat='".$aid."'");
        $cust_edit_num=mysql_num_rows($cust_edit);
        if($cust_edit_num>0)
        {
			$k=0;
            while($cust_edit_val_item=mysql_fetch_array($cust_edit))
			{
		?>
		<tr>
    <td onclick="buttonAdd1('<?php if(isset($cust_edit_val_item['itm_code'])){echo $cust_edit_val_item['itm_code'];}?>')"><li>
<input id="mine-btn" type="submit" readonly style="min-width:33.33%; text-align:left;border: 1px solid #505050;  background-color:white; padding:10px; border-color:transparent; color:green;
font-weight:bold; font-size:18px;" class="btn btn-sq-sm btn-info" name="item" 
value="<?php if(isset($cust_edit_val_item['item'])){echo $cust_edit_val_item['item'];}?>">
</li></td>
<td>
  <!--<button type="submit" id="minus" onclick="buttonSubtract1('<?php /*if(isset($cust_edit_val_item['itm_code'])){echo $cust_edit_val_item['itm_code'];}*/?>')" name="subtract1" 
		class="btn btn-info" style="padding:5px 5px; background-color:transparent;">
        <span class="glyphicon glyphicon-minus"></span></button>-->
        
      
  </tr>
  <tr>
  
  </tr>
  <?php
				if($k==5)
				{
					$k=0;
			?>
					</tr>
					<tr>
			<?php
				}
			}
        }
		}
		
		?>
		</table>
		</div>
	</form>
		</div>
		
		
		
		
<div class=" col-md-3">
<form method="post" action="" id="myForm" onsubmit="return true" class="form-horizontal" role="form">

<div id="boxFive" class="container">
	    <?php
		
		if(isset($_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']]))
			{
				foreach($_SESSION['tmain'][$_SESSION['ta']][$_SESSION['tb']] as $value)
				{
					
					foreach($value as $key=>$value2)
					{
						$getSelectedname=mysql_query("select item,itm_code,tax_cat,vat,cat from item_master where itm_code='".$key."'")or die(mysql_error());
						$accs_id_name=mysql_fetch_array($getSelectedname);
					    $items_nam=$accs_id_name['item'];
						if($value2>0){
			?>
  <div  onclick="buttonSubtract1('<?php if(isset($accs_id_name['itm_code'])){echo $accs_id_name['itm_code'];}?>')" class="column" style="margin-top:3%;margin-left:2%"> 
<input id="mine-btn" type="submit"  class="btn btn-sq-sm btn-info voxOne" name="itemTwo" 
value="<?php if(isset($accs_id_name['item']) ){echo $accs_id_name['item']."-".$value2 ;}?>"></div> 
            <?php
						}
			}
        }
	}
		?>
		
		<div style="clear:both;"></div>   
		<div class="pull-left" style="text-align:center;width:25%;height:20%;color:white;float:left;border-radius:10px;padding:15px">
		<button type="submit" name="cashier" class="btn btn-success" onClick="PrintDoc();" style="float:left;padding:9px 9px; margin-left:0%;"><span class="">PRINT Bill</button>
		</div>
		<div class="pull-rignt" style="text-align:center;width:25%;height:20%;color:white;float:right;border-radius:10px;padding:15px">
		 <button type="submit" name="kot" class="btn btn-success" onClick="PrintDoc();" style="float:left;padding:9px 9px; margin-left:0%;"><span class="">SAVE</button>
		</div>
</div>

</form>
</div>


<div class="col-md-3">
<form method="post" action="" id="myFormoNE" onsubmit="return true" class="form-horizontal" role="form">
<div id="box" class="container">
<div class="panel panel-default">	
<table class="" style="color:#F60;">
   <thead>
    <tr>
	<?php 
 $cust12=sprintf("SELECT bill_no FROM takeaway_details where sales_id='".$_SESSION['user_id']."' and tables='".$_SESSION['tBILLA']."'  and chair='".$_SESSION['tBILLB']."'");
		$cust123=mysql_query($cust12);
		$bill_no1=mysql_fetch_array($cust123);
?>
	<td colspan="1" style="text-align:left;border-top:1px dashed #000000;color:black"> <strong>Bill NO :<?php echo $bill_no1['bill_no'];?></strong></td>
        <td colspan="10" style="text-align:right;border-top:1px dashed #000000;color:black"> <strong>Date :<?php echo $dispdate =date("Y-m-d h:i:sa");?></strong></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:left;border-top:1px dashed #000000;border-bottom: 4px double #333;color:black"> <strong>TABLE :<?php echo $_SESSION['tBILLA']."-".$_SESSION['tBILLB'];?></strong></td>
        <td colspan="2" style="text-align:right;border-top:1px dashed #000000;border-bottom: 4px double #333;color:black"> <strong>TAKE AWAY</strong></td>
    </tr>
		
      <tr style="color:black;font-size:16px">
         
         <th>NAME</th>
         <th>Qty</th>
         <th>Unit Price</th>
         <th>AMT</th>
         
      </tr>
   </thead>
   <tbody>
  
   <?php
   
   if(isset($_SESSION['tBILLA']) && isset($_SESSION['tBILLA']) ){
   
   $cust1=sprintf("SELECT bill_no,item,unit,qty,amt FROM takeaway_details where sales_id='".$_SESSION['user_id']."' and tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."'");
		$cust=mysql_query($cust1);
		$cust_num=mysql_num_rows($cust);
		
		
		
		
		
		
		$finalTOT=0;
		$sno=0;
		if($cust_num>0)
		{
			while($cust_val=mysql_fetch_array($cust))
			{++$sno
			?>
				<tr>
					
					<th style="color:black;font-size:17px; "><?php echo $cust_val['item'];?></th>
					<th style="color:black;font-size:17px; "><?php echo $cust_val['qty'];?></th>
					<th style="color:black;font-size:17px; "><?php echo $cust_val['unit'];?></th>
                    <th style="color:black;font-size:17px; "><?php echo $cust_val['amt'];?></th>
					
					
					
				</tr>
				
				
				
                
			<?php
			$_POST['bill']=$cust_val['bill_no'];
			$a = $_POST['bill'];
							$finalTOT+=$cust_val['amt'];
			}
				
			}
   
			}		
			
			?>
			<tr>
        <td colspan="4" style="text-align:right;border-top:1px dashed #000000;font-size:14px;color:black"> <strong>Sub Total.         <?php echo $finalTOT;?>.00</strong></td>
    </tr><tr>
        <td colspan="4" style="text-align:right;font-size:14px;color:black"> <strong>Ser Tax 2.5%.        <?php echo "00";?>.00</strong></td>
    </tr><tr>
        <td colspan="4" style="text-align:right;font-size:14px;color:black"> <strong>VAT Tax 2.5%.         <?php echo "00";?>.00</strong></td>
    </tr>
			 <tr>
        <td colspan="4" style="text-align:right;border-top:1px dashed #000000;font-size:22px;color:black"> <strong>TOTAL Rs.<?php echo $finalTOT;?>.00</strong></td>
    </tr>
    <tr type='submit' name="test" >
        <td colspan="4"  style="text-align:center;border-top:1px dashed #000000;color:black;"> Thank You. . .</td>
    </tr>
			
		
   </tbody>

					
				</table>
				
				</div>
				</div>
				
			
				
				<div style="clear:both;"></div>   
		<form method="post" action="">
		<div class="pull-left col-md-6">
		<input style="float:left;font-weight:bold;background-color:green;padding :14px;border-radius:5px" type="radio" name="pay" value="card"><span style="font-weight:bold;background-color:green;padding :14px;border-radius:5px">CARD</span>
		</div>
		<div class="pull-left col-md-6">
		<input style="float:left"  type="radio" name="pay" value="cash"><span style="font-weight:bold;background-color:green;padding :14px;border-radius:5px">CASH</span>
		</div>
  
  
</form>
		<div style="clear:both;"></div>
		<div align="center">
		<button style="width:80%;margin-top:7%" class="btn btn-success" name="billUpdatetakes" value="5" type="submit">PAID</button>
		</div>
		
		
		<?php
		
		if(isset($_POST['test'])){
			echo "<script>alert('success')</script>";
		}else{
			
			//echo "<script>alert('failed')</script>";
		}
		?>
					</form>	
				</div>
				
				
				 
       
		<!-- ~~~~~!!!!@@@@####$$$$%%%%^^^^&&&&****(((())))___----++++====????>>>><<<<""""::::;;;;{{{{}}}}[[[[]]]]||||\\\\////,,,,....<input type="text" class="form-control"
        name="old amount" style="border: 0px solid #505050; color:#fff; background-color:transparent;font-weight:bold; width:150px; font-size:x-large; float:right; margin-right:20px;"
        readonly=true value="Rs. ">-->
		
				
				
				
				
				
		
		

     



		</div>
		
		</div>
      
		



		
		
</body>
</html>