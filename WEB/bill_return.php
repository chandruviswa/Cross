<?php
error_reporting(0);
include('session.php');
include('menu.php');
include('include/connect.php');

$billno= $_POST['billno'];
$to = $_POST['to'];
$vcno = $_POST['vcno'];
$billamt = $_POST['billamt'];
$scus = $_POST['scus'];
$type = $_POST['type'];
$curnt_date = date("Y-m-d");


if(isset($_POST['billUpdate']))
{
    if($type=='Restaurant'){

        $bill_no = ""; $e_id = ""; $date = ""; $time = ""; $amt = ""; $discount = ""; $disc_amt = ""; $sub_tot = "" ;$sales_id = "";
        $shift = ""; $tables = ""; $chair = ""; $description = "";
        $upstatus=mysql_query("select bill_no,e_id,date,time,amt,discount,disc_amt,sub_tot,sales_id,shift,tables,chair,description from past_bill where bill_no='". $_SESSION['billno']. "' and date='$curnt_date'");
        $data=mysql_fetch_array($upstatus);
        $bill_no=$data['bill_no'];
        $e_id=$data['e_id'];
        $date=$data['date'];
        $time=$data['time'];
        $amt=$data['amt'];
        $discount=$data['discount'];
        $disc_amt=$data['disc_amt'];
        $sub_tot=$data['sub_tot'];
        $sales_id=$data['sales_id'];
        $shift=$data['shift'];
        $tables=$data['tables'];
        $chair=$data['chair'];
        $description=$data['description'];

        $upstatusOne==mysql_query("insert into past_bill_return (bill_no,e_id,date,time,amt,discount,disc_amt,sub_tot,sales_id,shift,tables,chair,description,discription) values ('$bill_no','$e_id','$date','$time','$amt','$discount','$disc_amt','$sub_tot','$sales_id','$shift','$tables','$chair','$description','".$_POST['description']."')");
        $upstatusTwo==mysql_query("delete from past_bill where bill_no='". $_SESSION['billno']. "' and date='$curnt_date'");
        $upstatusThree==mysql_query("insert into past_bill_details_return(bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,remarks,unit_type)  select bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair,remarks,unit_type from past_bill_details where bill_no='" . $_SESSION['billno'] ."' and date='$curnt_date'");
        $upstatusFour==mysql_query("delete from past_bill_details where bill_no='" .  $_SESSION['billno'] ."' and date='$curnt_date'");
       // $upstatusFive==mysql_query("delete from expenses where descr='DISCOUNT to Table Bill no." . $bill_no ."' and date='$curnt_date' and amt='$disc_amt'and pro='CASH OUT' and expense='BILL LESS' and category='Canteen Expenses' and emp_id='$e_id' and waiter_id='$sales_id'");


            echo "<script>alert('Successfully updated')</script>";




    }elseif($type=='takeaway'){

        $bill_no = ""; $e_id = ""; $date = ""; $time = ""; $amt = ""; $discount = ""; $disc_amt = ""; $sub_tot = "" ;$sales_id = "";
        $shift = ""; $tables = ""; $chair = ""; $description = "";
        $upstatus=mysql_query("select bill_no,e_id,date,time,amt,discount,disc_amt,sub_tot,sales_id,shift,tables,chair,description from takeaway where bill_no='". $_SESSION['billno']. "' and date='$curnt_date'");
        $data=mysql_fetch_array($upstatus);
        $bill_no=$data['bill_no'];
        $e_id=$data['e_id'];
        $date=$data['date'];
        $time=$data['time'];
        $amt=$data['amt'];
        $discount=$data['discount'];
        $disc_amt=$data['disc_amt'];
        $sub_tot=$data['sub_tot'];
        $sales_id=$data['sales_id'];
        $shift=$data['shift'];
        $tables=$data['tables'];
        $chair=$data['chair'];
        $description=$data['description'];
//insert into takeaway_return  select *,'" + richTextBox1.Text + "' from takeaway where bill_no='" + textBox2.Text + "' and date=CURDATE()
        $upstatusOne==mysql_query("insert into takeaway_return select *,'".$_POST['description']."' from takeaway where bill_no=' ".$_SESSION['billno']."' and date='$curnt_date'");
        $upstatusTwo==mysql_query("delete from takeaway  where bill_no='". $_SESSION['billno']. "' and date='$curnt_date'");
        //insert into takeaway_details_return(bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair) select bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair from takeaway_details where bill_no='" + textBox2.Text + "' and date=CURDATE()
        $upstatusThree==mysql_query("insert into takeaway_details_return(bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair)  select bill_no,itm_code,item,unit,qty,amt,date,time,sales_id,e_id,shift,tables,chair from takeaway_details where bill_no='" . $_SESSION['billno'] ."' and date='$curnt_date'");
        $upstatusFour==mysql_query("delete from takeaway_details  where bill_no='" .  $_SESSION['billno'] ."' and date='$curnt_date'");
        // $upstatusFive==mysql_query("delete from expenses where descr='DISCOUNT to Table Bill no." . $bill_no ."' and date='$curnt_date' and amt='$disc_amt'and pro='CASH OUT' and expense='BILL LESS' and category='Canteen Expenses' and emp_id='$e_id' and waiter_id='$sales_id'");


            echo "<script>alert('Successfully updated')</script>";









    }else{
        echo "<script>alert('please  select type')</script>";
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
<div class="container navbar"  style="background-color:transparent; width:100%;margin-top: 10px">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff;  font-weight:bold; font-size:15px;"> BILL RETURN </h4>
    </div>
</div>


    <div class="container">
        <div class="form">
            <div class="span11">
                <div style="margin-top: 5%" class="widget-box">
                    <div  class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Bill Return Statement</h5>
                    </div>


                    <div class="widget-content nopadding">
                        <form action="" method="post" class="form-horizontal">

                            <div align="center" style="position: center;" class="col-md-12 col-sm-12">
                            <div align="center" class="col-md-3 col-sm-3 " style="text-align: center">
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

                            <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                <div class="control-group">
                                    <label class="control-label">Bill No</label>
                                    <div class="controls">
                                        <input type="text" id="billno"  name="billno" value="<?php if(isset( $_SESSION['billno'])) { echo  $_SESSION['billno']; } ?>" />
                                    </div>

                                </div>
                            </div>
                                <div align="center" class="col-md-4 col-sm-4 " style="text-align: center">

                                    <div class="control-group">
                                        <label class="control-label">Description :</label>
                                        <div class="controls">
                                            <input type="text" id="description"  name="description"  />
                                        </div>

                                    </div>
                                </div>
                            <!--<div align="center" class="col-md-4 col-sm-4 pull-right" style="text-align: center">
                                <div class="control-group">
                                <label>Description :</label>
                                <div class="controls">
                                    <input type="text" id="billno"  name="billno" value="<?php /*if(isset( $_SESSION['billno'])) { echo  $_SESSION['billno']; } */?>" />
                                </div>
                                </div>
                                <script>
                                    document.getElementById('#to').value = '<?php /*if(isset($to)) { echo $to; } */?>';
                                </script>

                            </div>-->
                            </div>



<!--                            <div  align="center" class="col-md-6 col-sm-6 pull-left" style="text-align: center">-->
<!--                                <div class="control-group">-->
<!--                                    <h2>-->
<!--                                        Bill AMOUNT :--><?php //echo $_SESSION['billamt']?>
<!--                                    </h2>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->





                                <button type="submit" name="billUpdate" class="btn btn-success">SUBMIT</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if(isset($_POST['billno'])){
        $_SESSION['billno']=$_POST['billno'];

        //echo "<script>alert('success')</script>";

        $cus = mysql_query("select * from past_bill where bill_no='".$_POST['billno']."' and date='$curnt_date'");

$post=mysql_fetch_array($cus);

        $_SESSION['billamt']=$post['amt'];
      
        header("Refresh:0");
        //select * from past_bill where bill_no='" + textBox2.Text + "' and date=CURDATE()



    }

    ?>



</body>
</html>
