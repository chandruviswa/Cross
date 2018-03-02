
<?php
include('menu.php');
include ('config.php');

//include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");
//$_POST['edit']="";
if(isset($_POST['addcustomer'])){
   // echo "INSERT INTO `admin` (`id`, `usename`, `password`, `email`, `mobile`, `create_date`, `sid`, `name`) VALUES (NULL, '".$_POST['uname']."','".$_POST['psd']."','".$_POST['email']."', '".$_POST['mobile']."', '$curentDate', '".$_SESSION['sid']."','".$_POST['name']."')";
//INSERT INTO `fscrm_db`.`admin` (`id`, `usename`, `password`, `email`, `mobile`, `create_date`, `sid`, `name`) VALUES (NULL, 'viswa', '123', 'chandru@gmail.com', '123123123', '121212', '1', 'chan');
//INSERT INTO `fscrm_db`.`add_lead` (`id`, `usename`, `password`, `email`, `mobile`, `create_date`, `sid`, `name`) VALUES (NULL, 'kumar', 'kumar', 'kumar', 'sales', '5456425955256', 'asdsad', '1', '0', '0', '1212121');
    $itemQuery=mysqli_query($con,"INSERT INTO `admin` (`id`, `username`, `password`, `email`, `mobile`, `create_date`, `sid`, `name`) VALUES (NULL, '".$_POST['uname']."','".$_POST['psd']."','".$_POST['email']."', '".$_POST['mobile']."', '$curentDate', '".$_SESSION['sid']."','".$_POST['name']."')");
    if($itemQuery){
      //  $nes="New Employee added";
        //$createDate=date("Y-m-d : H:i:s");
        //$newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully inserted')</script>";
    }
}


