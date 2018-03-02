<?php
 include('config.php');
 
    // include db connect class
    require_once __DIR__ . '/Dp_connect.php';

    // connecting to db
    $db = new DB_CONNECT();
	
	$items = array();
	
	if (isset($_GET['table_no'])) {
     $bill_no = $_GET['table_no'];
	
	
 
 $resultStatus = mysqli_query($con,"SELECT c.status FROM order_bill AS c LEFT JOIN bill_item AS m ON c.table_no = m.table_no where m.table_no ='$bill_no' AND c.status = 0") or die(mysqli_error());
	if (mysqli_num_rows($resultStatus) > 0) {
		$items["success"] = 1;
            $items["message"] = "Successfull updated";
			
			
			
			
			$resultOne = mysqli_query($con,"SELECT *FROM  order_bill WHERE status=0 AND table_no = '$bill_no'");
 
// check for empty result
         if (mysqli_num_rows($resultOne) > 0) {

    $items["products"] = array();
 
    if ($row = mysqli_fetch_array($resultOne)) {
        // temp user array
        $productOne = array();
        $productOne["bill_no"] = $row["bill_no"];
		$productOne["totalAmt"] = $row["amt"];
        // push single product into final itemsAll array
        array_push($items["products"], $productOne);
    }
	
	
            // echo no users JSON
            echo json_encode($items);
    } 
	
	}else {
		$items["success"] = 0;
            $items["message"] = "Successfull updated";
            // echo no users JSON
            echo json_encode($items);
	}
	
	
	} else if (isset($_GET['billsNo'])  && (isset($_GET['totamAmt']) ) ) {
	
		$billNo = $_GET['billsNo'];
		$totalAmt = $_GET['totamAmt'];
		 $results = mysqli_query($con,"UPDATE order_bill SET amt = '$totalAmt' where bill_no='$billNo'");
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