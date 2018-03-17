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

        th{
            background-color: #0d69af;
            color: #FFFFFF;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #E7E3E3;
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

        .in{
            list-style-type: none;
            margin: 0;
            padding-top: 10px;
            padding-right: 10px;
            padding-left: 10px;


        }

        .in li {
            display: inline;
            padding-top: 10px;
            padding-right: 10px;
            padding-left: 10px;


        }

        .in dd{
            display: inline;
        }

        .in dt{
            display: inline;
        }


    </style>
</head>

<body>


<form method="post">
    <div id="">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div style="width: 250px;background-color: #3B5998     ;height: 5px;margin-top: -20px"  class="brand">
                <a  href="index.php"><img style="height: 40px;width: 120px" src="assets/img/w_logo.png" alt="Klorofil Logo" class="img-responsive"></a>
            </div>

            <div style="background-color: #3B5998     ;height: 5px;margin-top: -20px;color: white" class="brand">
                <a  href="employeeaddlead.php"><p style="font-size: 18px;color: white">Lead</p><p style="margin-top: -20%;font-size:12px;color: white">Management</p></a>
            </div>
            <div style="background-color: #3B5998     ;height: 5px;margin-top: -20px;margin-left: -2%"  class="brand">
                <a  href="leadstatus.php"><p style="font-size: 18px;color: white">Order</p><p style="margin-top: -20%;font-size:12px;color: white">Management</p></a>
            </div>
            <div style="background-color: #3B5998     ;height: 5px;margin-top: -20px;margin-left: -2%"  class="brand">
                <a  href="salesorder.php"><p style="font-size: 18px;color: white">Sales</p><p style="margin-top: -20%;font-size:12px;   color: white">Management</p></a>
            </div>
            <div style="background-color: #3B5998     ;height: 5px;margin-top: -20px;margin-left: -2%"  class="brand">
                <a  href="employeetask.php"><p style="font-size: 18px;color: white">Task</p><p style="margin-top: -20%;font-size:12px;   color: white">Management</p></a>
            </div>


            <div style="background-color: #3B5998     ;height: 51px;" class="container-fluid">

                <div  id="navbar-menu" class="toggled">
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-top: -10px" class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i style="color: #FFFFFF" class="lnr lnr-alarm"></i>
                                <span  class="badge bg-danger"><?php
                                    $seletcTaskco = mysqli_query($con,"SELECT COUNT(id) FROM `taskmanage` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND eid='".$_SESSION['eid']."' AND see='0'");
                                    $coarry=mysqli_fetch_array($seletcTaskco);
                                    echo $coarry['COUNT(id)'];

                                    ?></span>
                            </a>
                            <ul class="dropdown-menu notifications">

                                <?php
                                $seletcTask = mysqli_query($con,"SELECT * FROM `taskmanage` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND eid='".$_SESSION['eid']."' AND see='0'");
                                while($taskarry =mysqli_fetch_array($seletcTask))
                                {
                                    ?>
                                    <li><a href="employeetask.php" class="notification-item"><span class="dot bg-success"></span><?php if($taskarry['task']){ echo $taskarry['task'];} ?></a></li>
                                    <?php
                                }
                                ?>

                                <!--                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>-->
                                <!--                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>-->
                                <!--                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>-->
                                <!--                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>-->
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li style="margin-top: -20px" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/userss.png" class="img-circle" alt="Avatar"> <span style="color: #ff1524;font-weight: bold"><?php echo  $a; $selectbranch = mysqli_query($con,"SELECT * FROM  `admin` WHERE id='".$_SESSION['aid']."'");
                                    $brarray=mysqli_fetch_array($selectbranch); echo "<br>". $brarray['name'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/userss.png" class="img-circle" alt="Avatar"> <span style="color: white;">--><?php //echo  $a;$selectbranch = mysqli_query($con,"SELECT * FROM  `admin` WHERE id='".$_SESSION['aid']."'");
                            //                                    $brarray=mysqli_fetch_array($selectbranch); echo "<br>". $brarray['name'];?><!--</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>-->
                            <ul class="dropdown-menu">
                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <!--                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>-->
                                <!--                            <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>-->
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div style="width: 100%;height: 40px">
                <ul style="" class="in">

                    <li >
                        <dt>LEFT :</dt>
                        <dd><span style="color: red"><?php
                                $SelectLeadsQueryFindtargetdays=mysqli_query($con,"SELECT * FROM  target WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' ");
                                $targetdays=mysqli_fetch_array($SelectLeadsQueryFindtargetdays);
                                //echo $targetdays['days'];

                                if(empty($targetdays['st_date'])){
                                    echo  0;
                                }else{
                                    $startTimeStamp = strtotime($targetdays['st_date']);
                                    $endTimeStamp = strtotime($curentDate);

                                    $timeDiff = abs($endTimeStamp - $startTimeStamp);

                                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                                    // and you might want to convert to integer
                                    $numberDays = intval($numberDays);

                                    $numberDays =(int)  $targetdays['days'] -$numberDays ;
                                    echo  $numberDays;

                                }



                                ?> days</span> </dd>
                    </li>
                    <li >
                        <dt>SALES TARGET :</dt>
                        <dd><span style="color: red"><?php  if(empty($targetdays['amt'])){
                                    echo  0;
                                }else{echo $targetdays['amt'];}  ?></span> </dd>
                    </li>
                    <li >
                        <dt>ARCHEIVED :</dt>
                        <dd><span style="color: red"><?php if(empty($targetdays['acheived'])){
                                    echo  0;
                                }else{echo$targetdays['acheived'];}   ?></span> </dd>
                    </li>
                    <li >
                        <dt>BALANCE :</dt>
                        <dd><span style="color: red"><?php  echo (int)$targetdays['amt'] - (int)$targetdays['acheived']; ?></span> </dd>
                    </li>
                </ul>

            </div>
            <div class="clearfix"></div>
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
                                        $getcustomerquerOne = mysqli_query($con, "SELECT * FROM `leads` WHERE id='" . $_POST['edit'] . "'");
                                        $arrayOne = mysqli_fetch_array($getcustomerquerOne);

                                        $companyname = $arrayOne['companyname'];
                                        $contactperson = $arrayOne['contactperson'];
                                        $eid = $arrayOne['eid'];
                                        $aid = $arrayOne['aid'];
                                        $source = $arrayOne['source'];
                                        $status = $arrayOne['status'];
                                        $followdate = $arrayOne['followdate'];

                                        $time = $arrayOne['time'];
                                        $expecteddate = $arrayOne['expecteddate'];
                                        $product = $arrayOne['product'];
                                        $qty = $arrayOne['qty'];
                                        $unit = $arrayOne['unit'];
                                        $total = $arrayOne['total'];
                                        $comment = $arrayOne['comment'];
                                    }


                                    ?>
                                    <div class="panel-body">
                                        <h3>Lead Details</h3>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Company Name:</label>
                                                </div>

                                                <div class="col-75">
                                                    <label><?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_company` WHERE id='".$companyname."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                        if(isset($arrayleads['cname']))
                                                        {
                                                            echo $arrayleads['cname'];
                                                        }?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Contact Person
                                                        Name:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label>
                                                       <?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_contacts` WHERE id='".$contactperson."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                        if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Employree
                                                        Name:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label>
                                                      <?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE id='".$eid."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                        if(isset($arrayleads['name'])){echo $arrayleads['name'];}?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Branch Name:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label>
                                                        <?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `admin` WHERE id='".$aid."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                        if(isset($arrayleads['name'])){echo $arrayleads['name'];}?> </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Source:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($source)) {
                                                            echo $source;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Status:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($status)) {

                                                            if($status == "HotFunnel"){
                                                                ?>
                                                                <span class="label box label-success">HotFunnel</span>
                                                                <?php
                                                            }else if($status == "OrderLost"){
                                                                ?>
                                                                <span class="label box label-danger">Orderlost</span>
                                                                <?php
                                                            }else if($status == "DealClose"){
                                                                ?>
                                                                <span class="label box " style="background-color: #2D6FE2  ">DealClose</span>
                                                                <?php
                                                            }else if($status == "Forecast"){
                                                                ?>
                                                                <span class="label box" style="background-color: #9d28ce  ">Forecast</span>
                                                                <?php
                                                            }else if( $status == "Pipeline"){
                                                                ?>
                                                                <span class="label box label-warning">Pipeline</span>
                                                                <?php
                                                            }
                                                            else if($status == "Invoiced"){
                                                                ?>
                                                                <span class="label box" style="background-color: #CEB904  ">Invoiced</span>
                                                                <?php
                                                            }else if($status  == "PostSale"){
                                                                ?>
                                                                <span class="label box" style="background-color: #6e7f02">PostSale</span>
                                                                <?php
                                                            }
                                                            //echo $status;


                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Followup
                                                        date:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($followdate)) {
                                                            echo $followdate . '-' . $time;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Expected closure
                                                        date:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($expecteddate)) {
                                                            echo $expecteddate;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Product:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($product)) {
                                                            echo $product;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Unit:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($unit)) {
                                                            echo $unit . '*' . $qty;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Total:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($total)) {
                                                            echo $total;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label class="form-group-lg" for="companyname">Comments:</label>
                                                </div>
                                                <div class="col-75">
                                                    <label><?php if (isset($comment)) {
                                                            echo $comment;
                                                        } ?></label>
                                                </div>
                                            </div>
                                            <div style="margin-top: 2%;margin-bottom: 2%">

                                            <table>
                                                <tr>
                                                    <th style="text-align: center">Company Details</th>
                                                    <th style="text-align: center">Contact Person Details</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_company` WHERE id='".$companyname."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);

                                                        if(isset($arrayleads['cname']))
                                                        {
                                                            echo $arrayleads['cname']."<br>".$arrayleads['location']."<br>".$arrayleads['city']."<br>".$arrayleads['email']."<br>".$arrayleads['website']."<br>".$arrayleads['postal']."<br>".$arrayleads['mobile'] ;
                                                        }?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_contacts` WHERE id='".$contactperson."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                        if(isset($arrayleads['name'])){
                                                            echo $arrayleads['name']."<br>".$arrayleads['email']."<br>".$arrayleads['mobile']."<br>".$arrayleads['location'];
                                                        }?>
                                                    </td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <h3>Visit Details</h3>

                                                <div style="overflow-x:auto;">
                                                    <table>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Visittype</th>
                                                            <th>Location</th>
                                                            <th>Requirement</th>
                                                            <th>Status</th>
