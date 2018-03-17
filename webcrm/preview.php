<?php
	include('config.php');
	session_start();
//	$qutno = $_GET['qutno'];
	$temp = $_GET['temp'];

if(isset($_GET['qutno'])){
    $_POST['edit']=$_GET['qutno'];
    $qutno =$_POST['edit'];
    $getcustomerquerOne = mysqli_query($con, "SELECT * FROM `quotation` WHERE qno='$qutno'");
    $arrayOne = mysqli_fetch_array($getcustomerquerOne);
    $date = $arrayOne['date'];
    $pieces = explode(",",$arrayOne['address']);

    $address = $pieces[0];
    $address1 = $pieces[1];
    $address2 = $pieces[2];
    $address3 = $pieces[3];
    $address4 = $pieces[4];
    $name= $arrayOne['name'];
    $status= $arrayOne['status'];
    $total = $arrayOne['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quatation | Falcon Square</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
<style>

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid black;
    }

    th{
        background-color: #0d69af;
        color: #FFFFFF;
    }

    th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
        text-align: center;
    }

    .testx tbody {
        display: block;
        height: 350px;
        overflow: auto;
        width: 100%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    #footer {
        position:absolute;
        bottom:0;
        width:100%;
        height:60px;   /* Height of the footer */
        background:#6cf;
    }
.clear
{
	clear:both;
}
.body 
{
	font-family:Times New Roman;
	font-size:20px;
}
.cont
{
	margin-left : auto;
	margin-right : auto;
}
body 
{
    background: #eaeaed;
   -webkit-print-color-adjust: exact;
}
.my-footer
{
	background: #2db34a;
	bottom: 0;
	left: 0;
	position: fixed;
	right: 0;
}
.my-header 
{
	background: red;
	top: 0;
	left: 0;
	position: fixed;
	right: 0;

}
</style>
</head>
<body>
 <div class="container">
 <div class="row" >
<!--------------------------------------------PAGE FIRST-------------------------------------------------------------->
	<div class="col-md-12">
	<div class="header" >
		<?php
			$sql=mysqli_query($con,"select * from add_company WHERE id=1");
			$res=mysqli_fetch_array($sql);
		?>
		<div style="margin: auto" class="pull-left">
		<img class="image image-responsive" src="assets/img/finallogo.png" width="150px" height="90px">
		</div>
		<div class="pull-right" style="padding-top:30px;">
			<div class="Addr">
					<h2><?php echo $res['cname']; ?></h2>
				<p><b><?php echo $res['location']; ?>,</b></p>
				<p><b><?php echo $res['city']; ?>,
<!--				--><?php //echo $res['city']."-".$res['pincode']; ?><!--,-->
<!--				--><?php //echo $res['state']; ?><!--,</b><b>--><?php //echo $res['country']; ?><!--</b>.</p>-->
				<p><b>MobileNo:<?php echo $res['mobile']; ?></b>,<b>PhoneNo:<?php echo $res['mobile']; ?></b></p>
				<p><b>EmailId:<?php echo $res['email']; ?></b></p>
				<p><b>Website:<?php echo $res['website']; ?></b>,
<!--				<b>GSTin:--><?php //echo $res['gstin']; ?><!--.</b></p>-->
			</div>
		</div>
		</div>
		<div class="clear"></div>
		<hr style="border:1px solid">
		<?php
			$sel = mysqli_query($con,"select * from quotation where qno = '$qutno'") or die(mysqli_error($con));
			$view = mysqli_fetch_array($sel)
		?>
		<div style="height: 590px" class="content Addr">

			<div class="pull-left">
				<p>Quotation No:<b><?php echo $view['qno']; ?></b></p>
			</div>
			<div class="pull-right">
				<p>Date:<b><?php echo $view['date']; ?></b></p>
			</div>
			<div class="clear"></div>
			<p>To
			<br/>

                <div style="margin-left: 5%">
			<p><?php   echo $address; ?>,</p>
            <p><?php   echo $address3; ?>,</p>
            <p><?php   echo $address4; ?>,</p>
        </div>

			<br/>

			<p>Sub &nbsp &nbsp &nbsp &nbsp &nbsp :&nbsp &nbsp &nbsp &nbsp &nbsp <b><?php echo $view['name']; ?></b>	</p>
			<br/>
			<p><b>Dear Sir,</b></p>

			<p><b>With reference of your enquiry, we are offering our best prices for your 
			requirements.Please feel free to contact us if any furthure technical / commercial
			clarification.We hope our offered materials will meet your requirements.</b></p>
            <div style="text-align: center">
			<p>We excpect your valuable orders and assuring of our <b>best services</b></p>
			<br/>
			<br/>

			<p >Thanking You,</p>
            </div>
            <br/>
			<p class="pull-right">With best regards,</p>
			<br/>
        <br/>
			<p class="pull-right"><b>For MICRO MECH INSTRUMENTS</b></p>

            <br/>
        <br/>

        <div style="margin-bottom: 110px;padding-right: 30px" id="footer">
            <p class="pull-right"><b>Authorized Signature</b></p>
        </div>
        <br/>
        <br/>

		</div>
		<div style="padding-top:100px;">
		<hr style="border:1px solid;margin-top:20px;">
		<div class="footer" style="text-align:center">
		<p>Quotation Details</p>
		</div>
		</div>
	</div>	
