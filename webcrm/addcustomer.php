<?php
include('menuone.php');

include ('config.php');
//include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");
//$_POST['edit']="";
if(isset($_GET['edit'])){
    $_POST['edit']=$_GET['edit'];
}

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
        header("Location:ecustomer.php");
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
        header("Location:ecustomer.php");
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
        header("Location:ecustomer.php");
    }
}

if(isset($_POST['cacustomer'])){
    header("Location:ecustomer.php");
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



        #abc {
            width:100%;
            height:100%;
            opacity:.95;
            top:0;
            left:0;

            position:fixed;
            background-color:#313131;
            overflow:auto
        }
        img#close {
            position:absolute;
            right:-14px;
            top:-14px;
            cursor:pointer
        }
        div#popupContact {
            position:absolute;
            left:50%;
            top:17%;
            margin-left:-202px;
            font-family:'Raleway',sans-serif
        }
        form {
            max-width:650px;
            min-width:250px;
            padding:10px 50px;
            border:2px solid gray;
            border-radius:10px;
            font-family:raleway;
            background-color:#fff
        }
        p {
            margin-top:30px
        }
        h2 {
            background-color:#FEFFED;
            padding:20px 35px;
            margin:-10px -50px;
            text-align:center;
            border-radius:10px 10px 0 0
        }
        hr {
            margin:10px -50px;
            border:0;
            border-top:1px solid #ccc
        }
        input[type=text] {
            width:100%;

            margin-top:30px;

            padding-left:15px;

        }

        textarea {
            background-image:url(../images/msg.png);
            background-repeat:no-repeat;
            background-position:5px 7px;
            width:82%;
            height:95px;
            padding:10px;
            resize:none;
            margin-top:30px;
            border:1px solid #ccc;
            padding-left:40px;
            font-size:16px;
            font-family:raleway;
            margin-bottom:30px
        }

        /*span {*/
            /*color:red;*/
            /*font-weight:700*/
        /*}*/

    </style>
<!--    <script>-->
<!--        function check_empty() {-->
<!--            if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {-->
<!--                alert("Fill All Fields !");-->
<!--            } else {-->
<!--                document.getElementById('form').submit();-->
<!--                alert("Form Submitted Successfully...");-->
<!--            }-->
<!--        }-->
<!--        //Function To Display Popup-->
<!--        function div_show() {-->
<!--           document.getElementById('abc').style.display = "block";-->
<!--        }-->
<!--        //Function to Hide Popup-->
<!--        function div_hide(){-->
<!--           document.getElementById('abc').style.display = "none";-->
<!--        }-->
<!--    </script>-->
</head>

<body>
<div id="abc">
    <!-- Popup Div Starts Here -->
    <div id="popupContact">


        <?php
        if(isset($_POST['edit'])){
            $getcustomerquerOne=mysqli_query($con,"SELECT * FROM `add_customer` WHERE id='".$_POST['edit']."'");
            $arrayOne=mysqli_fetch_array($getcustomerquerOne);
            $nameFire=$arrayOne['name'];
            $productFire=$arrayOne['product'];
            $emailFire=$arrayOne['email'];
            $mobileFire=$arrayOne['mobile'];
            $addressFire=$arrayOne['address'];
            $statusFire=$arrayOne['status'];
            $dateFire=$arrayOne['date'];
        }




        ?>
        <!-- Contact Us Form -->
        <form   method="post"  >
            <a href="ecustomer.php"><img  id="close" src="assets/img/close.png" name="cacustomer"></a>
<!--            <img  id="close" src="assets/img/close.png" name="closer">-->
            <h2>Add Customer</h2>
            <hr>
            <input type="text" name="name" value="<?php if(isset($nameFire)){echo $nameFire; }?>"  name="name" placeholder="Name" type="text">
            <input  type="text" value="<?php if(isset($emailFire)){echo $emailFire; }?>" name="email" name="email"  placeholder="Email" type="text">
            <input type="text" value="<?php if(isset($addressFire)){echo $addressFire; }?>" name="address"   name="message" placeholder="Address">
            <br>
            <input type="hidden" name="id" value="<?php if(isset($_POST['edit'])){echo $_POST['edit']; }?>" class="form-control" placeholder="Name">
<!--            <input type="text" name="name" value="--><?php //if(isset($nameFire)){echo $nameFire; }?><!--" class="form-control" placeholder="Name">-->
            <br>
            <select name="product" value="<?php if(isset($productFire)){echo $productFire; }?>" class="form-control">
                <?php
                $SelectLeadsQueryFind=mysqli_query($con,"SELECT * FROM `products`");

                while($arraylea=mysqli_fetch_array($SelectLeadsQueryFind)) {

                    ?>

                    <option value="<?php if(isset($arraylea['product'])){echo $arraylea['product'];}?>"><?php if(isset($arraylea['product'])){echo $arraylea['product'];}?></option>
                    <?php
                }

                ?>
            </select>
            <br>
<!--            <input type="email" value="--><?php //if(isset($emailFire)){echo $emailFire; }?><!--" name="email" class="form-control" placeholder="Email">-->
            <br>
            <input type="number" value="<?php if(isset($mobileFire)){echo $mobileFire; }?>" name="mobile" class="form-control" placeholder="Mobile number">
            <br>
<!--            <input type="text" value="--><?php //if(isset($addressFire)){echo $addressFire; }?><!--" name="address" class="form-control" placeholder="Address">-->
            <br>
            <select name="status" value="<?php if(isset($statusFire)){echo $statusFire; }?>" class="form-control">
                <option value="Positive">Positive</option>
                <option value="Negative">Negative</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Installed">Installed</option>
            </select>
            <br>

            <select name=""  class="form-control">
                <?php
                $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE id='".$_SESSION['eid']."' ");

                while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {

                    ?>

                    <option value="Marketing department"><?php if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></option>
                    <?php
                }

                ?>
            </select>
            <br>
            <input type="date" value="<?php if(isset($dateFire)){echo $dateFire; }?>" name="date" class="form-control" placeholder="date">
            <br>

            <?php
            if(isset($_POST['edit'])){
                ?>
                <button style="text-align: center" type="submit"  name="editcustomer" class="btn-success btn">Update</button>
                <button style="text-align: center" type="submit" name="cacustomer" class="btn-success btn">Cancel</button>
                <?php
            }else{
                ?>
                <button style="text-align: center;margin-left: 32%" type="submit" name="addcustomer" class="btn-success btn">ADD</button>
                <button style="text-align: center" type="submit" name="cacustomer" class="btn-success btn">Cancel</button>
<!--                <a  name="" id="submit">ADD</a>-->
<!--                <a  name="" id="submit">Cancel</a>-->
                <?php
            }
            ?>



        </form>
    </div>
    <!-- Popup Div Ends Here -->
</div>


<!--<button id="popup" onclick="div_show()">Popup</button>-->


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
