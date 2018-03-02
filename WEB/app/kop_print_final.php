<?php
//include('session.php');
include('config.php');

require_once __DIR__ . '/Dp_connect.php';

    // connecting to db
    $db = new DB_CONNECT();


$getprinter=mysqli_query($con,"SELECT * FROM printer");
$getprinter_val= mysqli_fetch_array($getprinter);
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
<!--This JavaScript method for Print Preview command-->
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

<style>
.error {
    width:200px;
    height:20px;
    height:auto;
    position:relative;
    left:50%;
    margin-left:-100px;
    bottom:10px;
    background-color: #383838;
    color: #F0F0F0;
    font-family: Calibri;
    font-size: 15px;
    padding:10px;
    text-align:center;
    border-radius: 2px;
    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
}
</style>
<script>
$( document ).ready(function() {
    $('.error').stop().fadeIn(400).delay(1500).fadeOut(400); //fade out after 3 seconds
});
</script>
<script>
	//setTimeout(function(){ self.print();},3000);
</script>
<title>Bill</title>
</head>

<body>
<div class='error' style='display:none'>Order Placed! Plz wait</div>
<form method="post" action="" name="prt">
<div  id="printarea">
<?php
	    $cust_edit=mysqli_query($con,"select * from add_profile");
        $cust_edit_num=mysqli_num_rows($cust_edit);
        if($cust_edit_num>0)
        {
			$j=0;
            while($cust_edit_val=mysqli_fetch_array($cust_edit))
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
 	    
  	    $getuname=mysqli_query($con,"SELECT sales_id from past_bill_print order by id desc limit 1");
		$getval=mysqli_fetch_array($getuname);
		$salid=$getval['sales_id'];
		
		$waiter=mysqli_query($con,"select name from add_employee where eid='".$salid."'");
		$waiter_val=mysqli_fetch_array($waiter);
				
		$par_tot=mysqli_query($con,"select bill_no,amt from past_bill_details where bill_no='0'");
		$par_tot_val=mysqli_fetch_array($par_tot);
		
		$cust1=sprintf("SELECT date,time,tables,chair,itm_code,sales_id from past_bill_print order by id desc limit 1");
		$cust=mysqli_query($con,$cust1);
		$cust_num=mysqli_num_rows($cust);
		while($cust_val=mysqli_fetch_array($cust))
		{
			$tab_no=$cust_val['tables'];
			$chair_no=$cust_val['chair'];
			$itm_code=$cust_val['itm_code'];
			$sid=$cust_val['sales_id'];
		?>
                <tr>
                    <td style="text-align:left;border-top:1px dashed #000000;font-size:11px;"> Table: <?php echo $cust_val['tables'];?>-<?php echo $cust_val['chair'];?></td>
                    <td colspan="3" style="text-align:right;font-size:11px;border-top:1px dashed #000000;"> Date: <?php echo $cust_val['date'];?> <?php echo date("g:i a", strtotime($cust_val['time']));?></td>
                </tr>
                <tr>
                    <td style="text-align:left;font-size:12px;" colspan="3"> <?php echo $waiter_val[0];}?></td>
                    <td colspan="1" style="text-align:right; font-size:12px"> </td>
                </tr>
                <tr>
                   <td width="150px" style="text-align:left;border-top:1px dashed #000000;font-size:13px;"> <strong>ITEM</strong></td>
                   <td width="30px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> </td>
                   <td width="75px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> </td>
                   <td width="60px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> <strong>QTY</strong></td>
                </tr>
                <tr>
                   <td width="150px" style="text-align:left;border-top:1px dashed #000000;font-size:13px;"></td>
                   <td width="30px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> </td>
                   <td width="75px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"> </td>
                   <td width="60px" style="text-align:right;border-top:1px dashed #000000;font-size:13px;"></td>
                </tr>
    <!--while goes here-->
    
    
     <?php
	 //get data from past_bill_details
	 $mybill=mysqli_query($con,"select item,qty from past_bill_details where sales_id='".$sid."' and tables='".$tab_no."' and chair='".$chair_no."' and bill_no=0");
	 while($cust_val=mysqli_fetch_array($mybill))
	 {
	 ?>
        <tr>
           <td width="150px" style="text-align:left; font-size:12px;"> <?php echo $cust_val['item'];//echo substr($cust_val['item'], 0 , 15);?></td>
           <td width="75px" style="text-align:right;font-size:12px;"> </td>
           <td width="60px" style="text-align:right;padding-left:10px;font-size:12px;"></td>
           <td width="30px" style="text-align:right;font-size:12px;"> <?php echo $cust_val['qty'];?></td>
        </tr>
	 <?php
		}
  	 ?>
	<!--While end up-->
   
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


<input type="submit" value="Print" name="printbill" class="btn btn-info" onClick="PrintDoc()" style="display:block;"/>
<input type="button" value="Print Preview" class="btn btn-info" onClick="PrintPreview()" style="display:block;"/>

</form>
</body>
</html>

<?php
 require_once('kop_print_final.php');

?>
