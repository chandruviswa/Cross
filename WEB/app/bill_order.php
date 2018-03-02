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
 date_default_timezone_set("Asia/Kolkata");
// check for required fields
//if (isset( $_POST['bill_no']) && isset($_POST['itm_code']) && isset($_POST['item']) && isset($_POST['amount']) && isset($_POST['qty'])) {
 if (isset($data_back)) {
    $bill_no = $data_back->{"bill_no"};
    $totalAmt =  $data_back->{"totalAmt"};
	$covers =  $data_back->{"covers"};
	$waiterName =  $data_back->{"waiterName"};
    $date =  date("Y-m-d");
	 $time =  date("H:i:s");
	 $status =$data_back->{"status"};
	  $kitchn =$data_back->{"kitchen_note"};
	 
	 
	 
	 
	 
	 
 
    // include db connect class
    require_once __DIR__ . '/Dp_connect.php';

    // connecting to db
    $db = new DB_CONNECT();
 
 
 //INSERT INTO `order_bill` (`id`, `bill_no`, `amt`, `date`, `time`) VALUES (NULL, '6', '45', '2017-08-16', '05:26:36.797977');
    // mysql inserting a new row
    $result = mysqli_query($con,"INSERT INTO  order_bill (table_no, amt, date,time,covers,waiterName,kitchen_note,status) VALUES('$bill_no ', '$totalAmt', '$date','$time','$covers','$waiterName','$kitchn','$status')");
 
    // check if row inserted or not
    if ($result) {
		
		$response["success"] = 1;
        $response["message"] = "table successfully created.";
		
		
        // successfully inserted into database
	 
		$resultOne = mysqli_query($con,"SELECT *FROM  order_bill WHERE status=0 AND table_no = '$bill_no'");
 
// check for empty result
         if (mysqli_num_rows($resultOne) > 0) {

	
	/* $itemsAll["statusCode"] = 201;
	$itemsAll["message"] = "Items list successfully retrived"; */
    // looping through all results
    // products node
    $response["products"] = array();
 
    if ($row = mysqli_fetch_array($resultOne)) {
        // temp user array
        $productOne = array();
        $productOne["bill_no"] = $row["bill_no"];
        // push single product into final itemsAll array
        array_push($response["products"], $productOne);
    }
        // echoing JSON response
		
		
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
 }
 
 }/* else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}  */  else{
	
		// get all products from products table
$result = mysqli_query($con,"SELECT *FROM  order_bill WHERE status=0") or die(mysqli_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
	
	$itemsAll["statusCode"] = 201;
	$itemsAll["message"] = "Items list successfully retrived";
    // looping through all results
    // products node
    $itemsAll["products"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["bill_no"] = $row["table_no"];
        $product["amt"] = $row["amt"];
		 $product["date"] = $row["date"];
		  $product["time"] = $row["time"];
		   $product["covers"] = $row["covers"];
		    $product["waiterName"] = $row["waiterName"];
			
		
	   
 
        // push single product into final itemsAll array
        array_push($itemsAll["products"], $product);
    }
    // success
    
 
    // echoing JSON response
    echo json_encode($itemsAll);
} else {
    // no products found
    $itemsAll["statusCode"] = 0;
    $itemsAll["message"] = "No products found ch";
 
    // echo no users JSON
    echo json_encode($itemsAll);

   
}
} 



?>