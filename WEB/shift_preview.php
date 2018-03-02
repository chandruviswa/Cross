<?php
error_reporting(0);
include('session.php');

include('include/connect.php');
date_default_timezone_set("Asia/Kolkata");


$curnt_date = date("Y-m-d");
$current_time=date("H:i:s");
$flag="";

$name="";
$shift_name="";
$closing_coins="";
$open=null;


$cus = mysql_query("select a.name,s.closing_coins,s.closing_cash,sh.shift_name,s.opening_date,s.closing_date from shift_details s left join add_employee a on a.eid=s.emp_id left join shift sh on sh.shift_id=s.shift_id where s.emp_id='".$_SESSION['user_id']."' order by det_id DESC limit 0,1");
//echo "select a.name,s.closing_coins,sh.shift_name,s.opening_date,s.closing_date from shift_details s left join add_employee a on a.eid=s.emp_id left join shift sh on sh.shift_id=s.shift_id where s.emp_id='".$_SESSION['user_id']."' order by det_id DESC limit 0,1";
$post=mysql_fetch_array($cus);

$name=$post['name'];
$shift_name=$post['shift_name'];
$closing_coins=$post['closing_coins'];
$das=$post['closing_date'];
$open=$post['closing_cash'];

if (($post['opening_date'] != "0" && ($post['opening_date'] != "")) && ($post['closing_date'] != "0") && ($post['closing_date'] != ""))
{
   // continue button2.Enabled = false;
    $flag=true;
}
else if (($post['closing_date'] == "0") || (($post['closing_date'] == "")))
{
    $flag=false;
                        }




if(isset($_POST['start'] )){

    $selectShiftQuery=mysql_query("SELECT closing_cash FROM `shift_details` order by det_id desc  limit 0,1");
    $opening_cashArry=mysql_fetch_array($selectShiftQuery);
    $opening_cash=$opening_cashArry['closing_cash'];
    if(empty($opening_cash)){
        $opening_cash="0";
    }

    $seletDEtails=mysql_query("select s.*,a.name,sh.shift_name from shift_details s left join add_employee a on a.eid=s.emp_id left join shift sh on sh.shift_id=s.shift_id where s.emp_id='". $_SESSION['user_id'] . "' order by det_id DESC limit 0,1");
$seltQecec=mysql_fetch_array($seletDEtails);
    $shift_id="";
    $emp_id="";
    $closing_cash="";
    $closing_coins="";
    $opening_date="";
    $opening_time="";

    $current_timeOne=date("12:00:00");

    if ( $current_time<  $current_timeOne)
    {
        $shift_id = "1";
    }
    else
    {
        $shift_id = "2";
    }

    $emp_id=$seltQecec['emp_id'];
    $closing_cash=$seltQecec['closing_cash'];
    $closing_coins=$seltQecec['closing_coins'];
    $opening_date=$seltQecec['opening_date'];
    $opening_time=$seltQecec['opening_time'];
    $setTime=date("h:i:s A");
    $myIp="";
    $insertQurry=mysql_query("insert into shift_details (shift_id,emp_id,opening_cash,closing_cash,opening_coins,closing_coins,opening_date,opening_time,myip,status) values('" . $shift_id . "','" . $emp_id ."','".  $opening_cash ."','0','".  $closing_coins ."','0','" . $curnt_date ."','" .$setTime ."','".$myIp."','1')");
  header("location: choice.php");

}

