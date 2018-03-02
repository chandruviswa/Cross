<?php
error_reporting(0);
include('session.php');
include('menu.php');
include('include/connect.php');

date_default_timezone_set("Asia/Kolkata");


$curnt_date = date("Y-m-d");
$current_time=date("H:i:s");
$closing_cash="";
$closing_coins="";
$opening_cash="";
$opening_coins="";
$restaurnTotal="";
$restaurnTotalCASH="";
$restaurnTotalCARD="";

$takeaway="";
$takeawayCARD="";
$takeawayCASH="";
$totalShiftAmt="";

$secshiftDate=mysql_query("SELECT opening_date FROM `shift_details` WHERE emp_id='".$_SESSION['user_id']."' AND closing_date=''");

$sedecedce=mysql_fetch_array($secshiftDate);

$shift_start=$sedecedce['opening_date'];



$selectOpeningCashCoin=mysql_query("SELECT opening_cash,opening_coins FROM `shift_details` WHERE emp_id='".$_SESSION['user_id']."' order by det_id desc limit 0,1");
$openiCashCoin=mysql_fetch_array($selectOpeningCashCoin);
$opening_cash=$openiCashCoin['opening_cash'];
$opening_coins=$openiCashCoin['opening_coins'];

$restaurantQueryOne=mysql_query("SELECT sum(amt) as total FROM `past_bill` WHERE e_id='" .$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '".$shift_start ."' AND '". $curnt_date ."') or (date='".$curnt_date ."')) limit 0,1");
$restArry=mysql_fetch_array($restaurantQueryOne);

$restaurnTotal =$restArry['total'];



$restaurantQueryTWO=mysql_query("SELECT sum(cash) as total FROM `past_bill` WHERE e_id='".$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '" .$shift_start."' AND '" . $curnt_date."') or (date='" . $curnt_date."')) limit 0,1");
$restArryOne=mysql_fetch_array($restaurantQueryTWO);

$restaurnTotalCASH=$restArryOne['total'];

$restaurantQueryTHREE=mysql_query("SELECT sum(card) as total FROM `past_bill` WHERE e_id='".$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '" .$shift_start."' AND '" . $curnt_date."') or (date='" . $curnt_date."')) limit 0,1");
$restArryThree=mysql_fetch_array($restaurantQueryTHREE);

$restaurnTotalCARD=$restArryThree['total'];

//$restaurnTotal=$restaurnTotal+$restaurnTotalCASH;


$takeawayQuery=mysql_query("SELECT sum(amt) as total FROM `takeaway` WHERE e_id='" .$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '" .$shift_start."' AND '" . $curnt_date ."') or (date='". $curnt_date . "')) limit 0,1");
$restArryFour=mysql_fetch_array($takeawayQuery);

$takeaway=$restArryFour['total'];

$takeawayQueryOne=mysql_query("SELECT sum(cash) as total FROM `takeaway` WHERE e_id='" .$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '" .$shift_start."' AND '" . $curnt_date ."') or (date='". $curnt_date . "')) limit 0,1");
$restArryFive=mysql_fetch_array($takeawayQueryOne);

$takeawayCASH=$restArryFive['total'];

$takeawayQueryTwo=mysql_query("SELECT sum(card) as total FROM `takeaway` WHERE e_id='" .$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '" .$shift_start."' AND '" . $curnt_date ."') or (date='". $curnt_date . "')) limit 0,1");
$restArrySix=mysql_fetch_array($takeawayQueryTwo);

$takeawayCARD=$restArrySix['total'];

$takeawayQueryThree=mysql_query("SELECT sum(credit_card) as total FROM `takeaway` WHERE e_id='" .$_SESSION['user_id']."' and (mode='Card' or mode='Cash' or mode='Credit Card' or mode='Cash & Card') and ((date BETWEEN '" .$shift_start."' AND '" . $curnt_date ."') or (date='". $curnt_date . "')) limit 0,1");
$restArrySeven=mysql_fetch_array($takeawayQueryThree);


