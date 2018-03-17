<?php
//include('menuone.php');

include('config.php');
include('session.php');
$curentDate = date("Y-m-d");
$currentTime = date("H:i:s");

$a = "";
if (isset($_SESSION['username'])) {
    $a = $_SESSION['username'];
}

if (isset($_GET['edit'])) {
    $_POST['edit'] = $_GET['edit'];
}

if (isset($_POST['back'])) {
    header("Location:employeedashboard.php");
}

if (isset($_POST['addcustomer'])) {

    // echo "INSERT INTO `leads` (`id`, `companyname`, `contactperson`, `eid`, `aid`, `updatedate`, `source`, `status`, `followdate`, `time`, `expecteddate`, `product`, `qty`, `unit`, `total`, `comment`) VALUES (NULL, '" . $_POST['companyid'] . "', '" . $_POST['contactid'] . "','".$_POST['eid']."', '" . $_POST['branchid'] . "', '$curentDate','" . $_POST['stype'] . "','" . $_POST['status'] . "','','" . $_POST['fdate'] . "','" . $_POST['time'] . "' ,'" . $_POST['edate'] . "','" . $_POST['product'] . "','" . $_POST['qty'] . "','" . $_POST['unit'] . "','" . $_POST['total'] . "','" . $_POST['comment'] . "')";
//INSERT INTO `leads`(`id`, `companyname`, `contactperson`, `eid`, `aid`, `updatedate`, `source`, `status`, `followdate`, `time`, `expecteddate`, `product`, `qty`, `unit`, `total`, `comment`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16])

    $itemQuery = mysqli_query($con, "INSERT INTO `leads` (`id`, `companyname`, `contactperson`, `eid`, `aid`, `updatedate`, `source`, `status`, `followdate`, `time`, `expecteddate`, `product`, `qty`, `unit`, `total`, `comment`) VALUES
 (NULL, '" . $_POST['companyid'] . "', '" . $_POST['contactid'] . "','" . $_SESSION['eid'] . "', '" . $_SESSION['aid'] . "', '$curentDate','" . $_POST['stype'] . "','" . $_POST['status'] . "','" . $_POST['fdate'] . "','" . $_POST['time'] . "' ,'" . $_POST['edate'] . "','" . $_POST['product'] . "','" . $_POST['qty'] . "','" . $_POST['unit'] . "','" . $_POST['total'] . "','" . $_POST['comment'] . "')");
    if ($itemQuery) {
        echo "<script>alert('Successfully inserted')</script>";
        header("Location:employeedashboard.php");
    }
}


if (isset($_POST['editcustomer'])) {

    //echo "UPDATE  `leads` SET `companyname`='" .  $_POST['companyid'] . "', `contactperson`='" . $_POST['contactid'] . "', `updatedate`='" . $curentDate . "', `source`='" . $_POST['stype'] . "', `status`='" . $_POST['status'] . "', `followdate`= '" . $_POST['fdate'] . "',`time`='" . $_POST['time'] . "', `expecteddate`='" . $_POST['edate'] . "', `product`='" . $_POST['product'] . "', `qty`='" . $_POST['qty'] . "', `unit`='" . $_POST['unit'] . "', `total`='" . $_POST['total'] . "', `comment`='" . $_POST['comment'] . "'  WHERE  `id` ='" . $_POST['id'] . "'";
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;
    $itemQuery = mysqli_query($con, "UPDATE  `leads` SET `companyname`='" . $_POST['companyid'] . "', `contactperson`='" . $_POST['contactid'] . "', `updatedate`='" . $curentDate . "', `source`='" . $_POST['stype'] . "', `status`='" . $_POST['status'] . "', `followdate`= '" . $_POST['fdate'] . "',`time`='" . $_POST['time'] . "', `expecteddate`='" . $_POST['edate'] . "', `product`='" . $_POST['product'] . "', `qty`='" . $_POST['qty'] . "', `unit`='" . $_POST['unit'] . "', `total`='" . $_POST['total'] . "', `comment`='" . $_POST['comment'] . "'  WHERE  `id` ='" . $_POST['edit'] . "'");
    if ($itemQuery) {
        echo "<script>alert('Successfully updated')</script>";
        //  header("Location:employeedashboard.php");
    }
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
            border: 1px solid #E7E3E3;
        }

        td {
            text-align: left;
            padding: 8px;
            font-size: 12px;
        }

        th{
            background-color: #3B5998;
            color: white;
            text-align: left;
            padding: 8px;
            font-size: 12px;
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

<body>


<form method="post">
    <div id="">
<!--        <nav class="navbar navbar-default navbar-fixed-top">-->
<!--            <div style="width: 250px;height: 50px;margin-top: -20px" class="brand">-->
<!--                <a href="index.php"><img src="assets/img/finallogo.png" alt="Klorofil Logo" class="img-responsive"></a>-->
<!--            </div>-->
<!--            <div class="container-fluid">-->
<!---->
<!--                <div id="navbar-menu" class="toggled">-->
<!--                    <ul class="nav navbar-nav navbar-right">-->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png"-->
<!--                                                                                            class="img-circle"-->
<!--                                                                                            alt="Avatar">-->
<!--                                <span>--><?php //echo $a; ?><!--</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a>-->
<!--                                </li>-->
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

        <nav style="height: 50px;" class="navbar navbar-default navbar-fixed-top">
            <div style="width: 250px;background-color: #252c35   ;height: 5px;margin-top: -20px" class="brand">
                <a  href="index.php"><img style="height: 40px;width: 120px" src="assets/img/w_logo.png" alt="Klorofil Logo" class="img-responsive"></a>
            </div>
            <div style="background-color: #252c35   ;height: 61px;" >
                <div style="margin-top: -10px" class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: -10px" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo  $a;?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- MAIN -->
        <div style="margin-top: 5%" class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div  class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- INPUTS-->
                            <div class="panel">




                                <?php
                                if (isset($_POST['edit'])) {
                                    $getcustomerquerOne = mysqli_query($con, "SELECT * FROM  `add_lead` WHERE id='" . $_POST['edit'] . "' AND sid='".$_SESSION['sid']."'");
                                    $arrayOne = mysqli_fetch_array($getcustomerquerOne);

                                    $username = $arrayOne['username'];
                                    $password= $arrayOne['password'];
                                    $name = $arrayOne['name'];
                                    $designation= $arrayOne['designation'];
                                    $mobileno = $arrayOne['mobileno'];
                                    $email = $arrayOne['email'];
                                   $create_date= $arrayOne['create_date'];
//
//                                    $time = $arrayOne['time'];
//                                    $expecteddate = $arrayOne['expecteddate'];
//                                    $product = $arrayOne['product'];
//                                    $qty = $arrayOne['qty'];
//                                    $unit = $arrayOne['unit'];
//                                    $total = $arrayOne['total'];
//                                    $comment = $arrayOne['comment'];
                                }


                                ?>
                                <div class="panel-body">

                                    <div class="col-md-4">
                                        <h3>Employee Details</h3>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Name:</label>
                                            </div>

                                            <div class="col-75">
                                                <label><?php
                                                    if(isset( $name))
                                                    {
                                                        echo  $name;
                                                    }?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Username:</label>
                                            </div>
                                            <div class="col-75">
                                                <label>
                                                    <?php
                                                    if(isset($username)){echo $username;}?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Password:</label>
                                            </div>
                                            <div class="col-75">
                                                <label>
                                                    <?php
                                                    if(isset($password)){echo $password;}?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Designation:</label>
                                            </div>
                                            <div class="col-75">
                                                <label>
                                                    <?php

                                                    if(isset($designation)){echo $designation;}?> </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Mobile:</label>
                                            </div>
                                            <div class="col-75">
                                                <label><?php if (isset($mobileno)) {
                                                        echo $mobileno;
                                                    } ?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Email:</label>
                                            </div>
                                            <div class="col-75">
                                                <label><?php if (isset($email)) {
                                                        echo $email;
                                                    } ?></label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label class="form-group-lg" for="companyname">Created
                                                    date:</label>
                                            </div>
                                            <div class="col-75">
                                                <label><?php if (isset($create_date)) {
                                                        echo $create_date ;
                                                    } ?></label>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-md-8">
                                        <h3>Leads Details</h3>

                                        <div style="overflow-x:auto;">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th>Order No.</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Date &amp; Time</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE eid='". $_POST['edit']."'AND sid='".$_SESSION['sid']."'  ");
                                                // $arra=mysqli_fetch_array($selectpsitive);

                                                while($arraylead=mysqli_fetch_array($selectpsitive)){
                                                    ?>
                                                    <tr>
                                                        <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['id'])){echo $arraylead['id'] ;}?></a></td>
                                                        <td><?php if(isset($arraylead['companyname'])){
                                                                //  echo $arraylead['companyname'] ;
                                                                $selectOne=mysqli_query($con,"SELECT * FROM  `add_company` WHERE id='".$arraylead['companyname']."'");
                                                                $arrayleads=mysqli_fetch_array($selectOne);
                                                                if(isset($arrayleads['cname']))
                                                                {
                                                                    echo $arrayleads['cname'];
                                                                }
                                                            }?></td>
                                                        <td><?php if(isset($arraylead['total'])){echo $arraylead['total'] ;}?></td>
                                                        <td><?php if(isset($arraylead['followdate'])){echo $arraylead['followdate'] ;}?></td>
                                                        <td><?php if(isset($arraylead['status'])){
                                                                // echo $arraylead['status'] ;
                                                                if($arraylead['status'] == "HotFunnel"){
                                                                    ?>
                                                                    <span class="label box label-success">HotFunnel</span>
                                                                    <?php
                                                                }else if($arraylead['status'] == "OrderLost"){
                                                                    ?>
                                                                    <span class="label box label-danger">Orderlost</span>
                                                                    <?php
                                                                }else if($arraylead['status'] == "DealClose"){
                                                                    ?>
                                                                    <span class="label box " style="background-color: #2D6FE2  ">DealClose</span>
                                                                    <?php
                                                                }else if($arraylead['status'] == "Forecast"){
                                                                    ?>
                                                                    <span class="label box" style="background-color: #9d28ce  ">Forecast</span>
                                                                    <?php
                                                                }else if($arraylead['status'] == "Pipeline"){
                                                                    ?>
                                                                    <span class="label box label-warning">Pipeline</span>
                                                                    <?php
                                                                }
                                                                else if($arraylead['status'] == "Invoiced"){
                                                                    ?>
                                                                    <span class="label box" style="background-color: #CEB904  ">Invoiced</span>
                                                                    <?php
                                                                }else if($arraylead['status'] == "PostSale"){
                                                                    ?>
                                                                    <span class="label box" style="background-color: #6e7f02">PostSale</span>
                                                                    <?php
                                                                }
                                                            }?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <!--                         END INPUTS -->

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
include('footer.php');
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
