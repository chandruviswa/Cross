<?php
include('menutwo.php');
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
<!--    <script src="js/ajaxjqyery.min.js"></script>-->
<!--    <script src="js/bootstrap.min.js"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>
<style>
    .custome table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #E7E3E3  ;
        color: #0b5b97;
        font-weight: bold;

    }

    .custome th{
        background-color: #3B5998  ;
        color: #FFFFFF;
        text-align: left;
        border: 1px solid #E7E3E3  ;
    }



    .custome td {
        color: #0b5b97;
        font-weight: bold;
        font-size: 12px;
        text-align: left;
        border: 1px solid #E7E3E3  ;

    }

    .testone tbody {
        display:block;
        height:160px;
        overflow:auto;
    }

    .testx tbody {
        display:block;
        height:350px;
        overflow:auto;
        width: 100%;
    }
    .custome tr:nth-child(even){background-color: #f2f2f2}


    .button{
        background: url(assets/img/document.png) no-repeat;
        cursor:pointer;
        border: none;
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


    /*.card {*/
    /*background: url(assets/img/sales target copy.jpg) no-repeat;*/

    /*box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);*/
    /*transition: 0.3s;*/
    /*}*/

    /*.card:hover {*/
    /*box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);*/
    /*}*/

    .container {
        padding: 2px 16px;
    }

    .innercard{

        margin-top: -23%;margin-left:10px;position: absolute;font-size: 18px;font-weight: bold;color: white

    }


    .cardshead table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        color: #0b5b97;
        font-weight: bold;

    }

    .cardshead th{
        color: white;
        text-align: center;
        padding: 8px;
        font-weight: bold;
    }



    .cardshead td {
        text-align: center;
        padding: 8px;

    }






    .searchheader table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #E7E3E3  ;
        color: #0b5b97;
        font-weight: bold;

    }

    .searchheader th{
        color: #FFFFFF;
        text-align: left;
        border: 1px solid #E7E3E3  ;

    }








</style>

