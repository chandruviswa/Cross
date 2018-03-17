<?php
//include('menuone.php');

include('config.php');
include('session.php');
$curentDate = date("Y-m-d");
$currentTime = date("H:i:s");
$qtano = 0;
if(isset($_GET['edit'])){
    $_POST['edit']=$_GET['edit'];
    $qtano =$_POST['edit'];
    $getcustomerquerOne = mysqli_query($con, "SELECT * FROM `quotation` WHERE qno='$qtano'");
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


if (isset($_POST['addsvi'])) {
    $ids = $_POST['edit'];
    header("Location:addvisit.php?edit=" . $ids . "");
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Customer | Falcon Square</title>
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

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }


    </style>
</head>

<body >


                                    <!--------------------------------------------PAGE FIRST-------------------------------------------------------------->
                                    <div style="margin-top: 14%;padding-left: 5%;padding-right: 5%" class="col-md-12">
                                        <div style="width: 100%;padding-top: 10px;padding-right:10px;padding-left:10px;">
<!--                                             <div  style="border: 1px solid black;text-align: center;padding: 20px;width: 84%" class=" pull-left">-->
<!--                                                      <h2 style="font-weight: bold"><b>Quotation</b></h2>-->
<!---->
<!--                                             </div>-->
<!--                                             <div style="border: 1px solid black;padding: 10px;width: 16%;" class="pull-right">-->
<!--                                                      <h4 >Q.No : 12312 <br> 08-03-2018</h4>-->
<!--                                             </div>-->
                                            <table style="">
                                                <thead>
                                                <tr style="text-align: center;border: 1px solid black">
                                                    <td style="width: 75%"><b>Quotation</b></td>
                                                    <td style="width: 25%">
                                                     Quotation No : <?php if($qtano){echo $qtano;}?> <br> Date : <?php if($date){echo $date;}?>
                                                    </td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div style="width: 100%;padding-left: 10px;padding-right: 10px;height: 80px;">
                                        <div  style="border: 1px solid black;text-align: start;padding-left: 10px;padding-right: 10px;width: 100%" class=" pull-left">
                                            <div class="clear"></div>
                                            <br>
                                            <h4 style="font-weight: bold"><b>To</b></h4>
                                             <div style="margin-left: 5%">
                                                 <p><b><?php echo $address; ?></b>,<br>
                                                     <?php echo $address3; ?>,<br>
                                                 <?php echo  $address4; ?>.</p>
                                             </div>
                                        </div>
                                        </div>

                                        <div style="width: 100%;padding-left: 10px;padding-right: 10px;height: 80px">
                                            <div  style="border: 1px solid black;text-align: start;padding-left: 10px;padding-right: 10px;width: 100%" class=" pull-left">
                                                <div class="clear"></div>
                                                <p > Kind Attn :<b><?php echo  $name?></b>,</p>
                                                <p > Dear Sir,</p>
                                                    <div style="margin-left: 5%">
                                                        <p>With reference of your enquiry, we are offering our best prices for your
                                                                requirements.Please feel free to contact us if any furthure technical / commercial
                                                                clarification.We hope our offered materials will meet your requirements.</p>
                                                    </div>
                                                <p>We excpect your valuable orders and assuring of our best services</p>
                                            </div>
                                        </div>

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
                                                  $slelectQuery = mysqli_query($con,"SELECT * FROM `quotation_details` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='$qtano'");
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

                                        <div style="width: 100%;padding-left: 10px;padding-right: 10px;height: 80px">
                                            <div  style="border: 1px solid black;text-align: start;padding-left: 10px;padding-right: 10px;width: 70%" class=" pull-left">
                                                <div class="clear"></div>

                                                <h4 >Notes</h4>

                                            </div>
                                            <div  style="border: 1px solid black;text-align: center;padding-left: 10px;padding-right: 10px;width: 30%" class=" pull-right">
                                                <div class="clear"></div>

                                                <h4 >For FALCON SQUARE</h4>
                                                <div style="margin-top: 75px;margin-bottom: 75px" class="clearfix"></div>

                                                <h4 >Authorised Signatory</h4>

                                            </div>
                                            <div  style="border: 1px solid black;text-align: start;padding-left: 10px;padding-right: 10px;width: 70%" class=" pull-left">
                                                <div class="clear"></div>
                                                <p style="font-weight: initial">Terms & Conditions</p>
                                                <div style="margin-left: 5%">
                                                    <p>1.Payment 100% in advance against proforma invoice <br>
                                                2.<b>Vat</b> Extra @ <b>14.5%</b> on total price <br>
                                                3.Packing and Forwording extra @ 2% on total price <br>
                                                4.<b>Valitity :</b> 30 days from the offer date <br>
                                                5.<b>Delivery :</b> 2-3 weeks from date of receipt of Technically and Commercially clear PO along with advance payment </p>
                                                </div>
                                            </div>

                                        </div>


<!--                                        <hr style="border:1px solid">-->


                                    </div>
                                    <!--------------------------------------END OF PAGE FIRST-------------------------------------------------------------->

<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>

</body>

</html>
<script>
window.print();
//window.location.assign('quotation.php');
</script>
