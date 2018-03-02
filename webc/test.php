<?php
include('menu.php');

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
                    <h3 class="page-title">Customer Management</h3>
                    <div class="row">


                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customer</h3>
                                </div>

                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>



                                            <?php

                                            $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `add_customer` ");

                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){

                                                ?>
                                                <tr>
                                                    <td><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></td>
                                                    <td><?php if(isset($arraylead['mobile'])){echo $arraylead['mobile'];}?></td>
                                                    <td><?php if(isset($arraylead['email'])){echo $arraylead['email'];}?></td>
                                                    <td><?php if(isset($arraylead['address'])){echo $arraylead['address'];}?></td>
                                                    <td><?php if(isset($arraylead['status'])){echo $arraylead['status'];}?></td>
                                                    <td><button type="submit" name="view" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-success">View</button> <button class="btn btn-danger">Delete</button></td>
                                                </tr>
                                                <!--                                <input style="width: 100%;margin: 2px" type="submit" name="lead" value="--><?php //if(isset($arraylead['name'])){echo $arraylead['name'];}?><!--">-->
                                                <?php

                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END BUTTONS -->

                            <!-- INPUT SIZING -->
                            <!--                        <div class="panel">-->
                            <!--                            <div class="panel-heading">-->
                            <!--                                <h3 class="panel-title">Input Sizing</h3>-->
                            <!--                            </div>-->
                            <!--                            <div class="panel-body">-->
                            <!--                                <input class="form-control input-lg" placeholder=".input-lg" type="text">-->
                            <!--                                <br>-->
                            <!--                                <input class="form-control" placeholder="Default input" type="text">-->
                            <!--                                <br>-->
                            <!--                                <input class="form-control input-sm" placeholder=".input-sm" type="text">-->
                            <!--                                <br>-->
                            <!--                                <select class="form-control input-lg">-->
                            <!--                                    <option value="cheese">Cheese</option>-->
                            <!--                                    <option value="tomatoes">Tomatoes</option>-->
                            <!--                                    <option value="mozarella">Mozzarella</option>-->
                            <!--                                    <option value="mushrooms">Mushrooms</option>-->
                            <!--                                    <option value="pepperoni">Pepperoni</option>-->
                            <!--                                    <option value="onions">Onions</option>-->
                            <!--                                </select>-->
                            <!--                                <br>-->
                            <!--                                <select class="form-control">-->
                            <!--                                    <option value="cheese">Cheese</option>-->
                            <!--                                    <option value="tomatoes">Tomatoes</option>-->
                            <!--                                    <option value="mozarella">Mozzarella</option>-->
                            <!--                                    <option value="mushrooms">Mushrooms</option>-->
                            <!--                                    <option value="pepperoni">Pepperoni</option>-->
                            <!--                                    <option value="onions">Onions</option>-->
                            <!--                                </select>-->
                            <!--                                <br>-->
                            <!--                                <select class="form-control input-sm">-->
                            <!--                                    <option value="cheese">Cheese</option>-->
                            <!--                                    <option value="tomatoes">Tomatoes</option>-->
                            <!--                                    <option value="mozarella">Mozzarella</option>-->
                            <!--                                    <option value="mushrooms">Mushrooms</option>-->
                            <!--                                    <option value="pepperoni">Pepperoni</option>-->
                            <!--                                    <option value="onions">Onions</option>-->
                            <!--                                </select>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!-- END INPUT SIZING -->
                        </div>

                        <div class="col-md-6">
                            <!-- INPUTS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ADD Customer</h3>
                                </div>
                                <div class="panel-body">
                                    <input type="text" class="form-control" placeholder="Name">
                                    <br>
                                    <input type="email" class="form-control" placeholder="Email">
                                    <br>
                                    <input type="number" class="form-control" placeholder="Mobile number">
                                    <br>
                                    <input type="text" class="form-control" placeholder="Address">
                                    <br>
                                    <select class="form-control">
                                        <option value="Possitive">Possitive</option>
                                        <option value="Negative">Negative</option>
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Installed">Installed</option>
                                    </select>
                                    <br>

                                    <select class="form-control">
                                        <?php
                                        $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_lead`  ");

                                        while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {

                                            ?>

                                            <option value="Marketing department"><?php if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                    <br>

                                    <button style="text-align: center" type="submit" name="addcustomer" class="btn-success btn">ADD</button>
                                </div>
                            </div>
                            <!--                         END INPUTS -->

                        </div>








                        <div class="col-md-6">

                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List of Visits</h3>
                                </div>
                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>Visit type</th>

                                                <th>name</th>
                                                <th>Location</th>
                                                <th>Requirement</th>
                                                <th>Status</th>
                                                <th>Notes</th>
                                                <th>Visit time</th>
                                                <th>Employee</th>
                                                <th>Next visit</th>

                                            </tr>



                                            <?php

                                            if(isset($_POST['view'])){

                                                $eid=$_POST['view'];


                                                $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `visits` WHERE  custom_id='$eid'");

                                                while($arraylead=mysqli_fetch_array($SelectLeadQuery)){

                                                    ?>
                                                    <tr>
                                                        <td><?php if(isset($arraylead['vist_type'])){echo $arraylead['vist_type'];}?></td>

                                                        <td><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></td>
                                                        <td><?php if(isset($arraylead['location'])){echo $arraylead['location'];}?></td>
                                                        <td><?php if(isset($arraylead['requirement'])){echo $arraylead['requirement'];}?></td>
                                                        <td><?php if(isset($arraylead['status'])){echo $arraylead['status'];}?></td>
                                                        <td><?php if(isset($arraylead['notes'])){echo $arraylead['notes'];}?></td>
                                                        <td><?php if(isset($arraylead['visit_time'])){echo $arraylead['visit_time'];}?></td>

                                                        <td><?php  $SelectLeadQueryOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE  id='".$arraylead['eid']."'");
                                                            $qarry=mysqli_fetch_array($SelectLeadQueryOne);
                                                            if(isset($qarry['name'])){echo $arraylead['name'];}?></td>
                                                        <td><?php if(isset($arraylead['next_visit'])){echo $arraylead['next_visit'];}?></td>
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
                            <!-- END PROGRESS BARS -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
</form>
<!-- END MAIN -->
<?php
include ('footer.php');
?>
</div>

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
</body>

</html>
