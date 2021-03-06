<?php
include('menuone.php');
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

<body>
<!-- WRAPPER -->
<div id="wrapper">


    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Monthly Overview</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-download"></i></span>
                                    <p>
                                        <span class="number"><?php
$selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  add_customer WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND status='positive'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  add_customer WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'  AND status='Negative'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  add_customer WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'  AND status='Confirmed'");
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
                                            $selectpsitive=mysqli_query($con,"SELECT COUNT(id) FROM  add_customer WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND status='Installed'");
                                            $arra=mysqli_fetch_array($selectpsitive);
                                            if($arra['COUNT(id)'] > 0){echo $arra['COUNT(id)']; }else{ echo 0;}

                                            ?></span>
                                        <span class="title">INSTALLED</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div id="headline-chart" class="ct-chart"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="weekly-summary text-right">
                                    <span class="number"><?php
                                        $totalspsitive=mysqli_query($con,"SELECT COUNT(id) FROM  add_customer WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
                                        $arratotal=mysqli_fetch_array($totalspsitive);
                                        if($arratotal['COUNT(id)'] > 0){echo $arratotal['COUNT(id)']; }else{ echo 0;}

                                        ?></span> <span class="percentage"><i
                                            class="fa fa-caret-up text-success"></i> <?php echo ($arratotal['COUNT(id)'] % 100)
                                        ?>%</span>
                                    <span class="info-label">Total Customers</span>
                                </div>
<!--                                <div class="weekly-summary text-right">-->
<!--                                    <span class="number">$5,758</span> <span class="percentage"><i-->
<!--                                            class="fa fa-caret-up text-success"></i> 23%</span>-->
<!--                                    <span class="info-label">Monthly Income</span>-->
<!--                                </div>-->
                                <div class="weekly-summary text-right">
                                    <span class="number">
                                        <?php
                                        $totalsvisits=mysqli_query($con,"SELECT COUNT(id) FROM visits WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
                                        $visittotal=mysqli_fetch_array($totalsvisits);
                                        if($visittotal['COUNT(id)'] > 0){echo $visittotal['COUNT(id)']; }else{ echo 0;}

                                        ?>
                                    </span> <span class="percentage"><i
                                            class="fa fa-caret-down text-success"></i> <?php echo ($visittotal['COUNT(id)'] % 100)
                                        ?>%</span>
                                    <span class="info-label">Total Visits</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- RECENT PURCHASES -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Upcomming Activities</h3>
                                        <div class="right">
                                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                        </div>
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
                                            <tr>
                                                <td><a href="#">763648</a></td>
                                                <td>Steve</td>
                                                <td>122</td>
                                                <td>Oct 21, 2016</td>
                                                <td><span class="label " style="background-color: #2D6FE2  ">FINISHED</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763649</a></td>
                                                <td>Amber</td>
                                                <td>62</td>
                                                <td>Oct 21, 2016</td>
                                                <td><span class="label label-warning">PENDING</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763650</a></td>
                                                <td>Michael</td>
                                                <td>34</td>
                                                <td>Oct 18, 2016</td>
                                                <td><span class="label label-danger">NEGATIVE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763651</a></td>
                                                <td>Roger</td>
                                                <td>186</td>
                                                <td>Oct 17, 2016</td>
                                                <td><span class="label label-success">POSITIVE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763652</a></td>
                                                <td>Smith</td>
                                                <td>362</td>
                                                <td>Oct 16, 2016</td>
                                                <td><span class="label " style="background-color: #CEB904    ">SUCCESS</span></td>
                                            </tr>
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
                                        <h3 class="panel-title">Pending Activities On feb</h3>
                                        <div class="right">
                                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                        </div>
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
                                            <tr>
                                                <td><a href="#">763648</a></td>
                                                <td>Steve</td>
                                                <td>122</td>
                                                <td>Oct 21, 2016</td>
                                                <td><span class="label " style="background-color: #2D6FE2  ">FINISHED</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763649</a></td>
                                                <td>Amber</td>
                                                <td>62</td>
                                                <td>Oct 21, 2016</td>
                                                <td><span class="label label-warning">PENDING</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763650</a></td>
                                                <td>Michael</td>
                                                <td>34</td>
                                                <td>Oct 18, 2016</td>
                                                <td><span class="label label-danger">NEGATIVE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763651</a></td>
                                                <td>Roger</td>
                                                <td>186</td>
                                                <td>Oct 17, 2016</td>
                                                <td><span class="label label-success">POSITIVE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763652</a></td>
                                                <td>Smith</td>
                                                <td>362</td>
                                                <td>Oct 16, 2016</td>
                                                <td><span class="label " style="background-color: #CEB904    ">SUCCESS</span></td>
                                            </tr>
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
                                        <div class="right">
                                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                        </div>
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
                                            <tr>
                                                <td><a href="#">763648</a></td>
                                                <td>Steve</td>
                                                <td>122</td>
                                                <td>Oct 21, 2016</td>
                                                <td><span class="label " style="background-color: #2D6FE2  ">FINISHED</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763649</a></td>
                                                <td>Amber</td>
                                                <td>62</td>
                                                <td>Oct 21, 2016</td>
                                                <td><span class="label label-warning">PENDING</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763650</a></td>
                                                <td>Michael</td>
                                                <td>34</td>
                                                <td>Oct 18, 2016</td>
                                                <td><span class="label label-danger">NEGATIVE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763651</a></td>
                                                <td>Roger</td>
                                                <td>186</td>
                                                <td>Oct 17, 2016</td>
                                                <td><span class="label label-success">POSITIVE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">763652</a></td>
                                                <td>Smith</td>
                                                <td>362</td>
                                                <td>Oct 16, 2016</td>
                                                <td><span class="label " style="background-color: #CEB904    ">SUCCESS</span></td>
                                            </tr>
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
                                        <div class="right">
                                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                        </div>
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
                </div>

<style>

    .news-card-tag {
        margin-bottom: 0.5rem;
    }

    .news-card-tag .label {
        border-radius: 0.125rem;
        background-color: #1779ba;
        color: #fefefe;
    }

    .news-card-tag .label a {
        background-color: inherit;
        color: inherit;
    }

    .news-card-tag .label:hover, .news-card-tag .label:focus {
        background-color: #14679e;
    }

    .news-card-tag .label:hover a, .news-card-tag .label:focus a {
        background-color: inherit;
        color: inherit;
    }

    .news-card {
        background-color: #fefefe;
        font-weight: 400;
        margin-bottom: 1.6rem;
        border-radius: 0.125rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .news-card .card-section {
        background-color: inherit;
    }

    .news-card .card-section .news-card-date {
        font-size: 1em;
        color: #8a8a8a;
    }

    .news-card .card-section .news-card-article {
        background-color: inherit;
    }

    .news-card .card-section .news-card-article .news-card-title {
        line-height: 1.3;
        font-weight: bold;
    }

    .news-card .card-section .news-card-article .news-card-title a {
        text-decoration: none;
        color: #8a8a8a;
        transition: color 0.5s ease;
    }

    .news-card .card-section .news-card-article .news-card-title a:hover {
        color: #1779ba;
    }

    .news-card .card-section .news-card-article .news-card-description {
        color: #8a8a8a;
    }

    .news-card .card-section .news-card-author {
        overflow: hidden;
        padding-bottom: 1.6rem;
    }

    .news-card .card-section .news-card-author .news-card-author-image {
        display: inline-block;
        vertical-align: middle;
    }

    .news-card .card-section .news-card-author .news-card-author-image img {
        border-radius: 50%;
        margin-right: 0.6em;
    }

    .news-card .card-section .news-card-author .news-card-author-name {
        display: inline-block;
        vertical-align: middle;
    }

</style>

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
