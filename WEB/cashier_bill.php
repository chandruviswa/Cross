<?php
include('session.php');
include('include/connect.php');

$getprinter=mysql_query("SELECT * FROM printer");	
$getprinter_val=mysql_fetch_array($getprinter);
$printer=$getprinter_val['billing_print'];
//$printer = "SCX-3400 Series";



 //Open connection to the thermal printer
$fp = fopen($printer, "w");
if (!$fp){
  die('no connection');
}

$data = " PRINT THIS ";

 //Cut Paper
$data .= "\x00\x1Bi\x00";

if (!fwrite($fp,$data)){
  die('writing failed');
}

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="user-scalable=yes, width=device-width" />
<link rel="stylesheet" type="text/css" href="print.css" />
<link rel="stylesheet" type="text/css" href="Style.css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript">
/*--This JavaScript method for Print command--*/
    function PrintDoc() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=550,height=550,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
<!----This JavaScript method for Print Preview command---->
    function PrintPreview() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=350,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="print.css" media="screen"/></head><body">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>

<title>Bill</title>
</head>

<body>
<form method="post" action="" name="prt">
<div  id="printarea">
<?php
	    $cust_edit=mysql_query("select * from add_profile");
        $cust_edit_num=mysql_num_rows($cust_edit);
        if($cust_edit_num>0)
        {
			$j=0;
            while($cust_edit_val=mysql_fetch_array($cust_edit))
			{
				$j++;
    ?>
<table id="brk" border="0" style="width:250px; height:auto;">
    <tbody>
    <tr>
        <td style="text-align:center; font-size:23px;" colspan="4"> <strong><?php if(isset($cust_edit_val['line1'])){echo $cust_edit_val['line1'];}?></strong></td>
    </tr>
    <tr>
        <td style="text-align:center;font-size:14px;" colspan="4"> <?php if(isset($cust_edit_val['line2'])){echo $cust_edit_val['line2'];}?></td>
    </tr>
    <tr>
        <td style="text-align:center;font-size:14px;" colspan="4"> <?php if(isset($cust_edit_val['line3'])){echo $cust_edit_val['line3'];}?></td>
    </tr>
    <?php
			if($j==5)
			{
				$j=0;
			}
		 }
        }

		?> 
        
       <?php
		$user_check=$_SESSION['login_user'];
		$acc_qry3=mysql_query("select emp_id from add_user where user_name='".$user_check."'");
		$acc_qry3_val=mysql_fetch_array($acc_qry3);
		$sales_id=$acc_qry3_val['emp_id'];
		
		$waiter=mysql_query("select name from add_employee where eid='".$acc_qry3_val[0]."'");
		$waiter_val=mysql_fetch_array($waiter);
		
		$st = mysql_query("SELECT max(bill_no) as bill_no FROM past_bill_details");
		$st_val=mysql_fetch_array($st);
		$st_val=$st_val['bill_no'];
		$st_val=$st_val+1;
		
		$par_tot=mysql_query("select bill_no,amt from past_bill_details where bill_no='0'");
		$par_tot_val=mysql_fetch_array($par_tot);
		
		$cust1=sprintf("SELECT date,time,tables,chair from past_bill_details order by id desc limit 1");
		$cust=mysql_query($cust1);
		$cust_num=mysql_num_rows($cust);
		while($cust_val=mysql_fetch_array($cust))
		{
			$tab_no=$cust_val['tables'];
			$chair_no=$cust_val['chair'];
		?>
                <tr>
                    <td style="text-align:left;border-top:1px dashed #000000;font-size:12px;"> Table: <?php echo $cust_val['tables'];?>-<?php echo $cust_val['chair'];?></td>
                    <td colspan="3" style="text-align:right;font-size:12px;border-top:1px dashed #000000;"> Date: <?php echo $cust_val['date'];?> <?php echo date("g:i a", strtotime($cust_val['time']));?></td>
                </tr>
                <tr>
                    <td style="text-align:left;font-size:12px;" colspan="3"> <?php echo $waiter_val[0];}?></td>
                    <td colspan="1" style="text-align:right; font-size:12px"> <strong>Bill No: <?php echo $st_val;?></strong></td>
                </tr>
                <tr>
                   <td width="150px" style="text-align:left;border-top:1px dashed #000000;font-size:13px;"> <strong>ITEM</strong></td>
                   <td width="30px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> <strong>QTY</strong></td>
                   <td width="75px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> <strong>RATE</strong></td>
                   <td width="60px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> <strong>AMT</strong></td>
                </tr>
    <!--while goes here-->
     <?php
