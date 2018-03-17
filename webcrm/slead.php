
<?php
include('menutwo.php');
include ('config.php');

//include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");
//$_POST['edit']="";
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

    $itemQuery=mysqli_query($con,"DELETE FROM `add_lead`  WHERE `id` ='".$_POST['delete']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if($itemQuery){
        echo "<script>alert('Successfully deleted')</script>";
        $nes="Employee deleted";
        $createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '".$_SESSION['sid']."', '".$nes."', '$createDate');");
    }
}


if(isset($_POST['addemp'])){
    header("Location:addbranchlead.php");
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
                url: 'ajaxdelete.php?deleteemp='+id, //call storeemdata.php to store form data
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
                    <h3  style="color: #066ECC ;" >Employee Management  <button name="addemp" class="btn btn-success">+ Add Employee</button></h3>

                    <div class="row">


                        <div class="col-md-12">
                            <!-- BUTTONS -->
                            <div class="panel">
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
                                                <th>Branch</th>
                                                <th>Action</th>
                                            </tr>



                                            <?php

                                            $SelectLeadQuery=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
$Sno=0;
                                            while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
                                                $Sno=$Sno+1;
                                                ?>
                                                <tr>
                                                    <td><?php if(isset($Sno)){echo $Sno;}?></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['name'])){echo $arraylead['name'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['designation'])){echo $arraylead['designation'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['mobileno'])){echo $arraylead['mobileno'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['email'])){echo $arraylead['email'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['username'])){echo $arraylead['username'];}?></a></td>
                                                    <td><a href="viewemployee.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['password'])){echo $arraylead['password'];}?></a></td>
                                                    <td><?php  $SelectLeadQueryOne=mysqli_query($con,"SELECT * FROM  `admin` WHERE  id='".$arraylead['aid']."' AND sid='".$_SESSION['sid']."' ");
                                                        $qarry=mysqli_fetch_array($SelectLeadQueryOne);
                                                        if(isset($qarry['name'])){echo $qarry['name'];}?></td>
<!--                                                    <td><button type="submit" name="view" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-success">View</button></td>-->
                                                    <td><a href="addbranchlead.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><img style="width: 20px;height: 20px;margin-left: 10px;margin-right: 10px"  src="assets/img/document.png"> </a> <img onclick="deleteEmp(<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>)" style="width: 20px;height: 20px;margin-left: 10px;margin-right: 10px"  src="assets/img/close.png"> </td>
<!--                                                    <td><button type="submit" name="delete" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-danger">Delete</button></td>-->
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
