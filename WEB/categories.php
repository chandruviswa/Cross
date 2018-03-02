<?php
error_reporting(0);
include('session.php');
include ('menu.php');
include('include/connect.php');

	$a = "";
    if(isset($_SESSION['a']))
	{
        $a = $_SESSION['a'];
		
	}
	
	$b = "";
    if(isset($_SESSION['b']))
	{
        $b = $_SESSION['b'];
		
	}

$item_cats ="";
	if($_POST['item_cat']){
       // $item_cats = $_SESSION['item_cat'];
        $_SESSION['item_cat']=$_POST['item_cat'];
         $_SESSION['ttempCat']= $_POST['item_cat'];

    }

$item_cat = "";
if(isset($_SESSION['item_cat']))
{
    $item_cat = $_SESSION['item_cat'];

}



	if(isset($_POST['billUpdate']))
	{
        if(isset($_SESSION['user_id']) && isset($_SESSION['a']) && isset($_SESSION['b']) && isset($_SESSION['c']))
        {

            if($_POST['category'] == "CASH"){

                //$upstatus=mysql_query("UPDATE `takeaway` SET  `status` =  'Paid',mode='CASH' WHERE  tables='".$_SESSION['tBILLA']."' and chair='".$_SESSION['tBILLB']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['tBILLC']."'");
                $sSlectQuery=mysql_query("SELECT amt from `past_bill` WHERE tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['c']."'");
                $amtss=mysql_fetch_array($sSlectQuery);

                $upstatus=mysql_query("UPDATE `past_bill` SET  `cash` =  '".$amtss['amt']."',`status` =  'Paid',mode='CASH' WHERE  tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['c']."'");
                header("Location:tables.php");



            }else{
                $sSlectQuery=mysql_query("SELECT amt from `past_bill` WHERE tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['c']."'");
                $amtss=mysql_fetch_array($sSlectQuery);
                $upstatus=mysql_query("UPDATE `past_bill` SET `card` =  '".$amtss['amt']."', `status` = 'Paid',mode='CARD' WHERE  tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."' and sales_id='".$_SESSION['user_id']."' and bill_no='".$_SESSION['c']."'");
                header("Location:tables.php");

            }


        }


	}
	
//	if(isset($_POST['itemTwo'])){
//
//    $tes= $_POST['itemTwo'];
//
//    $itemCtanameQuery=mysql_query("SELECT itm_cat FROM `item_master` WHERE item='".$tes."'");
//    $temCatName=mysql_fetch_array($itemCtanameQuery);
//    $scndquery=mysql_query("select item_cat  from item_cat where itm_id='".$temCatName['itm_cat']."'");
//    $secItemName =mysql_fetch_array($scndquery);
//    $vsd= $secItemName['item_cat'];
//       // echo "<script>alert('$vsd');</script>";
//    $_SESSION['item_cat']=$vsd;
//    }
	
	if(isset($_POST['cashier']))
	{
		//$user=$_POST['user'];
//$mobile=$_POST['mobile'];
$tableId="";
$chairId="";
$salesID="";

		if(isset($_SESSION['user_id']) && isset($_SESSION['a']) && isset($_SESSION['b']))
		{
			$check=mysql_query("select * from cashier_print where sales_id='".$_SESSION['user_id']."' and table_id='".$_SESSION['a']."' and chair_id='".$_SESSION['b']."'");
			$checknum=mysql_num_rows($check);
			if($checknum==0)
			{
				$tableId=$_SESSION['a'];
				$chairId=$_SESSION['b'];
				$salesID=$_SESSION['user_id'];
				$send_data=mysql_query("insert into cashier_print(cp_id,sales_id,table_id,chair_id,entry_date,entry_time) values('',$salesID,'".$tableId."',$chairId,CURDATE(),CURTIME())");
			}
		}
		//get tot amt without tax
		$ck2=mysql_query("select sum(amt) as amt from past_bill_details where bill_no='0' and tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."'");
		$ch2val=mysql_fetch_array($ck2);
		$ck2bill=$ch2val['amt'];
		
		//sum the taxs
		$sumtax=mysql_query("select sum(ser_tax) as service_tax, sum(vat) as vat_tax from past_bill where bill_no='0' and tables='".$a."' and chair='".$b."'");
		$totservice=mysql_fetch_array($sumtax);
		$service_tax=$totservice['service_tax'];
		$vat_tax=$totservice['vat_tax'];
		
		$cash=$ck2bill+$service_tax+$vat_tax;
		
		//check the radio btn
		$upsubtot=mysql_query("update past_bill set sub_tot='".$ck2bill."', status='Unpaid', cash=0, card=0, buffet=0, credit_card=0, npb=0, rt=0, voucher=0 where bill_no='0' and tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."' and sales_id='".$_SESSION['user_id']."'");
		
		//update kop_bill_detauils, past_bill, past_bill_details
		$updateme=mysql_query("update kop_bill_details set full_print_status='1' where bill_no='0' and tables='".$_SESSION['a']."' and chair='".$_SESSION['b']."'");
		
		//header('Location: cashier_bill.php');
		$cust_edit=mysql_query("SELECT id,sum(amt) as amt FROM past_bill_details where sales_id='".$_SESSION['user_id']."' and tables='".$_SESSION['a']."' and bill_no='0' and chair='".$_SESSION['b']."'");
$cust_edit_val=mysql_fetch_array($cust_edit);
$bill_no=$cust_edit_val['id'];
$amt=$cust_edit_val['amt'];

/*$ch = curl_init();
$user="karthikit.ksak@gmail.com:karthik@2117";
$receipientno="9659825191"; 
$senderID="TEST SMS"; 
$msgtxt= "THANK YOU! VISIT AGAIN..."; 
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; } 
curl_close($ch);*/
//echo $salesID;
//echo $tableId;
//echo $tableId;

header("Location:direct_print.php?cust=1&&sales_id=".$salesID."&&table_id=".$tableId."&&chair_id=".$chairId."");
		//header("Location:choice.php?val=print");
		//$_SESSION['main'][$_SESSION['a']][$_SESSION['b']]='';unset($_SESSION['main'][$_SESSION['a']][$_SESSION['b']]);
	}

	$getcid=mysql_query("select itm_id from item_cat where item_cat='".$item_cat."'");
	$acc_id_val=mysql_fetch_array($getcid);
	$aid=$acc_id_val['itm_id'];
	
		if(isset($_POST['kot']))
		{
if(isset($_SESSION['user_id']) && isset($_SESSION['a']) && isset($_SESSION['b']))
{


	  
			//order code goes here
			/*$cust_edit=mysql_query("select itm_code,item,unit_price from item_master where itm_cat='".$aid."'");*/
			
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
			
			
				foreach($_SESSION['main'][$_SESSION['a']][$_SESSION['b']] as $value)
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
	$add=mysql_query("insert into past_bill_details (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,ser_tax,vat_tax,service,vat,tot_amt,cat,	mob_status) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."',
	'".$stax."','".$vtax."','".$se_tax."','".$va_tax."','".$myval."','".$mycat."',0)");
	
	$add2=mysql_query("insert into kop_bill_details (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,ser_tax,vat_tax,service,vat,tot_amt,cat,full_print_status) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."',
	'".$stax."','".$vtax."','".$se_tax."','".$va_tax."','".$myval."','".$mycat."','".$full_print_status."')");	
	
	$add1=mysql_query("insert into kop_bill_print (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,kop_bill_status) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."','".$kop_bill_status."')");	
	
	$add3=mysql_query("insert into past_bill_print (bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair) values('".$bill_no."','".$key."','".$item_nam."','".$unit_price."','".$value2."','".$totalval."',CURDATE(),CURTIME(),'".$sales_id."','".$e_id."','".$shift."','".$a."','".$b."')");	

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
			
			$bill=mysql_query("select * from past_bill where bill_no='0' and tables='".$a."' and chair='".$b."'");
			$ck2=mysql_query("select sum(amt) as amt from past_bill_details where bill_no='0' and tables='".$a."' and chair='".$b."'");
			
			$ch2val=mysql_fetch_array($ck2);
			$pbill=mysql_num_rows($bill);
			$ck2bill=$ch2val['amt'];
			
			$bill_no='';
			$full_amount_service=$_POST['full_amount_service'];
			$full_amount_vat=$_POST['full_amount_vat'];

			//sum the taxs
			$sumtax=mysql_query("select sum(ser_tax) as service_tax, sum(vat) as vat_tax from past_bill where bill_no='0' and tables='".$a."' and chair='".$b."'");
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
			$add=mysql_query("insert into past_bill (bill_no,e_id,date,time,amt,sales_id,shift,tables,chair,ser_tax,vat,status) values('".$bill_no."','".$e_id."',CURDATE(),CURTIME(),'".$ck2bill."','".$sales_id."','".$shift."','".$a."','".$b."','".$full_amount_service."','".$full_amount_vat."','Unpaid')");
		}
		else
		{
			//sum the taxs
			$sumtax=mysql_query("select sum(ser_tax) as service_tax, sum(vat) as vat_tax from past_bill where bill_no='0' and tables='".$a."' and chair='".$b."'");
			$totservice=mysql_fetch_array($sumtax);
			$service_tax=$totservice['service_tax'];
			$vat_tax=$totservice['vat_tax'];
			
			$tot_service_tax=$service_tax+$full_amount_service;
			$tot_vat_tax=$vat_tax+$full_amount_vat;
			$total_tax_amt=$full_amount_service+$full_amount_vat+$total_tax;
			
			$ck2bill=round($ck2bill+$service_tax+$vat_tax);

			$add1=mysql_query("update past_bill set bill_no='".$bill_no."', e_id='".$e_id."', date=CURDATE(), time=CURTIME(), amt='".$ck2bill."', sales_id='".$sales_id."', shift='".$shift."', tables='".$a."', ser_tax='".$tot_service_tax."', vat='".$tot_vat_tax."' where bill_no='0' and tables='".$a."' and chair='".$b."' and sales_id='".$sales_id."'");
		}
		
		//unset($_SESSION['main']);
		//header("Location:choice.php?val=print");
		//header("Location:categories.php");
		//header('Location: kop_print.php');
		$_SESSION['BILLA'] = $_SESSION['a'];
	$_SESSION['BILLB'] = $_SESSION['b'];
		
		$_SESSION['main'][$_SESSION['a']][$_SESSION['b']]='';unset($_SESSION['main'][$_SESSION['a']][$_SESSION['b']]);
		//header("Location:past_kot_bill_print.php?sales_id=".$sales_id."&table_id=".$a."&chair_id=".$b."");


		}
}
	//finish order code
	
	if(isset($_POST['clear_all']))
	{
		$_SESSION['main']='';unset($_SESSION['main']);
	}
	date_default_timezone_set("Asia/Kolkata");
	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="user-scalable=yes, width=device-width" />
<title>Restaurant</title>
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
	/*var qty1 =  document.getElementById(x).value;
    document.getElementById(x).value = parseInt(qty1)+1;
	
	var amoun=x+"_amount";
	
	var num1=document.getElementById(amoun).value;
	var num2=document.getElementById(x).value;
	
	var x1=x+"_amt";
	var preamt=document.getElementById(x1).value;
	var amt=document.getElementById(x1).value=num1*num2;
	var xamt=document.getElementById('famt').value;
	amt= parseInt(xamt)+parseInt(amt)-parseInt(preamt);
	document.getElementById('famt').value=amt;*/	
	
	get_itms(x_n);	
}
//sub Qty goes here...
function buttonSubtract1(x) {



	var x_n=x;
 	/*var qty2 =  document.getElementById(x).value;
	if(qty2>0)
	{
		document.getElementById(x).value = parseInt(qty2)-1;
		var amoun=x+"_amount";
		
		var num1=document.getElementById(amoun).value;
		var num2=document.getElementById(x).value;
		
		var x1=x+"_amt";
		var preamt=document.getElementById(x1).value;
		var amt=document.getElementById(x1).value=num1*num2;		
		
		var xamt=document.getElementById('famt').value;
		amt= parseInt(xamt)+parseInt(amt)-parseInt(preamt);
		document.getElementById('famt').value=amt;
	}*/
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
	xmlhttp.open("POST", "ajax/get_items.php?val=" +x, true);
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
	xmlhttp.open("POST", "ajax/sub_itms.php?val=" +x, true);
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
	xmlhttp.open("POST", "ajax/overall_ajax.php?val=" +x.value, true);
	xmlhttp.send();
}

function post() {
     document.getElementById("myForm").reload();
	/* alert('sucess'); */

}

$('button').on("click",function(){
    //$('button').not(this).removeClass();
    $(this).toggleClass('active');

});


</script>
    <style type="text/css">

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


    </style>


</head>

<body  style="background: url(images/bgfine.png);overflow: hidden" >
<div class="container navbar"  style="background-color:transparent; width:100%;">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff; margin-top:-15px; font-weight:bold; font-size:15px;"> CHOOSE IT </h4>
    </div>
</div>

<div class="col-12 ">
<p id="demo"></p>
    <table class="table table-responsive ">
        <thead>
        <tr>
            <th style="background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px;border-right: #5e5e5e ">CATEGORIES</th>
            <th style="background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px;border-right: #5e5e5e">ITEM</th>
            <th style="background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px">SELECTED ITEM</th>
            <th style="text-align: center;background-color: white;padding: 1%;color: #256AE3;font-weight: bold;font-size: 14px">BILL</th>
        </tr>
        </thead>
        <tbody>
        <tr >
            <td  >
                <form  style="max-width: 80em;
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
                <input  type="submit"   class="box btn btn-info" name="item_cat"
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

                       if(!empty($_SESSION['ttempCat'])){
                            $_POST['item_cat']=$_SESSION['ttempCat'];
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

                		if(isset($_SESSION['main'][$_SESSION['a']][$_SESSION['b']]))
                			{
                				foreach($_SESSION['main'][$_SESSION['a']][$_SESSION['b']] as $value)
                				{

                					foreach($value as $key=>$value2)
                					{
                						$getSelectedname=mysql_query("select item,itm_code,tax_cat,vat,cat from item_master where itm_code='".$key."'")or die(mysql_error());
                						$accs_id_name=mysql_fetch_array($getSelectedname);
                					    $items_nam=$accs_id_name['item'];
                						if($value2>0){
                			?>
                <div  onclick="buttonSubtract1('<?php if(isset($accs_id_name['itm_code'])){echo $accs_id_name['itm_code'];}?>')" class="column" style="margin-top:3%;margin-left:2%">
                <input id="mine-btn" type="submit"  class="btn  btn-info boxTwo" name="itemTwo"
                value="<?php if(isset($accs_id_name['item']) ){echo $accs_id_name['item']."-".$value2;}?>"></div>
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
    height: 45em;
    overflow: auto;
    direction: ltr;
    text-align: justify;" action="" id="selc" method="post">
                    <div class="panel panel-default">
                        <table class="table " style="color:#F60;">


<thead>
<tr>

<!--    <td colspan="3" style="text-align:left;border-top:1px dashed #000000;color:black"> <strong>Bill NO :--><?php //echo $_SESSION['BILLC'];?><!--</strong></td>-->
    <td colspan="13" style="text-align:center;border-top:1px dashed #000000;color:black"> <strong>Date :<?php echo $dispdate =date("Y-m-d h:i:sa");?></strong></td>
</tr>
<tr>
    <td colspan="6" style="text-align:left;border-top:1px dashed #000000;border-bottom: 4px double #333;color:black"> <strong>TABLE :<?php echo $_SESSION['a']."-".$_SESSION['b'];?></strong></td>
    <td colspan="7" style="text-align:right;border-top:1px dashed #000000;border-bottom: 4px double #333;color:black"> <strong>Restaurant</strong></td>
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
                           if(isset($_SESSION['a']) && isset($_SESSION['b']) ){
                           //SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.amt AS xamt,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='$table' AND m.chair ='$chair' AND m.date='$curnt_date'AND c.date='$curnt_date' AND c.sales_id='$salesId'  AND c.sales_id='$salesId'  AND m.bill_no = '0'  AND c.bill_no='0'
                               //SELECT bill_no,item,unit,qty,amt FROM past_bill_details where sales_id='".$_SESSION['user_id']."' and tables='".$_SESSION['BILLA']."' and chair='".$_SESSION['BILLB']."'
                           $cust1=sprintf("SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.amt AS xamt,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='".$_SESSION['a']."' AND m.chair ='".$_SESSION['b']."' AND m.date='$curnt_date'AND c.date='$curnt_date' AND c.sales_id='".$_SESSION['user_id']."'  AND c.sales_id='".$_SESSION['user_id']."'AND c.status='Unpaid'  AND m.bill_no = '".$_SESSION['c']."'  AND c.bill_no='".$_SESSION['c']."'");
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
<!--                        <div colspan="15" align="center" style="text-align: center" >-->
<!--                        <button  type="submit" name="cashier" class="btn btn-success span3">PRINT BILL</button>-->
<!--                        </div>-->
                        <div colspan="15"  align="center" style="text-align: center;margin-top: 2%" >
                            <select style="background-color: #256AE3;color: white" id="category" name="category">
                                <option style="background-color: white;color: black" value="CASH">CASH</option>
                                <option style="background-color: white;color: black"value="CARD">CARD</option>

                            </select>
                        </div>
                        <div colspan="15" align="center" style="text-align: center" >
                            <button  type="submit" name="cashier" class="btn btn-danger ">PRINT BILL</button>
                            <button  type="submit" name="billUpdate" class="btn btn-info ">PAID</button>
                        </div>
                </form>
            </td>
        </tr>
        </tbody>
    </table>

</div>

		
</body>
</html>