<!--------------------------------------END OF PAGE FIRST-------------------------------------------------------------->

<!--------------------------------------------PAGE CENTER-------------------------------------------------------------->


<div class="col-md-12">
	<div class="myheader" >
		<?php
			$sql=mysqli_query($con,"select * from add_company");
			$res=mysqli_fetch_array($sql);
		?>
		<div class="pull-left">
		<img class="image image-responsive" src="assets/img/finallogo.png" width="100px" height="50px">
		</div>
		<div class="pull-right" style="padding-top:30px;">
			<div class="Addr">
					<h2><?php echo $res['cname']; ?></h2>
				<p><b><?php echo $res['location']; ?>,</b></p>
				<p><b><?php echo $res['city']; ?>,
<!--				--><?php //echo $res['city']."-".$res['pincode']; ?><!--,-->
<!--				--><?php //echo $res['state']; ?><!--,</b><b>--><?php //echo $res['country']; ?><!--</b>.</p>-->
				<p><b>MobileNo:<?php echo $res['mobile']; ?></b>,<b>PhoneNo:<?php echo $res['mobile']; ?></b></p>
				<p><b>EmailId:<?php echo $res['email']; ?></b></p>
				<p><b>Website:<?php echo $res['website']; ?></b>,
<!--				<b>GSTin:--><?php //echo $res['gstin']; ?><!--.</b></p>-->
			</div>
		</div>
		</div>
		<div class="clear"></div>
		<hr style="border:1px solid">
		<?php
			$sel1 = mysqli_query($con,"select * from terms where temp_name = ''") or die(mysqli_error($con));
			$views = mysqli_fetch_array($sel1)
		?>
		<div style="height: 590px" class="content Addr" data-role="main" class="ui-content">
<h2 style="text-align:start;textdecoration:underline;">Product details</h2>
            <div style="width: 100%;padding-left: 10px;padding-right: 10px;">
                <div  style="border: 1px solid black;text-align: start;width: 100%" class=" pull-left">
                    <div class="clear"></div>

                    <table>
                        <thead style="border-bottom: 1px solid black">
                        <tr>
                            <th>
                                <h4><b>S.No</b></h4>
                            </th>

                            <th>
                                <h4><b>Particulars</b></h4>
                            </th>

                            <th>
                                <h4><b>Unit Price</b></h4>
                            </th>

                            <th>
                                <h4><b>QTY</b></h4>
                            </th>
                            <th>
                                <h4><b>Amount</b></h4>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $slelectQuery = mysqli_query($con,"SELECT * FROM `quotation_details` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='".$qutno."'");
                        $sno=0;
                        $total =0;

                        while ($accs_id_name = mysqli_fetch_array($slelectQuery)){
                            $sno=$sno+1;
                            ?>
                            <tr>
                                <td><?php if(isset($sno)){echo $sno;}?></td>
                                <td><?php if(isset($accs_id_name['product'])){echo$accs_id_name['product'];}?> </td>
                                <td><?php if(isset($accs_id_name['unit'])){echo $accs_id_name['unit'];}?></td>
                                <td><?php  if(isset($accs_id_name['qty'])){echo$accs_id_name['qty'];}?></td>
                                <td><?php if(isset($accs_id_name['qty'])){echo ($accs_id_name['qty']* (int)$accs_id_name['unit']);  $total =$total +($accs_id_name['qty']* (int)$accs_id_name['unit']);}?></td>
                            </tr>



                            <?php
                        }

                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h4><b>Total Amount : </b></h4></td>
                            <td><h4><b>Rs.<?php  if(isset($total)){echo  $total;}?>.00</b></h4></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div style="margin-bottom: 110px;padding-right: 30px" id="footer">
                <p class="pull-right"><b>Authorized Signature</b></p>
            </div>


