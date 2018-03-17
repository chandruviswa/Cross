
<?php
//include('menutwo.php');
include ('config.php');

include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");
//$_POST['edit']="";

$a = "";
if(isset($_SESSION['username']))
{
    $a = $_SESSION['username'];
}

if(isset($_POST['addcustomer'])){

//INSERT INTO `fscrm_db`.`add_lead` (`id`, `username`, `password`, `name`, `designation`, `mobileno`, `email`, `imageid`, `empid`, `totalcustomer`, `create_date`) VALUES (NULL, 'kumar', 'kumar', 'kumar', 'sales', '5456425955256', 'asdsad', '1', '0', '0', '1212121');
    $itemQuery=mysqli_query($con,"INSERT INTO `add_lead` (`id`, `username`, `password`, `name`, `designation`, `mobileno`, `email`, `imageid`, `empid`, `totalcustomer`, `create_date`,`sid`,`aid`) VALUES (NULL, '".$_POST['uname']."','".$_POST['psd']."','".$_POST['name']."','".$_POST['designation']."', '".$_POST['mobile']."', '".$_POST['email']."', '0', '0', '0', '$curentDate','".$_SESSION['sid']."','".$_SESSION['aid']."')");
    if($itemQuery){
        $nes="New Employee added";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['sid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully inserted')</script>";
    }
}




if(isset($_POST['editcustomer'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;



    $itemQuery=mysqli_query($con,"UPDATE  `add_lead` SET `name`='".$_POST['name']."',`username`='".$_POST['uname']."',`password`='".$_POST['psd']."', `email`='".$_POST['email']."', `mobileno`='".$_POST['mobile']."', `designation`='".$_POST['designation']."'  WHERE  `id` ='".$_POST['id']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if($itemQuery){
        $nes=$_POST['name'].''."Employee updated";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['sid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully updated')</script>";
    }
}

if(isset($_POST['delete'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;

    $itemQuery=mysqli_query($con,"DELETE FROM `quotation`  WHERE `qno` ='".$_POST['delete']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if($itemQuery){
        echo "<script>alert('Successfully deleted')</script>";
        //$nes="Employee deleted";
        //$createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"DELETE FROM `quotation_details`  WHERE `qno` ='".$_POST['delete']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    }
}


if(isset($_POST['addemp'])){
    header("Location:addtask.php");
}
if(isset($_POST['edit'])){
    $sales_id=$_POST['edit'];
    header("Location:addbranchlead.php?edit=".$sales_id."");
}

if(isset($_POST['view'])){
    $sales_id=$_POST['view'];
    header("Location:viewemployee.php?edit=".$sales_id."");
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Employees | Falcon Square</title>
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
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script type="text/javascript">

        function deleteEmp(id){
            $.ajax({
                url: 'ajaxdelete.php?deleteTarget='+id, //call storeemdata.php to store form data
                success: function(html) {
                    alert("successfully deleted");
                    window.location.reload();
                }
            });
        }
    </script>

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
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

        tr:nth-child(even){background-color: #f2f2f2}

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
</head>

<body>
<form method="post">

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
    <!-- WRAPPER -->
    <div id="">
        <!-- MAIN -->
        <div style="margin-top: 6%" class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3  style="color: #066ECC ;">Task Details

                    <div class="row">


                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>EMPLOYEE</th>
                                                <th>TASK</th>
                                                <th>START DATE</th>
                                                <th>END DATE</th>
                                                <th>UPDATED DATE</th>
                                                <th>STATUS</th>
                                            </tr>



                                            <?php

                                            $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `taskmanage` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND eid='".$_SESSION['eid']."'");
                                            $Sno=0;
                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                            $Sno=$Sno+1;

                                            $newsQuery=mysqli_query($con,"UPDATE  `taskmanage` SET `see`='1' WHERE  `id` ='".$arraylead['id']."'");
                                            ?>
                                            <tr>
                                                <td><a href="addtask.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($Sno)){echo $Sno;}?></a></td>
                                                <td><?php
                                                    if(isset($arraylead['eid'])){
                                                        $seEmp=mysqli_query($con,"SELECT * FROM  add_lead  WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND id='".$arraylead['eid']."'");
                                                        $emparry=mysqli_fetch_array($seEmp);
                                                        echo $emparry['name'];
                                                    }?></td>
                                                <td><?php if(isset($arraylead['task'])){echo $arraylead['task'];}?></td>
                                                <td><?php if(isset($arraylead['st_date'])){echo $arraylead['st_date'];}?></td>
                                                <td><?php if(isset($arraylead['ed_date'])){echo $arraylead['ed_date'];}?></td>
                                                <td><?php if(isset($arraylead['updated_date'])){echo $arraylead['updated_date'];}?></td>
                                                <td><?php if(isset($arraylead['status'])){echo $arraylead['status'];}?></a></td>
                                                <?php

                                                }
                                                ?>
                                        </table>
                                    </div>
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
<script src="assets/scripts/klorofil-common.js"></script>

</body>

</html>
