<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-responsive table-bordered">

   <thead>
      <tr class="success" style="color:red;">
         
         <th>Name</th>
         <th>Qty</th>
         <th>Unit Price</th>
      </tr>
   </thead>
   <tbody>
    <?php		
		include('config.php');	
		include('Dp_connect.php');

		$st = mysqli_query($con,"SELECT max(bill_no)FROM order_bill where status='1'");
		$st_val=mysqli_fetch_array($st);
		$bil=$st_val['0']	;
		
		$amt="";
		$bill="";
		$sql=mysqli_query($con,"select b.item,b.qty,b.amount,o.amt,o.bill_no,b.bill_no,o.status from bill_item as b left join order_bill as o on b.bill_no=o.bill_no where o.bill_no='$bil'") or mysqli_error($con);	
		while($res=mysqli_fetch_array($sql))
		{?>
			<tr class="active">
				<td><?php echo $res['item'] ?></td>
				<td><?php echo $res['qty'] ?></td>
				<td><?php echo $res['amount'] ?></td>
			</tr>
			
		<?php
			$amt=$res['amt'];
			$bill=$res['bill_no'];
		}
		?>
		<tr class="danger" style="color:red;">
		<td colspan="2"> &nbsp  </td>
		<td><?php echo "RS:".$amt ?></td>
		</tr>	
   </tbody>
   </table>
   <div class="container pull-right">
   <a href="print.php?biil_no=<?php echo $bill;  ?>" class="btn btn-primary">PRINT</a>
   </div>
</body>
</html>