</div>
    <div style="padding-top:100px;">
        <hr style="border:1px solid;margin-top:20px;">
        <div class="footer" style="text-align:center">
            <p>Quotation Details</p>
        </div>
    </div>
		</div>




<!--------------------------------------END OF PAGE CENTER-------------------------------------------------------------->




<!--------------------------------------------PAGE LAST-------------------------------------------------------------->
	<div class="col-md-12">
	<div class="header" >
		<?php
			$sql=mysqli_query($con,"select * from add_company");
			$res=mysqli_fetch_array($sql);
		?>
		<div class="pull-left">
		<img class="image image-responsive" src="assets/img/finallogo.png" width="100px" height="50px">
		</div>
		<div class="pull-right" style="padding-top:30px;">
			<div class="Addr">
					<h2><?php echo $res['cname']; ?></h2>
				<p><b><?php echo $res['location']; ?>,</b></p>
				<p><b><?php echo $res['city']; ?>,
<!--				--><?php //echo $res['city']."-".$res['pincode']; ?><!--,-->
<!--				--><?php //echo $res['state']; ?><!--,</b><b>--><?php //echo $res['country']; ?><!--</b>.</p>-->
				<p><b>MobileNo:<?php echo $res['mobile']; ?></b>,<b>PhoneNo:<?php echo $res['mobile']; ?></b></p>
				<p><b>EmailId:<?php echo $res['email']; ?></b></p>
				<p><b>Website:<?php echo $res['website']; ?></b>,
<!--				<b>GSTin:--><?php //echo $res['gstin']; ?><!--.</b></p>-->
			</div>
		</div>
		</div>
		<div class="clear"></div>
		<hr style="border:1px solid">
		<?php
			$sel1 = mysqli_query($con,"select * from terms where temp_name = 'Template -1'") or die(mysqli_error($con));
			$views = mysqli_fetch_array($sel1)
		?>
		<div style="height: 590px"  class="content Addr">
			<div class="title" style="text-align:center;text-decoration:underline;">
			<h3><em>Terms  &  Conditions</em></h3>
			</div>
			<div class="cont">
				<p>Delivery <span>:&nbsp &nbsp <?php echo $views['delivery']; ?></span></p>
				<p>GSTIN <span >:&nbsp &nbsp <?php echo $views['gst']; ?></span></><br/>
				<p>Packing and forwarding charges <span >:&nbsp &nbsp <?php echo $views['pack_charges']; ?></span></p>
				<p>Installation & demonstration <span >:&nbsp &nbsp <?php echo $views['installation']; ?></span></p>
				<p>Insurance Charge <span >:&nbsp &nbsp <?php echo $views['insurance']; ?></span></p>
				<p>Banking and Handling Charges <span >:&nbsp &nbsp <?php echo $views['bankhandling']; ?></span></p>
				<p>Payment Terms <span >:&nbsp &nbsp <?php echo $views['payterm']; ?></span></p>
				<p>Mode of Payment <span >:&nbsp &nbsp <?php echo $views['modepay']; ?></span></p>
				<p>Warrantee <span >:&nbsp &nbsp <?php echo $views['warrantee']; ?></span></p>
				<p>Validity <span >:&nbsp &nbsp <?php echo $views['validity']; ?></span></p>
			</div>
			<p><b>For MICRO MECH INSTRUMENTS</b></p>
            <div style="margin-bottom: 110px;padding-right: 30px" id="footer">
                <p class="pull-right"><b>Authorized Signature</b></p>
            </div>

		</div>
		<div style="padding-top:100px;">
		<hr style="border:1px solid;margin-top:20px;">
		<div class="footer" style="text-align:center">
		<p>Quotation details</p>
		</div>
		</div>
	</div>	
<!--------------------------------------END OF PAGE LAST-------------------------------------------------------------->
</div>
 </div>
</body>
</html>
<script>
window.print();
//window.location.assign('quotation.php');
</script>