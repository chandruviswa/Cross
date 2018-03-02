<?php
include('config.php');
 
  $post = file_get_contents('php://input');
 

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();

$data_back = json_decode(file_get_contents('php://input'));
 
// check for required fields
//if (isset( $_POST['bill_no']) && isset($_POST['itm_code']) && isset($_POST['item']) && isset($_POST['amount']) && isset($_POST['qty'])) {
 if (isset($data_back)) {
  $bill_no = $data_back->{"bill_no"};
    $itm_code =  $data_back->{"itm_code"};
    $item =  $data_back->{"item"};
	 $amount =  $data_back->{"amount"};
	  $qty = $data_back->{"qty"} ;
	  $prity = $data_back->{"priority"} ;
	  $billId = $data_back->{"billId"} ; 
 
    // include db connect class
    require_once __DIR__ . '/Dp_connect.php';

    // connecting to db
    $db = new DB_CONNECT();
	
	/* $resultStatus = mysqli_query($con,"SELECT c.status FROM order_bill AS c LEFT JOIN bill_item AS m ON c.table_no = m.table_no where m.table_no ='$bill_no' AND c.status = 0") or die(mysqli_error());
	if (mysqli_num_rows($resultStatus) > 0) {
		 $resultsUpdate = mysqli_query($con,"UPDATE bill_item SET itm_code = '$itm_code',item =  '$item',amount = '$amount', qty = '$qty' where table_no = '$bill_no'");
    if (!empty($resultsUpdate)) {
		$items["success"] = 1;
            $items["message"] = "Successfull updated";
            // echo no users JSON
            echo json_encode($items);
	}
		
       
    } else { */
		 // mysql inserting a new row
    $result = mysqli_query($con,"INSERT INTO bill_item (table_no, itm_code, item,amount,qty,priority,status,bill_no) VALUES('$bill_no ', '$itm_code', '$item','$amount','$qty','$prity',0, '$billId ')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
     
     
    }else if(isset($_GET['delete'])){
		 $delete = $_GET['delete'];
	
		 $result = mysqli_query($con,"DELETE FROM `bill_item` WHERE `bill_no`=$delete");
 
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