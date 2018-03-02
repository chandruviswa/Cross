<?php
//include('menuone.php');

include ('config.php');
include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");

$a = "";
if(isset($_SESSION['username']))
{
    $a = $_SESSION['username'];
}

if(isset($_POST["addsca"])){
    header("Location:employeeaddlead.php");
}


if(isset($_POST["sales"])){
    header("Location:salesorder.php");
}

if(isset($_POST["edit"])){
    $sales_id=$_POST['edit'];
    header("Location:employeeaddlead.php?edit=".$sales_id."");
}

if(isset($_POST["view"])){
    $sales_id=$_POST['view'];
    header("Location:viewcustomer.php?edit=".$sales_id."");
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
            border: 1px solid #E7E3E3  ;
        }

        th{
            background-color: #0d69af;
            color: #FFFFFF;
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



<form method="post" >
    <!-- WRAPPER -->
    <div id="">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div style="width: 250px;height: 50px;margin-top: -20px" class="brand">
                <a  href="index.php"><img  src="assets/img/finallogo.png" alt="Klorofil Logo" class="img-responsive"></a>
            </div>
            <div  class="container-fluid">
                <div style="  float: left;padding: 16px 0;" class="">
                    <button name="addsca" class="btn btn-success"> ADD Lead</button>
                </div>

                <div style="  float: left;padding: 20px 0;margin-left: 10%" class="">
                    <input>
                    <button name="addsca" class="btn btn-success">Search</button>
                </div>

                <div style="  float: left;padding: 16px 0;margin-left: 15%" class="">
                    <button name="sales" class="btn btn-success">Sales Order</button>
                </div>
                <div id="navbar-menu" class="toggled">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo  $a;?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
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
        </nav>


        <!-- MAIN -->
        <div style="margin-top: 5%" class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">

                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Overview</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-download"></i></span>
                                        <p>
                                        <span class="number"><?php
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND status='positive'");
                                            $arra=mysqli_fetch_array($selectpsitive);
                                            if($arra['COUNT(id)'] > 0){echo $arra['COUNT(id)']; }else{ echo 0;}

                                            ?></span>
                                            <span class="title">POSITIVE</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                        <p>
                                        <span class="number"><?php
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'  AND status='Negative'");
                                            $arra=mysqli_fetch_array($selectpsitive);
                                            if($arra['COUNT(id)'] > 0){echo $arra['COUNT(id)']; }else{ echo 0;}

                                            ?></span>
                                            <span class="title">NEGATIVE</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-eye"></i></span>
                                        <p>
                                        <span class="number"><?php
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'  AND status='Confirmed'");
                                            $arra=mysqli_fetch_array($selectpsitive);
                                            if($arra['COUNT(id)'] > 0){echo $arra['COUNT(id)']; }else{ echo 0;}

                                            ?></span>
                                            <span class="title">CONFIRM</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
                                        <span class="number"><?php
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND status='Installed'");
                                            $arra=mysqli_fetch_array($selectpsitive);
                                            if($arra['COUNT(id)'] > 0){echo $arra['COUNT(id)']; }else{ echo 0;}

                                            ?></span>
                                            <span class="title">INSTALLED</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- RECENT PURCHASES -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Upcomming Activities</h3>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <table class="table table-striped">
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
                                                    $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND followdate>= CURRENT_DATE() ORDER BY followdate ASC  LIMIT 5 ");
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
                                                            }else if($arraylead['status'] == "Closed"){
                                                                ?>
                                                                <span class="label" style="background-color: #2AF8E8">CLOSED</span>
                                                                <?php
                                                            }
                                                    }?></td>
                                                </tr>
                                                    <?php
                                                    }
                                                    ?>
