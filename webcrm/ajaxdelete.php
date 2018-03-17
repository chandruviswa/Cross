<?php


include ('config.php');
session_start();
//if (isset($_GET['qno'])  && isset($_GET['name']) && isset($_GET['unit']) && isset($_GET['qty'])) {
//
//
//    $qno = $_GET['qno'];
//    $unit = $_GET['unit'];
//    $qty = $_GET['qty'];
//    $name = $_GET['name'];
//    $amt = (int)$unit * (int)$qty ;
//
//
//
//
//    $insertQuery = mysqli_query($con, "INSERT INTO `quotation_details`(`id`, `sid`, `aid`, `qno`, `product`, `unit`, `qty`, `amt`) VALUES (NULL ,'".$_SESSION['sid']."','".$_SESSION['aid']."','$qno','$name','$unit','$qty','$amt')");
//    if ($insertQuery) {
//    }
//
//}
if(isset($_GET['deleteemp'])){
    $qno = $_GET['deleteemp'];
    $insertQuery = mysqli_query($con, "DELETE FROM `add_lead` WHERE `id` = '". $qno."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if ($insertQuery) {
    }
}


if(isset($_GET['deleteproduct'])){
    $qno = $_GET['deleteproduct'];
    $insertQuery = mysqli_query($con, "DELETE FROM `products` WHERE `product_id` = '". $qno."'");
    if ($insertQuery) {
    }
}


if(isset($_GET['deleteTask'])){
    $qno = $_GET['deleteTask'];
    $insertQuery = mysqli_query($con, "DELETE FROM `taskmanage` WHERE `id` = '". $qno."'");
    if ($insertQuery) {
    }
}


if(isset($_GET['deleteTarget'])){
    $qno = $_GET['deleteTarget'];
    $insertQuery = mysqli_query($con, "DELETE FROM `target` WHERE `id` = '". $qno."'");
    if ($insertQuery) {
    }
}


if(isset($_GET['deletequoto'])){
    $qno = $_GET['deletequoto'];

    $itemQuery=mysqli_query($con,"DELETE FROM `quotation`  WHERE `qno` ='".$qno."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    if($itemQuery){
        echo "<script>alert('Successfully deleted')</script>";
        //$nes="Employee deleted";
        //$createDate=date("Y-m-d : H:i:s");
        $newsQuery=mysqli_query($con,"DELETE FROM `quotation_details`  WHERE `qno` ='".$qno."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."'");
    }

//
//    $insertQuery = mysqli_query($con, "DELETE FROM `quotation` WHERE `product_id` = '". $qno."'");
//    if ($insertQuery) {
//    }
}




?>