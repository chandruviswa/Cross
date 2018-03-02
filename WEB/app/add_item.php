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
   
    $item =  $data_back->{"item"};
	$amount =  $data_back->{"amount"};
	$day =  $data_back->{"day"};
     $itemCode =  $data_back->{"itemCode"};
	 
 
    // include db connect class
    require_once __DIR__ . '/Dp_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

     if(!empty($itemCode)){
         $result = mysqli_query($con,"UPDATE daily_item SET `item`= '$item',`unit_price`='$amount' WHERE`itm_code` = '$itemCode' AND `days_tag`='$day'");

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


     }else{
         $result = mysqli_query($con,"INSERT INTO `daily_item` (`itm_code`, `item`, `unit_price`, `quantity`, `itm_cat`, `status`,`days_tag`) VALUES (NULL, '$item', '$amount', '0', '0', '0',$day)");

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
     }




     
    }else if(isset($_GET['categories'])){
		 $categories = $_GET['categories'];
	
		 $result = mysqli_query($con,"SELECT * FROM `daily_item` WHERE `days_tag`=$categories");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
			
			 $items["statusCode"] = 201;
			$items["message"] = "Item cat list successfully retrived";
 
          $items["items"] = array();
          while ($rows = mysqli_fetch_array($result)){
 
            $product = array();
			$product["itm_code"] = $rows["itm_code"];
			$product["item"] = $rows["item"];
			$product["unit_price"] = $rows["unit_price"];
			$product["quantity"] = $rows["quantity"];
			$product["day"] = $rows["days_tag"];
		
		array_push($items["items"], $product);
		  }
            // success
           
 
            // user node
           
 
            //array_push($items["users"], $product);
 
            // echoing JSON response
            echo json_encode($items);
        } else {
            // no product found
            $items["statusCode"] = 202;
            $items["message"] = "No item found";
 
            // echo no users JSON
            echo json_encode($items);
        }
    } 		else {
        // no product found
        $items["statusCode"] = 203;
        $items["message"] = "No item found";
 
        // echo no users JSON
        echo json_encode($items);
    }

	}else if( (isset($_GET['delete'])) && (isset($_GET['days']) )){
     $delete = $_GET['delete'];
     $days = $_GET['days'];

     $result = mysqli_query($con,"DELETE  FROM `daily_item` WHERE `days_tag`= '$days' AND `item`='$delete'");

     if (!empty($result)) {
             $items["statusCode"] = 201;
             $items["message"] = "Item cat list successfully retrived";

             echo json_encode($items);
         } else {
             // no product found
             $items["statusCode"] = 202;
             $items["message"] = "No item found";

             // echo no users JSON
             echo json_encode($items);
         }
 }
	else{
		
		// Tuesday, Wednesday, Thursday, Friday, and Saturday. Sunday 
		
		$days=date("l");
		if($days == "Monday"){
		$daystag = 1;	
		}else if ($days == "Tuesday") {
			$daystag = 2;		
		}else if ($days == "Wednesday") {
			$daystag = 3;		
		}else if ($days == "Thursday") {
			$daystag = 4;		
		}else if ($days == "Friday") {
			$daystag = 5;		
		}else if ($days == "Saturday") {
			$daystag = 6;		
		}else if ($days == "Sunday") {
			$daystag = 7;		
		}
		
		 $result = mysqli_query($con,"SELECT * FROM `daily_item` WHERE `days_tag`=$daystag");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
			
			 $items["statusCode"] = 201;
			$items["message"] = "Item cat list successfully retrived";
 
          $items["items"] = array();
          while ($rows = mysqli_fetch_array($result)){
 
            $product = array();
			$product["itm_code"] = $rows["itm_code"];
			$product["item"] = $rows["item"];
			$product["unit_price"] = $rows["unit_price"];
			$product["quantity"] = $rows["quantity"];
			$product["day"] = $rows["days_tag"];
		
		array_push($items["items"], $product);
		  }
            // success
           
 
            // user node
           
 
            //array_push($items["users"], $product);
 
            // echoing JSON response
            echo json_encode($items);
        } else {
            // no product found
            $items["statusCode"] = 202;
            $items["message"] = "No item found";
 
            // echo no users JSON
            echo json_encode($items);
        }
    } 		else {
        // no product found
        $items["statusCode"] = 203;
        $items["message"] = "No item found";
 
        // echo no users JSON
        echo json_encode($items);
    }
		
		
	}
?>