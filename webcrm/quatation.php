<?php
include('menutwo.php');

include ('config.php');
//include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");

$a = "";
if(isset($_SESSION['username']))
{
    $a = $_SESSION['username'];
}
$qtano = 0;
if(isset($_GET['edit'])){
    $_POST['edit']=$_GET['edit'];
    $qtano =$_POST['edit'];
}else{

    $selecquomo = mysqli_query($con,"SELECT MAX(qno) FROM  `quotation` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' ");
    $selectfretarray = mysqli_fetch_array($selecquomo);
    $qtano=(int)$selectfretarray['MAX(qno)'];
    $qtano = $qtano+1;

}

if(isset($_POST['back'])){
    header("Location:quotationlist.php");
}


if(isset($_POST['preview'])){
   // header("Location:quotationpreview.php?edit=".$qtano);
   
    if($_POST['template'] == "t1"){
        header("Location:preview.php?qutno=".$qtano."&temp=".$qtano);
    }else{
        header("Location:quotationpreview.php?edit=".$qtano);
    }

}









if(isset($_POST['delete'])){

    $deleteid = $_POST['deleteId'];
    $insertQuery = mysqli_query($con, "DELETE FROM `quotation_details` WHERE `id` = '".$deleteid."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='".$qtano."'");
    if ($insertQuery) {
        echo "<script>alert('successfully deleted')</script>";
    }
}

