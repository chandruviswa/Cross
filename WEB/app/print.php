<?php
include('config.php');
?>

<html>
<head>
<meta name="viewport" content="user-scalable=yes, width=device-width" />
<link rel="stylesheet" type="text/css" href="print.css" />
<link rel="stylesheet" type="text/css" href="Style.css" />
!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
/*--This JavaScript method for Print command--*/
    function PrintDoc() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
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
        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>
</head>
<body  id="printarea">
<div class="container">
<h4 style="text-align:center; color:#000; font-size:20px; margin-bottom:16px;">KITCHEN MANAGEMENT</h4>
<h5 style="text-align:center; color:#000;font-size:15px;margin-bottom:16px;"><b>Gandhipuram</h5>
<h5 style="text-align:center; color:#000;font-size:15px;margin-bottom:8px;"><b>Coimbatore</h5>
</div>
<div class="container">

		<?php

		$st = mysqli_query($con,"SELECT max(bill_no)FROM order_bill where status='1'");
		$st_val=mysqli_fetch_array($st);
		echo $st_val[0];
		
		$par_tot=mysqli_query($con,"select bill_no,amt from order_bill where bill_no='".$st_val[0]."'");
		$par_tot_val=mysqli_fetch_array($par_tot);
		//print_r($par_tot_val[1]);exit;
		
		/* $cust1=sprintf("SELECT * from order_bill order by id desc limit 1");
		$cust=mysqli_query($con,$cust1);
		$cust_num=mysqli_num_rows($cust); 
		while($cust_val=mysqli_fetch_array($cust))
			{*/
		?>
        
<hr class="visible-phone"/>
<div style="float:left;">
DATE:<?php echo date('y-m-d');?> <br/>
TIME:<?php echo time(); /*}*/?>
</div>
<div style=" float:right;">
BILL NO:<?php echo $par_tot_val['bill_no'];?><br/>
TYPE:LINE
</div>

 </div>
 
        
<hr class="visible-phone" style="margin-top:51px;"/>
      <table class="table table-responsive" style="color:#000; margin-left:5%; border-color:transparent; width:93%;">
   <thead>
      <tr style="color:#000;">
         <th style="padding-left:5px; font-size:12px; border-color:transparent;">Name</th>
         <th style="font-size:11px; padding-right:25px; border-color:transparent;">Qty</th>
         <th style="font-size:11px; padding-right:45px; border-color:transparent;">Amt</th>
         </tr>
   </thead>
   <tbody>
    <?php				
		
		$st = mysqli_query($con,"SELECT max(bill_no) FROM bill_item where status='1'");
		$st_val=mysqli_fetch_array($st);
			
		$cust1=sprintf("SELECT * from bill_item where bill_no='".$st_val[0]."'");
		$cust=mysqli_query($con,$cust1);
		$cust_num=mysqli_num_rows($cust);
		$sno=0;
		if($cust_num>0)
		{
			while($cust_val=mysqli_fetch_array($cust))
			{++$sno
			?>
				<tr>
					
					<th style="font-size:12px; padding-left:5px;font-weight:normal; border-color:transparent;"><?php echo $cust_val['item'];?></th>
					<th style="font-size:12px; font-weight:normal; border-color:transparent; border-top:0px solid #DDD;"><?php echo $cust_val['qty'];?></th>
                    <th style="font-size:12px;font-weight:normal; border-color:transparent;"><?php echo $cust_val['amount'];?></th>
                    
				</tr>
               
			<?php
			}
		}
		else
		{
	
		}
		?>
       	 		<tr>
            	<th> TOTAL: <?php echo $par_tot_val['amt'];?></th>	
                </tr> 
                	
        <tr>
            <td style=" border-top:0px solid #DDD;">
                <input type="button" value="Print" class="btn btn-info" onClick="PrintDoc()"/>
            </td>
        </tr>
    </table>
    			

<hr class="visible-phone"/>
<h6 style="text-align:center;"> Thank You, Visit Again!!! </h6>
<hr class="visible-phone"/>
</body>
</html>