if(isset($_SESSION['main'][$_SESSION['a']][$_SESSION['b']]))
{
	foreach($_SESSION['main'][$_SESSION['a']][$_SESSION['b']] as $key=>$value)
	{
		echo "<tr>";
		echo "<td colspan='4' style='text-align:left;border-top:1px dashed #000000;'>";
		$query="select p.p_cat from item_cat i left join parent_cat p on p.pid=i.itm_id where i.item_cat='".$key."'";
		$qry_res=mysql_query($query);
		$qry_val=mysql_fetch_array($qry_res);
		echo "<strong style='font-size:12px;'>".$qry_val['p_cat']."</strong>";
		echo "</td>";
		echo "</tr>";
		foreach($value as $key=>$value2)
		{
			$x=$key;
			$get_code=mysql_query("select itm_code from past_bill_details where itm_code='".$x."'")or die(mysql_error());
			$acc_code=mysql_fetch_array($get_code);
			$x=$acc_code['itm_code'];
	
			$y=$value2;
			$get_qty=mysql_query("select qty from past_bill_details where itm_code='".$x."'")or die(mysql_error());
			$acc_qty=mysql_fetch_array($get_qty);
			$y=$acc_qty['qty'];
	
			$st = mysql_query("SELECT max(bill_no)FROM past_bill_details");
			$st_val=mysql_fetch_array($st);
						
			for($j=0;$j<sizeof($x);$j++)
			{
				$cust1=sprintf("SELECT item from item_master where itm_code='".$x."'");
				$cust=mysql_query($cust1);
				$cust_num=mysql_num_rows($cust);
				$sno=0;
				
				if($cust_num>0)
				{
					while($cust_val=mysql_fetch_array($cust))
					{
						++$sno
					?>
                <tr>
                   <td width="150px" style="text-align:left; font-size:12px;"> <?php echo $cust_val['item'];//echo substr($cust_val['item'], 0 , 15);?></td>
                   <td width="75px" style="text-align:right;font-size:12px;"> </td>
                   <td width="60px" style="text-align:right;padding-left:10px;font-size:12px;"></td>
                   <td width="30px" style="text-align:right;font-size:12px;"> <?php echo $y;?></td>
                </tr>
  <?php
					}
				}
				else
				{
		
				}
			}
		}
	}
}
  	 ?>
	<!--While end up-->
    <?php
	$subtotal=mysql_query("select sum(amt) AS subtotal from past_bill_details where bill_no='0' and sales_id='".$sales_id."' and tables='".$tab_no."' and chair='".$chair_no."'");
	$subtotal_val=mysql_fetch_array($subtotal);
	$subtotal_val=$subtotal_val['subtotal'];
	
	$taxcal=mysql_query("select ser_tax, vat, amt from past_bill where bill_no='0' and sales_id='".$sales_id."' and tables='".$tab_no."' and chair='".$chair_no."'");
	$taxcal_val=mysql_fetch_array($taxcal);
	$set_tax=$taxcal_val['ser_tax'];
	$vat_tax=$taxcal_val['vat'];
	$amt_tot=$taxcal_val['amt'];
	$set_tax=number_format((float)$set_tax, 2, '.', '');
	$vat_tax=number_format((float)$vat_tax, 2, '.', '');
	?>
    <tr>
        <td colspan="4" style="text-align:right;border-top:1px dashed #000000; font-size:14px;"> Sub Total  <span style="font-size:12px;"> : Rs</span><span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-size:12px;"><?php echo $subtotal_val;?>.00</span></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:right; font-size:12px;"> Service Tax 6% @  <?php echo $subtotal_val;?> : Rs<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $set_tax;?></td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:right; font-size:12px;"> VAT 2% @  <?php echo $subtotal_val;?> :  Rs<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $vat_tax;?></td>
    </tr>
	<tr>
        <td colspan="4" style="text-align:right;border-top:1px dashed #000000;font-size:16px;">  <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>Total : Rs <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $amt_tot;?>.00</strong></td>
    </tr>
    <tr>
        <td colspan="4" style=" padding-top:5px;text-align:center;border-top:1px dashed #000000;font-size:10px;"> <strong>FOR QUERIES & COMPLAINTS</strong> </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align:center;font-size:10px;"><strong>PLEASE CONTACT - 9688211888,9600874340</strong></td>
    </tr>
    </tbody>
</table>
<br/>

</div>
<input type="submit" value="Print" name="printbill" class="btn btn-info" onClick="PrintDoc()"/>
<input type="button" value="Print Preview" class="btn btn-info" onClick="PrintPreview()" />
</form>
</body>
</html>

<?php
if(isset($_POST['printbill']))
{
	///get bill no
	$st = mysql_query("SELECT max(bill_no) as bill_no FROM past_bill_details");
	$st_val=mysql_fetch_array($st);
	$st_val=$st_val['bill_no'];
	$st_val=$st_val+1;
	//update bill no
	
	$upbillno=mysql_query("update past_bill set bill_no='".$st_val."' where bill_no='0' and sales_id='".$sales_id."' and tables='".$tab_no."' and chair='".$chair_no."'");
	$upbillno=mysql_query("update past_bill_details set bill_no='".$st_val."' where bill_no='0' and sales_id='".$sales_id."' and tables='".$tab_no."' and chair='".$chair_no."'");
	header("Location:choice.php?val=unset");
}
?>