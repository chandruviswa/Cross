<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';

$db = new DB_CONNECT();

$response = array();

if(isset($_GET['tables']) &&isset($_GET['chair'])  &&isset($_GET['bill']) ){

    $table = $_GET['tables'];
    $chair = $_GET['chair'];
    $date=date("Y-m-d");
    $bill = 0;

$result = mysqli_query($con, "SELECT `service`,`vat`,`tot_amt`,`amt` FROM `past_bill_details` WHERE date='$date' AND `bill_no`='0' AND `tables`='$table' AND`chair`='$chair'");

if (!empty($result)) {
    // check for empty result
    if (mysqli_num_rows($result) > 0) {
        $service =0;
        $vat =0;
        $talAmount =0;
        $subAmount = 0;


        while ($rows = mysqli_fetch_array($result)) {

            $service += $rows["service"];

            $vat += $rows["vat"];

            $talAmount +=$rows["tot_amt"];

            $subAmount +=$rows["amt"];

        }

        $amont = round($talAmount);

        if(($service > 0) || ($vat > 0)){
        $resultOne = mysqli_query($con, "UPDATE past_bill SET `ser_tax`= '$service',`vat`='$vat',`cash` = '$talAmount',`amt` = '$amont' WHERE `tables`='$table' AND `chair`='$chair'AND `bill_no`='$bill'");
        if ($resultOne) {

            //array_push($tablenos[$tableno], $chairno);
            $items["statusCode"] = 201;
            $items["message"] = "Item cat list successfully updated";
            echo json_encode($items);
        }

        }else{
            $resultOne = mysqli_query($con, "UPDATE past_bill SET `ser_tax`= '0',`vat`='0',`cash` = '$subAmount',`amt` = '$subAmount' WHERE `tables`='$table' AND `chair`='$chair'AND `bill_no`='$bill'");
            if ($resultOne) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully updated";
                echo json_encode($items);
            }

        }

    } else {
        // no product found
        $items["statusCode"] = 202;
        $items["message"] = "No item found test One";

        // echo no users JSON
        echo json_encode($items);
    }
} else {
    // no product found
    $items["statusCode"] = 203;
    $items["message"] = "No item found test";

    // echo no users JSON
    echo json_encode($items);
}
}

?>