<body>
<form method="post">
<!-- WRAPPER -->
<div id="wrapper">

    <div  class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">

            <div class="">
                <div class="panel panel-headline">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div >
                                    <img style="height: 10%;width: 100%" src="assets/img/Activity.jpg">
                                    <table  style="position: absolute;margin-top: -20%;height: 10%;width: 90%" class=" cardshead">
                                        <thead>
                                        <tr>
                                            <th>
                                                Upcoming <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND followdate>= CURRENT_DATE() ORDER BY followdate ASC  ");
                                                $toestotal = 0;
                                                $upsno = 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $upsno = $upsno+1;
                                                }
                                                echo $upsno;

                                                ?>
                                            </th>
                                            <th>
                                                Pending <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND NOT status='Closed' AND followdate < CURRENT_DATE() ORDER BY followdate ASC  ");
                                                $toestotal = 0;
                                                $expsno = 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $expsno = $expsno+1;
                                                }
                                                echo $expsno;

                                                ?>
                                            </th>
                                            <th>
                                                Closure <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND expecteddate>= CURRENT_DATE() ORDER BY expecteddate ASC  ");

                                                $pensno = 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $pensno = $pensno+1;
                                                }
                                                echo $pensno;

                                                ?>
                                            </th>
                                        </tr>

                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div >

                                    <img style="height: 10%;width: 100%" src="assets/img/forecast.jpg">
                                    <table  style="position: absolute;margin-top: -20%;height: 10%;width: 90%" class="cardshead">
                                        <thead>
                                        <tr>
                                            <th>
                                                Invoiced <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND NOT status='Closed' AND status = 'Invoiced'  ");
                                                $toestotal = 0;
                                                $expsno = 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $expsno = $expsno+1;
                                                }
                                                echo $expsno;

                                                ?>
                                            </th>
                                            <th>
                                                Forecast <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND NOT status='Closed' AND status = 'Forecast'  ");
                                                $toestotal = 0;
                                                $expsno = 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $expsno = $expsno+1;
                                                }
                                                echo $expsno;

                                                ?>
                                            </th>
                                            <th>
                                                Orderclose <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND NOT status='Closed' AND status = 'PostSale'  ");
                                                $toestotal = 0;
                                                $expsno = 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $expsno = $expsno+1;
                                                }
                                                echo $expsno;

                                                ?>
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div >

                                    <img style="height: 10%;width: 100%" src="assets/img/payment.jpg">
                                    <table  style="position: absolute;margin-top: -20%;height: 10%;width: 90%" class="cardshead">
                                        <thead>
                                        <tr>
                                            <th>
                                                Total <br> <?php

                                                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
                                                $toestotal = 0;
                                                $totalpaid= 0;

                                                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                    $toestotal =$toestotal + (int)$arraylea['total'];

                                                    if(isset($arraylea['id'])){
                                                        $selectpaument=mysqli_query($con,"SELECT * FROM `payments` WHERE cid='".$arraylea['id']."'");
                                                        $paid=0;
                                                        while (  $arraysTwo=mysqli_fetch_array($selectpaument)){
                                                            $paid=$paid+$arraysTwo['amount'];
                                                        }

                                                        $totalpaid =$totalpaid+$paid;

                                                    }

                                                }
                                                echo $toestotal;

                                                ?>
                                            </th>
                                            <th>
                                                Paid <br> <?php




                                                echo $totalpaid;

                                                ?>
                                            </th>
                                            <th>
                                                Balance <br> <?php


                                                echo $toestotal -$totalpaid ;

                                                ?>
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 10px" class="row">
                            <div class="col-md-4">
                                <!-- RECENT PURCHASES -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 style="font-weight: bold"  class="">Upcomming Activities(
                                            <?php

                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND followdate>= CURRENT_DATE() ORDER BY followdate ASC  ");
                                            $toestotal = 0;
                                            $upsno = 0;

                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                $upsno = $upsno+1;
                                            }
                                            echo $upsno;

                                            ?>
                                            )</h4>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table table-striped custome testone">

                                            <tbody>

                                            <?php
                                            $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND followdate>= CURRENT_DATE() ORDER BY followdate ASC  ");
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
                                <!-- END RECENT PURCHASES -->
                            </div>

                            <div class="col-md-4">
                                <!-- RECENT PURCHASES -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 style="font-weight: bold"  class="">Pending Activities(
                                            <?php

                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND NOT status='Closed' AND followdate < CURRENT_DATE() ORDER BY followdate ASC  ");
                                            $toestotal = 0;
                                            $expsno = 0;

                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                $expsno = $expsno+1;
                                            }
                                            echo $expsno;

                                            ?>)</h4>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table table-striped custome testone">

                                            <tbody>
                                            <?php
                                            $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND NOT status='Closed' AND followdate < CURRENT_DATE() ORDER BY followdate ASC   ");
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
                                <!-- END RECENT PURCHASES -->
                            </div>

                            <div class="col-md-4">
                                <!-- RECENT PURCHASES -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 style="font-weight: bold"` class="">Expected Closure(
                                            <?php

                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  leads WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND expecteddate>= CURRENT_DATE() ORDER BY expecteddate ASC  ");

                                            $pensno = 0;

                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                                $pensno = $pensno+1;
                                            }
                                            echo $pensno;

                                            ?>
                                            )</h4>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table table-striped custome testone">

                                            <tbody>
                                            <?php
                                            $selectpsitive=mysqli_query($con,"SELECT * FROM  leads WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND expecteddate>= CURRENT_DATE() ORDER BY expecteddate ASC  ");
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
                                <!-- END RECENT PURCHASES -->
                            </div>
                        </div>

                        <div  class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    Lead size <span style="color: #0d69af">Rs.
                                        <?php

                                        $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM  `leads` WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' ");
                                        $toestotal = 0;
                                        $sno = 0;

                                        while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
                                            $toestotal =$toestotal + (int)$arraylea['total'];
                                            $sno = $sno+1;
                                        }
                                        echo $toestotal;

                                        ?>


                                        .00</span>/- in Above <span style="color: #0d69af"><?php echo  $sno?></span> results

                                </div>`

                                <!-- BUTTONS -->
                                <div class="panel">
                                    <div class="panel-heading">
                                    </div>

                                    <div class="panel-body ">
                                        <div style="overflow-x:auto;">

                                            <table  class="pull-right searchheader">
                                                <tr>
                                                    <th><select id="cname" name="cname"  class="form-control">
                                                            <option value="All">Company Name(All)</option>
                                                            <?php
                                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * 
