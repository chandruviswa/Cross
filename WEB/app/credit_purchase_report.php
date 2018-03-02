<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';
require_once __DIR__ . '/pdf/fpdf.php';

$db = new DB_CONNECT();



$response = array();





if( (isset($_GET['start_date'])) && (isset($_GET['end_date']))  && (isset($_GET['supplier']))  && (isset($_GET['pdf']))){

    $total_purchase = 0;
    $total_cashout = 0;
    $total_in = 0;
    $total_out = 0;

    $date1 = $_GET['start_date'];
    $pdfTag = $_GET['pdf'];
    $date2 = $_GET['end_date'];
    $supplier = $_GET['supplier'];

    $items["statusCode"] = 201;
    $items["message"] = "Item cat list successfully retrived";




    $queryOne ="select sum(amt) from expenses where date<'$date1' and category='Credit Purchase Expenses' and pro='BILL IN' ";
    if(!empty($supplier)){
        $queryOne =$queryOne." and supplier_id='$supplier'";
    }

        $stOne = mysqli_query($con, $queryOne);
    if (mysqli_num_rows($stOne) > 0) {

        while ($rowsOne=mysqli_fetch_array($stOne)){
            $total_purchase= $rowsOne["sum(amt)"];


        }
    }


    $queryTwo ="select sum(amt) from expenses where date<'$date1' and category='Credit Purchase Expenses' and pro='CASH OUT' ";
    if(!empty($supplier)){
        $queryTwo =$queryTwo." and supplier_id='$supplier'";
    }
    $stOne = mysqli_query($con, $queryTwo);
    if (mysqli_num_rows($stOne) > 0) {

        while ($rowsthree=mysqli_fetch_array($stOne)){
            $total_cashout= $rowsthree["sum(amt)"];


        }
    }
    $open = (int)$total_purchase -(int)$total_cashout;

    if ($open > 0)
    {
        $items["openingBal1"] = abs($open);
        $items["openingBal2"] = 0;
    }
    else
    {
        $items["openingBal2"] = abs($open);
        $items["openingBal1"] = 0;
    }


    if (!empty($supplier))
    {
        $q2 = "SELECT DATE_FORMAT(e.date,'%d/%m/%y'),e.supplier_id,if(e.pro='BILL IN',amt,'0')amt1,if(e.pro='CASH OUT',amt,'0')amt2,s.sup_name FROM `expenses` e left join add_supplier s on e.supplier_id=s.sup_code where e.category='Credit Purchase Expenses' and ((e.date BETWEEN '$date1' AND '$date2') or e.date='$date2') and e.supplier_id='$supplier'";
    }
    else
    {
        $q2 = "SELECT DATE_FORMAT(e.date,'%d/%m/%y'),e.supplier_id,if(e.pro='BILL IN',amt,'0')amt1,if(e.pro='CASH OUT',amt,'0')amt2,s.sup_name FROM `expenses` e left join add_supplier s on e.supplier_id=s.sup_code where e.category='Credit Purchase Expenses' and ((e.date BETWEEN '$date1' AND '$date2') or e.date='$date2')";
    }


    $stThree = mysqli_query($con, $q2);

    if($pdfTag == 0)
    {
        if (mysqli_num_rows($stThree) > 0) {

            $items["report"] = array();
            $bal =0;
            $openBal = 0;
            $closingBal = 0;
            while ($rowsthree=mysqli_fetch_array($stThree)){

                $product = array();

                $product["date"] = $rowsthree["DATE_FORMAT(e.date,'%d/%m/%y')"];
                $product["supplier_id"] = $rowsthree["supplier_id"];
                $product["amt1"] =$rowsthree["amt1"];
                $openBal = $openBal+(int)$rowsthree["amt1"];
                $product["amt2"] =$rowsthree["amt2"];
                $closingBal = $closingBal+(int)$rowsthree["amt2"];
                $product["sup_name"] = $rowsthree["sup_name"];
                $bal = $bal +((int)$rowsthree["amt2"] - (int)$rowsthree["amt1"] );
                $product["balance"] =$bal ;

                array_push($items["report"], $product);

            }


            if ($bal < 0)
            {
                $items["closingBal1"] = abs($bal);
                $items["closingBal2"] = "0";
            }
            else
            {
                $items["closingBal2"] = abs($bal);
                $items["closingBal1"] = "0";
            }

            $items["total1"] = $openBal;
            $items["total2"] = $closingBal;


            echo json_encode($items);

        }else{
            $items["closingBal1"] =  $items["openingBal1"] ;
            $items["closingBal2"] = "0";
            $items["statusCode"] = 202;
            $items["message"] = "No Restarunt item found";

            // echo no users JSON
            echo json_encode($items);
        }

    }else {

        $pdf = new FPDF();
        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(27, 12, "Date", 1, 0, 'C');
        $pdf->Cell(45, 12, "Supplier", 1, 0, 'C');
        $pdf->Cell(27, 12, "Bill In", 1, 0, 'C');
        $pdf->Cell(27, 12, "Bill Out", 1, 0, 'C');
        $pdf->Cell(27, 12, "Balance", 1, 0, 'C');


        $queryOne = "select sum(amt) from expenses where date<'$date1' and category='Credit Purchase Expenses' and pro='BILL IN' ";
        if (!empty($supplier)) {
            $queryOne = $queryOne . " and supplier_id='$supplier'";
        }

        $stOne = mysqli_query($con, $queryOne);
        if (mysqli_num_rows($stOne) > 0) {

            while ($rowsOne = mysqli_fetch_array($stOne)) {
                $total_purchase = $rowsOne["sum(amt)"];


            }
        }


        $queryTwo = "select sum(amt) from expenses where date<'$date1' and category='Credit Purchase Expenses' and pro='CASH OUT' ";
        if (!empty($supplier)) {
            $queryTwo = $queryTwo . " and supplier_id='$supplier'";
        }
        $stOne = mysqli_query($con, $queryTwo);
        if (mysqli_num_rows($stOne) > 0) {

            while ($rowsthree = mysqli_fetch_array($stOne)) {
                $total_cashout = $rowsthree["sum(amt)"];


            }
        }
        $open = (int)$total_purchase - (int)$total_cashout;


        if (mysqli_num_rows($stThree) > 0) {
            $bal = 0;
            $openBal = 0;
            $closingBal = 0;
            while ($rowsthree = mysqli_fetch_array($stThree)) {

                $product = array();


                $pdf->SetFont('Arial', '', 12);
                $pdf->Ln();


                $pdf->Cell(27, 12, $rowsthree["DATE_FORMAT(e.date,'%d/%m/%y')"], 1, 0, 'C');
                $pdf->Cell(45, 12, $rowsthree["sup_name"], 1, 0, 'C');
                $pdf->Cell(27, 12, $rowsthree["amt1"], 1, 0, 'C');

                $pdf->Cell(27, 12, $rowsthree["amt2"], 1, 0, 'C');
                $bal = $bal + ((int)$rowsthree["amt2"] - (int)$rowsthree["amt1"]);
                $pdf->Cell(27, 12, $bal, 1, 0, 'C');

                $openBal = $openBal + (int)$rowsthree["amt1"];
                $closingBal = $closingBal + (int)$rowsthree["amt2"];


            }
            if ($open > 0) {
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
            $pdf->Cell(27, 12, $openBal, 1, 0, 'C');
            $pdf->Cell(27, 12, $closingBal, 1, 0, 'C');

            $pdf->Output();

        }else{
            if ($open > 0) {
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

            $pdf->SetFont('Arial', '', 12);
            $pdf->Ln();
            $pdf->Cell(35, 12, "Total  ", 0, 0, 'C');
            $pdf->Cell(27, 12, "0", 1, 0, 'C');
            $pdf->Cell(27, 12, "0", 1, 0, 'C');
            $pdf->Ln();
            $pdf->Cell(35, 12, "Closing Balance", 0, 0, 'C');
            $pdf->Cell(27, 12,  abs($open), 1, 0, 'C');
            $pdf->Cell(27, 12,"0", 1, 0, 'C');

            $pdf->Output();


        }
    }








}

?>