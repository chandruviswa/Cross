<?php
include('menu.php');
include ('config.php');

?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | FALCON SQUARE</title>
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
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <!--    <link rel="stylesheet" href="assets/css/demo.css">-->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

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

<body>
<!-- WRAPPER -->
<div id="wrapper">

    <div  class="main">
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE  sid='".$_SESSION['sid']."' AND status='positive'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE  sid='".$_SESSION['sid']."' AND status='Negative'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE  sid='".$_SESSION['sid']."'   AND status='Confirmed'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  leads WHERE  sid='".$_SESSION['sid']."'  AND status='Installed'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE sid='".$_SESSION['sid']."'  AND followdate>= CURRENT_DATE() ORDER BY followdate ASC  LIMIT 5 ");
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
                                            $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND followdate < CURRENT_DATE() ORDER BY followdate ASC  LIMIT 5 ");
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
                                        <h3 class="panel-title"  style="font-family:'Expressive Inks',serif;">Expected Closure</h3>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table table-striped" >
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
                                            $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND expecteddate>= CURRENT_DATE() ORDER BY expecteddate ASC  LIMIT 5 ");
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
                                                <!--                                                <th>Action</th>-->
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
                                                    <!--                                                    <td><button id="edit" name="edit" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-info">Edit</button> </td>-->
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


    <!-- END MAIN -->
    <?php
    include('footer.php');
    ?>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>

<script>
    $(function () {
        var data, options;

        // headline charts
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [23, 29, 24, 40, 25, 24, 35],
                [14, 25, 18, 34, 29, 38, 44],
            ]
        };

        options = {
            height: 300,
            showArea: true,
            showLine: false,
            showPoint: false,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#headline-chart', data, options);


        // visits trend charts
        data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            series: {
                'series-projection': {
                    showArea: true,
                    showPoint: false,
                    showLine: false
                },
            },
            axisX: {
                showGrid: false,

            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 20
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);


        // visits chart
        data = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            series: [
                [6384, 6342, 5437, 2764, 3958, 5068, 7654]
            ]
        };

        options = {
            height: 300,
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#visits-chart', data, options);


        // real-time pie chart
        var sysLoad = $('#system-load').easyPieChart({
            size: 130,
            barColor: function (percent) {
                return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
            },
            trackColor: 'rgba(245, 245, 245, 0.8)',
            scaleColor: false,
            lineWidth: 5,
            lineCap: "square",
            animate: 800
        });

        var updateInterval = 3000; // in milliseconds

        setInterval(function () {
            var randomVal;
            randomVal = getRandomInt(0, 100);

            sysLoad.data('easyPieChart').update(randomVal);
            sysLoad.find('.percent').text(randomVal);
        }, updateInterval);

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

    });
</script>

</body>

</html>
