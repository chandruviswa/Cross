<?php
include('config.php');

$post = file_get_contents('php://input');

$response = array();

$data_back = json_decode(file_get_contents('php://input'));
date_default_timezone_set("Asia/Kolkata");

if (isset($data_back)) {
    $bill_no = $data_back->{"bill_no"};
    $itm_code =  $data_back->{"itm_code"};
    $item =  $data_back->{"item"};
    $amount =  $data_back->{"amount"};
    $qty = $data_back->{"qty"};
    $billId = $data_back->{"billId"};
    $empId =$data_back->{"emp_id"} ;
    $chair =$data_back->{"chair"} ;
    $ser_tax =$data_back->{"ser_tax"} ;
    $remark =$data_back->{"remark"} ;
    $vat =$data_back->{"vat"} ;
    $shift =  $data_back->{"shift"};
    $sales =  $data_back->{"sales_id"};

    $unitTypesquery= mysqli_query($con, "SELECT i.*,u.price,p.short_name FROM `item_master` i left join unitwise_price_line u on u.icode=i.itm_code left join prod_unit p on p.uid=u.unit WHERE i.itm_code='$itm_code'");
    if ($unitTypesquery) {
           if (mysqli_num_rows($unitTypesquery) > 0) {
               while ($rows = mysqli_fetch_array($unitTypesquery)){
                   $unitType = $rows["short_name"];
               }
           }
    }


    //SELECT i.*,u.price,p.short_name FROM `item_master` i left join unitwise_price_line u on u.icode=i.itm_code left join prod_unit p on p.uid=u.unit WHERE i.itm_code=5



   // left join unitwise_price_line u on u.icode=i.itm_code left join prod_unit p on p.uid=u.unit


  //  $sales =  2;

    $totlAmt = $amount * $qty;


    $service =$totlAmt * ($ser_tax /100);

    $vat_tax =$totlAmt * ($vat /100);

    $totlAmtfi = $totlAmt +$vat_tax +  $service;



    $date =  date("Y-m-d");
    $time =  date("H:i:s");

    require_once __DIR__ . '/Dp_connect.php';

    $db = new DB_CONNECT();

    //$result = mysqli_query($con,"INSERT INTO past_bill_details (`bill_no`,`itm_code`,`item`,`unit`,`qty`,`remarks`,`amt`,`date`,`time`,`sales_id`,`e_id`,`shift`,`tables`,`chair`,`status`,`unit_type`,`ser_tax`,`vat_tax`,`service`,`vat`,`tot_amt`,`cat`) VALUES('$billId','$itm_code','$item','$amount','$qty','','$totlAmt','$date','$time','1','$empId','1','$bill_no','1','0','','','','','','','')");
    $result = mysqli_query($con,"INSERT INTO past_bill_details (`bill_no`,`itm_code`,`item`,`unit`,`qty`,`remarks`,`amt`,`date`,`time`,`sales_id`,`e_id`,`shift`,`tables`,`chair`,`unit_type`,`ser_tax`,`vat_tax`,`service`,`vat`,`tot_amt`,`cat`,`mob_status` ) VALUES('0','$itm_code','$item','$amount','$qty','$remark','$totlAmt','$date','$time','$sales','$empId','$shift','$bill_no','$chair','$unitType','$ser_tax','$vat','$service','$vat_tax','$totlAmtfi','0',0)");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        echo json_encode($response);
    }

}else{

}
?>