<?php
error_reporting(0);
include('session.php');
include ('menu.php');
include('include/connect.php');

$from = $_POST['from'];
$to = $_POST['to'];
$vcno = $_POST['vcno'];
$billno = $_POST['billno'];
$scus = $_POST['scus'];
$type = $_POST['type'];
$item_code="";
$item="";
$item_id="";



if(isset($_POST['edit'])){
    $item_code= $_POST['edit'];
    $check=mysql_query("select * from item_cat where itm_id='$item_code'");
    $checknum=mysql_fetch_array($check);
    $item=$checknum['item_cat'];
    $item_id =$checknum['itm_id'];
}
if (isset($_POST['insert'])){

$itemQuery=mysql_query("insert into item_cat(item_cat,separate_bill)values('" .$_POST['item']."','0')");
        if($itemQuery){
            echo "<script>alert('Successfully inserted')</script>";
        }

}
if (isset($_POST['update'])){

    $itemUpQuery=mysql_query("update item_cat set item_cat='" .$_POST['item']."' where itm_id='".$_POST['item_id']."'");
    if($itemUpQuery){
        echo "<script>alert('Successfully updated')</script>";
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

        /* Style inputs, select elements and textareas */
        input[type=text], select, textarea{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
        input[type=number]{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        /* Style the label to display next to the inputs */
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin: 1%;
        }

        /* Style the container */
        .container {
            border-radius: 5px;
            padding: 20px;
        }

        /* Floating column for labels: 25% width */
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        /* Floating column for inputs: 75% width */
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
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:-15px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff; margin-top: -10px;  font-weight:bold; font-size:15px;"> ADD MENU CATEGORY </h4>
    </div>
</div>

<div class="container">
    <form id="myForm" method="post" action="">

        <div style="margin-top: 2%" class="row">
            <div class="col-25">
                <label style="color: white;font-weight: bold" for="item_name">ITEM CATEGORY NAME :</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" type="text" id="item_name" name="item" value="<?php echo $item ?>" placeholder="Enter category name..">
                <input type="hidden" id="item_id" name="item_id" value="<?php echo $item_id ?>">
            </div>
        </div>
        <div class="row">
            <input type="submit" name="insert" value="Add">
            <input type="submit" name="update"value="Update">
            <input type="submit" onclick="myFunction()" value="Clear">
        </div>
    </form>
</div>
<script>
    function myFunction() {
        document.getElementById("myForm").reset();
    }
</script>



<form id="table_item" action="" method="post" >
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>MENU CATEGORIES STATEMENT</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <th><h5>SNO</h5></th>
                            <th><h5>ITEM CATEGORY</h5></th>
                            <th><h5>ACTION</h5></th>

                            </thead>
                            <?php
                            $cus = mysql_query("select * from item_cat");

                            // echo "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."')";
                            while($data = mysql_fetch_array($cus))
                            {

                                ?>
                                <tr>
                                    <td><center><?php echo $data['itm_id']; ?></center></td>
                                    <td><center><?php echo $data['item_cat']; ?></center></td>
                                    <td><center><button type="submit" value="<?php echo $data['itm_id']; ?>" name="edit" class="btn btn-info btn-success">Edit</button></center></td>

                                </tr>
                                <?php
                            }
                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</body>


</html>