FROM  `add_company`");

                                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                                ?>

                                                                <option value="<?php if(isset($arraylea['id'])){echo $arraylea['id'];}?>" ><?php if(isset($arraylea['cname'])){echo $arraylea['cname'];}?></option>
                                                                <?php
                                                            }

                                                            ?>
                                                        </select></th>
                                                    <th><select id="name" name="name"  class="form-control">
                                                            <option value="All" >Contact Person (ALL)</option>
                                                            <?php
                                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM `add_contacts`");

                                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                                ?>

                                                                <option value="<?php if(isset($arraylea['id'])){echo $arraylea['id'];}?>"><?php if(isset($arraylea['name'])){echo $arraylea['name'];}?></option>
                                                                <?php
                                                            }

                                                            ?>
                                                        </select> </th>
                                                    <th><select id="fdate" name="fdate"  class="form-control">
                                                            <option value="All" >Followup date(All)</option>
                                                            <?php
                                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM `leads`");

                                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                                ?>

                                                                <option ><?php if(isset($arraylea['followdate'])){echo $arraylea['followdate'];}?></option>
                                                                <?php
                                                            }

                                                            ?>
                                                        </select></th>
                                                    <th><select id="product" name="product"  class="form-control">
                                                            <option value="All">Products(ALL)</option>
                                                            <?php
                                                            $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM `products`");

                                                            while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                                ?>

                                                                <option ><?php if(isset($arraylea['product'])){echo $arraylea['product'];}?></option>
                                                                <?php
                                                            }

                                                            ?>
                                                        </select></th>

                                                    <th><select id="status" name="status"  class="form-control">
                                                            <option value="All" style="color: gray">Status(All)</option>
                                                            <option>Pipeline</option>
                                                            <option>HotFunnel</option>
                                                            <option>OrderLost</option>
                                                            <option>Invoiced</option>
                                                            <option>Forecast</option>
                                                            <option>OrderClose</option>
                                                            <option>PostSale</option>
                                                        </select></th>
                                                    <th><form method="get" onsubmit="return false   ">

                                                            <img onclick="getsearch('leads')" src="assets/img/search.png" style="height: 30px;width: 40px">
                                                            <img onclick="getAllsearch('leads')" src="assets/img/images.png" style="height: 30px;width: 30px">

                                                        </form>
                                                    </th>
                                                </tr>

                                            </table>


                                            <div id="leads" >

                                                <table class="table table-striped custome" >
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

                                                    $qury="SELECT * FROM  `leads` WHERE  sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' ";
                                                    if(isset($_POST['viewnextdate'])){
                                                        $qury=$qury."AND followdate='".$_POST['nextvisitdate']."'";
                                                    }

                                                    if(isset($_POST['serch'])){

                                                        $searchquery =mysqli_query($con,"SELECT * FROM  `add_company`  WHERE mobile ='".$_POST['serch']."' ");
                                                        $searchAreray = mysqli_fetch_array($searchquery);
                                                        $searchkey =$searchAreray['id'];

                                                        if(empty( $searchkey)){
                                                            //echo  "<script>alert('success')</script>";

                                                            $searchquery =mysqli_query($con,"SELECT * FROM  `add_contacts`  WHERE mobile ='".$_POST['serch']."' ");
                                                            $searchAreray = mysqli_fetch_array($searchquery);
                                                            $searchkey =$searchAreray['id'];
                                                            $qury=$qury."AND 	contactperson='".$searchkey."'";
                                                        }else{
                                                            $qury=$qury."AND 	companyname='".$searchkey."'";
                                                        }



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
                                                            <td ><a style="color: red" href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['followdate'])){echo $arraylead['followdate'];}?></a></td>
                                                            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['expecteddate'])){echo $arraylead['expecteddate'];}?></a> </td>
                                                            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['product'])){echo $arraylead['product'];}?></a></td>
                                                            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['total'])){echo $arraylead['total'];}?></a></td>
                                                            <!--                                                    <td><button type="submit" name="view" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-success">View</button></td>-->
<!--                                                            <td><a href="employeeaddlead.php?edit=--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--"><img style="width: 20px;height: 20px;margin-left: 10px;margin-right: 10px"  src="assets/img/document.png"> </a></td>-->
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
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>

<script type="text/javascript">
    function getsearch(divid){

        var cname=document.getElementById('cname');
        var cnameUser = cname.options [cname.selectedIndex] .value;

        var name=document.getElementById('name');
        var nameUser = name.options [name.selectedIndex] .value;

        var fdate=document.getElementById('fdate');
        var fdateUser = fdate.options [fdate.selectedIndex] .value;

        var product=document.getElementById('product');
        var productUser = product.options [product.selectedIndex] .value;

        var status=document.getElementById('status');
        var statusUser = status.options [status.selectedIndex] .value;




        // var qno = document.getElementById('qno').value;
        // var unit=document.getElementById('unit').value;
        // var qty=document.getElementById('qty').value;


        // alert('ajaxaddproduct.php?qno='+qno+'&&name='+User+'&&unit='+unit+'&&qty='+qty);

        $.ajax({
            url: 'ajaxsearch.php?cname='+cnameUser+'&name='+nameUser+'&fdate='+fdateUser+'&product='+productUser+'&status='+statusUser, //call storeemdata.php to store form data
            success: function(html) {
                var ajaxDisplay = document.getElementById(divid);
                ajaxDisplay.innerHTML = html;
            }
        });


    }




    function getAllsearch(divid){

        $.ajax({
            url: 'ajaxsearch.php?cname=All&name=All&fdate=All&product=All&status=All', //call storeemdata.php to store form data
            success: function(html) {
                var ajaxDisplay = document.getElementById(divid);
                ajaxDisplay.innerHTML = html;
            }
        });


    }



</script>

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
