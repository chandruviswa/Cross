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
 if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
 

if (isset($_GET['categories'])) {
    $categories = $_GET['categories'];

    if ($categories == 0) {
        $result = mysqli_query($con, "SELECT *FROM  item_master LIMIT 299,421") or die(mysqli_error());

// check for empty result
        if (mysqli_num_rows($result) > 0) {

            $itemsAll["statusCode"] = 201;
            $itemsAll["message"] = "Items list successfully retrived";
            // looping through all results
            // products node
            $itemsAll["items"] = array();

            while ($row = mysqli_fetch_array($result)) {
                // temp user array
                $product = array();
                $product["itm_code"] = $row["itm_code"];
                $product["item_cat"] =$row["itm_cat"] ;
                $product["item"] = $row["item"];
                $product["unit_price"] = $row["unit_price"];
                $product["tax_cat"] = $row["tax_cat"];
                $product["vat"] = $row["vat"];
                $product["quantity"] = 0;


                // push single product into final itemsAll array
                array_push($itemsAll["items"], $product);
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


    } else {


        // get a product from products table
        $result = mysqli_query($con, "SELECT c.itm_id,c.item_cat,m.itm_cat,m.item,m.unit_price,m.itm_code,m.tax_cat,m.vat FROM item_cat AS c LEFT JOIN item_master AS m ON c.itm_id = m.itm_cat where m.itm_cat= $categories");

        if (!empty($result)) {
            // check for empty result
            if (mysqli_num_rows($result) > 0) {

                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";

                $items["items"] = array();
                while ($rows = mysqli_fetch_array($result)) {

                    $product = array();

                    $product["itm_code"] = $rows["itm_code"];
                    $product["item_cat"] = $rows["item_cat"];
                    $product["item"] = $rows["item"];
                    $product["unit_price"] = $rows["unit_price"];
                    $product["tax_cat"] = $rows["tax_cat"];
                    $product["vat"] = $rows["vat"];
                    $product["quantity"] = 0;


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

    }
} else {
    // get all products from products table
    $result = mysqli_query($con, "SELECT *FROM  item_cat") or die(mysqli_error());

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
            $product["itm_id"] = $row["itm_id"];
            $product["item_cat"] = $row["item_cat"];


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