<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';
require_once __DIR__ . '/pdf/fpdf.php';

$db = new DB_CONNECT();



$response = array();





if( (isset($_GET['start_date'])) && (isset($_GET['end_date']))  && (isset($_GET['categore']))  && (isset($_GET['pdf']))){

    $total_purchase = 0;
    $total_cashout = 0;
    $total_in = 0;
    $total_out = 0;

    $date1 = $_GET['start_date'];
    $pdfTag = $_GET['pdf'];
    $date2 = $_GET['end_date'];
    $categore = $_GET['categore'];

    $items["statusCode"] = 201;
    $items["message"] = "Item cat list successfully retrived";




    $queryOne ="SELECT sum(amt) from room where date<'$date1'  ";
    if($categore == "Hotel"){
        $queryOne =$queryOne." and hotel='$categore'"."' limit 0,1";
    }else{
        $queryOne =$queryOne." and ac_name='$categore'". "' limit 0,1";
    }
    $stOne = mysqli_query($con, $queryOne);
    if (mysqli_num_rows($stOne) > 0) {

        while ($rowsOne=mysqli_fetch_array($stOne)){
            $total_purchase= $rowsOne["sum(amt)"];


        }
    }



    $queryTwo ="SELECT sum(amt) from room_reciept where  date<'$date1' ";
    if($categore == "Hotel"){
        $queryTwo =$queryTwo." and hotel='$categore'"."' limit 0,1";
    }else{
        $queryTwo =$queryTwo." and ac_name='$categore'". "' limit 0,1";
    }

    $stOne = mysqli_query($con, $queryTwo);
    if (mysqli_num_rows($stOne) > 0) {

        while ($rowsthree=mysqli_fetch_array($stOne)){
            $total_cashout= $rowsthree["sum(amt)"];


        }
    }
    $open = (int)$total_purchase -(int)$total_cashout;

    if ($open < 0)
    {
        $items["openingBal1"] = abs($open);
        $items["openingBal2"] = 0;
    }
    else
    {
        $items["openingBal2"] = abs($open);
        $items["openingBal1"] = 0;
    }


    if ($categore == "Hotel")
    {
        $q2 = "(select 'Debit' as type,FORMAT(r.bill_no,2),DATE_FORMAT(r.date,'%d-%m-%Y'),r.amt,r.room_no,a.name from room r left join add_employee a on a.eid=r.sales_id WHERE ((r.date BETWEEN '$date1' AND '$date2') or r.date='$date2') and r.hotel='$categore') union all(select 'Credit' as type,'0' as bill_no,DATE_FORMAT(date,'%d-%m-%Y'),amt,room_no,'0' as sales_id from room_reciept WHERE ((date BETWEEN '$date1' AND '$date2') or date='$date2') and hotel='$categore')";
    }
    else
    {
        $q2 = "(select 'Debit' as type,FORMAT(r.bill_no,0),DATE_FORMAT(r.date,'%d-%m-%Y'),r.amt,r.room_no,a.name from room r left join add_employee a on a.eid=r.sales_id WHERE ((r.date BETWEEN '$date1' AND '$date2') or r.date='$date2') and r.ac_name='$categore') union all(select 'Credit' as type,'0' as bill_no,DATE_FORMAT(date,'%d-%m-%Y'),amt,room_no,'0' as sales_id from room_reciept WHERE ((date BETWEEN '$date1' AND '$date2') or date='$date2') and ac_name='$categore')";
    }

    $stThree = mysqli_query($con, $q2);

    if($pdfTag == 0)
    {
        if (mysqli_num_rows($stThree) > 0) {

            $items["report"] = array();
            $bal =0;
            $openBal = 0;
            $closingBal = 0;
            $debit = 0;
            $credit = 0;
            while ($rowsthree=mysqli_fetch_array($stThree)){

                $product = array();
                if ($rowsthree["type"] == "Debit")
                {
                    $bal = $bal +  $rowsthree["amt"];
                    $debit = $debit +  $rowsthree["amt"];

                    $product["type"] = $rowsthree["type"];
                    $product["name"] = $rowsthree["name"];
                    $product["bill_no"] = $rowsthree["FORMAT(r.bill_no,0)"];
                    $product["date"] = $rowsthree["DATE_FORMAT(r.date,'%d-%m-%Y')"];
                    $product["room_no"] =$rowsthree["room_no"];
                    $product["sales"] = "room";
                    $product["receipt"] = "0";
                    $product["balance"] = $bal;

                    if ($bal < 0)
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal1"] = abs($bal).ToString();
                    }
                    else
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal2"] = abs($bal).ToString();
                    }


                }else{
                    $bal = $bal -  $rowsthree["amt"];
                    $credit =  $credit +  $rowsthree["amt"];
                    $product["type"] = $rowsthree["type"];
                    $product["name"] = $rowsthree["name"];
                    $product["bill_no"] = $rowsthree["FORMAT(r.bill_no,0)"];
                    $product["date"] = $rowsthree["DATE_FORMAT(r.date,'%d-%m-%Y')"];
                    $product["room_no"] =$rowsthree["room_no"];
                    $product["sales"] = "room";
                    $product["receipt"] = "0";
                    $product["balance"] = $bal;
                    if ($bal < 0)
                    {
                       $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal1"] = abs($bal).ToString();
                    }
                    else
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal2"] = abs($bal).ToString();
                    }
                }




                array_push($items["report"], $product);

            }
            $items["total1"] =$debit;
            $items["total2"] = $credit;






            echo json_encode($items);

        }else{
            $items["statusCode"] = 202;
            $items["message"] = "No Restarunt item found";

            // echo no users JSON
            echo json_encode($items);
        }

    }else {

        $pdf = new FPDF();
        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(27, 12, "Type", 1, 0, 'C');
        $pdf->Cell(45, 12, "Waiter", 1, 0, 'C');
        $pdf->Cell(27, 12, "Bill no", 1, 0, 'C');
        $pdf->Cell(27, 12, "Date", 1, 0, 'C');
        $pdf->Cell(27, 12, "Room_no", 1, 0, 'C');
        $pdf->Cell(27, 12, "Sales", 1, 0, 'C');
        $pdf->Cell(27, 12, "Receipt", 1, 0, 'C');
        $pdf->Cell(27, 12, "Balance", 1, 0, 'C');
        if (mysqli_num_rows($stThree) > 0) {
            $items["report"] = array();
            $bal =0;
            $openBal = 0;
            $closingBal = 0;
            $debit = 0;
            $credit = 0;
            while ($rowsthree = mysqli_fetch_array($stThree)) {

                $product = array();
                if ($rowsthree["type"] == "Debit")
                {
                    $bal = $bal +  $rowsthree["amt"];
                    $debit = $debit +  $rowsthree["amt"];
                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();
                    $pdf->Cell(18,12,$rowsthree["type"],1,0,'C');
                    $pdf->Cell(18,12,$rowsthree["name"],1,0,'C');
                    $pdf->Cell(24,12, $rowsthree["FORMAT(r.bill_no,0)"],1,0,'C');
                    $pdf->Cell(27,12, $rowsthree["DATE_FORMAT(r.date,'%d-%m-%Y')"],1,0,'C');
                    $pdf->Cell(52,12,$rowsthree["room_no"],1,0,'C');
                    $pdf->Cell(20,12,"room",1,0,'C');
                    $pdf->Cell(20,12,  "0",1,0,'C');
                    $pdf->Cell(20,12,  $bal,1,0,'C');



                    if ($bal < 0)
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal1"] = abs($bal).ToString();
                    }
                    else
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal2"] = abs($bal).ToString();
                    }


                }else{
                    $bal = $bal -  $rowsthree["amt"];
                    $credit =  $credit +  $rowsthree["amt"];

                    $pdf->Cell(18,12,$rowsthree["type"],1,0,'C');
                    $pdf->Cell(18,12,$rowsthree["name"],1,0,'C');
                    $pdf->Cell(24,12, $rowsthree["FORMAT(r.bill_no,0)"],1,0,'C');
                    $pdf->Cell(27,12, $rowsthree["DATE_FORMAT(r.date,'%d-%m-%Y')"],1,0,'C');
                    $pdf->Cell(52,12,$rowsthree["room_no"],1,0,'C');
                    $pdf->Cell(20,12,"room",1,0,'C');
                    $pdf->Cell(20,12,  "0",1,0,'C');
                    $pdf->Cell(20,12,  $bal,1,0,'C');;
                    if ($bal < 0)
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal1"] = abs($bal).ToString();
                    }
                    else
                    {
                        $items["closingBal1"] =$items["closingBal2"] = "0";
                        $items["closingBal2"] = abs($bal).ToString();
                    }
                }


            }

            $queryOne ="SELECT sum(amt) from room where date<'$date1'  ";
            if($categore == "Hotel"){
                $queryOne =$queryOne." and hotel='$categore'"."' limit 0,1";
            }else{
                $queryOne =$queryOne." and ac_name='$categore'". "' limit 0,1";
            }

            $stOne = mysqli_query($con, $queryOne);
            if (mysqli_num_rows($stOne) > 0) {

                while ($rowsOne = mysqli_fetch_array($stOne)) {
                    $total_purchase = $rowsOne["sum(amt)"];


                }
            }


            $queryTwo ="SELECT sum(amt) from room_reciept where  date<'$date1' ";
            if($categore == "Hotel"){
                $queryTwo =$queryTwo." and hotel='$categore'"."' limit 0,1";
            }else{
                $queryTwo =$queryTwo." and ac_name='$categore'". "' limit 0,1";
            }
            $stOne = mysqli_query($con, $queryTwo);
            if (mysqli_num_rows($stOne) > 0) {

                while ($rowsthree = mysqli_fetch_array($stOne)) {
                    $total_cashout = $rowsthree["sum(amt)"];


                }
            }
            $open = (int)$total_purchase - (int)$total_cashout;

            if ($open < 0) {
                $pdf->Ln();
                $pdf->Cell(35, 12, "Opening Balance", 0, 0, 'C');
                $pdf->Cell(27, 12, abs($open), 1, 0, 'C');
                $pdf->Cell(27, 12, "0", 1, 0, 'C');
            } else {
                $pdf->Ln();
                $pdf->Cell(35, 12, "Opening Balance", 0, 0, 'C');
                $pdf->Cell(27, 12, "0", 1, 0, 'C');
                $pdf->Cell(27, 12, abs($open), 1, 0, 'C');

            }
            if ($bal < 0) {
                $pdf->Ln();
                $pdf->Cell(35, 12, "Closing Balance", 0, 0, 'C');
                $pdf->Cell(27, 12, "0", 1, 0, 'C');
                $pdf->Cell(27, 12, abs($bal), 1, 0, 'C');
            } else {
                $pdf->Ln();
                $pdf->Cell(35, 12, "Closing Balance", 0, 0, 'C');
                $pdf->Cell(27, 12, "0", 1, 0, 'C');
                $pdf->Cell(27, 12, abs($bal), 1, 0, 'C');
            }
            $pdf->Ln();
            $pdf->Cell(35, 12, "Total  ", 0, 0, 'C');
            $pdf->Cell(27, 12, $debit, 1, 0, 'C');
            $pdf->Cell(27, 12, $credit, 1, 0, 'C');

            $pdf->Output();

        }
    }








}

?>