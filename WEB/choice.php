<?php

include('session.php');
include ('menu.php');

    $b = "";
    if(isset($_SESSION['a']))
	{
        $b = $_SESSION['a'];
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

.img {
    width: 70px;
    height: 70px;
    border:2px solid #fff;

    box-shadow: 10px 10px 5px #ccc;
    -moz-box-shadow: 10px 10px 5px #ccc;
    -webkit-box-shadow: 10px 10px 5px #ccc;
    -khtml-box-shadow: 10px 10px 5px #ccc;
}

</style>
    <style>
        div.gallery {
            margin: 15px;
            border: 1px solid #ccc;


        }

        div.gallery:hover {
            border: 1px solid #777;
            background-color: #49cced;
        }

        div.gallery img {
            width: 100%;
            height: 150px;
        }

        div.desc {
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }
    </style>
<meta name="viewport" content="user-scalable=yes, width=device-width" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="animate/animate.min.css">
<title>Choose it</title>
</head>

<body class=""  style="background: url(images/bgfine.png);overflow: hidden" >
<div class="container navbar"  style="background-color:transparent; width:100%;">
<div class="row">
<a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

<h4 style="text-align:center; color:#fff; margin-top:-15px; font-weight:bold; font-size:15px;"> CHOOSE IT </h4>
</div>
</div>
<div class="row">
<div align="center"  colspan="12" class="span14 ">
<div colspan="6" style="text-align: center;" class="gallery   span3">
    <a href="tables.php">
        <img src="images/restaurant.png" alt="Trolltunga Norway" width="300" height="200">
    </a>
    <div class="desc">RESTAURANT</div>
</div>

<div style="text-align: center" colspan="6" class="gallery span3">
    <a  href="takeaway.php">
        <img src="images/food.png" alt="Forest"width="300" height="200">
    </a>
    <div class="desc">TAKE AWAY</div>
</div>
    <div style="text-align: center" colspan="6" class="gallery span3">
        <a  href="shift_close.php">
            <img src="images/shift.png" alt="Forest"width="300" height="200">
        </a>
        <div class="desc">SHIFT CLOSE</div>
    </div>


<!--<div class="gallery col-sm-3 span3">-->
<!--    <a  href="item_report.php">-->
<!--        <img src="images/item.jpg" alt="Northern Lights"width="300" height="200">-->
<!--    </a>-->
<!--    <div class="desc">ITEM REPORT</div>-->
<!--</div>-->
<!---->
<!--<div class="gallery col-sm-3 span3">-->
<!--    <a  href="bill_report.php">-->
<!--        <img src="images/bill.png" alt="Mountains" width="300" height="200">-->
<!--    </a>-->
<!--    <div class="desc">BILL REPORT</div>-->
<!--</div>-->
</div>


<!--<div class="span12 col-sm-12">-->
<!---->
<!--    <div class="gallery span3">-->
<!--        <a href="add_categories.php">-->
<!--            <img src="images/cats.png" alt="Mountains" width="300" height="200">-->
<!--        </a>-->
<!--        <div class="desc">ADD CATEGORIES</div>-->
<!--    </div>-->
<!--    <div class="gallery span3">-->
<!--        <a  href="add_menu_item.php">-->
<!--            <img src="images/add.png" alt="Mountains" width="300" height="200">-->
<!--        </a>-->
<!--        <div class="desc">ADD ITEM</div>-->
<!--    </div>-->
<!--    <div class="gallery span3">-->
<!--        <a  href="bill_return.php">-->
<!--            <img src="images/return.png" alt="Mountains" width="300" height="200">-->
<!--        </a>-->
<!--        <div class="desc">BILL RETURN</div>-->
<!--    </div>-->
<!--    <div class="gallery col-sm-3 span3">-->
<!--        <a href="bill_report.php">-->
<!--            <img src="images/bill.png" alt="Mountains" width="300" height="200">-->
<!--        </a>-->
<!--        <div class="desc">BILL REPORT</div>-->
<!--    </div>-->
<!--</div>-->
</div>
<!--    <div class="gallery col-sm-3 col-md-3">-->
<!--        <a target="_blank" href="bill_report.php">-->
<!--            <img src="images/bill.png" alt="Mountains" width="300" height="200">-->
<!--        </a>-->
<!--        <div class="desc">BILL REPORT</div>-->
<!--    </div>-->




<!---->
<!--<div class="btn-group animated slideInLeft" id="mine_choice" style="width:100%;">-->
<!--  <!--<a href="parcel.php" class="btn btn-warning btn-circle btn-xl" style="width:50%; margin-top:35%; color:#fff; font-weight:bold; background-color:transparent;">Parcel</a>-->
<!--  <a href="tables.php" class="btn btn-warning btn-circle btn-xl" style="width:100%; margin-top:35%; color:#fff; font-weight:bold; background-color:transparent;">Line</a>-->
<!--  <div class='col-sm-12'>-->
<!--  <div align="center" style="text-align:center" class="col-sm-3 pull-left">-->
<!--  <img  class="img"style="width:20%;height:20%" src="images/restaurant.png">-->
<!--  </div>-->
<!--  <div align="center" style="text-align:center" class="col-sm-3 pull-right">-->
<!--   <img class="img" style="width:20%;height:20%" src="images/cat.png">-->
<!--  </div>-->
<!--      <div align="center" style="text-align:center" class="col-sm-3 pull-left">-->
<!--          <img  class="img"style="width:20%;height:20%" src="images/food.png">-->
<!--      </div>-->
<!--      <div align="center" style="text-align:center" class="col-sm-3 pull-right">-->
<!--          <img class="img" style="width:20%;height:20%" src="images/cats.png">-->
<!--      </div>-->
<!--  </div>-->
<!-- <a href="tables.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">RESTAURANT</a>-->
<!--  <a href="takeaway.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">TAKE AWAY</a>-->
<!--    <a href="add_categories.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">ADD CATEGORIES</a>-->
<!--    <a href="add_categories.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">ADD CATEGORIES</a>-->
<!---->
<!--    <div class='col-sm-12' style="margin-top: 5%">-->
<!--        <div align="center" style="text-align:center" class="col-sm-3 pull-left">-->
<!--            <img  class="img"style="width:20%;height:20%" src="images/bill.png">-->
<!--        </div>-->
<!--        <div align="center" style="text-align:center" class="col-sm-3 pull-right">-->
<!--            <img class="img" style="width:20%;height:20%" src="images/item.jpg">-->
<!--        </div>-->
<!--        <div align="center" style="text-align:center" class="col-sm-3 pull-left">-->
<!--            <img  class="img"style="width:20%;height:20%" src="images/return.png">-->
<!--        </div>-->
<!--        <div align="center" style="text-align:center" class="col-sm-3 pull-right">-->
<!--            <img class="img" style="width:20%;height:20%" src="images/add.png">-->
<!--        </div>-->
<!--    </div>-->
<!--    <a href="bill_report.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">BILL REPORT</a>-->
<!--    <a href="bill_return.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">BILL RETURN</a>-->
<!--    <a href="add_menu_item.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">ADD ITEM</a>-->
<!--    <a href="item_report.php" class="btn " style="width:25%; margin-top:1%; color:green; font-weight:bold;font-size:24px; background-color:transparent;">ITEM REPORT</a>-->
<!---->
<!--  -->
<!--  -->
<!--</div>-->
</body>
</html>

<?php
if(isset($_GET['val']))
{
	if($_GET['val']=="print")
	{
		unset($_SESSION['main']);
	}
}
?>