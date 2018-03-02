<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';

$db = new DB_CONNECT();

$response = array();

//$result = mysqli_query($con, "select * from add_employee where designation='1' and branch=(select branch from add_employee where eid='34')");

if(isset($_GET['supplier'])){
    $supllierId =  $_GET['supplier'];

        $result = mysqli_query($con, "select sup_name,sup_code  from add_supplier ");

    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
            $items["statusCode"] = 201;
            $items["message"] = "Item cat list successfully retrived";
            $items["employee"] = array();
            while ($rows = mysqli_fetch_array($result)) {

                $product = array();

                $product["id"] = $rows["sup_code"];
                $product["name"] = $rows["sup_name"];
                array_push($items["employee"], $product);
            }

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

}else{

$result = mysqli_query($con, "select * from add_employee ");

if (!empty($result)) {
    // check for empty result
    if (mysqli_num_rows($result) > 0) {
        $items["statusCode"] = 201;
        $items["message"] = "Item cat list successfully retrived";
        $items["employee"] = array();
        while ($rows = mysqli_fetch_array($result)) {

            $product = array();

            $product["id"] = $rows["eid"];
            $product["name"] = $rows["name"];
            array_push($items["employee"], $product);
        }

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

?>