if(isset($_POST['continue'] )){
    $selectShiftQuery=mysql_query("select det_id from shift_details order by det_id desc limit 0,1");
    $opening_cashArry=mysql_fetch_array($selectShiftQuery);
    $detid=$opening_cashArry['det_id'];
   $ipdate=mysql_query("update shift_details set status='1' where det_id='".$detid."' ");
    header("location: choice.php");

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
    <title>SHIFT DETAILS</title>
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
                    <h5>Shift Details</h5>
                </div>


                <div class="">
                    <form action="" method="post" class="form-actions">

                        <div align="center" class="">
                            <div align="center" style="float: left" class="span6" >

                                <div class="control-group">
                                    <label class="control-label">CASHIER NAME :</label>
                                    <div class="controls">
                                        <input type="text" id="billno"  name="billno" readonly value="<?php if(isset($name)) { echo  $name; } ?>" />
                                    </div>



                                </div>
                            </div>

                            <div style="float: right" align="" >

                                <div class="control-group">
                                    <label class="control-label">SHIFT :</label>

                                    <div class="controls">
                                        <input type="text" id="billno" readonly name="billno" value="<?php if(isset( $shift_name)) { echo  $shift_name; } ?>" />
                                    </div>

                                </div>
                            </div>
                            <div class="clear" style="clear:both;"></div>

                        </div>

                        <div align="center" class="">
                            <div align="center" style="float: left" class="span6" >

                                <div class="control-group">
                                    <label class="control-label">OPENING COIN :</label>
                                    <div class="controls">
                                        <input type="text" id="billno"  name="billno" readonly value="<?php if(isset( $closing_coins)) { echo $closing_coins; } ?>" />
                                    </div>



                                </div>
                            </div>

                            <div style="float: right" align="" >

                                <div class="control-group">
                                    <label class="control-label">OPENING CASH :</label>
                                    <div class="controls">
                                        <input type="text" id="billno" readonly name="billno" value="<?php if(isset($open)) { echo  $open; }else{echo 0;}?>" />
                                    </div>

                                </div>
                            </div>
                            <div class="clear" style="clear:both;"></div>

                        </div>

                        <div align="center" class="">
                            <div align="center" style="float: left" class="span6" >

                                <div class="control-group">
                                    <label class="control-label">DATE:</label>
                                    <div class="controls">
                                        <input type="text" id="billno"  name="billno" readonly value="<?php if(isset( $curnt_date)) { echo  $curnt_date; } ?>" />
                                    </div>



                                </div>
                            </div>

                            <div style="float: right" align="" >

                                <div class="control-group">
                                    <label class="control-label">TIME :</label>
                                    <div class="controls">
                                        <input type="text" id="billno" readonly name="billno" value="<?php if(isset($current_time)) { echo $current_time; } ?>" />
                                    </div>

                                </div>
                            </div>
                            <div class="clear" style="clear:both;"></div>

                        </div>



<!--                        </div>-->
<!--                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">-->
<!---->
<!--                                <div class="control-group">-->
<!--                                    <label class="control-label">OPENING CASH</label>-->
<!--                                    <div class="controls">-->
<!--                                        <input type="text" id="description"  name="description"  />-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">-->
<!---->
<!--                                <div class="control-group">-->
<!--                                    <label class="control-label">DATE</label>-->
<!--                                    <div class="controls">-->
<!--                                        <input type="text" id="description"  name="description"  />-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">-->
<!---->
<!--                                <div class="control-group">-->
<!--                                    <label class="control-label">TIME</label>-->
<!--                                    <div class="controls">-->
<!--                                        <input type="text" id="description"  name="description"  />-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">-->
<!---->
<!--                                <div class="control-group">-->
<!--                                    <label class="control-label">SHIFT</label>-->
<!--                                    <div class="controls">-->
<!--                                        <input type="text" id="description"  name="description"  />-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->







<?php

if($flag == true){
    ?>
    <button  type="submit" name="start" class="btn btn-success">START SHIFT</button>
    <button disabled type="submit" name="continue" class="btn btn-success">CONTINUE SHIFT</button>
    <?php
}else{
    ?>
    <button disabled type="submit" name="start" class="btn btn-success">START SHIFT</button>
    <button type="submit" name="continue" class="btn btn-success">CONTINUE SHIFT</button>
    <?php
}
?>





                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





</body>
</html>
