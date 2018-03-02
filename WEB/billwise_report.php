<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';
require_once __DIR__ . '/pdf/fpdf.php';

$db = new DB_CONNECT();



$response = array();
if((isset($_GET['categories'])) && (isset($_GET['date'])) && (isset($_GET['empId']))  && (isset($_GET['pdf']))){
    $cat =$_GET['categories'];
    $date1 = $_GET['date'];
    $emp_id = $_GET['empId'];
    $pdf = $_GET['pdf'];





    if($cat == "Restaurant"){
        //select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,bs.unit_type,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from past_bill_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id where (bs.date BETWEEN '2017-10-02' AND '2017-10-03') and ic.itm_id=---All--- and bs.shift=2 GROUP BY bs.itm_code order by CONCAT(ic.item_cat,bs.item)

        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '$date1' AND '$date1') OR date='$date1') ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );

        if($pdf == 0){
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Restarunt";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];


                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{


            $pdf = new FPDF();
            $pdf->AddPage();


            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');
            $pdf->Cell(27,12,"Mode",1,0,'C');
            $pdf->Cell(27,12,"Table",1,0,'C');
            $pdf->Cell(27,12,"Chair",1,0,'C');
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Restarunt",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $pdf->Cell(27,12, $rows["mode"],1,0,'C');
                    $pdf->Cell(27,12,  $rows["tables"],1,0,'C');
                    $pdf->Cell(27,12, $rows["chair"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];
                    /*$product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Restarunt";
                    $product["amt"] = $rows["amt"];

                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];*/


                   // array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

               // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }





    }else if($cat == "Takeaway"){

        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair  FROM takeaway WHERE ((date BETWEEN '$date1' AND '$date1') OR date='$date1') ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );

        if($pdf == 0){
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "TakeAway";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];


                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');
            $pdf->Cell(27,12,"Mode",1,0,'C');
            $pdf->Cell(27,12,"Table",1,0,'C');
            $pdf->Cell(27,12,"Chair",1,0,'C');
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"TakeAway",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $pdf->Cell(27,12, $rows["mode"],1,0,'C');
                    $pdf->Cell(27,12,  $rows["tables"],1,0,'C');
                    $pdf->Cell(27,12, $rows["chair"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }

                $items["TotalAmt"] = $totalAmt;

                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }


        // check for empty result


    }else if($cat == "Doordelivery"){

        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair FROM door_del WHERE  ((date BETWEEN '$date1' AND '$date1') OR date='$date1' ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );
        if($pdf == 0){
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Door Delivery";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];


                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');
            $pdf->Cell(27,12,"Mode",1,0,'C');
            $pdf->Cell(27,12,"Table",1,0,'C');
            $pdf->Cell(27,12,"Chair",1,0,'C');
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Door delivery",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $pdf->Cell(27,12, $rows["mode"],1,0,'C');
                    $pdf->Cell(27,12,  $rows["tables"],1,0,'C');
                    $pdf->Cell(27,12, $rows["chair"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }

                $items["TotalAmt"] = $totalAmt;


                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }



        // check for empty result


    }else if ($cat == "FoodPanda"){


        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair  FROM foodpanda WHERE ((date BETWEEN '$date1' AND '$date1') OR date='$date1') ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );

        if($pdf == 0){
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Food Panda";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];


                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');
            $pdf->Cell(27,12,"Mode",1,0,'C');
            $pdf->Cell(27,12,"Table",1,0,'C');
            $pdf->Cell(27,12,"Chair",1,0,'C');
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Food Panda",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $pdf->Cell(27,12, $rows["mode"],1,0,'C');
                    $pdf->Cell(27,12,  $rows["tables"],1,0,'C');
                    $pdf->Cell(27,12, $rows["chair"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }


                $items["TotalAmt"] = $totalAmt;


                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }





    }else if($cat == "Sweet"){

        $itemWiseQueryFour ="select date,bill_no,sub_tot from bill where ((date BETWEEN '$date1' AND '$date1') or date='$date1')";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );

        if($pdf == 0){
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Sweet";
                    $product["amt"] = $rows["sub_tot"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];



                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');

            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Sweet",1,0,'C');
                    $pdf->Cell(27,12, $rows["sub_tot"],1,0,'C');

                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }


                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }






    }else if($cat == "Parcel"){

        $itemWiseQueryFour ="select date,bill_no,amt from parcel where and ((date BETWEEN '$date1' AND '$date1') or date='$date1') ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );



        if($pdf == 0){
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Parsel";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];



                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{
            $pdf = new FPDF();
            $pdf->AddPage();


            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');

            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Parsel",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }


                $items["TotalAmt"] = $totalAmt;

                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }


        }




    }else if($cat == "Room"){
        $itemWiseQueryFour ="select date,bill_no,amt from room where  and ((date BETWEEN '$date1' AND '$date1') or date='$date1') ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );

        if($pdf == 0){
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Room";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];


                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }else{
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Room",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }


                $items["TotalAmt"] = $totalAmt;

                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }







    }else if($cat == "Party"){
        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair  FROM foodpanda WHERE ((date BETWEEN '$date1' AND '$date1') OR date='$date1') ";

        if(!empty($emp_id)){
            $itemWiseQueryFour = $itemWiseQueryFour .' '." and sales_id='$emp_id'";
        }



        $resultThree = mysqli_query($con,  $itemWiseQueryFour );


        if($pdf == 0){
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Party";
                    $product["amt"] = $rows["amt"];
                    $totalAmt = $totalAmt + (int)$rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];


                    array_push($items["report"], $product);
                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }

        }else{
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(27,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Bill no",1,0,'C');
            $pdf->Cell(27,12,"Type",1,0,'C');
            $pdf->Cell(27,12, "Amount",1,0,'C');
            $pdf->Cell(27,12,"Mode",1,0,'C');
            $pdf->Cell(27,12,"Table",1,0,'C');
            $pdf->Cell(27,12,"Chair",1,0,'C');
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty=0;
                $totalAmt =0;
                while ($rows = mysqli_fetch_array($resultThree)) {

                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(27,12, $rows["date"],1,0,'C');
                    $pdf->Cell(27,12, $rows["bill_no"],1,0,'C');
                    $pdf->Cell(27,12,"Party",1,0,'C');
                    $pdf->Cell(27,12, $rows["amt"],1,0,'C');
                    $pdf->Cell(27,12, $rows["mode"],1,0,'C');
                    $pdf->Cell(27,12,  $rows["tables"],1,0,'C');
                    $pdf->Cell(27,12, $rows["chair"],1,0,'C');
                    $totalAmt = $totalAmt + (int)$rows["amt"];

                }

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                $pdf->Ln();
                $pdf->Cell(40,10,"TOTAL QTY      :",0,0,'C');
                $pdf->Cell(40,10,$totalQty,0,0,'C');
                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL AMT      :",0,0,'C');
                $pdf->Cell(40,10,  $totalAmt,0,0,'C');

                $pdf->Output();

                // echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        }




    }


}else {
    $items["statusCode"] = 203;
    $items["message"] = "requirement data missing ";

    echo json_encode($items);
}