$totalShiftAmt =(int)$opening_cash+(int)$closing_coins+(int)$restaurnTotal+(int)$takeaway;


if(isset($_POST['close'])){

    $restamus=mysql_query("select * from past_bill where bill_no='0' and date=$curnt_date");

    if((mysql_num_rows($restamus))>0){
        echo "<script>alert('Sorry, Restaurant bill is not collected.');</script>";
    }
   // $restas=mysql_num_rows($restamus);


    $takeawas=mysql_query("select * from takeaway where bill_no='0' and date=$curnt_date");

    $taketas=mysql_fetch_row($takeawas);

//echo "<script>alert('$restas');</script>";

    if((mysql_num_rows($restamus))>0){
        echo "<script>alert('Sorry, Restaurant bill is not collected.');</script>";
    }
   elseif($taketas>0){
        echo "<script>alert('Sorry, Restaurant bill is not collected.');</script>";
    }else{


        echo '<script >
var shifttext; 
var r = confirm("Are you sure to close shift!...");
if (r === true) {
    shifttext=1;
   
}else { 
    shifttext=0;
}</script>';




        $falg= "<script>document.writeln(shifttext)</script>";
       // echo "<script>alert('$falg')</script>";
       // if ($falg == 1){

            $itemUpQuery=mysql_query("SELECT * FROM `shift_details` WHERE emp_id='".$_SESSION['user_id']."' order by det_id desc limit 0,1 ");
            $shftcloseOne=mysql_fetch_array($itemUpQuery);
            $det_id=$shftcloseOne['det_id'];
            $setTime=date("h:i:s A");

            $updateQuery=mysql_query("update shift_details set closing_cash='". $closing_cash ."' ,closing_coins='". $closing_coins ."' , closing_date='".$curnt_date ."' , closing_time='". $setTime ."' , status='0' where det_id='". $det_id ."' ");


            echo "<script>alert('Successfully shift closed')</script>";

        header("Location:logout.php");

       // }

    }






}


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
    <title>BILL RETURN</title>
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
<body  style="background: url(images/bgfine.png)">


<div class="container">
    <div class="form">
        <div class="span11">
            <div style="margin-top: 5%" class="widget-box">
                <div  class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>SHIFT Statement</h5>
                </div>


                <div class="widget-content nopadding">
                    <form action="" method="post" class="form-horizontal">

                        <div align="center" style="position: center;" class="col-md-12 col-sm-12">


                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">OPENING CASH</label>
                                    <div class="controls">
                                        <input type="text" id="billno"  name="billno" value="<?php if(isset($opening_cash)) { echo  $opening_cash; }else{echo 0;} ?>" />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">OPENING COINS</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($opening_coins)){echo $opening_coins;}else{echo 0;}?>"  name="description"  />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">RESTAURANTS :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($restaurnTotal)) { echo  $restaurnTotal; }else{echo 0;} ?>"  name="description"  />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">RESTAURANT CASH :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($restaurnTotalCASH)) { echo  $restaurnTotalCASH; }else{echo 0;} ?>" name="description"  />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">RESTAURANT CARD :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($restaurnTotalCARD)) { echo  $restaurnTotalCARD; }else{echo 0;} ?>" name="description"  />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">TAKE AWAY :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($takeaway)) { echo  $takeaway; }else{echo 0;} ?>" name="description"  />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">TAKE AWAY CASH :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($takeawayCASH)) { echo  $takeawayCASH; }else{echo 0;} ?>" name="description"  />
                                    </div>

                                </div>
                            </div><div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">TAKE AWAY CARD :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($takeawayCARD)) { echo  $takeawayCARD; }else{echo 0;} ?>" name="description"  />
                                    </div>

                                </div>
                            </div>
                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">TOTAL :</label>
                                    <div class="controls">
                                        <input type="text" id="description" value="<?php if(isset($totalShiftAmt)) { echo  $totalShiftAmt; }else{echo 0;} ?>"  name="description"  />
                                    </div>

                                </div>
                            </div>
                        </div>




                        <button type="submit" name="close" class="btn btn-success">CLOSE</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





</body>
</html>
