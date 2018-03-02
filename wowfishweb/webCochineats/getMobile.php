<?php
include ('config.php');
session_start();
if (isset($_GET['id']) ) {
    $id = $_GET['id'];


    $insertQuery = mysqli_query($con, "SELECT mobile FROM  add_user WHERE mobile='$id'");
    $rows = mysqli_fetch_array($insertQuery);

    if(isset($rows['mobile'])){
        echo ($rows['mobile']);
    }else{
        echo"";
    }





}

?>