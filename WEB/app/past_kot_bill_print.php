<?php
include('config.php');


//if ((isset($_GET['table'])) && (isset($_GET['chair']))  && (isset($_GET['salesId']))){

/*$table =$_GET['table'];
$chair =$_GET['chair'];
$salesId =$_GET['salesId'];*/

require_once __DIR__ . '/Dp_connect.php';

// connecting to db
$db = new DB_CONNECT();

/*---Mr.chick---*/

/*for ($tes = 0 ;$tes<=1; $tes++){
  echo $tes."</br>";*/




$x=0;
$y=0;
$table = "";
$chair = "";
$name1 = "";
$bill_no = "";
$salesId="";


 if((isset($_GET['sales_id'])) && (isset($_GET['table_id'])) && (isset($_GET['chair_id']))){

		
		 $salesId = $_GET['sales_id'];
     $table = $_GET['table_id'];
     $chair = $_GET['chair_id'];
		
		
$curnt_date = date("Y-m-d");
$dispdate =date("Y-m-d h:i:sa");



$print = mysqli_query($con," select kop_print from printer");
if (mysqli_num_rows($print) > 0) {

    while ($rowsprint=mysqli_fetch_array($print)){

        $handle = printer_open($rowsprint["kop_print"]);
		printer_set_option($handle, PRINTER_MODE, "raw"); 
    }
}


//$handle = printer_open("Microsoft XPS Document Writer");



//printer_set_option($handle, PRINTER_SCALE, 75);
//printer_set_option($handle, PRINTER_TEXT_ALIGN, PRINTER_TA_RIGHT);
printer_start_doc($handle, "Document");

printer_draw_bmp($handle, "c:\\logosss.bmp", 65, 10);  // Logo Dir, lenght H , With V
printer_start_page($handle);

/*
$stx = mysqli_query($con,"select tables,chair,sales_id,date,time from past_bill_print limit 0,1");
if (mysqli_num_rows($stx) > 0) {

    while ($rowsx=mysqli_fetch_array($stx)){
        $salesId = $rowsx["sales_id"];
        $table = $rowsx["tables"];
        $chair = $rowsx["chair"];

    }
}*/

//echo $salesId;


$fytable = "Table   :". ' ' .  $table. ' ' .  "-". ' ' .  $chair;





/*// $st = mysqli_query($con,"select bill_no,sales_id,date,amt,tables,chair,sub_tot,ser_tax,vat,amt from past_bill where  tables='$table' and chair='$chair ' and sales_id=' $salesId ' order by bill_no DESC LIMIT 0,1");
$st = mysqli_query($con,"select bill_no,sales_id,date,amt,tables,chair,sub_tot,ser_tax,vat,amt from past_bill where  tables='$table' and chair='$chair' and sales_id='$salesId' order by bill_no DESC LIMIT 0,1");
if (mysqli_num_rows($st) > 0) {

    while ($rows =mysqli_fetch_array($st)){
        $sub_total= $rows["sub_tot"];
        $service_tax = $rows["ser_tax"];
        $vat_tax  = $rows["vat"];
        $net_amount = $rows["amt"];

    }
}*/

/*
$fysubtotal =  "Rs :        ". ' ' .$sub_total;
$fyCGST =  "Rs :        ". ' ' .$service_tax;
$fyTotal =": Rs  ". ' ' .$net_amount. ' ' .".00";*/

/*$stOne = mysqli_query($con,"select bill_no,sales_id,date,amt,tables,chair,sub_tot,ser_tax,vat,amt from past_bill where date='$curnt_date' and tables='$table' and chair='$chair' and sales_id='$salesId' order by bill_no DESC LIMIT 0,1");
if (mysqli_num_rows($stOne) > 0) {

    while ($rowsOne =mysqli_fetch_array($stOne)){
        $bill_no= $rowsOne["bill_no"] + 1;
    }
}
$bill_no = (int)$bill_no + 1;
echo $bill_no;
$fybill = "Bill.No". ' ' .$bill_no;*/

$stThree = mysqli_query($con," select line1,line2,line3,line4 from add_profile");
if (mysqli_num_rows($stThree) > 0) {

    while ($rowsthree=mysqli_fetch_array($stThree)){
        $line1= $rowsthree["line1"];
        $line2= $rowsthree["line2"];
        $line3= $rowsthree["line3"];
        $line4= $rowsthree["line4"];

    }
}


$stTwoFive = mysqli_query($con," select name from add_employee where eid='$salesId'");
if (mysqli_num_rows($stTwoFive) > 0) {

    while ($rowstwo=mysqli_fetch_array($stTwoFive)){
        $name1= $rowstwo["name"];
    }
}
/*
//printer_draw_bmp($handle, "C:\wamp\www\KOT/test.bmp", 1, 1,100,100);
list($width, $height, $type, $attr) = getimagesize(" C:\wamp\www\KOT\test3.JPG");
// jpeg to bmp? Something goes wrong here
jpeg2wbmp("C:\wamp\www\KOT\test.JPG"," C:\wamp\www\KOT\test3.bmp",$height,$width,0);
// print bmp...
printer_draw_bmp($handle,"C:\wamp\www\KOT\test3.bmp",0,0,$width,$height);*/

    $font = printer_create_font("Georgia", 60, 25, PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);
    $x = $x +350;
    $y = $y+60;
	
	
 $filename ="C:\wamp\www\KOT/test3.jpg";
//printer_draw_bmp ( $handle ,  $filename , 30, $y, 300, 50 );
    
    //printer_draw_text($handle, $line1, 30, $y);
    printer_delete_font($font);

//printer_draw_bmp($handle, "C:\wamp\www\KOT\test3.bmp", 1, 1,100,100);

$font = printer_create_font("Arial", 27, 10, 100, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+67;
printer_draw_text($handle,$line2,165,$y);
$y = $y+37;

printer_draw_text($handle,$line3,199,$y);
$y = $y+37;

    printer_delete_font($font);

/*$font = printer_create_font("Arial", 27,10, 100, false, false, false, 0);
printer_select_font($handle, $font);

printer_draw_text($handle,$line4,105,$y);
$y = $y+37;
printer_delete_font($font);*/

    $font = printer_create_font("Arial", 30,12, 100, false, false, false, 0);
    printer_select_font($handle, $font);


printer_draw_text($handle,"--------------------------------------------------------------",20,$y);

printer_delete_font($font);



$font = printer_create_font("Arial", 20, 10, 100, false, false, false, 0);
printer_select_font($handle, $font);

$y = $y+37;
printer_draw_text($handle,$fytable,20,$y);
printer_draw_text($handle,"date  :". ' ' . $dispdate,212,$y);

printer_delete_font($font);
$y = $y+37;

$font = printer_create_font("Arial", 30, 12, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);

printer_draw_text($handle, $name1,20,$y);


$y = $y+37;

printer_draw_text($handle,"=================================",20,$y);

printer_delete_font($font);

$font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"ITEM",20,$y);
printer_draw_text($handle,"QTY",370,$y);

$y = $y+37;

printer_draw_text($handle,"--------------------------------------------------------------",20,$y);


printer_delete_font($font);



$items= array();
$font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
printer_select_font($handle, $font);

//$stpastdetails = mysqli_query($con,"select item,unit,qty,amt,itm_code from past_bill_details where tables='$table'and chair='$chair' and bill_no='0' and sales_id='$salesId'");
$stpastdetails = mysqli_query($con,"select item,qty,itm_code,remarks from past_bill_details where date='$curnt_date' and tables='$table' and chair='$chair' and bill_no='0' and mob_status ='0' and sales_id='$salesId' ");
if (mysqli_num_rows($stpastdetails) > 0) {
    $items["items"] = array();

    while ($rowspast=mysqli_fetch_array($stpastdetails)){

        $product = array();
        $product["item"]= $rowspast["item"];
        $product["qty"] =$rowspast["qty"];
        $product["remarks"]  =$rowspast["remarks"];

        array_push($items["items"], $product);

    }
}



$noofRows = sizeof($items["items"]);

//echo count($items["items"]);
/*
echo json_encode($items);


echo $noofRows;*/

$axsis =37;

//echo $items["items"][1]["item"];



for($j=0; $j<$noofRows; $j++){
    $y = ($axsis)+ $y;
    $x=$items["items"][$j];
    printer_draw_text($handle,$x["item"],25,$y);
    printer_draw_text($handle,$x["qty"] ,390,$y);
    if(!empty($x["remarks"])){
        $y =$y +37;
        printer_draw_text($handle,$x["remarks"],25,$y);
    }



}

/*for($i=0; $i<$noofRows; $i++){
    $y=($i*$Yaxis)+$yStart;
    $tdCount=count($dataArray[0]);
    for($j=0; $j<$tdCount; $j++){
        $x=$XaxisArray[$j];
        printer_draw_text($p,$dataArray[$i][$j],$x,$y);
    }

}*/


/*printer_draw_text($handle, $item,40,$y);
printer_draw_text($handle,$qty ,650,$y);
printer_draw_text($handle,$rate,770,$y);
printer_draw_text($handle,$amt ,960,$y);*/


$y = $y+37;

printer_draw_text($handle,"--------------------------------------------------------------",20,$y);


printer_delete_font($font);











$font = printer_create_font("Arial",30, 12, 100, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"\"Maintain Same Quality For Every Time\"",50,$y);
$y = $y+37;
printer_draw_text($handle,"\"Make a Order Quick\"",120,$y);
printer_delete_font($font);




/*
        $stKOTThree = mysqli_query($con,"delete from past_bill_print where tables='$table' and chair='$chair'");
        if (!empty($stKOTThree)) {

            $items["statusone"] = 1;


// echo no users JSON

        }*/


        $stKOTs = mysqli_query($con,"update past_bill_details set mob_status=1 where tables='$table' and chair='$chair'and bill_no=0" );

        if (!empty($stKOTs)) {

            $items["statusCode"] = 201;
            $items["message"] = "Success";

// echo no users JSON
            echo json_encode($items);
        }







//   printer_draw_text($handle,"Thank You!!! Visit Again!!!",100,50);
//printer_set_option ($handle , PRINTER_RESOLUTION_X , 30);
printer_end_page($handle);
printer_end_doc($handle);
//printer_set_option ($handle , PRINTER_PAPER_FORMAT , PRINTER_FORMAT_A4);


printer_close($handle);



//}





/*$estprin =printer_list(PRINTER_ENUM_LOCAL);

echo json_encode ($estprin);


 $getprt=printer_list( PRINTER_ENUM_LOCAL );
//printer_start_doc($ph, "Start Doc");
$tessst =printer_open("pdfFactory Pro");*/
//echo json_encode ($getprt);
}
?>










