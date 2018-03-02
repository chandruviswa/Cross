<?php
include('menutwo.php');
include ('config.php');

?>
<!doctype html>
<html lang="en">

<head>
    <title>Reports | Falcon Square</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <!--    <link rel="stylesheet" href="assets/css/demo.css">-->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
    </style>
</head>

<body>

<form method="post">
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Reports</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Report Statement</h3>
                                </div>
                                <div class="panel-body">
                                    <input type="date" name="sdate" class="form-control" placeholder="Start Date">
                                    <br>
                                    <input type="date" name="edate"class="form-control" placeholder="End ate">
                                    <br>
                                    <select name="status" class="form-control">
                                        <option value="ALL">ALL</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Installed">Installed</option>
                                    </select>
                                    <br>

                                    <select name="eid" class="form-control">
                                        <option value="ALL">ALL</option>
                                        <?php
                                        $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE aid='".$_SESSION['aid']."' ");

                                        while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {

                                            ?>

                                            <option value="<?php if(isset($arrayleads['id'])){echo $arrayleads['id'];}?>"><?php if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                    <br>

                                    <button style="text-align: center" type="submit" name="report" class="btn-success btn">Search</button>
                                </div>
                            </div>




                        </div>

                        <!--<div class="col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Report Graph representation</h3>
                            </div>
                            <div class="panel-body">
                                <div id="demo-bar-chart" class="ct-chart"></div>
                            </div>
                        </div>
                    </div>-->


                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Report Customer  Details</h3>
                                </div>

                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
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
                                            </tr>



                                            <?php

                                            if(isset($_POST['report'])){

                                                //echo "<script>alert('suceee')</script>";

                                                $eid=$_POST['eid'];
                                                //$aid=$_POST['aid'];
                                                $status=$_POST['status'];
                                                $startDate=$_POST['sdate'];
                                                $endDate=$_POST['edate'];

                                                $itemWiseQueryOne = "SELECT *FROM  `leads`";
                                                $itemWiseQueryOne = $itemWiseQueryOne . '' . "where (create_date BETWEEN '$startDate' AND '$endDate')";
                                                if (!empty($eid) && $eid !="ALL") {
                                                    //echo "<script>alert('suceee')</script>";
                                                    $itemWiseQueryOne = $itemWiseQueryOne . ' ' . " and eid='$eid'";
                                                }

                                                if (!empty($status) && $status !="ALL") {
                                                    //echo "<script>alert('fail+')</script>";
                                                    $itemWiseQueryOne = $itemWiseQueryOne . ' ' . " and status='$status'";
                                                }
                                                $SelectLeadQuery = mysqli_query($con, $itemWiseQueryOne);

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
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</form>

<!-- END MAIN -->
<?php
include ('footer.php');
?>

<!-- END WRAPPER -->
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
</body>

</html>
