<?php
include ('config.php');
session_start();
if (isset($_GET['id']) ) {
    $id = $_GET['id'];


    $insertQuery = mysqli_query($con, "SELECT *  FROM  item_cat WHERE itm_id='$id'");

    if ($insertQuery) {

        $rowArray=mysqli_fetch_array($insertQuery);


echo $rowArray['item_cat'];

    }


}

?>