/*
if((isset($_GET['categories'])) && (isset($_GET['date'])) && (isset($_GET['empId']))){

    $cat =$_GET['categories'];
    $date1 = $_GET['date'];
    $emp_id = $_GET['empId'];

    if($cat == 1){

        if(!empty($emp_id)){
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE sales_id='$emp_id' AND ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }else{
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }

        if (!empty($result)) {
            // check for empty result
            if (mysqli_num_rows($result) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                while ($rows = mysqli_fetch_array($result)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Restarunt";
                    $product["amt"] = $rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];
                    array_push($items["report"], $product);
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

    }else if($cat == 2){

        if(!empty($emp_id)){
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair FROM door_del WHERE e_id='$emp_id' AND ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }else{
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair FROM door_del WHERE  ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }



        if (!empty($result)) {
            // check for empty result
            if (mysqli_num_rows($result) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                while ($rows = mysqli_fetch_array($result)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Door Delivery";
                    $product["amt"] = $rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];
                    array_push($items["report"], $product);
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
    }else if($cat == 3){

        if(!empty($emp_id)){
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair  FROM takeaway WHERE e_id='$emp_id' AND ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }else{
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair  FROM takeaway WHERE ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }



        if (!empty($result)) {
            // check for empty result
            if (mysqli_num_rows($result) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                while ($rows = mysqli_fetch_array($result)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "TakeAway";
                    $product["amt"] = $rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];
                    array_push($items["report"], $product);
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
    }else if($cat == 4){
        if(!empty($emp_id)){
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair  FROM foodpanda WHERE e_id='$emp_id' AND ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }else{
            $result = mysqli_query($con, "SELECT date,bill_no,amt,mode,tables,chair  FROM foodpanda WHERE ((date BETWEEN '$date1' AND '$date1') OR date='$date1')");
        }



        if (!empty($result)) {
            // check for empty result
            if (mysqli_num_rows($result) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                while ($rows = mysqli_fetch_array($result)) {

                    $product = array();

                    $product["date"] = $rows["date"];
                    $product["bill_no"] = $rows["bill_no"];
                    $product["type"] = "Restarunt";
                    $product["amt"] = $rows["amt"];
                    $product["mode"] = $rows["mode"];
                    $product["tables"] = $rows["tables"];
                    $product["chair"] = $rows["chair"];
                    array_push($items["report"], $product);
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


}*/



?>