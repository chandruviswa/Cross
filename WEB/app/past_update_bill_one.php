<?php
include('config.php');

$post = file_get_contents('php://input');


/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();
require_once __DIR__ . '/Dp_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for required fields
//if (isset( $_POST['bill_no']) && isset($_POST['itm_code']) && isset($_POST['item']) && isset($_POST['amount']) && isset($_POST['qty'])) {
if ((isset($_GET['table'])) && (isset($_GET['chair']) && (isset($_GET['itm_code'])) && (isset($_GET['qty'])))) {

    $table = $_GET['table'];
    $chair =$_GET['chair'] ;
    $itm_code =  $_GET['itm_code'];
    $qty = $_GET['qty'];

    $resultOne = mysqli_query($con,"SELECT `ser_tax`,`vat_tax`,`unit` FROM `past_bill_details` WHERE `itm_code`='$itm_code' AND`tables`='$table' AND`chair`='$chair' AND`bill_no`=0");

    while ($rows = mysqli_fetch_array($resultOne)) {
        $ser_tax = $rows["ser_tax"];
        $vat = $rows["vat_tax"];
        $unit = $rows["unit"];

        $totlAmt = $qty * $unit;
        $service =$totlAmt * ($ser_tax /100);
        $vat_tax =$totlAmt * ($vat /100);
        $totlAmtfi = $totlAmt +$vat_tax +  $service;
        $result = mysqli_query($con,"UPDATE past_bill_details SET `qty`='$qty',`amt`='$totlAmt',`service`='$service',`vat`='$vat_tax',`tot_amt`='$totlAmtfi' WHERE `itm_code`='$itm_code' AND`tables`='$table' AND `chair`='$chair' AND`bill_no`=0");
        if ($result) {

            $response["success"] = 1;
            $response["message"] = "Product successfully created.";

            echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "Oops! An error occurred.";

            echo json_encode($response);
        }


    }





    //$result = mysqli_query($con,"INSERT INTO past_bill_details (`bill_no`,`table_no`,`itm_code`,`item`,`unit`,`qty`,`remarks`,`amt`,`date`,`time`,`sales_id`,`e_id`,`shift`,`tables`,`chair`,`status`) VALUES('$billId','$bill_no','$itm_code','$item','$amount','$qty','','$totlAmt','$date','$time','1','$empId','1','$bill_no','1','0')");



}else if ((isset($_GET['tables'])) && (isset($_GET['chairs'])) && (isset($_GET['itm_codes']))) {
    $table = $_GET['tables'];
    $chair =$_GET['chairs'] ;
    $itm_code =  $_GET['itm_codes'];
    //$result = mysqli_query($con,"INSERT INTO past_bill_details (`bill_no`,`table_no`,`itm_code`,`item`,`unit`,`qty`,`remarks`,`amt`,`date`,`time`,`sales_id`,`e_id`,`shift`,`tables`,`chair`,`status`) VALUES('$billId','$bill_no','$itm_code','$item','$amount','$qty','','$totlAmt','$date','$time','1','$empId','1','$bill_no','1','0')");
    $result = mysqli_query($con,"DELETE FROM past_bill_details WHERE `itm_code`='$itm_code' AND `tables`='$table' AND`chair`='$chair' AND`bill_no`=0 ");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        echo json_encode($response);
    }
}else if((isset($_GET['delete'])) && (isset($_GET['deleteOne']))){


    $delete = $_GET['delete'];
    $deleteOne = $_GET['deleteOne'];

    $result = mysqli_query($con,"DELETE FROM `past_bill_details`  WHERE `bill_no`=0 AND tables='$delete' AND  chair='$deleteOne'");

    if ($result) {
        $response["statusCode"] = 201;
        $response["message"] = "Product successfully created.";

        // echoing JSON response
        echo json_encode($response);
    }
    else {
        // no product found
        $items["statusCode"] = 202;
        $items["message"] = "No item found";

        // echo no users JSON
        echo json_encode($items);
    }

}








?>