<!--                                                <tr>-->
<!--                                                    <td><a href="#">763649</a></td>-->
<!--                                                    <td>Amber</td>-->
<!--                                                    <td>62</td>-->
<!--                                                    <td>Oct 21, 2016</td>-->
<!--                                                    <td><span class="label label-warning">PENDING</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td><a href="#">763650</a></td>-->
<!--                                                    <td>Michael</td>-->
<!--                                                    <td>34</td>-->
<!--                                                    <td>Oct 18, 2016</td>-->
<!--                                                    <td><span class="label label-danger">NEGATIVE</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td><a href="#">763651</a></td>-->
<!--                                                    <td>Roger</td>-->
<!--                                                    <td>186</td>-->
<!--                                                    <td>Oct 17, 2016</td>-->
<!--                                                    <td><span class="label label-success">POSITIVE</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td><a href="#">763652</a></td>-->
<!--                                                    <td>Smith</td>-->
<!--                                                    <td>362</td>-->
<!--                                                    <td>Oct 16, 2016</td>-->
<!--                                                    <td><span class="label " style="background-color: #CEB904    ">SUCCESS</span></td>-->
<!--                                                </tr>-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END RECENT PURCHASES -->
                                </div>

                                <div class="col-md-6">
                                    <!-- RECENT PURCHASES -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Pending Activities</h3>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <table class="table table-striped">
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
                                                $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND followdate < CURRENT_DATE() ORDER BY followdate ASC  LIMIT 5 ");
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
                                                                }else if($arraylead['status'] == "Closed"){
                                                                    ?>
                                                                    <span class="label" style="background-color: #2AF8E8">CLOSED</span>
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
                                    <!-- END RECENT PURCHASES -->
                                </div>

                                <div class="col-md-6">
                                    <!-- RECENT PURCHASES -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Expected Closure</h3>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <table class="table table-striped">
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
                                                $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND expecteddate>= CURRENT_DATE() ORDER BY expecteddate ASC  LIMIT 5 ");
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
                                                        <td><?php if(isset($arraylead['expecteddate'])){echo $arraylead['expecteddate'] ;}?></td>
                                                        <td><?php if(isset($arraylead['status'])){
                                                                // echo $arraylead['status'] ;
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
                                                                }else if($arraylead['status'] == "Closed"){
                                                                    ?>
                                                                    <span class="label" style="background-color: #2AF8E8">CLOSED</span>
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
                                    <!-- END RECENT PURCHASES -->
                                </div>

                                <div class="col-md-6">
                                    <!-- RECENT PURCHASES -->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Target Acheivement</h3>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Achieved</th>
                                                    <th>TargetAmount</th>
                                                    <th>Date &amp; Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><a href="#">1</a></td>
                                                    <td>Steve</td>
                                                    <td>12500</td>
                                                    <td>45000</td>
                                                    <td>Oct 21, 2016</td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">2</a></td>
                                                    <td>Amber</td>
                                                    <td>62000</td>
                                                    <td>150000</td>
                                                    <td>Oct 21, 2016</td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">3</a></td>
                                                    <td>Michael</td>
                                                    <td>34000</td>
                                                    <td>75000</td>
                                                    <td>Oct 18, 2016</td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">4</a></td>
                                                    <td>Roger</td>
                                                    <td>18000</td>
                                                    <td>40000</td>
                                                    <td>Oct 17, 2016</td>

                                                </tr>
                                                <tr>
                                                    <td><a href="#">5</a></td>
                                                    <td>Smith</td>
                                                    <td>36000</td>
                                                    <td>250000</td>
                                                    <td>Oct 16, 2016</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END RECENT PURCHASES -->
                                </div>

                            </div>
                        </div>





                    </div>


                <div class="container-fluid">
                    <h3 style="color: #066ECC ;" class="page-title">Lead Management</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <input name="nextvisitdate" type="date">
                                    <button type="submit" name="viewnextdate"  >View</button>
                                    <button type="submit"   >Cancel</button>
                                </div>

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
                                                <th>Action</th>
                                            </tr>



                                            <?php

                                            $qury="SELECT * FROM  `leads`";
                                            if(isset($_POST['viewnextdate'])){
                                                $qury=$qury."WHERE followdate='".$_POST['nextvisitdate']."'";
                                            }
                                            $SelectLeadQuery=mysqli_query($con,$qury);

                                            // $SelectLeadQuery=mysqli_query($con,);
                                            $sno=0;
                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                                $sno=$sno+1;
                                                ?>
                                                <tr>
                                                    <td> <a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($sno)){echo $sno;}?></a></td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_company` WHERE id='".$arraylead['companyname']."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                        if(isset($arrayleads['cname']))
                                                        {
                                                            echo $arrayleads['cname'];
                                                        }?></a>
                                                    </td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_contacts` WHERE id='".$arraylead['contactperson']."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                            if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
                                                    </td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE id='".$arraylead['eid']."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                            if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
                                                    </td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                                                        $selectOne=mysqli_query($con,"SELECT * FROM  `admin` WHERE id='".$arraylead['aid']."'");
                                                        $arrayleads=mysqli_fetch_array($selectOne);
                                                            if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
                                                    </td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['updatedate'])){echo $arraylead['updatedate'];}?></a></td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['status'])){
                                                       // echo $arraylead['status'];
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
                                                                }else if($arraylead['status'] == "Closed"){
                                                                    ?>
                                                                    <span class="label" style="background-color: #2AF8E8">CLOSED</span>
                                                                    <?php
                                                                }
                                                    }?></a></td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['followdate'])){echo $arraylead['followdate'];}?></a></td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['expecteddate'])){echo $arraylead['expecteddate'];}?></a> </td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['product'])){echo $arraylead['product'];}?></a></td>
                                                    <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['total'])){echo $arraylead['total'];}?></a></td>
                                                    <!--                                                    <td><button type="submit" name="view" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-success">View</button></td>-->
                                                    <td><button id="edit" name="edit" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-info">Edit</button> </td>
                                                    <!--                                                    <td> <button  name="delete" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-danger">Delete</button></td>-->
                                                </tr>
                                                <!--                                <input style="width: 100%;margin: 2px" type="submit" name="lead" value="--><?php //if(isset($arraylead['name'])){echo $arraylead['name'];}?><!--">-->
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
            <!-- END MAIN CONTENT -->
        </div>
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
