<?php
include('include/connect.php');


//if ((isset($_GET['table'])) && (isset($_GET['chair']))  && (isset($_GET['salesId']))){

/*$table =$_GET['table'];
$chair =$_GET['chair'];
$salesId =$_GET['salesId'];*/

//require_once __DIR__ . '/Dp_connect.php';

// connecting to db
//$db = new DB_CONNECT();

$x=0;
$y=0;
$table = "";
$chair = "";
$name1 = "";
$bill_no = "";
$salesId="";
$from=mysql_real_escape_string($_GET['from']);
$to=mysql_real_escape_string($_GET['to']);
$type=mysql_real_escape_string($_GET['type']);


if((isset($from)) && (isset($to))  && (isset($type))){
    // $taxTag =$_GET['cust'];
    //$salesId = $_GET['sales_id'];
    // $table = $_GET['table_id'];
    //$chair = $_GET['chair_id'];

    //echo $salesId;
    //echo $table ;
    // echo $chair;




    date_default_timezone_set("Asia/Kolkata");
    $curnt_date = date("Y-m-d");
    $dispdate =date("Y-m-d h:i:sa");


    $print = mysql_query("select billing_print from printer");
    if (mysql_num_rows($print) > 0) {

        while ($rowsprint=mysql_fetch_array($print)){

            $handle = printer_open($rowsprint["billing_print"]);

            printer_set_option($handle, PRINTER_MODE, "raw");
        }
    }


    printer_start_doc($handle, "Document");


    //printer_draw_bmp($handle, "c:\\logosss.bmp", 65, 10);  // Logo Dir, lenght H , With V



    printer_start_page($handle);


    /*
        $stx = mysqli_query($con," select sales_id,table_id,chair_id from cashier_print limit 0,1");
        if (mysqli_num_rows($stx) > 0) {

            while ($rowsx=mysqli_fetch_array($stx)){
                $salesId = $rowsx["sales_id"];
                $table = $rowsx["table_id"];
                   $chair = $rowsx["chair_id"];

            }
        }*/

    //  echo $salesId;
//printer_draw_bmp($handle, "test3_opt.bmp", 0, 0);
//printer_draw_bmp($handle, "C:\\test3_opt.bmp", 60, 0);
//printer_write($handle, "C:\test3_opt.bmp", 1, 1);

    $fytable = "Table   :". ' ' .  $table. ' ' .  "-". ' ' .  $chair;

    $items= array();


    if($type=="Restaurant"){
        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$from."' AND '".$to."') OR date='".$from."')";
    }elseif($type=="takeaway"){
        $itemWiseQueryFour ="SELECT date,bill_no,amt,mode,tables,chair  FROM takeaway WHERE ((date BETWEEN '".$from."' AND '".$to."') OR date='".$from."') ";
    }


    $st = mysql_query($itemWiseQueryFour);
    $sub_total=0;
    if (mysql_num_rows($st) > 0) {
        $items["items"] = array();
        while ($rows =mysql_fetch_array($st)){
            $product = array();
            $sub_total=$sub_total+(int)$rows["amt"];



            $product["date"]= $rows["date"];
            $product["bill_no"] =$rows["bill_no"];
            $product["amt"]  =$rows["amt"];
            $product["mode"] =$rows["mode"];

            array_push($items["items"], $product);

        }
    }


    $fysubtotal =  "Rs :        ". ' ' .$sub_total;
    $fyCGST =  "Rs :        ". ' ' .$service_tax;

    $fyTotal =": Rs  ". ' ' .$sub_total.".00";

    $stOne = mysql_query("select MAX(bill_no) from past_bill where date='$curnt_date'");
    if (mysql_num_rows($stOne) > 0) {

        while ($rowsOne =mysql_fetch_array($stOne)){
            $bill_no= $rowsOne["MAX(bill_no)"];
        }
    }
    $bill_no = (int)$bill_no + 1;
    // echo $bill_no;
    $fybill = "Bill.No :". ' ' .$bill_no;

    $stThree = mysql_query(" select line1,line2,line3,line4 from add_profile");
    if (mysql_num_rows($stThree) > 0) {

        while ($rowsthree=mysql_fetch_array($stThree)){
            $line1= $rowsthree["line1"];
            $line2= $rowsthree["line2"];
            $line3= $rowsthree["line3"];
            $line4= $rowsthree["line4"];
        }
    }




    $stTwoFive = mysql_query(" select name from add_employee where eid='$salesId'");
    if (mysql_num_rows($stTwoFive) > 0) {

        while ($rowstwo=mysql_fetch_array($stTwoFive)){
            $name1= $rowstwo["name"];
        }
    }

    $font = printer_create_font("Georgia", 60, 25, PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);
    $x = $x +350;
    $y = $y+60;
     printer_draw_text($handle, $line1, 30, $y);
    printer_delete_font($font);


    $font = printer_create_font("Arial", 27,10, 100, false, false, false, 0);
    printer_select_font($handle, $font);
    $y = $y+67;
    printer_draw_text($handle,$line2,165,$y);
    $y = $y+37;

    printer_draw_text($handle,$line3,199,$y);
    $y = $y+37;


    printer_draw_text($handle,"BILL REPORT",199,$y);
    $y = $y+37;

    printer_delete_font($font);

    $font = printer_create_font("Arial", 30,12, 100, false, false, false, 0);
    printer_select_font($handle, $font);

    printer_draw_text($handle,"--------------------------------------------------------------",20,$y);

    printer_delete_font($font);

    $font = printer_create_font(" ", 30, 12, 100, false, false, false, 0);
    printer_select_font($handle, $font);
    $y = $y+37;
    printer_draw_text($handle,"DATE",20,$y);
    printer_draw_text($handle,"BILL NO",140,$y);
    printer_draw_text($handle,"TYPE",265,$y);
    printer_draw_text($handle,"AMT",360,$y);
    printer_draw_text($handle,"MODE",430,$y);
    $y = $y+37;

    printer_draw_text($handle,"--------------------------------------------------",20,$y);


    printer_delete_font($font);



    $font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
    printer_select_font($handle, $font);



    $noofRows = sizeof($items["items"]);



    $axsis =37;


    for($j=0; $j<$noofRows; $j++){
        $y = ($axsis)+ $y;
        $x=$items["items"][$j];
        printer_draw_text($handle,$x["date"],25,$y);
        printer_draw_text($handle,$x["bill_no"] ,190,$y);
        printer_draw_text($handle,$type,235,$y);
        printer_draw_text($handle,$x["amt"],370,$y);
        printer_draw_text($handle,$x["mode"],460,$y);

    }




    $y = $y+37;

    printer_draw_text($handle,"--------------------------------------------------------------",20,$y);



    printer_delete_font($font);

    $font = printer_create_font("Arial", 35, 15, PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);

    $y = $y+37;
    printer_draw_text($handle,"TOTAL ",70,$y);
    printer_draw_text($handle,$fyTotal,320,$y);


    printer_delete_font($font);

    header("Location:bill_report.php");



    printer_end_page($handle);
    printer_end_doc($handle);


    printer_close($handle);



}
?>