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
        <div class="container-fluid">
            <h3 style="color: #066ECC ;" class="page-title">Lead Management</h3>
            <div class="row">
                <div class="col-md-12">
                    <!-- BUTTONS -->
                    <div class="panel">


                        <div class="panel-body ">
                            <div style="overflow-x:auto;">
                                <table >
                                    <tr>
                                        <th>SNo</th>
                                        <th>Company Name</th>
                                        <th>Contact Person</th>
                                        <th>Employee</th>
                                        <th>Branch</th>
                                        <th>Update date</th>
                                        <th>Status</th>
                                        <th>Follow date</th>
                                        <th>Expected date</th>
                                        <th>product</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                    </tr>



                                    <?php

                                    $qury="SELECT * FROM  `leads`";

                                    if($_SESSION['eid'] =="0" && $_SESSION['aid'] =="0"){
                                        $qury=$qury."WHERE sid='".$_SESSION['sid'] ."'";

                                    }else if($_SESSION['eid'] =="0"){
                                        $qury=$qury."WHERE aid='".$_SESSION['aid'] ."'";
                                    }else{
                                        $qury=$qury."WHERE  sid='".$_SESSION['sid'] ."' AND aid='".$_SESSION['aid'] ."' AND eid='".$_SESSION['eid'] ."' ";
                                    }
//                                    if(isset($_POST['viewnextdate'])){
//                                        $qury=$qury."WHERE followdate='".$_POST['nextvisitdate']."'";
//                                    }
                                    $SelectLeadQuery=mysqli_query($con,$qury);

                                    // $SelectLeadQuery=mysqli_query($con,);
                                    $sno=0;
                                    while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                        $sno=$sno+1;
                                        ?>
                                        <tr>
                                            <td> <a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($sno)){echo $sno;}?></a></td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                    $selectOne=mysqli_query($con,"SELECT * FROM  `add_company` WHERE id='".$arraylead['companyname']."'");
                                                    $arrayleads=mysqli_fetch_array($selectOne);
                                                    if(isset($arrayleads['cname']))
                                                    {
                                                        echo $arrayleads['cname'];
                                                    }?></a>
                                            </td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                    $selectOne=mysqli_query($con,"SELECT * FROM  `add_contacts` WHERE id='".$arraylead['contactperson']."'");
                                                    $arrayleads=mysqli_fetch_array($selectOne);
                                                    if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
                                            </td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                    $selectOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE id='".$arraylead['eid']."'");
                                                    $arrayleads=mysqli_fetch_array($selectOne);
                                                    if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
                                            </td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                    $selectOne=mysqli_query($con,"SELECT * FROM  `admin` WHERE id='".$arraylead['aid']."'");
                                                    $arrayleads=mysqli_fetch_array($selectOne);
                                                    if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
                                            </td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['updatedate'])){echo $arraylead['updatedate'];}?></a></td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['status'])){
                                                        // echo $arraylead['status'];
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

                                                    }?></a></td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['followdate'])){echo $arraylead['followdate'];}?></a></td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['expecteddate'])){echo $arraylead['expecteddate'];}?></a> </td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['product'])){echo $arraylead['product'];}?></a></td>
                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['total'])){echo $arraylead['total'];}?></a></td>

                                            <td><a href="viewsales.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" > <?php if(isset($arraylead['id'])){
                                                        $selectpaument=mysqli_query($con,"SELECT * FROM `payments` WHERE cid='".$arraylead['id']."'");
                                                        $paid=0;
                                                        while (  $arraysTwo=mysqli_fetch_array($selectpaument)){
                                                            $paid=$paid+$arraysTwo['amount'];
                                                        }
                                                echo $paid;
                                            }?></a> </td>

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
        </div>
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
