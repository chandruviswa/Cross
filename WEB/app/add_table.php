<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';

$db = new DB_CONNECT();

$response = array();

$result = mysqli_query($con, "SELECT distinct tname FROM `past_bill_table`");

if (!empty($result)) {
    // check for empty result
    if (mysqli_num_rows($result) > 0) {
        $items["statusCode"] = 201;
        $items["message"] = "Item cat list successfully retrived";
        $items["tables"] = array();
        while ($rows = mysqli_fetch_array($result)) {
            $tableno = $rows["tname"];

            $resultOne = mysqli_query($con, "SELECT * FROM `past_bill_table` WHERE tname = '$tableno'");
            if (mysqli_num_rows($resultOne) > 0) {
                $tablenos["tableNo"] =$tableno ;
                $tablenos["chair"] = array();
                $chairno = array();
                while ($row = mysqli_fetch_array($resultOne)) {
                    $chairno["chair"] = $row["chair"];
                    $chairno["isNew"] = 0;

                    array_push($tablenos["chair"],$chairno);
                }
                //array_push($tablenos[$tableno], $chairno);
            }
            array_push($items["tables"], $tablenos);
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

?>