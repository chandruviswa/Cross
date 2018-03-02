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
    $result = mysqli_query($con,"SELECT * FROM  item_master where itm_cat=$categories");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
			
			 $items["statusCode"] = 201;
			$items["message"] = "Item list successfully retrived";
 
          $items["items"] = array();
          while ($rows = mysqli_fetch_array($result)){
 
            $product = array();
            $product["itm_code"] = $rows["itm_code"];
            $product["item"] = $rows["item"];
			$product["unit_price"] = $rows["unit_price"];
			$product["itm_cat"] = $rows["itm_cat"];
			$product["quantity"] = $rows["quantity"];
			
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
    } else {
        // no product found
        $items["statusCode"] = 203;
        $items["message"] = "No item found";
 
        // echo no users JSON
        echo json_encode($items);
    }
} else {
	
	// get all products from products table
$result = mysqli_query($con,"SELECT *FROM item_master") or die(mysqli_error());
 
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
        $product["itm_code"] = $row["itm_code"];
        $product["item"] = $row["item"];
	    $product["unit_price"] = $row["unit_price"];
		$product["itm_cat"] = $row["itm_cat"];
		$product["quantity"] = $row["quantity"];
 
        // push single product into final itemsAll array
        array_push($itemsAll["products"], $product);
    }
    // success
    
 
    // echoing JSON response
    echo json_encode($itemsAll);
} else {
    // no products found
    $itemsAll["statusCode"] = 0;
    $itemsAll["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($itemsAll);
}
   
}

?>