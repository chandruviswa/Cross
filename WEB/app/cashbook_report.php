<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';
require_once __DIR__ . '/pdf/fpdf.php';
require('mc_table.php');

$db = new DB_CONNECT();



$response = array();





if((isset($_GET['categories'])) && (isset($_GET['start_date'])) && (isset($_GET['end_date'])) && (isset($_GET['shift']) )  && (isset($_GET['pdf']) )   ){
    $totamAmt = 0;
    $totamAmtOne = 0;
    $bal = 0;
    $fliter  =$_GET['filter'];
    $pdfTag  =$_GET['pdf'];
    $note  =$_GET['note'];
    $category =$_GET['categories'];
    $date1 = $_GET['start_date'];
    $date2 = $_GET['end_date'];
    $shift = $_GET['shift'];


    $queryOne = "select sum(amt) from expenses where date<'$date2' and pro='CASH OUT'";
    $stOne = mysqli_query($con, $queryOne);
    if (mysqli_num_rows($stOne) > 0) {

        while ($rowsOne = mysqli_fetch_array($stOne)) {
            $total_purchase = $rowsOne["sum(amt)"];


        }
    }

    $queryTwo = "select sum(amt) from expenses where date<'$date2'and pro='CASH IN' ";
    $stTwo = mysqli_query($con, $queryTwo);
    if (mysqli_num_rows($stTwo) > 0) {

        while ($rowsthree = mysqli_fetch_array($stTwo)) {
            $total_cashout = $rowsthree["sum(amt)"];


        }
    }

    $open =   (float)$total_purchase - (float)$total_cashout;
    //echo  $open ;

    if ($open < 0)
    {
        $items["openingBal1"] = $open;
        $items["openingBal2"] = 0;
    }
    else
    {
        $items["openingBal2"] = $open;
        $items["openingBal1"] = 0;
    }



        if ($category == "Canteen")
        {
            $cate= "Canteen Expenses";
            $cate1 = "Canteen Entry Receipt";
        }
        else if ($category== "OwnerBox")
        {
            $cate = "Anand Box Expenses";
            $cate1 = "Anand Box Receipt";
        }
        else if ($category == "Payroll")
        {
            $cate = "Payroll Expenses";
            $cate1 = "Payroll Receipt";
        }
        else if ($category== "CreditPurchase")
        {
            $cate = "Credit Purchase Expenses";
            $cate1 = "Credit Purchase Expenses";
        }


        $itemWiseQueryOne ="select distinct e.id,DATE_FORMAT(e.date,'%d-%m-%Y'),e.category,e.expense,e.descr,if(e.pro='CASH IN',e.amt,'0')recipt,if(e.pro='CASH OUT',e.amt,'0')payment,s.shift_id from expenses e left join shift_details s on (e.emp_id=s.emp_id and s.opening_date=e.date) ";
        $itemWiseQueryOne = $itemWiseQueryOne.''."where (e.date BETWEEN '$date1' AND '$date2')";
        if($category != "All"){
            $itemWiseQueryOne = $itemWiseQueryOne ." and (e.category='$cate' or e.category='$cate1')";
            //q += " and (e.category='" + type + "' or e.category='" + type1 + "')";
        }
        if (!empty($note) && ($note!= "All")){
        $itemWiseQueryOne = $itemWiseQueryOne .' '." and (e.descr='$note')";
        }
        if ($fliter) {
        $itemWiseQueryOne = $itemWiseQueryOne .' '." and e.expense='$fliter'";
        }


        if($shift != "All"){
            if($shift== "Morning"){
                $shift = "1";
            }else{
                $shift = "2";
            }
            $itemWiseQueryOne = $itemWiseQueryOne ."s.shift_id = '2'";
        }

        $itemWiseQueryOne = $itemWiseQueryOne .''."order by e.expense";
       // echo $itemWiseQueryOne;

        $result = mysqli_query($con, $itemWiseQueryOne);

        if($pdfTag == 0){
            if (!empty($result)) {
                // check for empty result
                if (mysqli_num_rows($result) > 0) {
                    $items["statusCode"] = 201;
                    $items["message"] = "Item cat list successfully retrived";
                    $items["report"] = array();


                    while ($rows = mysqli_fetch_array($result)) {



                        if($rows["shift_id"] != null){
                            $product = array();

                            if (!empty($rows["id"]))
                            {
                                $bal = $bal + (int)$rows["recipt"];
                            }
                            if (!empty($rows["payment"]))
                            {
                                $bal = $bal - (int)$rows["payment"];
                            }

                            $product["id"] = $rows["id"];
                            $product["date"] = $rows["DATE_FORMAT(e.date,'%d-%m-%Y')"];
                            $product["category"] = $rows["category"];
                            $product["expense"] =$rows["expense"];
                            $product["descr"] = $rows["descr"];
                            $product["recipt"] = $rows["recipt"];
                            $product["payment"] = $rows["payment"];
                            $product["shift_id"] = $rows["shift_id"];
                            array_push($items["report"], $product);

                            $totamAmt = $totamAmt +(int)$rows["recipt"];
                            $totamAmtOne = $totamAmtOne +(int)$rows["payment"];

                        }



                    }
                  //  echo ($bal);
                    if ($bal < 0)
                    {
                        $items["closingBal1"] = ($bal);
                        $items["closingBal2"] = "0";
                    }
                    else
                    {
                        $items["closingBal2"] = ($bal);
                        $items["closingBal1"] = "0";
                    }

                    $items["total1"] = $totamAmt;
                    $items["total2"] = $totamAmtOne;


                    echo json_encode($items);
                } else {
                    $items["closingBal2"] =  $items["openingBal2"] ;
                    $items["closingBal1"] = "0";
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


            $pdf=new PDF_MC_Table();
            $pdf->AddPage();



            $queryOne = "select sum(amt) from expenses where date<'$date1' and pro='CASH OUT'";
            $stOne = mysqli_query($con, $queryOne);
            if (mysqli_num_rows($stOne) > 0) {

                while ($rowsOne = mysqli_fetch_array($stOne)) {
                    $total_purchase = $rowsOne["sum(amt)"];


                }
            }



            $queryTwo = "select sum(amt) from expenses where date<'$date1'and pro='CASH IN' ";
            $stOne = mysqli_query($con, $queryTwo);
            if (mysqli_num_rows($stOne) > 0) {

                while ($rowsthree = mysqli_fetch_array($stOne)) {
                    $total_cashout = $rowsthree["sum(amt)"];


                }
            }

            $open = (int)$total_purchase - (int)$total_cashout;




            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(18,12,"id",1,0,'C');
            $pdf->Cell(24,12, "Date",1,0,'C');
            $pdf->Cell(27,12, "Expense",1,0,'C');
            $pdf->Cell(52,12,"Notes",1,0,'C');
            $pdf->Cell(20,12, "Receipt",1,0,'C');
            $pdf->Cell(20,12,"Payment",1,0,'C');
            $pdf->Cell(20,12,"Balance",1,0,'C');

            if (mysqli_num_rows($result) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totamAmtOne=0;
                $totamAmt =0;
                $bal = 0;
                $total_cashout = 0;
                $total_purchase= 0;


                $pdf->SetWidths(array(18,24,27,52,20,20,20));
                $pdf->SetFont('Arial','',12);
                $pdf->Ln();

                srand(microtime()*1000000);

                while ($rows = mysqli_fetch_array($result)) {





                    if (!empty($rows["recipt"]))
                    {
                        $bal = $bal + (int)$rows["recipt"];
                    }
                    if (!empty($rows["payment"]))
                    {
                        $bal = $bal - (int)$rows["payment"];
                    }

                    $pdf->Row(array($rows["id"],$rows["DATE_FORMAT(e.date,'%d-%m-%Y')"],$rows["expense"],$rows["descr"],$rows["recipt"],$rows["payment"],$bal));

                   /* $pdf->Cell(18,12, $rows["id"],1,0,'C');
                    $pdf->Cell(24,12, $rows["DATE_FORMAT(e.date,'%d-%m-%Y')"],1,0,'C');
                    $pdf->Cell(27,12,$rows["expense"],1,0,'C');
                    $pdf->MultiCell(52,12, $rows["descr"],1);
                    $pdf->Cell(20,12, $rows["recipt"],1,0,'C');
                    $pdf->Cell(20,12,  $rows["payment"],1,0,'C');
                    $pdf->Cell(20,12,  $bal,1,0,'C');*/
                    $totamAmt = $totamAmt +(int)$rows["recipt"];
                    $totamAmtOne = $totamAmtOne +(int)$rows["payment"];

                }







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
                $pdf->Cell(27, 12, ($bal), 1, 0, 'C');
            } else {
                $pdf->Ln();
                $pdf->Cell(35, 12, "Closing Balance", 0, 0, 'C');
                $pdf->Cell(27, 12, "0", 1, 0, 'C');
                $pdf->Cell(27, 12, ($bal), 1, 0, 'C');
            }
            $pdf->Ln();
            $pdf->Cell(35, 12, "Total  ", 0, 0, 'C');
            $pdf->Cell(27, 12, $totamAmt, 1, 0, 'C');
            $pdf->Cell(27, 12, $totamAmtOne, 1, 0, 'C');
            $pdf->Output();





        }












} else {




    $stThree = mysqli_query($con,"select distinct expense from expenses order by expense");
    if (mysqli_num_rows($stThree) > 0) {

        $items["statusCode"] = 201;
        $items["message"] = "Item cat list successfully retrived";
        $items["expense"] = array();
        while ($rowsthree=mysqli_fetch_array($stThree)){
            $product = array();
            $product["expense"] = $rowsthree["expense"];
            array_push($items["expense"], $product);


        }


    }


    $stFour = mysqli_query($con,"select distinct descr from expenses order by expense");
    if (mysqli_num_rows($stFour) > 0) {

        while ($rowsfour=mysqli_fetch_array($stFour)){
            $product = array();
            $product["descr"] = $rowsfour["descr"];
            array_push($items["expense"], $product);
        }
    }
    echo json_encode($items);

}














?>