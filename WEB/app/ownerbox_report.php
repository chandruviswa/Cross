<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';

require_once __DIR__ . '/pdf/fpdf.php';


$db = new DB_CONNECT();



$response = array();





if( (isset($_GET['start_date'])) && (isset($_GET['end_date'])) && (isset($_GET['pdf'])  ) ){


    $pdfTag =$_GET['pdf'];
    if($pdfTag == 0){



        $total_exp = 0;
        $total_rec = 0;
        $total_in = 0;
        $total_out = 0;

        $date1 = $_GET['start_date'];
        $date2 = $_GET['end_date'];

        $items["statusCode"] = 201;
        $items["message"] = "Item cat list successfully retrived";




        $stOne = mysqli_query($con," select sum(amt) from expenses where category='Anand Box Expenses'  and date<'$date1'");
        if (mysqli_num_rows($stOne) > 0) {

            while ($rowsthree=mysqli_fetch_array($stOne)){
                $total_exp = $rowsthree["sum(amt)"];


            }
        }


        $stTwo = mysqli_query($con," select sum(amt) from expenses where category='Anand Box Receipt'  and date<'$date1'");
        if (mysqli_num_rows($stTwo) > 0) {


            while ($rowsthree=mysqli_fetch_array($stTwo)){
                $total_rec = $rowsthree["sum(amt)"];

            }
        }







        $total_cash =(int)$total_rec - (int)$total_exp;
        $items["opening_cash"]=$total_cash;
        // echo $total_cash;

        $tag =0;

        $stThree = mysqli_query($con,"select DATE_FORMAT(date,'%d-%m-%Y'),amt,descr,expense from expenses where category='Anand Box Receipt'  and date between '$date1' and '$date2' order by expense");
        if (mysqli_num_rows($stThree) > 0) {

            $tag =1;
            $items["report"] = array();
            while ($rowsthree=mysqli_fetch_array($stThree)){

                $product = array();
                $total_in += (int)$rowsthree["amt"];

                $product["date"] = $rowsthree["DATE_FORMAT(date,'%d-%m-%Y')"];
                $product["In"] = $rowsthree["amt"];
                $product["Out"] =0;
                $product["expense"] =$rowsthree["expense"];
                $product["descr"] = $rowsthree["descr"];
                $product["descr"] = $rowsthree["descr"];
                array_push($items["report"], $product);


            }


        }else{
            $items["report"] = [];

        }


        $stFour = mysqli_query($con,"select DATE_FORMAT(date,'%d-%m-%Y'),amt,descr,expense from expenses where category='Anand Box Expenses' and date between '$date1' and '$date2' order by expense");
        if (mysqli_num_rows($stFour) > 0) {

            while ($rowsfour=mysqli_fetch_array($stFour)){
                $product = array();
                $total_out+= (int)$rowsfour["amt"];
                $product["date"] = $rowsfour["DATE_FORMAT(date,'%d-%m-%Y')"];
                $product["In"] = 0;
                $product["Out"] =$rowsfour["amt"];
                $product["expense"] =$rowsfour["expense"];
                $product["descr"] = $rowsfour["descr"];
                $product["descr"] = $rowsfour["descr"];
                array_push($items["report"], $product);
            }
        }else{
            if($tag ==0){
                $items["report"] = [];
            }
        }

        $items["total_in"]=$total_in;
        $items["total_out"]= $total_out;

        $tot_bal = ($total_cash + $total_in) - $total_out;
        $items["total_balance"]= $tot_bal;

        $items["total_in_out"]=($total_in-$total_out);
        echo json_encode($items);

    }else{
      //  echo "testPne";
       // $pdfTag = $_GET['pdf'];
        $total_exp = 0;
        $total_rec = 0;
        $total_in = 0;
        $total_out = 0;

        $date1 = $_GET['start_date'];
        $date2 = $_GET['end_date'];

        $items["statusCode"] = 201;
        $items["message"] = "Item cat list successfully retrived";
        if($pdfTag == 1){












            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',12);


            $stOne = mysqli_query($con," select sum(amt) from expenses where category='Anand Box Expenses'  and date<'$date1' limit 0,1 ");
            if (mysqli_num_rows($stOne) > 0) {

                while ($rowsthree=mysqli_fetch_array($stOne)){
                    $total_exp= $rowsthree["sum(amt)"];


                }
            }


            $stTwo = mysqli_query($con," select sum(amt) from expenses where category='Anand Box Receipt'  and date<'$date2'limit 0,1 ");
            if (mysqli_num_rows($stTwo) > 0) {


                while ($rowsthree=mysqli_fetch_array($stTwo)){
                    $total_rec= $rowsthree["sum(amt)"];


                }
            }






            $total_cash =(int)$total_rec - (int)$total_exp ;
            $items["opening_cash"]=$total_cash;
            // echo $total_cash;

            $tag =0;
            $pdf->Cell(35,12, "Date",1,0,'C');
            $pdf->Cell(35,12, "Total In",1,0,'C');
            $pdf->Cell(35,12,"Total Out",1,0,'C');
            $pdf->Cell(35,12, "Expense",1,0,'C');
            $pdf->Cell(35,12,"Note",1,0,'C');





            $stThree = mysqli_query($con,"select DATE_FORMAT(date,'%d-%m-%Y'),amt,descr,expense from expenses where category='Anand Box Receipt'  and date between '$date1' and '$date2' order by expense");
            if (mysqli_num_rows($stThree) > 0) {

                $tag =1;
                $items["report"] = array();
                while ($rowsthree=mysqli_fetch_array($stThree)){

                    $product = array();
                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();
                    $total_in += (int)$rowsthree["amt"];
                    $pdf->Cell(35,12, $rowsthree["DATE_FORMAT(date,'%d-%m-%Y')"],1,0,'C');
                    $pdf->Cell(35,12, $rowsthree["amt"],1,0,'C');
                    $pdf->Cell(35,12,0,1,0,'C');
                    $pdf->Cell(35,12, $rowsthree["expense"],1,0,'C');
                    $pdf->Cell(35,12, $rowsthree["descr"],1,0,'C');
                }
            }
            $stFour = mysqli_query($con,"select DATE_FORMAT(date,'%d-%m-%Y'),amt,descr,expense from expenses where category='Anand Box Expenses' and date between '$date1' and '$date2' order by expense");
            if (mysqli_num_rows($stFour) > 0) {

                while ($rowsfour=mysqli_fetch_array($stFour)){
                    $product = array();

                    $pdf->SetFont('Arial','',12);
                    $pdf->Ln();

                    $pdf->Cell(35,12, $rowsfour["DATE_FORMAT(date,'%d-%m-%Y')"],1,0,'C');
                    $pdf->Cell(35,12, 0,1,0,'C');
                    $pdf->Cell(35,12, $rowsfour["amt"],1,0,'C');
                    $pdf->Cell(35,12, $rowsfour["expense"],1,0,'C');
                    $pdf->Cell(35,12, $rowsfour["descr"],1,0,'C');




                    $total_out+= (int)$rowsfour["amt"];
                }
            }

            $items["total_in"]=$total_in;
            $items["total_out"]= $total_out;

            $tot_bal = ($total_cash + $total_in) - $total_out;
            $items["total_balance"]= $tot_bal;

            $items["total_in_out"]=($total_in-$total_out);


            $pdf->Ln();
            $pdf->Cell(40,10,"TOTAL IN      :",0,0,'C');
            $pdf->Cell(40,10,$total_in,0,0,'C');
            $pdf->Ln();
            $pdf->Cell(40,10, "TOTAL OUT      :",0,0,'C');

            $pdf->Cell(40,10, $total_out,0,0,'C');
            $pdf->Ln();
            $pdf->Cell( 40, 10, "TOTAL BALANCE      :" , 0, 0, 'C' );
            $pdf->Cell( 40, 10, $tot_bal , 0, 0, 'C' );
            $pdf->Ln();
            $pdf->Cell( 40, 10, "TOTAL (IN-OUT)      :" , 0, 0, 'C' );
            $pdf->Cell( 40, 10, $tot_bal , 0, 0, 'C' );






            $pdf->Output();
        }
    }





}






?>