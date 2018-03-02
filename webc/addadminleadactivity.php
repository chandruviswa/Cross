<?php
include('menu.php');

include('config.php');
//include('session.php');
$curentDate = date("Y-m-d");
$currentTime = date("H:i:s");
//$_POST['edit']="";
if (isset($_GET['edit'])) {
    $_POST['edit'] = $_GET['edit'];
}
if (isset($_POST['addcustomer'])) {

//INSERT INTO `fscrm_db`.`leads` (`id`, `companyname`, `contactperson`, `contactnumber`, `priority`, `eid`, `aid`, `Activitytype`, `source`, `status`, `activity`, `followdate`, `time`, `expecteddate`, `product`, `qty`, `unit`, `total`, `comment`) VALUES (NULL, 'argitech pvt ltd', 'arun', '7506277735', 'high', '77', '1', 'call', 'Google search', 'positive', 'install', '121212', '121212', '121212', 'Android app', '2', '5000', '10000', 'comments');
    $itemQuery = mysqli_query($con, "INSERT INTO `leads` (`id`, `companyname`, `contactperson`, `contactnumber`, `priority`, `eid`, `aid`, `updatedate`, `source`, `status`, `activity`, `followdate`, `time`, `expecteddate`, `product`, `qty`, `unit`, `total`, `comment`) VALUES (NULL, '" . $_POST['companyid'] . "', '" . $_POST['contactid'] . "', '', " . $_POST['options'] . "', '".$_POST['eid']."', '" . $_POST['branchid'] . "', '$curentDate','" . $_POST['stype'] . "','" . $_POST['status'] . "','','" . $_POST['fdate'] . "','" . $_POST['time'] . "'
    ,'" . $_POST['edate'] . "','" . $_POST['product'] . "','" . $_POST['qty'] . "','" . $_POST['unit'] . "','" . $_POST['total'] . "','" . $_POST['comment'] . "')");
    if ($itemQuery) {
        echo "<script>alert('Successfully inserted')</script>";
        header("Location:customer.php");
    }
}


if (isset($_POST['editcustomer'])) {
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;


    $itemQuery = mysqli_query($con, "UPDATE  `add_customer` SET `name`='" . $_POST['name'] . "', `email`='" . $_POST['email'] . "', `mobile`='" . $_POST['mobile'] . "', `address`='" . $_POST['address'] . "', `status`='" . $_POST['status'] . "', `product`= '" . $_POST['product'] . "',`eid`='" . $_POST['eid'] . "', `date`='" . $_POST['date'] . "'  WHERE  `id` ='" . $_POST['id'] . "'");
    if ($itemQuery) {
        $nes = $_POST['name'] . '' . "customer updated";
        $createDate = date("Y-m-d : H:i:s");
        $newsQuery = mysqli_query($con, "INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '" . $_SESSION['eid'] . "', '" . $nes . "', '$createDate');");
        echo "<script>alert('Successfully updated')</script>";
        header("Location:customer.php");
    }
}

