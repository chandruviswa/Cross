<?php
include('menu.php');
include ('config.php');

//include('session.php');
$curentDate =date("Y-m-d");
$currentTime =date("H:i:s");

if(isset($_GET['edit'])){
    $_POST['edit']=$_GET['edit'];
}
//$_POST['edit']="";
if(isset($_POST['addcustomer'])){

    //INSERT INTO `fscrm_db`.`add_company` (`id`, `sid`, `aid`, `cname`, `location`, `city`, `email`, `website`, `postal`, `mobile`) VALUES (NULL, '1', '2', 'falcon square pvt ltd', 'Ramanathapuram', 'Coimbatore', 'falcon@gmail.com', 'www.fsmanagers.com', '545404', '0422 51541');
    $itemQuery=mysqli_query($con,"INSERT INTO `add_company` (`id`, `sid`, `aid`, `cname`, `location`, `city`, `email`, `website`, `postal`, `mobile`) VALUES (NULL, '".$_SESSION['sid']."','".$_POST['branchid']."','".$_POST['cname']."', '".$_POST['location']."', '".$_POST['city']."', '".$_POST['email']."','".$_POST['website']."','".$_POST['postal']."','".$_POST['mobile']."')");
    if($itemQuery){
         echo "<script>alert('Successfully inserted')</script>";
        header("Location:addadminleadactivity.php");
    }
}





if(isset($_POST['cacustomer'])){
    header("Location:addadminleadactivity.php");
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
            background-color:#252C35;
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
            /*background-image:url(../images/msg.png);*/
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


        ?>
        <!-- Contact Us Form -->
        <form   method="post"  >
            <a href="addadminleadactivity.php"><img  id="close" src="assets/img/close.png" name="cacustomer"></a>
            <!--            <img  id="close" src="assets/img/close.png" name="closer">-->
            <h2>Add Company</h2>
            <hr>
            <input type="hidden" name="id" value="<?php if(isset($_POST['edit'])){echo $_POST['edit']; }?>"  placeholder="Name">
            <input value="<?php if(isset($nameFire)){echo $nameFire; }?>" type="text" name="cname"  placeholder="Company Name">
            <input value="<?php if(isset($unameFire)){echo $unameFire; }?>" type="text" name="location"  placeholder="location">
            <input value="<?php if(isset($productFire)){echo $productFire; }?>" type="text"name="city" class="form-control" placeholder="city">
            <br>
            <input name="email" value="<?php if(isset($emailFire)){echo $emailFire; }?>" type="email" class="form-control" placeholder="Email">
            <br>
            <input name="mobile" value="<?php if(isset($mobileFire)){echo $mobileFire; }?>" type="number" class="form-control" placeholder="Mobile number">

            <input name="website" value="<?php if(isset($emailFire)){echo $emailFire; }?>" type="text" class="form-control" placeholder="website">
            <br>
            <input name="postal" value="<?php if(isset($mobileFire)){echo $mobileFire; }?>" type="number" class="form-control" placeholder="postal">
            <br>
            <!--                                <button style="text-align: center" type="submit" name="addlead" class="btn-success btn">ADD</button>-->

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


            <?php
            if(isset($_POST['edit'])){
                ?>
                <button style="text-align: center" type="submit"  name="editcustomer" class="btn-success btn">Update</button>
                <button style="text-align: center" type="submit"  name="cacustomer" class="btn-success btn">Cancel</button>
                <?php
            }else{
                ?>
                <button style="text-align: center" type="submit" name="addcustomer" class="btn-success btn">ADD</button>
                <button style="text-align: center" type="submit" name="cacustomer" class="btn-success btn">Cancel</button>
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
