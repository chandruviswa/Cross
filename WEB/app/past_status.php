<?php
include('config.php');

// include db connect class
require_once __DIR__ . '/Dp_connect.php';

// connecting to db
$db = new DB_CONNECT();

$items = array();

if ((isset($_GET['table_no']) ) && (isset($_GET['chair_no']))){
    $bill_no = $_GET['table_no'];
    $chair = $_GET['chair_no'];
    $curenDare =date("Y-m-d");

    $resultStatus = mysqli_query($con,"SELECT c.status FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables where c.date ='$curenDare' AND m.tables ='$bill_no' AND c.chair = '$chair'  AND c.status = 'Unpaid' AND c.bill_no =0") or die(mysqli_error());
    if (mysqli_num_rows($resultStatus) > 0) {
        $items["success"] = 1;
        $items["message"] = "Successfull updated";

        $resultOne = mysqli_query($con,"SELECT *FROM  past_bill WHERE date='$curenDare' AND status='Unpaid' AND tables = '$bill_no' AND chair = '$chair'");

// check for empty result
        if (mysqli_num_rows($resultOne) > 0) {

            $items["products"] = array();

            if ($row = mysqli_fetch_array($resultOne)) {
                // temp user array
                $productOne = array();
				$productOne["sales"] = $row["sales_id"];
                $productOne["bill_no"] = $row["bill_no"];
                $productOne["totalAmt"] = $row["amt"];
                // push single product into final itemsAll array
                array_push($items["products"], $productOne);
            }


            // echo no users JSON
            echo json_encode($items);
        }else {
            $items["success"] = 0;
            $items["message"] = "Successfull updated";
            // echo no users JSON
            echo json_encode($items);
        }

    }else {
        $items["success"] = 0;
        $items["message"] = "Successfull updated";
        // echo no users JSON
        echo json_encode($items);
    }


} else if (isset($_GET['tables']) &&isset($_GET['chair'])  && (isset($_GET['totamAmt']) ) ) {

    $table = $_GET['tables'];
    $chair = $_GET['chair'];
    $totalAmt = $_GET['totamAmt'];
    $results = mysqli_query($con,"UPDATE past_bill SET amt = '$totalAmt',sub_tot ='$totalAmt'  where bill_no='0' AND tables='$table' AND chair='$chair'");
    if (!empty($results)) {
        $items["statusCode"] = 201;
        $items["message"] = "Successfully updated";
        // echo no users JSON
        echo json_encode($items);
    }
}else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}



?>