<?php
//include('menuone.php');

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

$id="";
$name="";
$amount="";
$paid=0;
$bamount=0;
if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $selectlead=mysqli_query($con,"SELECT * FROM `leads` WHERE id='". $id."'");
    $arrays=mysqli_fetch_array($selectlead);
 //   $name=$arrays['companyname'];
    $amount=$arrays['total'];

    $selectconpany=mysqli_query($con,"SELECT * FROM `add_company` WHERE id='".$arrays['companyname']."'");
    $arraysOne=mysqli_fetch_array($selectconpany);
    $name=$arraysOne['cname'];

    $selectpaument=mysqli_query($con,"SELECT * FROM `payments` WHERE cid='".$id."'");

    while (  $arraysTwo=mysqli_fetch_array($selectpaument)){
        $paid=$paid+$arraysTwo['amount'];
    }




}
if(isset($_POST['addvisit'])){

    //INSERT INTO `fscrm_db`.`payments` (`id`, `sid`, `aid`, `eid`, `cid`, `amount`, `balance`, `type`, `date`, `createdate`) VALUES (NULL, '1', '2', '77', '7', '500', '250', 'Cash', '121212', '121212');
    //$getcustomerquer=mysqli_query($con,"SELECT * FROM `add_customer` WHERE id='".$_POST['customerer']."'");
    //$array=mysqli_fetch_array($getcustomerquer);
    //$cousname=$array['name'];

    $eamt=(int)$_POST['amount']+(int)( $paid );
    $temTotam=(int)($amount);


    $bamount=$temTotam-((int)$_POST['amount']+ (int)$paid);

    if($eamt >$temTotam){
        echo "<script>alert('Entered amount is too high!..')</script>";

    }else if($eamt ==$temTotam){

        $itemQuery=mysqli_query($con,"INSERT INTO  `payments` (`id`, `sid`, `aid`, `eid`, `cid`, `amount`, `balance`, `type`, `date`, `createdate`) VALUES (NULL, '".$_SESSION['sid']."', '".$_SESSION['aid']."', '".$_SESSION['eid']."', '".$id."', '".$_POST['amount']."', 0, '".$_POST['type']."', '".$_POST['date']."','$curentDate')");
        if($itemQuery){

             $newsQuery=mysqli_query($con,"UPDATE  `leads` SET `status`='PostSale' WHERE  `id` ='".$id."'");
            echo "<script>alert('Successfully inserted')</script>";
            header("Location:viewsales.php?edit=".$id);
        }
    }else {

        $itemQuery=mysqli_query($con,"INSERT INTO  `payments` (`id`, `sid`, `aid`, `eid`, `cid`, `amount`, `balance`, `type`, `date`, `createdate`) VALUES (NULL, '".$_SESSION['sid']."', '".$_SESSION['aid']."', '".$_SESSION['eid']."', '".$id."', '".$_POST['amount']."', '$bamount', '".$_POST['type']."', '".$_POST['date']."','$curentDate')");
        if($itemQuery){

            // $newsQuery=mysqli_query($con,"UPDATE  `leads` SET `status`='".$_POST['vstatus']."',`followdate`='".$_POST['nextvisits']."'  WHERE  `id` ='".$id."'");
            echo "<script>alert('Successfully inserted')</script>";
            header("Location:viewsales.php?edit=".$id);
        }
    }


}

if(isset($_POST['cacustomer'])){
    header("Location:viewsales.php?edit=".$id);
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

        label {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 18px;
            color: #333;
            height: 20px;
            width: 200px;
            margin-top: 10px;
            margin-left: 10px;
            text-align: right;
            clear: both;
            float:left;
            margin-right:15px;
        }
        input {
            height: 40px;
            width: 300px;
            padding-left: 10px;
            border: 1px solid #000;
            margin-top: 10px;
            float: left;
        }

        select{
            height: 40px;
            width: 300px;
            padding-left: 10px;
            border: 1px solid #000;
            margin-top: 10px;
            float: left;

        }


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
            margin-left:-25%;
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

<!--    <nav class="navbar navbar-default navbar-fixed-top">-->
<!--        <div style="width: 250px;height: 50px;margin-top: -20px" class="brand">-->
<!--            <a  href="index.php"><img  src="assets/img/finallogo.png" alt="Klorofil Logo" class="img-responsive"></a>-->
<!--        </div>-->
<!--        <div  class="container-fluid">-->
<!---->
<!--            <div id="navbar-menu" class="toggled">-->
<!--                <ul class="nav navbar-nav navbar-right">-->
<!--                    <li class="dropdown">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>--><?php //echo  $a;?><!--</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>-->
<!--                            <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>-->
<!--                            <!--                            <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>-->
<!--                            <li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
    <!-- Popup Div Starts Here -->
    <div id="popupContact">



        <!-- Contact Us Form -->

        <form   method="post"  >
            <a href="viewsales.php?edit=<?php echo $_GET['edit'];?>"><img  id="close" src="assets/img/close.png" name="cacustomer"></a>
            <!--            <img  id="close" src="assets/img/close.png" name="closer">-->
            <h2>Add Payment</h2>
            <hr>

            <label for="Company">Company name:</label>
            <input disabled value="<?php if(isset($name)){echo $name;} ?>" />
            <br>
            <label for="Amountsss">Total Amount:</label>
            <input value="<?php if(isset($amount)){echo $amount;} ?>" disabled />
            <br>
            <label for="Amountsss">Already Paid:</label>
            <input value="<?php if(isset($paid)){echo $paid;} ?>" disabled />
            <br>
            <label for="Student">Type:</label>
            <select name="type" >
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Card">Card</option>
                                    <option value="Net banking">Net banking</option>

                                </select>
                            <br>
                            <label for="Matric_no">Amount:</label>
                            <input name="amount" />
                            <br>
<!--                            <label for="Email">Balance:</label>-->
<!--                            <input name="balance" />-->
<!--                            <br>-->
                            <label for="Username">Date:</label>
                            <input type="date" name="date" />
                            <br>

                <!--            <input name="regbutton" type="button" class="button" value="Register" />-->
<!---->
<!--            -->
<!--            <div class="form-horizontal">-->
<!--                <label class="form-group">Type</label>-->
<!--                <select name="type" class="form-control">-->
<!--                    <option value="Cash">Cash</option>-->
<!--                    <option value="Cheque">Cheque</option>-->
<!--                    <option value="Card">Card</option>-->
<!--                    <option value="Net banking">Net banking</option>-->
<!---->
<!--                </select>-->
<!---->
<!--            </div>-->
<!---->
<!---->
<!---->
<!--            <br>-->
<!--            <div class="form-horizontal">-->
<!--                <label class="form-group">Paid</label>-->
<!---->
<!--            <input type="number" name="amount" class="form-control" placeholder="Enter your amount">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="form-horizontal">-->
<!--                <label class="form-group">balance</label>-->
<!--            <input  type="number" name="balance" class="form-control" placeholder="balance">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="form-horizontal">-->
<!--                <label class="form-group">Date</label>-->
<!--            <input type="date" name="date"   class="form-control"placeholder="date">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div class="form-horizontal">-->
<!--                <label class="form-group">Total</label>-->
<!--            <input type="number" disabled name="total" value="500" class="form-control" placeholder="Total">-->
<!--            </div>-->
<!---->
<!--            <br>-->
<br>
            <button style="text-align: center" type="submit" name="addvisit" class="btn-success btn">ADD</button>
            <button style="text-align: center" type="submit" name="cacustomer" class="btn-success btn">Cancel</button>
            <br>

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