if (isset($_POST['delete'])) {
    //UPDATE  `add_customer` SET  `status` =  'Confirmed' WHERE  `add_customer`.`id` =4;

    $itemQuery = mysqli_query($con, "DELETE FROM `add_customer`  WHERE `id` ='" . $_POST['delete'] . "'");
    if ($itemQuery) {
        echo "<script>alert('Successfully deleted')</script>";
        $nes = "customer deleted";
        $createDate = date("Y-m-d : H:i:s");
        $newsQuery = mysqli_query($con, "INSERT INTO `news` (`id`, `eid`, `news`, `created_date`) VALUES (NULL, '" . $_SESSION['eid'] . "', '" . $nes . "', '$createDate');");
    }
}
if (isset($_POST['cacustomer'])) {
    header("Location:customer.php");
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
            display: block;
            height: 350px;
            overflow: auto;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        img#close {
            position: absolute;
            right: 3px;
            top: -20px;
            cursor: pointer
        }

        .test label {
            /* Other styling.. */
            text-align: right;
            clear: both;
            float: left;
            margin-right: 15px;
        }




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
                    <!--                    <h3 style="color: #066ECC ;"class="page-title">Customer Management  <button name="addsvi" class="btn btn-success">ADD Customer</button></h3>-->
                    <div class="row">

                        <div class="col-md-12">
                            <!-- INPUTS-->
                            <div class="panel">
                                <a href="customer.php"><img id="close" src="assets/img/close.png" name="cacustomer"></a>
                                <div class="panel-heading">
                                    <h3 style="color: #066ECC ;" class="panel-title">ADD LEAD</h3>
                                </div>

                                <?php
                                if (isset($_POST['edit'])) {
                                    $getcustomerquerOne = mysqli_query($con, "SELECT * FROM `add_customer` WHERE id='" . $_POST['edit'] . "'");
                                    $arrayOne = mysqli_fetch_array($getcustomerquerOne);
                                    $nameFire = $arrayOne['name'];
                                    $productFire = $arrayOne['product'];
                                    $emailFire = $arrayOne['email'];
                                    $mobileFire = $arrayOne['mobile'];
                                    $addressFire = $arrayOne['address'];
                                    $statusFire = $arrayOne['status'];
                                    $dateFire = $arrayOne['date'];
                                }


                                ?>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <label class="form-group-lg" for="companyname">Company Name:</label>
                                        <div class="input-group">

                                            <select name="companyid" class="form-control">
                                                <?php
                                                $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_company` ");

                                                while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                    ?>

                                                    <option value="<?php if (isset($arrayleads['id'])) {echo $arrayleads['id'];} ?>" > <?php if (isset($arrayleads['cname'])) {echo $arrayleads['cname'];} ?></option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                            <span  style="background-color: green" class="input-group-addon" id="basic-addon2"><a style="color: white;font-weight: bold" href="addcompany.php">ADD</a></span>
                                        </div>
                                        <br>
<!--                                        <div class="form-group test">-->
<!--                                            <label class="form-group-lg" for="companyname">Company Name:</label>-->
<!--                                            <input class="form-control" name="companyname"/>-->
<!--                                        </div>-->

<!---->
<!--                                        <div class="form-group test">-->
<!--                                            <label for="cnumber">Contact number:</label>-->
<!--                                            <input class="form-control" name="cnumber"/>-->
<!--                                        </div>-->

                                        <div class="form-group test">
                                            <label for="fdate">Follow Up:</label>
                                            <input type="date" class="form-control" name="fdate"/>
                                        </div>

                                        <div class="form-group test">
                                            <label for="time">Time:</label>
                                            <input type="time" class="form-control" name="time"/>
                                        </div>

                                        <div class="form-group test">
                                            <label for="edate">Expected closer date:</label>
                                            <input type="date" class="form-control" name="edate"/>
                                        </div>



                                        <div class="form-group test">
                                            <label for="stype">Source type:</label>

                                            <select name="stype" value="<?php if (isset($statusFire)) {
                                                echo $statusFire;
                                            } ?>" class="form-control">
                                                <option value="Company website">Company website</option>
                                                <option value="Denave/Trendsetters">Denave/Trendsetters</option>
                                                <option value="Existing client">Existing client</option>
                                                <option value="Google search">Google search</option>
                                                <option value="HR sites / Resume">HR sites / Resume</option>
                                                <option value="Inbound Equiries">Inbound Equiries</option>
                                                <option value="Internal campaigns">Internal campaigns</option>
                                                <option value="LinkedIn profile">LinkedIn profile</option>
                                                <option value="Others">Others</option>
                                                <option value="Paper Ads/ magazines">Paper Ads/ magazines</option>
                                                <option value="Referral from Clients">Referral from Clients</option>
                                                <option value="Referral from vendors">Referral from vendors</option>
                                                <option value="Seminars /Exhibitions">Seminars /Exhibitions</option>
                                            </select>

                                        </div>


                                        <div class="form-group test">
                                            <label for="total">Status:</label>

                                            <select name="status" value="<?php if (isset($statusFire)) {
                                                echo $statusFire;
                                            } ?>" class="form-control">
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                                <option value="Confirmed">Confirmed</option>
                                                <option value="Installed">Installed</option>
                                            </select>

                                        </div>
                                        <div class="form-group test">
                                            <label for="eid">Employee:</label>

                                            <select name="eid" class="form-control">
                                                <?php
                                                $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_lead` ");

                                                while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                    ?>

                                                    <option value="<?php if (isset($arrayleads['id'])) {
                                                        echo $arrayleads['id'];
                                                    } ?><"><?php if (isset($arrayleads['name'])) {
                                                            echo $arrayleads['name'];
                                                        } ?></option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-md-6">

                                        <label class="form-group-lg" for="companyname">Contacts:</label>
                                        <div class="input-group">
                                            <select name="contactid" class="form-control">
                                                <?php
                                                $SelectLeadsQuery = mysqli_query($con, "SELECT * FROM  `add_contacts` ");

                                                while ($arrayleads = mysqli_fetch_array($SelectLeadsQuery)) {

                                                    ?>

                                                    <option value="<?php if (isset($arrayleads['id'])) {
                                                        echo $arrayleads['id'];
                                                    } ?><"><?php if (isset($arrayleads['name'])) {
                                                            echo $arrayleads['name'];
                                                        } ?></option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                            <span  style="background-color: green" class="input-group-addon" id="basic-addon2"><a style="color: white;font-weight: bold" href="addcontact.php">ADD</a></span>
                                        </div>
                                        <br>


                                        <div class="form-group test">
                                            <label for="Student">Products:</label>
                                            <select name="product" value="<?php if (isset($productFire)) {
                                                echo $productFire;
                                            } ?>" class="form-control">
                                                <?php
                                                $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM `products`");

                                                while ($arraylea = mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                    ?>

                                                    <option value="<?php if (isset($arraylea['product'])) {
                                                        echo $arraylea['product'];
                                                    } ?>"><?php if (isset($arraylea['product'])) {
                                                            echo $arraylea['product'];
                                                        } ?></option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group test">
                                            <label for="qty">Quantity:</label>
                                            <input type="number" class="form-control" name="qty"/>
                                        </div>

                                        <div class="form-group test">
                                            <label for="unit">Unit:</label>
                                            <input type="number" class="form-control" name="unit"/>
                                        </div>

                                        <div class="form-group test">
                                            <label for="total">Total Amount(RS):</label>
                                            <input type="number" class="form-control" name="total"/>
                                        </div>


                                        <label for="options">Priority:</label>
                                        <div class="btn-group-justified" data-toggle="buttons">

                                            <label class="btn  active">
                                                <input type="radio" name="options" id="option1" value="high" autocomplete="off">High
                                            </label>
                                            <label class="btn ">
                                                <input type="radio" name="options" id="option2" value="medium" autocomplete="off">Medium
                                            </label>
                                            <label class="btn ">
                                                <input type="radio" value="low" name="options" id="option3" autocomplete="off">Low
                                            </label>
                                        </div>


