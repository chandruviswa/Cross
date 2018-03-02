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
//$_POST['edit']="";
if(isset($_POST['addcustomer'])){

    //INSERT INTO `fscrm_db`.`news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '1', 'new customer added Added', '1212112');


    //$var=$_POST['email'];
    //echo "<script>alert('sssss')</script>";
    //echo "<script>spge = '<?php echo $var ;?;

// then
//alert(spge);</script>";

//    $test="INSERT INTO `add_customer` (`id`, `name`, `email`, `mobile`, `address`, `status`, `eid`, `create_date`, `product`) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', '".$_POST['mobile']."', '".$_POST['address']."', '".$_POST['status']."', '".$_SESSION['eid']."', '121212', '".$_POST['product']."')";
//
//    echo "<script>spge = '<?php echo $test ;?;
//
// then
//alert(spge);</script>";
//    echo $test;
//
    $itemQuery=mysqli_query($con,"INSERT INTO `add_customer` (`id`, `name`, `email`, `mobile`, `address`, `status`, `eid`, `create_date`, `product`, `date`, `sid`, `aid`) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', '".$_POST['mobile']."', '".$_POST['address']."', '".$_POST['status']."', '".$_SESSION['eid']."', '$curentDate', '".$_POST['product']."', '".$_POST['date']."',".$_SESSION['sid'].",".$_SESSION['aid'].")");
    if($itemQuery){
        $nes="New customer added";
            $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully inserted')</script>";
    }
}


