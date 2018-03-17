<?php
include('menutwo.php');

include ('config.php');
//include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");
//$_POST['edit']="";
if(isset($_POST['addcustomer'])){


    $itemQuery=mysqli_query($con,"INSERT INTO `add_customer` (`id`, `name`, `email`, `mobile`, `address`, `status`, `eid`, `create_date`, `product`, `date`,`sid`,`aid`) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', '".$_POST['mobile']."', '".$_POST['address']."', '".$_POST['status']."', '".$_POST['eid']."', '$curentDate', '".$_POST['product']."','".$_POST['date']."','".$_SESSION['sid']."','".$_SESSION['aid']."')");
    if($itemQuery){
        $nes="New customer added";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully inserted')</script>";
    }
}


if(isset($_POST['editcustomer'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;



    $itemQuery=mysqli_query($con,"UPDATE  `add_customer` SET `name`='".$_POST['name']."', `email`='".$_POST['email']."', `mobile`='".$_POST['mobile']."', `address`='".$_POST['address']."', `status`='".$_POST['status']."', `product`= '".$_POST['product']."',`eid`='".$_POST['eid']."', `date`='".$_POST['date']."'  WHERE  `id` ='".$_POST['id']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if($itemQuery){
        $nes=$_POST['name'].''."customer updated";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully updated')</script>";
    }
}

if(isset($_POST['delete'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;

    $itemQuery=mysqli_query($con,"DELETE FROM `add_customer`  WHERE `id` ='".$_POST['delete']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if($itemQuery){
        echo "<script>alert('Successfully deleted')</script>";
        $nes="customer deleted";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
    }
}

if(isset($_POST['addemp'])){
    header("Location:addbranchcustomer.php");
}
if(isset($_POST['edit'])){
    $sales_id=$_POST['edit'];
    header("Location:addbranchcustomer.php?edit=".$sales_id."");
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
        }

        th, td {
            text-align: left;
            padding: 8px;
        }
        .testx tbody {
            display:block;
            height:350px;
            overflow:auto;
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
                    <h3  style="color: #066ECC ;" class="page-title">Customer Management   <button name="addemp" class="btn btn-success">Add Customer</button></h3>
                    <div class="row">


                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <!--                                    <h3 class="panel-title">Customer</h3>-->
                                    <input name="nextvisitdate" type="date">
                                    <button type="submit" name="viewnextdate"  >View</button>
                                    <button type="submit"   >Cancel</button>
                                </div>

                                <div class="panel-body testx">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Product</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Employee</th>
                                                <th>NextVisits</th>
                                                <th>View</th>
                                                                                                <th>Edit</th>
                                                                                                <th>Delete</th>
                                            </tr>



                                            <?php


                                            $qury="SELECT * FROM  `add_customer` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'";
                                            if(isset($_POST['viewnextdate'])){
                                                $qury=$qury."AND date='".$_POST['nextvisitdate']."'";
                                            }
                                            $SelectLeadQuery=mysqli_query($con,$qury);
                                            $sno=0;
                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                                $sno=$sno+1;;
                                                ?>
                                                <tr>
                                                    <td><?php if(isset($sno)){echo $sno;}?></td>
                                                    <td><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></td>
                                                    <td><?php if(isset($arraylead['product'])){echo $arraylead['product'];}?></td>
                                                    <td><?php if(isset($arraylead['mobile'])){echo $arraylead['mobile'];}?></td>
                                                    <td><?php if(isset($arraylead['email'])){echo $arraylead['email'];}?></td>
                                                    <td><?php if(isset($arraylead['address'])){echo $arraylead['address'];}?></td>
                                                    <td><?php if(isset($arraylead['status'])){echo $arraylead['status'];}?></td>

                                                    <td><?php  $SelectLeadQueryOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE  id='".$arraylead['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
                                                        $qarry=mysqli_fetch_array($SelectLeadQueryOne);
                                                        if(isset($qarry['name'])){echo $qarry['name'];}?></td>
                                                    <td style="width: 50px"><?php if(isset($arraylead['date'])){echo $arraylead['date'];}?></td>
                                                    <td><button style="width: 10px" type="submit" name="view" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" style="width: 10px" class="btn btn-success">V</button></td>
                                                                                                        <td><button id="edit" name="edit" style="width: 10px" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-info">E</button> </td>
                                                                                                        <td><button  name="delete" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-danger">D</button></td>
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

                        <div class="col-md-12">

                            <div class="panel">
                                <div class="panel-heading">
                                    <h3  style="color: #066ECC ;" class="panel-title">List of Visits</h3>
                                </div>
                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>No</th>
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


                                                $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `visits` WHERE  custom_id='$eid' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
$snoss=0;
                                                while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                                    $snoss=$snoss+1;
                                                    ?>
                                                    <tr>
                                                        <td><?php if(isset($snoss)){echo $snoss;}?></td>
                                                        <td><?php if(isset($arraylead['vist_type'])){echo $arraylead['vist_type'];}?></td>

                                                        <td><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></td>
                                                        <td><?php if(isset($arraylead['location'])){echo $arraylead['location'];}?></td>
                                                        <td><?php if(isset($arraylead['requirement'])){echo $arraylead['requirement'];}?></td>
                                                        <td><?php if(isset($arraylead['status'])){echo $arraylead['status'];}?></td>
                                                        <td><?php if(isset($arraylead['notes'])){echo $arraylead['notes'];}?></td>
                                                        <td><?php if(isset($arraylead['visit_time'])){echo $arraylead['visit_time'];}?></td>

                                                        <td><?php  $SelectLeadQueryOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE  id='".$arraylead['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
                                                            $qarry=mysqli_fetch_array($SelectLeadQueryOne);
                                                            if(isset($qarry['name'])){echo $qarry['name'];}?></td>
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






<!--                        <div  class="col-md-6">-->
<!--                            <!-- INPUTS -->
<!--                            <div class="panel">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h3  style="color: #066ECC ;" class="panel-title">ADD Customer</h3>-->
<!--                                </div>-->
<!---->
<!--                                --><?php
//                                if(isset($_POST['edit'])){
//                                    $getcustomerquerOne=mysqli_query($con,"SELECT * FROM `add_customer` WHERE id='".$_POST['edit']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
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
<!--                                    <input type="date" value="--><?php //if(isset($dateFire)){echo $dateFire; }?><!--"  name="date" class="form-control" placeholder="Next visit">-->
<!--                                    <br>-->
<!--                                    <select name="status" value="--><?php //if(isset($statusFire)){echo $statusFire; }?><!--" class="form-control">-->
<!--                                        <option value="Possitive">Possitive</option>-->
<!--                                        <option value="Negative">Negative</option>-->
<!--                                        <option value="Confirmed">Confirmed</option>-->
<!--                                        <option value="Installed">Installed</option>-->
<!--                                    </select>-->
<!--                                    <br>-->
<!---->
<!--                                    <select name="eid"  class="form-control">-->
<!--                                        --><?php
//                                        $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
//
//                                        while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {
//
//                                            ?>
<!---->
<!--                                            <option value="--><?php //if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--<">--><?php //if(isset($arrayleads['name'])){echo $arrayleads['name'];}?><!--</option>-->
<!--                                            --><?php
//                                        }
//
//                                        ?>
<!--                                    </select>-->
<!--                                    <br>-->
<!---->
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
