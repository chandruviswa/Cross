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
$task="";
$sdate="";
$edate="";
$status="";
if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $selectlead=mysqli_query($con,"SELECT * FROM `taskmanage` WHERE id='". $id."'");
    $arrays=mysqli_fetch_array($selectlead);
    $task=$arrays['task'];
    $sdate=$arrays['st_date'];
    $edate=$arrays['ed_date'];
    $status=$arrays['status'];

}

if(isset($_POST['update'])){
    echo "<script>alert('Successfully updated')</script>";

    $newsQuery=mysqli_query($con,"UPDATE  `taskmanage` SET `status`='".$_POST['type']."',updated_date='".$curentDate."' WHERE `id` ='".$id."'");
    if($newsQuery){
        echo "<script>alert('Successfully inserted')</script>";
        header("Location:employeetask.php");
    }

}
if(isset($_POST['addvisit'])){

//INSERT INTO `taskmanage`(`id`, `sid`, `aid`, `eid`, `st_date`, `ed_date`, `task`, `updated_date`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
    $itemQuery=mysqli_query($con,"INSERT INTO `taskmanage`(`id`, `sid`, `aid`, `eid`, `st_date`, `ed_date`, `task`, `updated_date`, `status`) VALUES (NULL, '".$_SESSION['sid']."', '".$_SESSION['aid']."', '".$_POST['eid']."','".$_POST['date']."','".$_POST['enddate']."','".$_POST['task']."','$curentDate','".$_POST['type']."')");
    if($itemQuery){
        echo "<script>alert('Successfully inserted')</script>";
        header("Location:taskmanage.php");
    }
}

if(isset($_POST['cacustomer'])){
    header("Location:taskmanage.php");
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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
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
    </style>

</head>

<body>
<div id="abc">
    <div id="popupContact">
        <form   method="post"  >
            <?php if($_SESSION['eid'] =="0" ){
                ?>
                <a href="taskmanage.php"><img  id="close" src="assets/img/close.png" name="cacustomer"></a>
                <!--            <img  id="close" src="assets/img/close.png" name="closer">-->
                <h2>Add Task</h2>
                <hr>

                <label for="Company">Employee name:</label>
                <select name="eid" >
                    <?php
                    $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM `add_lead` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
                    while ($arraylea = mysqli_fetch_array($SelectLeadsQueryFind)) {
                        ?>
                        <option value="<?php if (isset($arraylea['id'])){echo $arraylea['id'];}?>"><?php if (isset($arraylea['name'])) {echo $arraylea['name'];} ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br>
                <label for="days">TASK:</label>
                <input name="task" value="<?php if(isset($amount)){echo $amount;} ?>"  />
                <br>
                <label for="date">Start Date:</label>
                <input type="date" name="date" />
                <br>
                <label for="enddate">End Date:</label>
                <input type="date" name="enddate" />
                <br>
                <label for="type">Status:</label>
                <select name="type" >
                    <option value="Active">Active</option>
                    <option value="Closed">Closed</option>
                </select>
                <br>
                <br>
                <button style="text-align: center" type="submit" name="addvisit" class="btn-success btn">ADD</button>
                <button style="text-align: center" type="submit" name="cacustomer" class="btn-success btn">Cancel</button>
                <br>


                <?php

            }else{

                ?>

                <a href="employeetask.php"><img  id="close" src="assets/img/close.png" name="cacustomer"></a>
                <!--            <img  id="close" src="assets/img/close.png" name="closer">-->
                <h2>Update Task</h2>
                <hr>

                <label for="Company">Employee name:</label>
                <select name="eid" >
                    <?php
                    $SelectLeadsQueryFind = mysqli_query($con, "SELECT * FROM `add_lead` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND id='".$_SESSION['eid']."'");
                    while ($arraylea = mysqli_fetch_array($SelectLeadsQueryFind)) {
                        ?>
                        <option value="<?php if (isset($arraylea['id'])){echo $arraylea['id'];}?>"><?php if (isset($arraylea['name'])) {echo $arraylea['name'];} ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br>
                <label for="days">TASK:</label>
                <input disabled name="task" value="<?php if(isset($task)){echo $task;} ?>"  />
                <br>
                <label for="date">Start Date:</label>
                <input disabled type="date" value="<?php if(isset($sdate)){echo $sdate;} ?>" name="date" />
                <br>
                <label for="enddate">End Date:</label>
                <input disabled type="date" value="<?php if(isset($edate)){echo $edate;} ?>" name="enddate" />
                <br>
                <label for="type">Status:</label>
                <select name="type" >
                    <option value="Active">Active</option>
                    <option value="Closed">Closed</option>
                </select>
                <br>
                <br>
                <button style="text-align: center" type="submit" name="update" class="btn-success btn">Update</button>

                <br>
                <?php

            } ?>


        </form>
    </div>
</div>
<?php
include ('footer.php');
?>
</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>

</body>

</html>
