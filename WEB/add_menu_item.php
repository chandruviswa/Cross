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
//insert into item_master(itm_code,item,unit_price,itm_cat,bar_code,stock,parcel,party,commision,par_com,unit,tax_cat,vat,cat)values('" + textBox1.Text + "','" + textBox2.Text + "','" + textBox11.Text + "','" + textBox8.Text + "','" + textBox9.Text + "','" + textBox10.Text + "','" + textBox3.Text + "','" + textBox4.Text + "','" + textBox5.Text + "','" + textBox6.Text + "','" + textBox7.Text + "','"+textBox13.Text+"','"+textBox12.Text+"','"+comboBox1.Text+"')
$item_code="";$item="";$unit_price="";$itm_cat="";$bar_code="";$stock="";$parcel="";$party="";$commision="";$par_com="";
$unit="";$tax_cat="";$vat="";$cat="";
if(isset($_POST['edit'])){
    $item_code= $_POST['edit'];
    $check=mysql_query("select * from item_master where itm_code='$item_code'");
    $checknum=mysql_fetch_array($check);
    $item=$checknum['item'];
    $unit_price=$checknum['unit_price'];
    $itm_cat=$checknum['item'];
    $bar_code=$checknum['bar_code'];
    $stock=$checknum['stock'];
    $parcel=$checknum['parcel'];
    $party=$checknum['party'];
    $commision=$checknum['commision'];
    $par_com=$checknum['par_com'];
    $unit=$checknum['unit'];
    $tax_cat=$checknum['tax_cat'];
    $vat=$checknum['vat'];
    $cat=$checknum['cat'];

}
if (isset($_POST['insert'])){

    $checkQuery=mysql_query("select itm_code from item_master where itm_code='".$_POST['item_code']."'");
    $checknumquery=mysql_fetch_array($checkQuery);

    if($checknumquery['itm_code'] == $_POST['item_code']){
     echo '<script>alert("ITEM CODE already exists")</script>';
//        echo '<script type="text/javascript">
//var txt;
//var r = confirm("Are you sure to replace item!...");
//if (r == true) {
//    txt=1;
//}else {
//    txt=0;
//}</script>';
    }else{
        $itemQuery=mysql_query("insert into item_master(itm_code,item,unit_price,itm_cat,bar_code,stock,parcel,party,commision,par_com,unit,tax_cat,vat,cat)values('" .$_POST['item_code']."','" .$_POST['item']."','" .$_POST['unit_price']."','" .$_POST['category']."','" .$_POST['barcode']."','" .$_POST['stock']."','" .$_POST['parcel_price']."','" .$_POST['party_price']."','" .$_POST['line_commission']."','" .$_POST['party_commission']."','" .$_POST['unit']."','" .$_POST['tax_cat']."','" .$_POST['vat_tax']."','" .$_POST['service_tax']."')");
        if($itemQuery){
            echo "<script>alert('Successfully inserted')</script>";
        }
    }
 $falg= "<script>document.writeln(txt)</script>";
  if ($falg == 1){
      $itemUpQuery=mysql_query("update item_master set item='".$_POST['item']."',unit_price='" .$_POST['unit_price']."',itm_cat='" .$_POST['category']."',unit='" .$_POST['unit']."',bar_code='" .$_POST['barcode']."',stock='" .$_POST['stock']."',parcel='" .$_POST['parcel_price']."',party='" .$_POST['party_price']."',commision='" .$_POST['line_commission']."',par_com='" .$_POST['party_commission']."',tax_cat='" .$_POST['tax_cat']."',vat='" .$_POST['vat_tax']."',cat='" .$_POST['service_tax']."' where itm_code='".$_POST['item_code']."' ");
      if($itemUpQuery){
          echo "<script>alert('Successfully updated')</script>";
      }
  }


}
if (isset($_POST['update'])){
  //  echo "update item_master set item='".$_POST['item']."',unit_price='" .$_POST['unit_price']."',itm_cat='" .$_POST['category']."',unit='" .$_POST['unit']."',bar_code='" .$_POST['barcode']."',stock='" .$_POST['stock']."',parcel='" .$_POST['parcel_price']."',party='" .$_POST['party_price']."',commision='" .$_POST['line_commission']."',par_com'" .$_POST['party_commission']."',tax_cat='" .$_POST['tax_cat']."',vat='" .$_POST['vat_tax']."',cat='" .$_POST['service_tax']."' where itm_code='".$_POST['item_code']."'";
    $itemUpQuery=mysql_query("update item_master set item='".$_POST['item']."',unit_price='" .$_POST['unit_price']."',itm_cat='" .$_POST['category']."',unit='" .$_POST['unit']."',bar_code='" .$_POST['barcode']."',stock='" .$_POST['stock']."',parcel='" .$_POST['parcel_price']."',party='" .$_POST['party_price']."',commision='" .$_POST['line_commission']."',par_com='" .$_POST['party_commission']."',tax_cat='" .$_POST['tax_cat']."',vat='" .$_POST['vat_tax']."',cat='" .$_POST['service_tax']."' where itm_code='".$_POST['item_code']."' ");
    if($itemUpQuery){
        echo "<script>alert('Successfully updated')</script>";
    }


}

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <style>
        label{
            color: white;
            font-weight: bold;
            font-size: 18px;
        }
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
            padding: 27px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
        input[type=number]{
            width: 100%;
            padding: 27px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        /* Style the label to display next to the inputs */
        /*label {*/
            /*padding: 12px 12px 12px 0;*/
            /*display: inline-block;*/
        /*}*/

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

        select{
            width: 100%;
            padding: 27px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
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
<body style="background: url(images/bgfine.png);overflow: hidden">

<div class="container navbar"  style="background-color:transparent; width:100%;margin-top: 10px">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff; margin-top: -15px;font-weight:bold; font-size:15px;"> BILL WISE REPORT </h4>
    </div>
</div>

<div style="max-width: 100em;
    height: 45em;
    margin-top: -20px;
    overflow: auto;
    direction: ltr;
    text-align: justify;">


<div class="container">
    <form id="myForm" method="post" action="">
        <div  class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="item_code">ITEM CODE :</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" type="number" id="item_code" value="<?php echo $item_code ?>" name="item_code" placeholder="Enter item code..">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="item_name">ITEM NAME</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="text" id="item_name" name="item" value="<?php echo $item ?>" placeholder="Enter item name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="unit_price">UNIT PRICE</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="number" id="unit_price" name="unit_price" value="<?php echo $unit_price ?>" placeholder="Enter unit price..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="category">CATEGORY</label>
            </div>
            <div class="col-75">
                <select id="category" name="category">
                    <?php
                    $cat = mysql_query("select * from item_cat");
                    while($view = mysql_fetch_array($cat))
                    {?>
                        <option value="<?php echo $view['itm_id']; ?>"><?php echo $view['item_cat']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="unit">UNIT</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="text" id="unit" name="unit" value="<?php echo $unit ?>"  placeholder="Enter unit..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="barcode">BARCODE</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="text" id="barcode" name="barcode" value="<?php echo $bar_code ?>"  placeholder="Enter barcode..">
            </div>
        </div> <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="stock">STOCK</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" type="text" id="stock" name="stock" value="<?php echo $stock ?>"  placeholder="Enter stock..">
            </div>

        </div> <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="lname">PARCEL PRICE</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" type="number" id="parcel_price" name="parcel_price" value="<?php echo $parcel ?>"  placeholder="Enter parcel price..">
            </div>
        </div> <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="party_price">PARTY PRICE</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" type="number" id="party_price" name="party_price" value="<?php echo $party ?>"  placeholder="Enter party price..">
            </div>

        </div> <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="line_commission">LINE COMMISSION</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px"  type="text" id="line_commission" name="line_commission"  value="<?php echo $commision ?>"  placeholder="Enter line commision..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label  style="font-weight: bold" for="party_commission">PARTY COMMISSION</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="text" id="party_commission" name="party_commission" value="<?php echo $par_com ?>"  placeholder="Enter party commisssion..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="service_tax">CGST</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="number" id="service_tax" name="service_tax" value="<?php echo $cat ?>"  placeholder="Enter service tax..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label style="font-weight: bold" for="vat_tax">SGST</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="number" id="vat_tax" name="vat_tax"  value="<?php echo $vat ?>"  placeholder="Enter vat tax..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label  style="font-weight: bold" for="tax_cat">TAX CAT</label>
            </div>
            <div class="col-75">
                <input style="padding: 15px" t type="text" id="tax_cat" name="tax_cat" value="<?php echo $tax_cat ?>"  placeholder="Enter tax cat..">
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
                        <h5>MENU ITEM STATEMENT</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <th><h5>ITEM CODE</h5></th>
                            <th><h5>ITEM NAME</h5></th>
                            <th><h5>LINE COMMISSION</h5></th>
                            <th><h5>PARCEL COMMISSION</h5></th>
                            <th><h5>BARCODE</h5></th>
                            <th><h5>CURRENT CATEGORY</h5></th>
                            <th><h5>UNIT PRICE</h5></th>
                            <th><h5>ACTION</h5></th>
                            </thead>
                            <?php
                                $cus = mysql_query("select * from item_master");

                                // echo "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."')";
                                while($data = mysql_fetch_array($cus))
                                {

                                    ?>
                                    <tr>
                                        <td><center><?php echo $data['itm_code']; ?></center></td>
                                        <td><center><?php echo $data['item']; ?></center></td>
                                        <td><center> <?php echo $data['commision']; ?></center></td>
                                        <td><center><?php echo $data['par_com']; ?></center></td>
                                        <td><center><?php echo $data['bar_code']; ?></center></td>

                                        <td><center><?php   $custome = mysql_query("select item_cat from item_cat WHERE itm_id='".$data['itm_cat']."'");
                                                $dataOne = mysql_fetch_array($custome);
                                        echo $dataOne['item_cat']; ?></center></td>
                                        <td><center><?php echo $data['unit_price']; ?></center></td>
                                        <td><center><button type="submit" value="<?php echo $data['itm_code']; ?>" name="edit" class="btn btn-info btn-success">Edit</button></center></td>

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
</div>
</body>


</html>
