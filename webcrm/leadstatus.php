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
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Status Representation</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 style="font-weight: bold" >Lead Status</h4>
                                </div>
                                <div class="panel-body">
                                    <div id="piechart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 style="font-weight: bold"> Target Status</h4>
                                </div>
                                <div class="panel-body">
                                    <div id="piechartone"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
<!--                        <div class="col-md-6">-->
<!--                            <div class="panel">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h3 class="panel-title">Achieved</h3>-->
<!--                                </div>-->
<!--                                <div class="panel-body">-->
<!--                                    <div id="demo-area-chart" class="ct-chart"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Balance</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="multiple-chart" class="ct-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
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
<script>
    $(function() {
        var options;

        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [
                [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            ]
        };

        // line chart
        options = {
            height: "300px",
            showPoint: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#demo-line-chart', data, options);

        // bar chart
        options = {
            height: "300px",
            axisX: {
                showGrid: false
            },
        };

        new Chartist.Bar('#demo-bar-chart', data, options);


        // area chart
        options = {
            height: "270px",
            showArea: true,
            showLine: false,
            showPoint: false,
            axisX: {
                showGrid: false
            },
            lineSmooth: false,
        };

        new Chartist.Line('#demo-area-chart', data, options);


        // multiple chart
        var data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            series: [{
                name: 'series-real',
                data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
            }, {
                name: 'series-projection',
                data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
            }]
        };

        var options = {
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

        new Chartist.Line('#multiple-chart', data, options);

    });
</script>
<script type="text/javascript" src="js/piochart.js"></script>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Status', 'Lead'],
            ['Pipeline', 8],
            ['HotFunnel', 2],
            ['OrderLost', 4],
            ['OrderClose', 2],
            ['Invoivced', 8]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':550, 'height':200};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Status', 'target'],
            ['Target', 8],
            ['Acheived', 2],
            ['Balance', 4]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'', 'width':550, 'height':200};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechartone'));

        chart.draw(data, options);
    }
</script>

</body>

</html>
