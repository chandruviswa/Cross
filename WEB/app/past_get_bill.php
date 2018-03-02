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

if ((isset($_GET['categories']))  && (isset($_GET['chair']) ) )  {
    $categories = $_GET['categories'];
    $chair = $_GET['chair'];
    $date =date("Y-m-d");


    // get a product from products table
    $result = mysqli_query($con,"SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='$categories' AND m.chair ='$chair' AND m.date='$date'AND c.date='$date'  AND m.bill_no = 0  AND c.bill_no='0'");

    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {

            $items["statusCode"] = 201;
            $items["message"] = "Item cat list successfully retrived";

            $items["items"] = array();
            while ($rows = mysqli_fetch_array($result)){

                $product = array();

                $product["bill_no"] = $rows["tables"];
                $product["amt"] = $rows["amt"];
                $product["item"] = $rows["item"];
                $product["amount"] = $rows["unit"];
                $product["qty"] = $rows["qty"];
                $product["itm_code"] = $rows["itm_code"];
                $product["tableId"] = $rows["bill_no"];
                $product["sub_tot"] = $rows["sub_tot"];
                $product["ser_tax"] = $rows["ser_tax"];
                $product["vat"] = $rows["vat"];
                $product["sales_id"] = $rows["sales_id"];

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
}else if (isset($_GET['tableId'])  && (isset($_GET['tables']) ) && (isset($_GET['chair']) ) ) {

    $tableId = $_GET['tableId'];
    $tableno = $_GET['tables'];
    $chair = $_GET['chair'];
    $results = mysqli_query($con,"UPDATE past_bill SET status = 'Paid' where bill_no='$tableId' AND tables='$tableno' AND chair='$chair'");
    if (!empty($results)) {
    //$resut = mysqli_query($con, "SELECT m.id FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables = '$tableno' AND m.chair ='$chair' AND c.bill_no = 0 AND m.bill_no = 0");
    //if (!empty($resut)) {
        //if (mysqli_num_rows($resut) > 0) {

           /* while ($rows = mysqli_fetch_array($resut)) {
                $productId = $rows["id"];
                $resultsItem = mysqli_query($con, "UPDATE past_bill_details SET status = '1' where id='$productId'");

                if (!empty($resultsItem)) {

                    $items["statusBillDetails"] = "Success";
                }
            }*/

            $items["statusCode"] = 201;
            $items["message"] = "Successfully updated";
            // echo no users JSON
            echo json_encode($items);
        }
   // }
//}

}

?>