<br>
                                        <div class="form-group test">
                                            <label for="branchid">Branch:</label>

                                            <select name="branchid" value="<?php if (isset($productFire)) {
                                                echo $productFire;
                                            } ?>" class="form-control">
                                                <?php
                                                $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM `admin`");

                                                while ($arraylea = mysqli_fetch_array($SelectLeadsQueryFind)) {

                                                    ?>

                                                    <option value="<?php if (isset($arraylea['id'])) {
                                                        echo $arraylea['id'];
                                                    } ?>"><?php if (isset($arraylea['name'])) {
                                                            echo $arraylea['name'];
                                                        } ?></option>
                                                    <?php
                                                }

                                                ?>

                                            </select>
                                        </div>




                                    </div>


                                    <div class="form-group test">
                                        <label for="total">Comments:</label>
                                        <textarea class="form-control" name="comment"></textarea>
                                    </div>

                                    <?php
                                    if (isset($_POST['edit'])) {
                                        ?>
                                        <button style="text-align: center" type="submit" name="editcustomer"
                                                class="btn-success btn">Update
                                        </button>
                                        <button style="text-align: center" type="submit" class="btn-success btn">
                                            Cancel
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button style="text-align: center" type="submit" name="addcustomer"
                                                class="btn-success btn">ADD
                                        </button>
                                        <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <!--                         END INPUTS -->

                        </div>


                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
</form>

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

</body>

</html>
