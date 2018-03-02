<?php
error_reporting(0);
include('session.php');
include('menu.php');
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
	
	
	
	if(isset($_POST['billUpdate']))
	{


		if(isset($_SESSION['user_id']) && isset($_SESSION['tBILLA']) && isset($_SESSION['tBILLB']) && isset($_SESSION['tBILLC']) )
		{

            if($_POST['category'] == "CASH"){


                //$upstatus=mysql_query("UPDATE `takeaway` SET  `status` =  'Paid',mode='CASH' WHERE  tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['tBILLC']."'");
                $sSlectQuery=mysql_query("SELECT amt from `takeaway` WHERE tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['tBILLC']."'");
                $amtss=mysql_fetch_array($sSlectQuery);

                $upstatus=mysql_query("UPDATE `takeaway` SET  `cash` =  '".$amtss['amt']."',`status` =  'Paid',mode='CASH' WHERE  tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['tBILLC']."'");



            }else{


                $sSlectQuery=mysql_query("SELECT amt from `takeaway` WHERE tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['tBILLC']."'");
                $amtss=mysql_fetch_array($sSlectQuery);
                $upstatus=mysql_query("UPDATE `takeaway` SET `card` =  '".$amtss['amt']."', `status` = 'Paid',mode='CARD' WHERE  tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['tBILLC']."'");

            }


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
            $_SESSION['tBILLA'] = $_SESSION['ta'];
            $_SESSION['tBILLB'] = $_SESSION['tb'];
            $_SESSION['tBILLC'] = 0;
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
    <style type="text/css">
        .selectTable{
            margin-top: 1%;
            position: relative;
            height: 55px;!important;
            background: white;
            border: 1px solid #0d69ff;
            box-sizing: border-box;
            padding: 20px;
            color: #0d69ff;

        }

        .sampBox{
            margin-top: 4%;
            float: right;
            background: white;
            border: 1px solid #0d69ff;
            box-sizing: border-box;
        }
        sampBox:hover{
            background-color: #256AE3;
        }

        .box{

            height: 55px;!important;

            background: #ACB271;
            /*border: 1px solid #25C8A8;*/
            box-sizing: border-box;
            color: #293432  ;
            font-weight: bold;
        }

        .box:hover{
            background-color: white;
            color: #256AE3;
        }

        .boxOne{

            height: 55px;!important;

            background: #4A92B2;
            /*border: 1px solid #25C8A8;*/
            box-sizing: border-box;
            color: white  ;
            font-weight: bold;
        }

        .boxOne:hover{
            background-color: white;
            color: #256AE3;
        }

        .boxTwo{

            height: 55px;!important;

            background: #B98D4D;
            /*border: 1px solid #25C8A8;*/
            box-sizing: border-box;
            color: #293432  ;
            font-weight: bold;
        }

        .boxTwo:hover{
            background-color: white;
            color: #256AE3;
        }

        .drawbox{
            max-width: 25em;
            height: 45em;
            margin-top: -20px;
            overflow: auto;
            direction: ltr;
            text-align: justify;
        }

        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.25;
        }
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        /*table thead {*/
        /*background: #0d69ff;*/

        /*}*/

        table tr {
            border: 1px solid #ddd;
            padding: .35em;
        }
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table caption {
                font-size: 1.3em;
            }
            table thead {
                background: #0d69ff;
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }
            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }
            table td:before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
            table td:last-child {
                border-bottom: 0;
            }
        }

        .wrapper {
            position: relative;
            overflow: scroll;
            width: 1000px;
            height: 800px;
        }
        ::-webkit-scrollbar {
            display: none;
        }

    </style>

</head>

<body  style="background: url(images/bgfine.png);overflow: hidden" >
<div class="container navbar"  style="background-color:transparent; width:100%;">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff; margin-top:-15px; font-weight:bold; font-size:15px;">TAKE AWAY</h4>
    </div>
</div>

<!-- <div class="container navbar"  style="background-color:transparent; width:100%;">
   <div class="row" style="margin-top:1%;position: fixed; width: 100%; height: 50px;  top: 0; z-index: 1; ">-->
<!--        <a href="tables.php"><span class="glyphicon glyphicon-arrow-left" style="margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>-->
<!--        <a href="tables.php"><span class="" style="margin-left:10px;margin-top:5px; font-size:16px; color:#fff;background-color:green;border-radius : 5px;padding : 10px"> TABLE</a></span>-->
<!--		<a href="tables.php"><span class="" style="margin-left:10px;margin-top:5px; font-size:16px; color:#fff;background-color:green;border-radius : 5px;padding : 10px">Restaurant</a></span>-->
<!--		<input type="submit"   name="tableCurrent" id="taaable" -->
<!-- 		    style="text-align:center;margin-right:15px;border: 0px solid #505050;width:5%; float:right; background-color:red; font-size:x-large; color:white; font-weight:bold; margin-left:0%;"  readonly="readonly" value="--><?php //echo $_SESSION['ta']."-".$_SESSION['tb'];?><!--" />-->
<!--        <a href="logout.php"><span class="glyphicon glyphicon-off" style="margin-right:10px;margin-top:5px; float:right; font-size:25px; color:#fff;"> </a></span>-->
<!--        <a href="previous.php"><span class="glyphicon glyphicon-eye-open" style="margin-right:10px;margin-top:5px; float:right; font-size:25px; color:#fff;"> </a></span>-->
<!--        <br/><br/><br/><h4 style="text-align:left; color:#fff; margin-top:-15px; font-weight:bold; font-size:18px;">  </h4>-->
<!--    </div>
</div>-->
		
		<form method="post" role="form" action="" id="takeaway_frm">
		
		
		
		<div style=" margin-top:1%;width: 50%;
    position: absolute;
">
<!--            <button type="submit" name="clear_all" class="btn btn-success" style="margin-top:-1%;float:left;padding:9px 9px; margin-left:0%;"><span class="glyphicon glyphicon-erase">CLEAR</button>-->

		<input type="submit" class="btn btn-info selectTable" id="chair" name=t value=<?php {echo "1";} ?> style="width:10%;">
		<input type="submit" class="btn btn-info selectTable" id="chair" name=t value=<?php {echo "2";} ?> style="width:10%;">
		<input type="submit" class="btn btn-info selectTable" id="chair" name=t value=<?php {echo "3";} ?> style="width:10%;">
		<input type="submit" class="btn btn-info selectTable"  id="chair" name=t value=<?php {echo "4";} ?> style="width:10%;">
		<input type="submit" class="btn btn-info selectTable"  id="chair" name=t value=<?php {echo "5";} ?> style="width:10%;">
        </div>
		
		<?php
$bendingBill=mysql_query("select bill_no,tables,chair from takeaway where status='Unpaid'")or die(mysql_error());
if($bendingBill){
	while($rowss=mysql_fetch_array($bendingBill)){
		 //echo "<script>alert('success')</script>";
		
		 if($rowss['bill_no']==0){
			 ?>

<input type="submit"   name="table" id="taable"
 		    style="background-color: white;width:10%;color:black;" class="btn btn-info sampBox"  value="<?php if(isset($rowss["tables"])){echo $rowss["tables"]."-".$rowss["chair"]."-".$rowss["bill_no"];}else{echo "0";}?>" />
			 <?php
			 
		 }else{
	?>	
	
	<input type="submit"   name="table" id="taable" 
 		    style="background-color: white; white;width:10%;color:black;" class="btn btn-info sampBox"   value="<?php if(isset($rowss["tables"])){echo $rowss["tables"]."-".$rowss["chair"]."-".$rowss["bill_no"];}else{echo "0";}?>" />

<?php
		 }
if(isset($_POST['table'])){
	
	
	
	$pieces = explode("-", $_POST['table']);
	
	$_SESSION['tBILLA'] = $pieces[0];
	$_SESSION['tBILLB'] = $pieces[1];
    $_SESSION['tBILLC'] = $pieces[2];
    header("Refresh:0");

}

if(isset($_POST['tableTemp'])){
	
	$pieces = explode("-", $_POST['tableTemp']);
	
	if(($pieces[0]==$_SESSION['ta'])&& ($pieces[1]==$_SESSION['tb']) ){
	$_SESSION['tBILLA'] = $pieces[0];
	$_SESSION['tBILLB'] = $pieces[1];
	//echo "<script>alert('success')</script>";
	//echo $_SESSION['tBILLA'].'-'.$_SESSION['tBILLB'];
	
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
		

		</form>



<div style="margin-top: 8%" class="col-12">

    <table class="table table-responsive ">
        <thead>
        <tr>
            <th style="background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px;">CATEGORIES</th>
            <th style="background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px;">ITEM</th>
            <th style="background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px;">SELECTED ITEM</th>
            <th style="text-align: center;background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px;">BILL</th>
        </tr>
        </thead>
        <tbody>
        <tr >
            <td  >
                <form  style="max-width: 100em;
    height: 45em;
    overflow: auto;
    direction: ltr;
    text-align: justify;" action="" id="cat" method="post">
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
                            <div  >
<!--                                --><?php
//                                if( $_SESSION['tBILLC'] != 0){
//                                    ?>
<!--                                    <script>-->
<!--                                        document.getElementById("item_cat").disabled = true;-->
<!--                                    </script>-->
<!--                                    --><?php
//                                }
//                                ?>
                                <input id="item_cat"  type="submit"   class="box btn btn-info " name="item_cat"
                                        value="<?php if(isset($cust_edit_val['item_cat'])){echo $cust_edit_val['item_cat'];}?>">  </div>

                            <?php

                            if($j==5)
                            {
                                $j=0;
                                ?>
                                <?php
                            }
                        }
                    }
                    ?>
                </form>
            </td>


            <td >
                <form  style="max-width: 100em;
    height: 45em;
    overflow: auto;
    direction: ltr;
    text-align: justify;" action="" id="cat" method="post">
                    <?php

                    if(!empty($_SESSION['tempCat'])){
                        $_POST['item_cat']=$_SESSION['tempCat'];
                    }


                    if (isset($_POST['item_cat']))
                    {

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

                                <div  onclick="buttonAdd1('<?php if(isset($cust_edit_val_item['itm_code'])){echo $cust_edit_val_item['itm_code'];}?>')">
                                    <input  type="submit"  class="btn btn-info boxOne" name="item"
                                            value="<?php if(isset($cust_edit_val_item['item'])){echo $cust_edit_val_item['item'];}?>"></div>


                                <?php
                                if($k==5)
                                {
                                    $k=0;

                                }
                            }
                        }
                    }

                    ?>
                </form>
            </td>


            <td >
                <form  style="max-width: 100em;
    height: 45em;
    overflow: auto;
    direction: ltr;
    text-align: justify;" action="" id="selc" method="post">
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
                                    <div  onclick="buttonSubtract1('--><?php if(isset($accs_id_name['itm_code'])){echo $accs_id_name['itm_code'];}?>')" class="column" style="margin-top:3%;margin-left:2%">
                                        <input id="mine-btn" type="submit"  class="btn  btn-info boxTwo" name="itemTwo"
                                               value="<?php if(isset($accs_id_name['item']) ){echo $accs_id_name['item']."-".$value2 ;}?>"></div>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    <button type="submit" name="kot"  style="margin: 5%" class="btn btn-success span3">SAVE</button>
                </form>
            </td>


            <td >
                <form  style="max-width: 100em;
    height: 33em;
    overflow: auto;
    direction: ltr;
    text-align: justify;" action="" id="selc" method="post">
                    <div class="panel panel-default">
                        <table class="table " style="color:#F60;">


                            <thead>
                            <tr>

                                <!--    <td colspan="3" style="text-align:left;border-top:1px dashed #000000;color:black"> <strong>Bill NO :--><?php //echo $_SESSION['BILLC'];?><!--</strong></td>-->
                                <td colspan="5" style="text-align:center;border-top:1px dashed #000000;color:black">  <strong>Bill NO :<?php echo $_SESSION['tBILLC'];?></strong></td>
                                <td colspan="8" style="text-align:center;border-top:1px dashed #000000;color:black"> <strong>Date :<?php echo $dispdate =date("Y-m-d h:i:sa");?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align:left;border-top:1px dashed #000000;border-bottom: 4px double #333;color:black"> <strong>TABLE :<?php echo $_SESSION['tBILLA']."-".$_SESSION['tBILLB'];?></strong></td>
                                <td colspan="8" style="text-align:right;border-top:1px dashed #000000;border-bottom: 4px double #333;color:black"> <strong>Restaurant</strong></td>
                            </tr>

                            <tr style="color:black;font-size:16px">

                                <th style="text-align: center" colspan="6">NAME</th>
                                <th style="text-align: center" colspan="2">Qty</th>
                                <th style="text-align: center" colspan="3">Unit Price</th>
                                <th style="text-align: center" colspan="3">AMT</th>
                            </thead>
                            </tr>
                            <tbody>


                            <?php
                            $curnt_date = date("Y-m-d");
                            if(isset($_SESSION['tBILLA']) && isset($_SESSION['tBILLB']) ){
                                //SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.amt AS xamt,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='$table' AND m.chair ='$chair' AND m.date='$curnt_date'AND c.date='$curnt_date' AND c.sales_id='$salesId'  AND c.sales_id='$salesId'  AND m.bill_no = '0'  AND c.bill_no='0'
                                //SELECT bill_no,item,unit,qty,amt FROM past_bill_details where sales_id='".$_SESSION['user_id']."' and tables='".$_SESSION['BILLA']."' and chair='".$_SESSION['BILLB']."'
                                $cust1=sprintf("SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.amt AS xamt,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM `takeaway` AS c LEFT JOIN takeaway_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='".$_SESSION['tBILLA']."' AND m.chair ='".$_SESSION['tBILLB']."' AND m.date='$curnt_date'AND c.date='$curnt_date' AND c.sales_id='".$_SESSION['user_id']."'  AND m.sales_id='".$_SESSION['user_id']."' AND c.status='Unpaid'  AND m.bill_no = '".$_SESSION['tBILLC']."'  AND c.bill_no='".$_SESSION['tBILLC']."'");
                                //echo $cust1;
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

                                            <td style="text-align: center;color: black" colspan="6"><?php echo $cust_val['item'];?></td>
                                            <td style="text-align: center;color: black" colspan="2"><?php echo $cust_val['qty'];?></td>
                                            <td style="text-align: center;color: black" colspan="3"><?php echo $cust_val['unit'];?></td>
                                            <td style="text-align: center;color: black" colspan="3"><?php echo $cust_val['xamt'];?></td>



                                        </tr>




                                        <?php
                                        $_POST['bill']=$cust_val['bill_no'];
                                        $a = $_POST['bill'];
                                        $finalTOT+=$cust_val['xamt'];
                                    }

                                }

                            }

                            ?>
                            <tr>
                                <td colspan="14" style="text-align:right;border-top:1px dashed #000000;font-size:14px;color:black"> <strong>Sub Total.         <?php echo $finalTOT;?>.00</strong></td>
                            </tr><tr>
                                <td colspan="14" style="text-align:right;font-size:14px;color:black"> <strong>CGST 2.5%.        <?php echo "00";?>.00</strong></td>
                            </tr><tr>
                                <td colspan="14" style="text-align:right;font-size:14px;color:black"> <strong>SGST 2.5%.         <?php echo "00";?>.00</strong></td>
                            </tr>
                            <tr>
                                <td colspan="14" style="text-align:right;border-top:1px dashed #000000;font-size:22px;color:black"> <strong>TOTAL Rs.<?php echo $finalTOT;?>.00</strong></td>
                            </tr>
                            <tr>
                                <td colspan="14" style="text-align:center;border-top:1px dashed #000000;color:black;"> Thank You. . .</td>
                            </tr>


                            </tbody>


                        </table>
                        <div colspan="15"  align="center" style="text-align: center;margin-top: 2%" >
                            <select id="category" name="category">
                                <option value="CASH">CASH</option>
                                <option value="CARD">CARD</option>

                            </select>
                        </div>
                        <div colspan="15" align="center" style="text-align: center" >
                            <button  type="submit" name="cashier" class="btn btn-success ">PRINT BILL</button>
                            <button  type="submit" name="billUpdate" class="btn btn-success ">PAID</button>
                        </div>

<!--                        <div colspan="15" align="center" style="text-align: center" >-->
<!--                            <button  type="submit" name="cashier" class="btn btn-success span3">PAID</button>-->
<!--                        </div>-->

                </form>
            </td>
        </tr>
        </tbody>
    </table>

</div>
		
		
		

		
</body>
</html>