<?php
include('config.php');

$post = file_get_contents('php://input');

$response = array();
//DELETE FROM past_bill_print
//select tables,chair,sales_id,date,time from past_bill_print limit 0,1
//INSERT INTO `past_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES (NULL, '0', '1', 'veg', '40', '2', '80', '2017-09-24', '04:25:40', '1', '1', '1', '10', '1');


$data_back = json_decode(file_get_contents('php://input'));
date_default_timezone_set("Asia/Kolkata");

if (isset($data_back)) {
    $table = $data_back->{"tables"};
    $chair =$data_back->{"chair"} ;
    $salesid =  $data_back->{"sales_id"};
   //$salesid =  2;
  $shift =  $data_back->{"shift"};

    $date =  date("Y-m-d");
    $time =  date("H:i:s");
    $eid =  $data_back->{"e_id"};

    require_once __DIR__ . '/Dp_connect.php';

    $db = new DB_CONNECT();




        $result = mysqli_query($con, "INSERT INTO `past_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES (NULL, '0', '1', 'v', '0', '0', '0', '$date', '$time', '$salesid', '$eid', '1', '$table', '$chair')");
        //$result = mysqli_query($con,"INSERT INTO `past_bill_print` (`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `e_id`, `shift`, `tables`, `chair`) VALUES (NULL, '5', '2', 'test', '1', '1', '1', '$date', '$time', '$salesid', '$eid', '1', '$table', '$chair'");

        if ($result) {
            $response["success"] = 1;
            $response["message"] = "Product successfully created.";

            echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "Oops! An error occurred kot.";

            echo json_encode($response);
        }

}
?>