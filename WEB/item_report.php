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
<script src="jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("vechicle_search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.search-box1 input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result1");
            if(inputVal.length){
                $.get("backend-search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result1 p", function(){
            $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
            $(this).parent(".result1").empty();
        });
    });
</script>

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
<body  style="background: url(images/bgfine.png)">
<div class="container navbar"  style="background-color:transparent; width:100%;margin-top: 10px">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff;  font-weight:bold; font-size:15px;"> ITEM WISE REPORT </h4>
    </div>
</div>



    <div class="container">
        <div class="form">
            <div class="span11">
                <div style="margin-top: 5%" class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Items Statement</h5>
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
                            <a href="item_report_print.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>&type=<?php echo $type; ?>" class="btn btn-success">PRINT</a>

                        </form>
                    </div>
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
                        <h5>ITEMS STATEMENT</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <th><h5>GROUP</h5></th>
                            <th><h5>ITEM CODE</h5></th>
                            <th><h5>ITEM NAME</h5></th>
                            <th><h5>QUANTITY</h5></th>
                            <th><h5>UNIT</h5></th>
                            <th><h5>AMOUNT</h5></th>
                            <th><h5>GROUP TOTAL</h5></th>
                            </thead>
                            <?php
                            if(isset($_POST['submit']))
                            {

                                $from = $_POST['from'];
                                $to = $_POST['to'];

                                $type = $_POST['type'];

                                //echo  "<script>alert('".$_POST['type']."')</script>";
                                if($_POST['type']=="Restaurant"){

                                $itemWiseQueryFour = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,bs.unit_type,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from past_bill_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id  ";
                                $itemWiseQueryFour = $itemWiseQueryFour . "WHERE (bs.date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."')";
                                $itemWiseQueryFour = $itemWiseQueryFour . '' . " GROUP BY bs.itm_code,bs.unit_type  order by CONCAT(ic.item_cat,bs.item)";
                                }elseif($_POST['type']=="takeaway"){
                                    $itemWiseQueryFour = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from takeaway_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id ";
                                    $itemWiseQueryFour =  $itemWiseQueryFour . '' . "where (bs.date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."')";
                                    $itemWiseQueryFour =  $itemWiseQueryFour . '' . "  GROUP BY bs.itm_code  order by CONCAT(ic.item_cat,bs.item)";
                                }else{
                                    echo "<script>alert('Please select type')</script>";
                                }

                                $cus = mysql_query($itemWiseQueryFour);
                                // echo "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."')";
                                $head_ck = "";
                                $head1 = "";
                                $total = 0;
                                $i = 0;
                                $gp_total = 0;
                                $tot_qty = 0;
                                $head = "";
                                $TotalAmt = 0;
                                $totalQty = 0;
                                while($data = mysql_fetch_array($cus))
                                {

                                    $head = $data["item_cat"];
                                    if ($head == $head_ck) {
                                        ?>
                                        <tr>
                                            <td><center><?php echo ""; ?></center></td>
                                            <td><center><?php echo $data['itm_code']; ?></center></td>
                                            <td><center><?php echo $data['item']; ?></center></td>
                                            <td><center><?php echo $data['qty']; ?></center></td>
                                            <td><center><?php echo $data['amt']; ?></center></td>
                                            <td><center><?php echo $data['unit_type']; ?></center></td>
                                            <td><center><?php echo ""; ?></center></td>

                                        </tr>
                                        <?php


                                        $total = $total + (int)$data["amt"];
                                        $gp_total = $gp_total + (int)$data["amt"];
                                        $tot_qty = $tot_qty + (int)$data["qty"];
                                    } else {
                                        if ($i != 0) {

                                            ?>
                                            <tr>
                                                <td><center><?php echo ""; ?></center></td>
                                                <td><center><?php echo ""; ?></center></td>
                                                <td><center><?php echo ""; ?></center></td>
                                                <td><center><?php echo ""; ?></center></td>
                                                <td><center><?php echo ""; ?></center></td>
                                                <td><center><?php echo ""; ?></center></td>
                                                <td><center><?php echo $gp_total; ?></center></td>

                                            </tr>
                                            <?php
                                            $TotalAmt = $TotalAmt + $gp_total;
                                            $gp_total = 0;
                                        }

                                        ?>
                                        <tr>
                                            <td><center><?php echo $data["item_cat"]; ?></center></td>
                                            <td><center><?php echo $data["itm_code"]; ?></center></td>
                                            <td><center><?php echo $data["item"]; ?></center></td>
                                            <td><center><?php echo $data["qty"]; ?></center></td>
                                            <td><center><?php echo $data["amt"]; ?></center></td>
                                            <td><center><?php echo $data["unit_type"]; ?></center></td>
                                            <td><center><?php echo ""; ?></center></td>

                                        </tr>
                                        <?php


                                        $total = $total + (int)$data["amt"];
                                        $gp_total = $gp_total + (int)$data["amt"];
                                        $tot_qty = $tot_qty + (int)$data["qty"];
                                    }
                                    $head_ck = $data["item_cat"];
                                    $i = $i + 1;

                                }

                                ?>
                                <tr>
                                    <td><center><?php echo ""; ?></center></td>
                                    <td><center><?php echo ""; ?></center></td>
                                    <td><center><?php echo ""; ?></center></td>
                                    <td><center><?php echo ""; ?></center></td>
                                    <td><center><?php echo ""; ?></center></td>
                                    <td><center><?php echo ""; ?></center></td>
                                    <td><center><?php echo $gp_total; ?></center></td>

                                </tr>
                                <?php

                                $TotalAmt = $TotalAmt + $gp_total;
                                $gp_total = 0;


                            }
                            ?>
                        </table>
                        <div align="center" class="col-md-8 col-sm-8 pull-right" style="text-align: center;">
                            <h4 style="color: white;font-weight: bold">Total RS:<?php if($TotalAmt){echo $TotalAmt;}else{echo 0;}  ?>.00</h4>
                            <h4 style="color: white;font-weight: bold">Total QTY :<?php if($tot_qty){echo $tot_qty;}else{echo 0;}  ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