<!--                                                            <th>Notes</th>-->
                                                            <th>Visittime</th>
                                                            <th>Nextvisit</th>
                                                        </tr>
                                                        <?php

                                                        if (isset($_POST['edit'])) {

                                                            $eid = $_POST['edit'];


                                                            $SelectLeadQuery = mysqli_query($con, "SELECT * FROM  `visits` WHERE  custom_id='$eid'");
                                                            $snos = 0;
                                                            while ($arraylead = mysqli_fetch_array($SelectLeadQuery)) {
                                                                $snos = $snos + 1;
                                                                ?>
                                                                <tr>
                                                                    <td><?php if (isset($snos)) {
                                                                            echo $snos;
                                                                        } ?></td>
                                                                    <td><?php if (isset($arraylead['vist_type'])) {
                                                                            echo $arraylead['vist_type'];
                                                                        } ?></td>
                                                                    <td><?php if (isset($arraylead['location'])) {
                                                                            echo $arraylead['location'];
                                                                        } ?></td>
                                                                    <td><?php if (isset($arraylead['requirement'])) {
                                                                            echo $arraylead['requirement'];
                                                                        } ?></td>
                                                                    <td><?php if (isset($arraylead['status'])) {
                                                                        if($arraylead['status'] == "Positive"){
                                                                            ?>
                                                                            <span class="label label-success">POSITIVE</span>
                                                                            <?php
                                                                        }else if($arraylead['status'] == "Negative"){
                                                                            ?>
                                                                            <span class="label label-danger">NEGATIVE</span>
                                                                            <?php
                                                                        }else if($arraylead['status'] == "Installed"){
                                                                            ?>
                                                                            <span class="label " style="background-color: #2D6FE2  ">FINISHED</span>
                                                                            <?php
                                                                        }else if($arraylead['status'] == "Confirmed"){
                                                                            ?>
                                                                            <span class="label " style="background-color: #CEB904    ">SUCCESS</span>
                                                                            <?php
                                                                        }else if($arraylead['status'] == "Pending"){
                                                                            ?>
                                                                            <span class="label label-warning">PENDING</span>
                                                                            <?php
                                                                        }

                                                                        } ?></td>
<!--                                                                    <td>--><?php //if (isset($arraylead['notes'])) {
//                                                                            echo $arraylead['notes'];
//                                                                        } ?><!--</td>-->
                                                                    <td><?php if (isset($arraylead['visit_time'])) {
                                                                            echo $arraylead['visit_time'];
                                                                        } ?></td>

<!--                                                                    <td>--><?php //$SelectLeadQueryOne = mysqli_query($con, "SELECT * FROM  `add_lead` WHERE  id='" . $arraylead['eid'] . "'");
//                                                                        $qarry = mysqli_fetch_array($SelectLeadQueryOne);
//                                                                        if (isset($qarry['name'])) {
//                                                                            echo $qarry['name'];
//                                                                        } ?><!--</td>-->
                                                                    <td><?php if (isset($arraylead['next_visit'])) {
                                                                            echo $arraylead['next_visit'];
                                                                        } ?></td>
                                                                </tr>

                                                                <?php

                                                            }

                                                        }
                                                        ?>
                                                    </table>
                                                </div>

                                            <?php
                                            if($_SESSION['eid'] == 0){

                                            }else{
                                                ?>
                                                <button name="addsvi" style="float: right" class="btn-success btn">Add
                                                    visit
                                                </button>

                                                <?php

                                            }

                                            ?>




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