if (isset($_POST['addquotation'])) {
//INSERT INTO `quotation`(`id`, `sid`, `aid`, `qno`, `date`, `address`, `name`, `total`, `created_date`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
    $itemQuery = mysqli_query($con, "INSERT INTO `quotation`(`id`, `sid`, `aid`, `qno`, `date`, `address`, `name`, `total`, `created_date`, `status`) VALUES
 (NULL, '" . $_SESSION['sid'] . "', '" . $_SESSION['aid'] . "','".$qtano."', '" .$_POST['fdate']. "', '" . $_POST['companyid'] . "', '".$_POST['contactid']."','" . $_POST['total'] . "','$curentDate','" . $_POST['status'] . "')");
    if ($itemQuery) {
        echo "<script>alert('Successfully inserted')</script>";
         header("Location:quotationlist.php");
    }
}
if (isset($_POST['editquotation'])) {

    $itemQuery = mysqli_query($con, "UPDATE  `quotation` SET `address`='" .  $_POST['companyid'] . "', `name`='" . $_POST['contactid'] . "', `date`='" . $_POST['fdate'] . "', `status`='" . $_POST['status'] . "', `total`='" . $_POST['total'] . "'  WHERE  `qno` ='" .$qtano. "'");
    if ($itemQuery) {
        echo "<script>alert('Successfully updated')</script>";
        header("Location:quotationlist.php");
    }
}

?>
<!doctype html>
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



    <script type="text/javascript">



        function getData(divid){


            var qno = document.getElementById('qno').value;
            var unit=document.getElementById('unit').value;
            var qty=document.getElementById('qty').value;
            var name=document.getElementById('name');
            var User = name.options [name.selectedIndex] .value;

           // alert('ajaxaddproduct.php?qno='+qno+'&&name='+User+'&&unit='+unit+'&&qty='+qty);

            $.ajax({
                url: 'ajaxaddproduct.php?qno='+qno+'&name='+User+'&unit='+unit+'&qty='+qty, //call storeemdata.php to store form data
                success: function(html) {

                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });


        }
        
        function deletequotation() {

            var qno = document.getElementById('qno').value;
            var btn = document.getElementById('btn').value;

            alert(btn);

            $.ajax({
                url: 'ajaxaddproduct.php?qno='+qno+'$id='+btn, //call storeemdata.php to store form data
                success: function(html) {

                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });


        }


        function getDataTable(divid){

            $.ajax({
                url: 'checksession.php', //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }


        function getDataTableOne(divid){

            $.ajax({
                url: 'history.php', //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function Register(){

            var  qno=document.getElementById('qno').value;
            var unit=document.getElementById('unit').value;
            var qty=document.getElementById('qty').value;
            var name=document.getElementById('name').value;

            $.ajax({
                url: 'ajaxaddproduct.php?qno='+qno, //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });



            $.ajax({
                url: 'getMobile.php?id='+mobile, //call storeemdata.php to store form data
                success: function(html) {

                    if(html === mobile){
                        alert("Mobile number already exist!....");

                    }else {
                        //alert("Success!....");

                        $.ajax({

                            url: 'otp.php?name='+namess+'&&mobile='+mobile, //call storeemdata.php to store form data
                            success: function(html) {
                                alert(html);
                                otp_visibility();
                            }
                        });

                    }

                }
            });


        }


    </script>



    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #E7E3E3  ;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #E7E3E3  ;
        }

        .testx tbody {
            display:block;
            height:350px;
            overflow:auto;
            width: 100%;
        }
        tr:nth-child(even){background-color: #f2f2f2}



    </style>
</head>

<body>



<form method="post"  >
    <div id="wrapper">
<!--        <nav class="navbar navbar-default navbar-fixed-top">-->
<!--            <div style="width: 250px;height: 50px;margin-top: -20px" class="brand">-->
<!--                <a  href="index.php"><img  src="assets/img/finallogo.png" alt="Klorofil Logo" class="img-responsive"></a>-->
<!--            </div>-->
<!--            <div  class="container-fluid">-->
<!---->
<!--                <div id="navbar-menu" class="toggled">-->
<!--                    <ul class="nav navbar-nav navbar-right">-->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>--><?php //echo  $a;?><!--</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>-->
<!--                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>-->
<!--                                <!--                            <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>-->-->
<!--                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!---->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->


        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="container-fluid">
                        <h3 style="color: #066ECC ;" class="page-title">Quotation Management</h3>

                        <div class="row">

                            <div class="col-md-12">
                                <!-- INPUTS-->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 style="color: #066ECC ;" class="panel-title">ADD QUOTATION</h3>
                                    </div>

                                    <?php
                                    if (isset($_POST['edit'])) {
                                        $getcustomerquerOne = mysqli_query($con, "SELECT * FROM `quotation` WHERE qno='" . $_POST['edit'] . "'");
                                        $arrayOne = mysqli_fetch_array($getcustomerquerOne);
                                        $date = $arrayOne['date'];
                                        $pieces = explode(",",$arrayOne['address']);

                                        $address = $pieces[0];
                                        $name= $arrayOne['name'];
                                        $status= $arrayOne['status'];
                                        $total = $arrayOne['total'];

                                    }


                                    ?>
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <label class="form-group-lg" for="companyname">Company Name:</label>
                                            <div class="input-group">

                                                <select name="companyid" class="form-control">
                                                    <?php
                                                    if(isset($address)){
                                                        $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_company` WHERE  cname='$address'");
                                                    }else{
                                                        $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_company`");
                                                    }


                                                    while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                        ?>

                                                        <option value="<?php if (isset($arrayleads['id'])) {echo $arrayleads['cname'].",".$arrayleads['mobile'].",".$arrayleads['email'].",".$arrayleads['location'].",".$arrayleads['city'];} ?>" > <?php if (isset($arrayleads['cname'])) {echo $arrayleads['cname'];} ?></option>
                                                        <?php
                                                    }
                                                    if(isset($address)){
                                                        $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_company` WHERE NOT cname='$address'");
                                                        while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                            ?>

                                                            <option value="<?php if (isset($arrayleads['id'])) {echo $arrayleads['cname'].",".$arrayleads['mobile'].",".$arrayleads['email'].",".$arrayleads['location'].",".$arrayleads['city'];} ?>" > <?php if (isset($arrayleads['cname'])) {echo $arrayleads['cname'];} ?></option>
                                                            <?php
                                                        }
                                                    }




                                                    ?>
                                                </select>
                                                <span  style="background-color: green" class="input-group-addon" id="basic-addon2"><a style="color: white;font-weight: bold" href="addcompany.php">ADD</a></span>
                                            </div>
                                            <br>

                                            <div class="form-group test">
                                                <label for="date">Date:</label>
                                                <input id="date" value="<?php if(isset($date)){echo $date;}?>" type="date" class="form-control" name="fdate"/>
                                            </div>

                                            <div class="form-group test">
                                                <label for="qno">Quotation No:</label>

                                                <input disabled id="qno" value="<?php

                                                if(isset($qtano)){echo $qtano;}
                                                ?>" type="text" class="form-control" name="qno"/>
                                            </div>


                                            <div class="form-group test">
                                                <label for="total">Total Amount(RS):</label>
                                                <input value="<?php if(isset($total)){echo $total;}?>"  type="number" class="form-control" name="total"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="template">Quotation type:</label>
                                                <select name="template"  class="form-control">
                                                    <option value="t1">Template 1</option>
                                                    <option value="t2">Template 2</option>

                                                </select>
                                            </div>
                                            <br>




                                        </div>
                                        <div class="col-md-6">

                                            <label class="form-group-lg" for="companyname">Contacts:</label>
                                            <div class="input-group">
                                                <select name="contactid" class="form-control">
                                                    <?php

                                                    if(isset($name)){
                                                        $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_contacts` WHERE  name='$name'");
                                                    }else{
                                                        $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_contacts` ");
                                                    }


                                                    while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                        ?>

                                                        <option value="<?php if (isset($arrayleads['name'])) {echo $arrayleads['name'];} ?>"><?php if (isset($arrayleads['name'])) {echo $arrayleads['name'];} ?></option>
                                                        <?php
                                                    }

                                                    if(isset($name)){
                                                        $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_contacts` WHERE NOT name='$name'");
                                                        while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                            ?>

                                                            <option value="<?php if (isset($arrayleads['name'])) {echo $arrayleads['name'];} ?>"><?php if (isset($arrayleads['name'])) {echo $arrayleads['name'];} ?></option>
                                                            <?php
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                                <span  style="background-color: green" class="input-group-addon" id="basic-addon2"><a style="color: white;font-weight: bold" href="addcontact.php">ADD</a></span>
                                            </div>
                                            <br>


                                            <div class="form-group test">
                                                <label class="form-group-lg" for="companyname">Products:</label>
                                                <div class="input-group">
                                                <select id="name" name="product" class="form-control">
                                                    <?php
                                                    if(isset($product)){
                                                        $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM  `products` WHERE  product='$product'");
                                                    }else {
                                                        $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM `products`");
                                                    }
                                                    while ($arraylea = mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                        ?>

                                                        <option value="<?php if (isset($arraylea['product'])) {
                                                            echo $arraylea['product'];
                                                        } ?>"><?php if (isset($arraylea['product'])) {
                                                                echo $arraylea['product'];
                                                            } ?></option>
                                                        <?php
                                                    }

                                                    if(isset($product)){
                                                        $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM  `products` WHERE NOT  product='$product'");
                                                        while ($arraylea = mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                            ?>

                                                            <option value="<?php if (isset($arraylea['product'])) {
                                                                echo $arraylea['product'];
                                                            } ?>"><?php if (isset($arraylea['product'])) {
                                                                    echo $arraylea['product'];
                                                                } ?></option>
                                                            <?php
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                                <span  style="background-color: green" class="input-group-addon" id="basic-addon2"><a style="color: white;font-weight: bold" href="addproduct.php">ADD</a></span>
                                                </div>
                                            </div>



                                            <div class="form-group test">
                                                <label for="qty">Quantity:</label>
                                                <input id="qty" value="<?php if(isset($qty)){echo $qty;}?>" type="number" class="form-control" name="qty"/>
                                            </div>

                                            <div class="form-group test">
                                                <label for="unit">Unit:</label>
                                                <input id="unit" value="<?php if(isset($unit)){echo $unit;}?>" type="number" class="form-control" name="unit"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Quotation type:</label>
                                                <select name="status"  class="form-control">
                                                    <?php

                                                    if($status =="Closed"){
                                                        ?>
                                                        <option value="Closed">Closed</option>
                                                        <option value="Active">Active</option>


                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="Active">Active</option>
                                                        <option value="Closed">Closed</option>



                                                        <?php
                                                    }?>


                                                </select>
                                            </div>
                                            <button onclick="getData('displaydata')" style="text-align: right" type="submit" name="save" class="btn-success btn">
                                                + Add
                                            </button>












                                        </div>
                                        <br>
                                        <div class="clearfix"></div>





                                        <div class="form-group test">
                                            <label for="total">Quotation product details:</label>
                                            <div id="displaydata">

                                                <table>
                                                    <tr>
                                                        <th>SNo</th>
                                                        <th>ITEM</th>
                                                        <th>UNIT</th>
                                                        <th>QTY</th>
                                                        <th>RATE</th>
                                                        <th>ACTION</th>

                                                    </tr>
                                                    <tbody>
                                                    <?php
                                                    $slelectQuery = mysqli_query($con,"SELECT * FROM `quotation_details` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='".$qtano."'");
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
                                                            <td><input  name="deleteId" type="hidden" value="<?php if(isset($accs_id_name['id'])){echo$accs_id_name['id'];}?> "> <button type="submit" name="delete" style="color: red">Delete</button></td>

                                                        </tr>



                                                        <?php
                                                    }

                                                    ?>
                                                    </tbody>
                                                </table>

                                                <h4 style="margin-top: 5%;margin-bottom: 5%;color: black;text-align: right;font-weight: bold;font-size: 22px">Total Amount : Rs.<?php  if(isset($total)){echo  $total;}?>.00</h4>
                                            </div>
                                        </div>

                                        <?php
                                        if (isset($_POST['edit'])) {
                                            ?>
                                            <button style="text-align: center" type="submit" name="editquotation"
                                                    class="btn-success btn">Update
                                            </button>
                                            <button style="text-align: center" type="submit" name="back" class="btn-success btn">
                                                Cancel
                                            </button>
                                            <button style="text-align: center" type="submit" name="preview" class="btn-success btn">
                                                Print
                                            </button>

                                            <button style="text-align: center" type="submit" name="back" class="btn-success btn">
                                                Send
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button style="text-align: center" type="submit" name="addquotation"
                                                    class="btn-success btn">Save
                                            </button>
                                            <button style="text-align: center" type="submit" name="preview" class="btn-success btn">
                                                Print
                                            </button>

                                            <button style="text-align: center" type="submit" name="back" class="btn-success btn">
                                                Send
                                            </button>

                                            <button style="text-align: center" type="submit" name="back" class="btn-success btn">
                                                Cancel
                                            </button>
                                            <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                                <!--                         END INPUTS -->

                            </div>

                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT -->
            </div>
        </div>
    </div>
</form>
<!-- END MAIN -->
<?php
include ('footer.php');
?>


<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>

</body>

</html>