if(isset($_POST['editcustomer'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;



    $itemQuery=mysqli_query($con,"UPDATE  `add_customer` SET `name`='".$_POST['name']."', `email`='".$_POST['email']."', `mobile`='".$_POST['mobile']."', `address`='".$_POST['address']."', `status`='".$_POST['status']."', `product`= '".$_POST['product']."', `date`='".$_POST['date']."'  WHERE  `id` ='".$_POST['id']."'");
    if($itemQuery){
        $nes=$_POST['name'].''."customer updated";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully updated')</script>";
    }
}

if(isset($_POST['delete'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;

    $itemQuery=mysqli_query($con,"DELETE FROM `add_customer`  WHERE `id` ='".$_POST['delete']."'");
    if($itemQuery){
        echo "<script>alert('Successfully deleted')</script>";
        $nes="customer deleted";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
    }
}



if(isset($_POST['addvisit'])){
    $getcustomerquer=mysqli_query($con,"SELECT * FROM `add_customer` WHERE id='".$_POST['customerer']."'");
    $array=mysqli_fetch_array($getcustomerquer);
    $cousname=$array['name'];

    $itemQuery=mysqli_query($con,"INSERT INTO  `visits` (`id`, `vist_type`, `name`, `location`, `requirement`, `status`, `notes`, `eid`, `visit_time`, `custom_id`, `next_visit`,`sid`,`aid`) VALUES (NULL, '".$_POST['type']."', '$cousname', '".$_POST['location']."', '".$_POST['requirement']."', '".$_POST['vstatus']."', '".$_POST['notes']."', '".$_SESSION['eid']."', '$curentDate', '".$_POST['customerer']."', '".$_POST['nextvisits']."','".$_SESSION['sid']."','".$_SESSION['aid']."')");
    if($itemQuery){

        $newsQuery=mysqli_query($con,"UPDATE  `add_customer` SET `status`='".$_POST['vstatus']."',`date`='".$_POST['nextvisits']."'  WHERE  `id` ='".$_POST['customerer']."' AND sid='".$_SESSION['sid']."'AND aid='".$_SESSION['aid']."'");
        echo "<script>alert('Successfully inserted')</script>";
    }
}

if(isset($_POST['addsca'])){
    header("Location:addcustomer.php");
}
if(isset($_POST['addsvi'])){
    header("Location:addvisit.php");
}
if(isset($_POST['edit'])){
    $sales_id=$_POST['edit'];
    header("Location:addcustomer.php?edit=".$sales_id."");
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
            border: 1px solid #E7E3E3  ;
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
    <script>
        function check_empty() {
            if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
                alert("Fill All Fields !");
            } else {
                document.getElementById('form').submit();
                alert("Form Submitted Successfully...");
            }
        }
        //Function To Display Popup
        function div_show() {
            document.getElementById('abc').style.display = "block";
        }
        //Function to Hide Popup
        function div_hide(){
            document.getElementById('abc').style.display = "none";
        }
    </script>
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
<!--                    <button type="button" data-toggle="collapsed" data-target="#sidebar-nav" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>-->
                </div>

                <div style="  float: left;padding: 20px 0;margin-left: 10%" class="">
                   <input>
                    <button name="addsca" class="btn btn-success">Search</button>
                    <!--                    <button type="button" data-toggle="collapsed" data-target="#sidebar-nav" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>-->
                </div>
                <!--                        <div class="navbar-btn navbar-btn-right">-->
                <!--                            <a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>-->
                <!--                        </div>-->
                <div id="navbar-menu" class="toggled">
                    <ul class="nav navbar-nav navbar-right">
                        <!--                    <li class="dropdown">-->
                        <!--                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">-->
                        <!--                            <i class="lnr lnr-alarm"></i>-->
                        <!--                            <span class="badge bg-danger">0</span>-->
                        <!--                        </a>-->
                        <!--                        <ul class="dropdown-menu notifications">-->
                        <!--                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>-->
                        <!--                            <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>-->
                        <!--                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>-->
                        <!--                            <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>-->
                        <!--                            <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>-->
                        <!--                            <li><a href="#" class="more">See all notifications</a></li>-->
                        <!--                        </ul>-->
                        <!--                    </li>-->
                        <!--                    <li class="dropdown">-->
                        <!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>-->
                        <!--                        <ul class="dropdown-menu">-->
                        <!--                            <li><a href="#">Basic Use</a></li>-->
                        <!--                            <li><a href="#">Working With Data</a></li>-->
                        <!--                            <li><a href="#">Security</a></li>-->
                        <!--                            <li><a href="#">Troubleshooting</a></li>-->
                        <!--                        </ul>-->
                        <!--                    </li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo  $a;?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <!--                            <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>-->
                                <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 style="color: #066ECC ;" class="page-title">Customer Management  <button name="addsca" class="btn btn-success"> ADD Customer</button>    <button name="addsvi" class="btn btn-success"> ADD Visits</button> </h3>


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
                                                    <td><?php if(isset($sno)){echo $sno;}?></td>
                                                    <td><?php if(isset($arraylead['companyname'])){echo $arraylead['companyname'];}?></td>
                                                    <td><?php if(isset($arraylead['contactperson'])){echo $arraylead['contactperson'];}?></td>
                                                    <td><?php if(isset($arraylead['eid'])){echo $arraylead['eid'];}?></td>
                                                    <td><?php if(isset($arraylead['aid'])){echo $arraylead['aid'];}?></td>
                                                    <td><?php if(isset($arraylead['updatedate'])){echo $arraylead['updatedate'];}?></td>
                                                    <td><?php if(isset($arraylead['status'])){echo $arraylead['status'];}?></td>
                                                    <td><?php if(isset($arraylead['followdate'])){echo $arraylead['followdate'];}?></td>
                                                    <td><?php if(isset($arraylead['expecteddate'])){echo $arraylead['expecteddate'];}?></td>
                                                    <td><?php if(isset($arraylead['product'])){echo $arraylead['product'];}?></td>
                                                    <td><?php if(isset($arraylead['total'])){echo $arraylead['total'];}?></td>
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

<!--                        <div class="col-md-12">-->
<!---->
<!--                            <div class="panel">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h3 style="color: #066ECC  ;" class="panel-title">List of Visits</h3>-->
<!--                                </div>-->
<!--                                <div class="panel-body">-->
<!--                                    <div style="overflow-x:auto;">-->
<!--                                        <table>-->
<!--                                            <tr>-->
<!--                                                <th>No</th>-->
<!--                                                <th>Visit type</th>-->
<!---->
<!--                                                <th>name</th>-->
<!--                                                <th>Location</th>-->
<!--                                                <th>Requirement</th>-->
<!--                                                <th>Status</th>-->
<!--                                                <th>Notes</th>-->
<!--                                                <th>Visit time</th>-->
<!--                                                <th>Employee</th>-->
<!--                                                <th>Next visit</th>-->
<!---->
<!--                                            </tr>-->
<!---->
<!---->
<!---->
<!--                                            --><?php
//
//                                            if(isset($_POST['view'])){
//
//                                                $eid=$_POST['view'];
//
//
//                                                $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `visits` WHERE  custom_id='$eid'");
//                                                $snos=0;
//                                                while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
//                                                    $snos=$snos+1;
//                                                    ?>
<!--                                                    <tr>-->
<!--                                                        <td>--><?php //if(isset($snos)){echo $snos;}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['vist_type'])){echo $arraylead['vist_type'];}?><!--</td>-->
<!---->
<!--                                                        <td>--><?php //if(isset($arraylead['name'])){echo $arraylead['name'];}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['location'])){echo $arraylead['location'];}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['requirement'])){echo $arraylead['requirement'];}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['status'])){echo $arraylead['status'];}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['notes'])){echo $arraylead['notes'];}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['visit_time'])){echo $arraylead['visit_time'];}?><!--</td>-->
<!---->
<!--                                                        <td>--><?php // $SelectLeadQueryOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE  id='".$arraylead['eid']."'");
//                                                            $qarry=mysqli_fetch_array($SelectLeadQueryOne);
//                                                            if(isset($qarry['name'])){echo $qarry['name'];}?><!--</td>-->
<!--                                                        <td>--><?php //if(isset($arraylead['next_visit'])){echo $arraylead['next_visit'];}?><!--</td>-->
<!--                                                    </tr>-->
<!--                                                    <!--                                <input style="width: 100%;margin: 2px" type="submit" name="lead" value="--><?php ////if(isset($arraylead['name'])){echo $arraylead['name'];}?><!--<!--">-->
<!--                                                    --><?php
//
//                                                }
//
//                                            }
//                                            ?>
<!--                                        </table>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!-- END PROGRESS BARS -->
<!--                        </div>-->






<!--                        <div  class="col-md-6">-->
<!--                            <!-- INPUTS -->
<!--                            <div class="panel">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h3 style="color:  #066ECC    ;" class="panel-title">ADD Customer</h3>-->
<!--                                </div>-->
<!---->
<!--                                --><?php
//                                if(isset($_POST['edit'])){
//                                    $getcustomerquerOne=mysqli_query($con,"SELECT * FROM `add_customer` WHERE id='".$_POST['edit']."'");
//                                    $arrayOne=mysqli_fetch_array($getcustomerquerOne);
//                                    $nameFire=$arrayOne['name'];
//                                    $productFire=$arrayOne['product'];
//                                    $emailFire=$arrayOne['email'];
//                                    $mobileFire=$arrayOne['mobile'];
//                                    $addressFire=$arrayOne['address'];
//                                    $statusFire=$arrayOne['status'];
//                                    $dateFire=$arrayOne['date'];
//                                }
//
//
//
//
//                                ?>
<!--                                <div class="panel-body">-->
<!--                                    <input type="hidden" name="id" value="--><?php //if(isset($_POST['edit'])){echo $_POST['edit']; }?><!--" class="form-control" placeholder="Name">-->
<!--                                    <input type="text" name="name" value="--><?php //if(isset($nameFire)){echo $nameFire; }?><!--" class="form-control" placeholder="Name">-->
<!--                                    <br>-->
<!--                                    <select name="product" value="--><?php //if(isset($productFire)){echo $productFire; }?><!--" class="form-control">-->
<!--                                        --><?php
//                                        $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM `products`");
//
//                                        while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {
//
//                                            ?>
<!---->
<!--                                            <option value="--><?php //if(isset($arraylea['product'])){echo $arraylea['product'];}?><!--">--><?php //if(isset($arraylea['product'])){echo $arraylea['product'];}?><!--</option>-->
<!--                                            --><?php
//                                        }
//
//                                        ?>
<!--                                    </select>-->
<!--                                    <br>-->
<!--                                    <input type="email" value="--><?php //if(isset($emailFire)){echo $emailFire; }?><!--" name="email" class="form-control" placeholder="Email">-->
<!--                                    <br>-->
<!--                                    <input type="number" value="--><?php //if(isset($mobileFire)){echo $mobileFire; }?><!--" name="mobile" class="form-control" placeholder="Mobile number">-->
<!--                                    <br>-->
<!--                                    <input type="text" value="--><?php //if(isset($addressFire)){echo $addressFire; }?><!--" name="address" class="form-control" placeholder="Address">-->
<!--                                    <br>-->
<!--                                    <select name="status" value="--><?php //if(isset($statusFire)){echo $statusFire; }?><!--" class="form-control">-->
<!--                                        <option value="Possitive">Possitive</option>-->
<!--                                        <option value="Negative">Negative</option>-->
<!--                                        <option value="Confirmed">Confirmed</option>-->
<!--                                        <option value="Installed">Installed</option>-->
<!--                                    </select>-->
<!--                                    <br>-->
<!---->
<!--                                    <select name=""  class="form-control">-->
<!--                                        --><?php
//                                        $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE id='".$_SESSION['eid']."' ");
//
//                                        while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {
//
//                                            ?>
<!---->
<!--                                            <option value="Marketing department">--><?php //if(isset($arrayleads['name'])){echo $arrayleads['name'];}?><!--</option>-->
<!--                                            --><?php
//                                        }
//
//                                        ?>
<!--                                    </select>-->
<!--                                    <br>-->
<!--                                    <input type="date" value="--><?php //if(isset($dateFire)){echo $dateFire; }?><!--" name="date" class="form-control" placeholder="date">-->
<!--                                    <br>-->
<!---->
<!--                                    --><?php
//                                    if(isset($_POST['edit'])){
//                                        ?>
<!--                                        <button style="text-align: center" type="submit"  name="editcustomer" class="btn-success btn">Update</button>-->
<!--                                        <button style="text-align: center" type="submit"  class="btn-success btn">Cancel</button>-->
<!--                                        --><?php
//                                    }else{
//                                        ?>
<!--                                        <button style="text-align: center" type="submit" name="addcustomer" class="btn-success btn">ADD</button>-->
<!--                                        --><?php
//                                    }
//                                    ?>
<!---->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!--                         END INPUTS -->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-6">-->
<!--                            <!-- INPUTS -->
<!--                            <div class="panel">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h3 style="color: #066ECC      ;" class="panel-title">ADD Visits</h3>-->
<!--                                </div>-->
<!--                                <div class="panel-body">-->
<!--                                    <select name="type" class="form-control">-->
<!--                                        <option value="Direct Customer Location">Direct Customer Location</option>-->
<!--                                        <option value="BY Call">BY Call</option>-->
<!--                                        <option value="By Mail">By Mail</option>-->
<!--                                    </select>-->
<!--                                    <br>-->
<!--                                    <input type="text" name="location" class="form-control" placeholder="Location">-->
<!--                                    <br>-->
<!--                                    <input type="text" name="requirement" class="form-control" placeholder="Requirement">-->
<!--                                    <br>-->
<!--                                    <input type="text" name="notes" class="form-control" placeholder="Notes">-->
<!--                                    <br>-->
<!--                                    <input type="date" name="nextvisits" class="form-control" placeholder="Next visit">-->
<!--                                    <br>-->
<!--                                    <select name="vstatus" class="form-control">-->
<!--                                        <option value="Possitive">Positive</option>-->
<!--                                        <option value="Negative">Negative</option>-->
<!--                                        <option value="Confirmed">Confirmed</option>-->
<!--                                        <option value="Installed">Installed</option>-->
<!--                                    </select>-->
<!--                                    <br>-->
<!---->
<!---->
<!--                                    <select name="customerer" class="form-control">-->
<!--                                        --><?php
//                                        $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_customer` WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
//
//                                        while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {
//
//                                            ?>
<!---->
<!--                                            <option value="--><?php //if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--">--><?php //if(isset($arrayleads['name'])){echo $arrayleads['name'];}?><!--</option>-->
<!--<!--                                            <option hidden value="--><?php ////if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--<!--">--><?php ////if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--<!--</option>-->
<!--                                            --><?php
//                                        }
//
//                                        ?>
<!--                                    </select>-->
<!--                                    <br>-->
<!---->
<!--                                    <button style="text-align: center" type="submit" name="addvisit" class="btn-success btn">ADD</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!--                         END INPUTS -->
<!---->
<!--                        </div>-->









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

</body>

</html>
