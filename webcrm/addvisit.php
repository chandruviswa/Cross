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
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
}
if(isset($_POST['addvisit'])){
    $getcustomerquer=mysqli_query($con,"SELECT * FROM `add_customer` WHERE id='".$_POST['customerer']."'");
    $array=mysqli_fetch_array($getcustomerquer);
    $cousname=$array['name'];

    $itemQuery=mysqli_query($con,"INSERT INTO  `visits` (`id`, `vist_type`, `name`, `location`, `requirement`, `status`, `notes`, `eid`, `visit_time`, `custom_id`, `next_visit`,`sid`,`aid`) VALUES (NULL, '".$_POST['type']."', '$cousname', '".$_POST['location']."', '".$_POST['requirement']."', '".$_POST['vstatus']."', '".$_POST['notes']."', '".$_SESSION['eid']."', '$curentDate', '".$id."', '".$_POST['nextvisits']."','".$_SESSION['sid']."','".$_SESSION['aid']."')");
    if($itemQuery){

        $newsQuery=mysqli_query($con,"UPDATE  `leads` SET `status`='".$_POST['vstatus']."',`followdate`='".$_POST['nextvisits']."'  WHERE  `id` ='".$id."'");
        echo "<script>alert('Successfully inserted')</script>";
        header("Location:viewcustomer.php?edit=".$id."");
    }
}

if(isset($_POST['cacustomer'])){
    header("Location:viewcustomer.php?edit=".$id."");
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



        <!-- Contact Us Form -->

        <form   method="post"  >
            <a href="viewcustomer.php?edit=<?php echo $_GET['edit'];?>"><img  id="close" src="assets/img/close.png" name="cacustomer"></a>
            <!--            <img  id="close" src="assets/img/close.png" name="closer">-->
            <h2>Add Visit</h2>
            <hr>
            <select name="type" class="form-control">
                <option value="Direct Customer Location">Direct Customer Location</option>
                <option value="BY Call">BY Call</option>
                <option value="By Mail">By Mail</option>
            </select>
            <input type="text" name="location"  placeholder="Location">
            <input  type="text" name="requirement" placeholder="Requirement">
            <input type="hidden" name="notes"  placeholder="Notes">



<!--            <input type="text" name="location"  placeholder="Location">-->
<!--            <br>-->
<!--            <input type="text" name="requirement" placeholder="Requirement">-->
<!--            <br>-->
<!--            <input type="text" name="notes" class="placeholder="Notes">-->
<!--            <br>-->
            <input style="margin-top: 20px" type="date" name="nextvisits" class="form-control">
            <br>
            <select name="vstatus" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Positive">Positive</option>
                <option value="Negative">Negative</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Installed">Installed</option>
            </select>
<!--            <br>-->
<!---->
<!---->
<!--            <select name="customerer" class="form-control">-->
<!--                --><?php
//                $SelectLeadsQuery=mysqli_query($con,"SELECT * FROM  `add_customer` WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
//
//                while($arrayleads=mysqli_fetch_array($SelectLeadsQuery)) {
//
//                    ?>
<!---->
<!--                    <option value="--><?php //if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--">--><?php //if(isset($arrayleads['name'])){echo $arrayleads['name'];}?><!--</option>-->
<!--                    <!--                                            <option hidden value="--><?php ////if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--<!--">--><?php ////if(isset($arrayleads['id'])){echo $arrayleads['id'];}?><!--<!--</option>-->
<!--                    --><?php
//                }
//
//                ?>
<!--            </select>-->
            <br>

            <button style="text-align: center" type="submit" name="addvisit" class="btn-success btn">ADD</button>
            <button style="text-align: center" type="submit" name="cacustomer" class="btn-success btn">Cancel</button>

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
