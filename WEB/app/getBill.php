<?php
include('config.php');

/* $con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,'student') or die(mysqli_error($con));  
	
$sql = "SELECT * FROM table1";
$result = mysqli_query ($con,$sql);
$json_array =array();

while($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}

echo json_encode ($json_array); */


$items = array();
   
    // include db connect class
    require_once __DIR__ . '/Dp_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

if (isset($_GET['categories'])) {
     $categories = $_GET['categories'];
   
 
    // get a product from products table
    $result = mysqli_query($con,"SELECT c.bill_no,c.table_no,c.amt,c.status,m.item,m.amount,m.qty,m.itm_code FROM order_bill AS c LEFT JOIN bill_item AS m ON c.table_no = m.table_no where m.table_no ='$categories' AND c.status = 0 AND m.status = 0");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
			
			 $items["statusCode"] = 201;
			$items["message"] = "Item cat list successfully retrived";
 
          $items["items"] = array();
          while ($rows = mysqli_fetch_array($result)){
 
            $product = array();
			
			$product["bill_no"] = $rows["table_no"];
			$product["amt"] = $rows["amt"];
            $product["item"] = $rows["item"];
			$product["amount"] = $rows["amount"];
			$product["qty"] = $rows["qty"];
			$product["itm_code"] = $rows["itm_code"];
			$product["tableId"] = $rows["bill_no"];
		
			
			
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
}else if (isset($_GET['tableId'])  && (isset($_GET['tables']) ) ) {
	
		$tableId = $_GET['tableId'];
		$tableno = $_GET['tables'];
		 $results = mysqli_query($con,"UPDATE order_bill SET status = '1' where bill_no='$tableId'");
           if (!empty($results)) {
		$resut = mysqli_query($con,"SELECT m.id FROM order_bill AS c LEFT JOIN bill_item AS m ON c.table_no = m.table_no where m.table_no = '$tableno' AND c.status = 1 AND m.status = 0");
             if (!empty($resut)) {
		     if (mysqli_num_rows($resut) > 0) {
				 
  
              while ($rows = mysqli_fetch_array($resut)){
			    $productId = $rows["id"];
			    $resultsItem = mysqli_query($con,"UPDATE bill_item SET status = '1' where id='$productId'");
		
               if (!empty($resultsItem)) {
			
			
	       }
		  }
		  
		  $items["statusCode"] = 201;
            $items["message"] = "Successfully updated";
            // echo no users JSON
            echo json_encode($items);	
	}
 }
	}

}

?>