if(isset($_POST['editcustomer'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;



    $itemQuery=mysqli_query($con,"UPDATE  `admin` SET `name`='".$_POST['name']."',`username`='".$_POST['uname']."',`password`='".$_POST['psd']."', `email`='".$_POST['email']."', `mobile`='".$_POST['mobile']."'  WHERE  `id` ='".$_POST['id']."' AND `sid` ='".$_SESSION['sid']."' ");
    if($itemQuery){
        //$nes=$_POST['name'].''."Employee updated";
       // $createDate=date("Y-m-d : H:i:s");
        //$newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
        echo "<script>alert('Successfully updated')</script>";
    }
}

if(isset($_POST['delete'])){
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;

    $itemQuery=mysqli_query($con,"DELETE FROM `admin`  WHERE `id` ='".$_POST['delete']."'");
    if($itemQuery){
        echo "<script>alert('Successfully deleted')</script>";
       // $nes="Employee deleted";
        //$createDate=date("Y-m-d : H:i:s");
        //$newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['eid']."', '".$nes."', '$createDate');");
    }
}

if(isset($_POST['addsvi'])){
    header("Location:addbranch.php");
}
if(isset($_POST['edit'])){
    $sales_id=$_POST['edit'];
    header("Location:addbranch.php?edit=".$sales_id."");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Branch Admin | Falcon Square</title>
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
                    <h3 style="color: #066ECC ;" class="page-title">Branch Admin Management  <button name="addsvi" class="btn btn-success">Add Branch</button></h3>
                    <div class="row">



                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 style="color: #066ECC ;" class="panel-title">Branch admin</h3>
                                </div>

                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Passsword</th>
                                                <th>Action</th>
                                            </tr>



                                            <?php

                                            $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `admin` WHERE sid='".$_SESSION['sid']."'");
$Sno=0;
                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                                $Sno=$Sno+1;
                                                ?>
                                                <tr>
                                                    <td><?php if(isset($Sno)){echo $Sno;}?></td>
                                                    <td><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></td>
                                                    <td><?php if(isset($arraylead['mobile'])){echo $arraylead['mobile'];}?></td>
                                                    <td><?php if(isset($arraylead['email'])){echo $arraylead['email'];}?></td>
                                                    <td><?php if(isset($arraylead['username'])){echo $arraylead['username'];}?></td>
                                                    <td><?php if(isset($arraylead['password'])){echo $arraylead['password'];}?></td>
                                                    <td><button type="submit" name="view" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-success">View</button> <button type="submit" name="edit" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-info">Edit</button>
                                                        <button type="submit" name="delete" value="<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>" class="btn btn-danger">Delete</button></td>
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



                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 style="color: #066ECC ;"class="panel-title">List of Employee</h3>
                                </div>
                                <div class="panel-body">
                                    <div style="overflow-x:auto;">
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Passsword</th>
<!--                                                <th>Action</th>-->
                                            </tr>



                                            <?php

                                            if(isset($_POST['view'])){



                                            $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE sid='".$_SESSION['sid']."' AND aid='".$_POST['view']."' ");
$snoss=0;
                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                                $snoss=$snoss+1;
                                                ?>
                                                <tr>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($snoss)){echo $snoss;}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['designation'])){echo $arraylead['designation'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['mobileno'])){echo $arraylead['mobileno'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['email'])){echo $arraylead['email'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['username'])){echo $arraylead['username'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['password'])){echo $arraylead['password'];}?></a></td>
<!--                                                    <td><button type="submit" name="viewCustome" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-success">View</button>-->
<!--                                                        </td>-->
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


<!--                        <div class="col-md-6">-->
<!--                            <!-- INPUTS -->
<!--                            <div class="panel">-->
<!--                                <div class="panel-heading">-->
<!--                                    <h3 style="color: #066ECC ;"class="panel-title">ADD BRANCH admin</h3>-->
<!--                                </div>-->
<!---->
<!--                                --><?php
//                                if(isset($_POST['edit'])){
//                                    $getcustomerquerOne=mysqli_query($con,"SELECT * FROM `admin` WHERE id='".$_POST['edit']."'");
//                                    $arrayOne=mysqli_fetch_array($getcustomerquerOne);
//                                    $nameFire=$arrayOne['name'];
//                                    $unameFire=$arrayOne['username'];
//                                    $productFire=$arrayOne['password'];
//                                    $emailFire=$arrayOne['email'];
//                                    $mobileFire=$arrayOne['mobile'];
//                                    //$addressFire=$arrayOne['designation'];
//
//                                }
//
//
//
//
//                                ?>
<!--                                <div class="panel-body">-->
<!--                                    <input type="hidden" name="id" value="--><?php //if(isset($_POST['edit'])){echo $_POST['edit']; }?><!--" class="form-control" placeholder="Name">-->
<!--                                    <input value="--><?php //if(isset($nameFire)){echo $nameFire; }?><!--" type="text" name="name" class="form-control" placeholder="Name">-->
<!--                                    <br>-->
<!--                                    <input value="--><?php //if(isset($unameFire)){echo $unameFire; }?><!--" type="text" name="uname" class="form-control" placeholder="Username">-->
<!--                                    <br>-->
<!--                                    <input value="--><?php //if(isset($productFire)){echo $productFire; }?><!--" type="text"name="psd" class="form-control" placeholder="password">-->
<!--                                    <br>-->
<!--                                    <input name="email" value="--><?php //if(isset($emailFire)){echo $emailFire; }?><!--" type="email" class="form-control" placeholder="Email">-->
<!--                                    <br>-->
<!--                                    <input name="mobile" value="--><?php //if(isset($mobileFire)){echo $mobileFire; }?><!--" type="number" class="form-control" placeholder="Mobile number">-->
<!--                                    <br>-->
<!--                                    <!--                                <button style="text-align: center" type="submit" name="addlead" class="btn-success btn">ADD</button>-->
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
<!---->
<!--                                        --><?php
//                                    }
//                                    ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!--                         END INPUTS -->
<!---->
<!--                        </div>-->
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
