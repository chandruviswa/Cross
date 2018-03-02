<?php
error_reporting(0);
include('session.php');
include('menu.php');
include('include/connect.php');

$from = $_POST['from'];
$to = $_POST['to'];
$vcno = $_POST['vcno'];
$billno = $_POST['billno'];
$scus = $_POST['scus'];
$type = $_POST['type'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <style>
        .btn-circle.btn-xl {
            width: 70px;
            height: 50px;
            padding: 10px 16px;
            font-size: 24px;
            line-height: 1.33;
            border-radius: 35px;
        }

    </style>
    <meta name="viewport" content="user-scalable=yes, width=device-width" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="animate/animate.min.css">
    <title>BILL REPORT</title>


    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/maruti-style.css" />
    <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
    <link rel="stylesheet" href="css/colorpicker.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
</head>
<body   style="background: url(images/bgfine.png)" >
<div class="container navbar"  style="background-color:transparent; width:100%;margin-top: 10px">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff; font-weight:bold; font-size:15px;"> BILL WISE REPORT </h4>
    </div>
</div>



    <div class="container">
        <div class="form">
            <div class="span11">
                <div style="margin-top: 5%" class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Bill Statement</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" class="form-horizontal">
                            <div align="center" style="position: center;" class="col-md-12 col-sm-12">
                                <div align="center" class="col-md-3 col-sm-3 " style="text-align: center">
                                <div class="control-group">
                                    <label class="control-label">From Date</label>
                                    <div class="controls">
                                        <input type="date" id="from" class="span3"  name="from" value="<?php if(isset($from)) { echo $from; } ?>" />
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('#from').value = '<?php if(isset($from)){ echo $from; } ?>';
                                </script>
                            </div>

                                <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">To Date</label>
                                    <div class="controls">
                                        <input type="date" id="to" class="span3" name="to"  value="<?php if(isset($to)){ echo $to; } ?>" />
                                    </div>
                                </div>

                            <script>
                                document.getElementById('#to').value = '<?php if(isset($to)) { echo $to; } ?>';
                            </script>

                            </div>
                                <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">
                            <div class="control-group">
                                <label class="control-label">TYPE</label>
                                <div class="controls">
                                    <select name="type" id="type">
                                        <option value="">Select Type</option>
                                        <option value="Restaurant">RESTAURANT</option>
                                        <option value="takeaway">TAKE AWAY</option>

                                    </select>

                                </div>
                            </div>

                            <script>
                                document.getElementById('#type').value = '<?php if(isset($type)) { echo $type; } ?>';
                            </script>


</div>







                        </div>
                            <button type="submit" name="submit" class="btn btn-success">SEARCH</button>
                            <a href="bill_report_print.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>&type=<?php echo $type; ?>" class="btn btn-success">PRINT</a>
                        </form>

                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>BILLS STATEMENT</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <th><h5>DATE</h5></th>
                            <th><h5>BILL NO</h5></th>
                            <th><h5>TYPE</h5></th>
                            <th><h5>AMOUNT</h5></th>
                            <th><h5>MODE</h5></th>
                            </thead>
                            <?php
                            if(isset($_POST['submit']))
                            {
                                $totalQty=0;
                                $totalAmt =0;
                                $from = $_POST['from'];
                                $to = $_POST['to'];

                                $type = $_POST['type'];

                                $itemWiseQueryFour=""; //echo  "<script>alert('".$_POST['type']."')</script>";

                            if($_POST['type']=="Restaurant"){
                                $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."')";
                            }elseif($_POST['type']=="takeaway"){
                                $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair  FROM takeaway WHERE ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."') ";
                            }else{
                                echo "<script>alert('Please select type')</script>";
                            }

                                $cus = mysql_query($itemWiseQueryFour);

                               // echo "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."')";
                                while($data = mysql_fetch_array($cus))
                                {
                                    ?>
                                    <tr>
                                        <td><center><?php echo $data['date']; ?></center></td>
                                        <td><center><?php echo $data['bill_no']; ?></center></td>
                                        <td><center><?php echo $type; ?></center></td>
                                        <td><center><?php echo $data['amt']; ?></center></td>
                                        <td><center><?php echo $data['mode']; ?></center></td>

                                    </tr>
                                    <?php
                                    $totalAmt = $totalAmt + (int)$data["amt"];
                                }
                            }
                            ?>
                        </table>
                        <div align="center" class="col-md-6 col-sm-6 pull-right" style="text-align: center;">
                                    <h3  style="color: white;font-weight: bold">Total Rs.:<?php if($totalAmt){echo $totalAmt;}else{echo 0;}  ?>.00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
</html>
