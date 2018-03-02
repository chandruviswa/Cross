<?php
include('include/connect.php');




$x=0;
$y=0;
$table = "";
$chair = "";
$name1 = "";
$bill_no = "";
 $salesId="";
$taxTag=mysql_real_escape_string($_GET['cust']);
 $salesId=mysql_real_escape_string($_GET['sales_id']);
 $table=mysql_real_escape_string($_GET['table_id']);
 $chair=mysql_real_escape_string($_GET['chair_id']);

        if((isset($taxTag)) && (isset($salesId)) && (isset($_GET['table_id'])) && (isset($chair))){



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


    $fytable = "Table   :". ' ' .  $table. ' ' .  "-". ' ' .  $chair;

$items= array();

$st = mysql_query("SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.amt AS xamt,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM `takeaway` AS c LEFT JOIN takeaway_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='$table' AND m.chair ='$chair' AND m.date='$curnt_date'AND c.date='$curnt_date' AND c.sales_id='$salesId'  AND c.sales_id='$salesId'  AND m.bill_no = '0'  AND c.bill_no='0'");
    if (mysql_num_rows($st) > 0) {
$items["items"] = array();
$sub_total="";
$service_tax="";

        while ($rows =mysql_fetch_array($st)){
			 $product = array();
           $sub_total= $rows["amt"]. ' ' .".00";
           $service_tax = $rows["ser_tax"];
            $vat_tax  = $rows["vat"];
            $net_amount = $rows["amt"];
			
			
        $product["item"]= $rows["item"];
        $product["qty"] =$rows["qty"];
        $product["rate"]  =$rows["unit"];
        $product["amt"] =$rows["xamt"];

        array_push($items["items"], $product);

        }
		
		
    }


$fysubtotal =  "Rs :        ". ' ' .$sub_total;
$fyCGST =  "Rs :        ". ' ' .$service_tax;

$fyTotal =": Rs  ". ' ' .$sub_total;

    $stOne = mysql_query("select MAX(bill_no) from takeaway where date='$curnt_date'");
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
  // printer_draw_text($handle, $line1, 30, $y);
printer_delete_font($font);


$font = printer_create_font("Arial", 27,10, 100, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+67;
    printer_draw_text($handle,$line2,165,$y);
$y = $y+37;

    printer_draw_text($handle,$line3,199,$y);
$y = $y+37;

printer_delete_font($font);




$font = printer_create_font("Arial", 30,12, 100, false, false, false, 0);
printer_select_font($handle, $font);

printer_draw_text($handle,"--------------------------------------------------------------",20,$y);

printer_delete_font($font);



$font = printer_create_font("Arial", 28, 10, 100, false, false, false, 0);
printer_select_font($handle, $font);

$y = $y+37;
printer_draw_text($handle,$fytable,20,$y);
printer_draw_text($handle,"Date  :". ' ' . $dispdate,192,$y);

printer_delete_font($font);
$y = $y+37;

$font = printer_create_font("Arial", 30, 12, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);

printer_draw_text($handle, $name1,20,$y);
printer_draw_text($handle,$fybill,380,$y);

$y = $y+37;

printer_draw_text($handle,"=================================",20,$y);

printer_delete_font($font);

$font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"ITEM",20,$y);
printer_draw_text($handle,"QTY",320,$y);
printer_draw_text($handle,"RATE",385,$y);
printer_draw_text($handle,"AMT",460,$y);
$y = $y+37;

printer_draw_text($handle,"--------------------------------------------------------------",20,$y);


printer_delete_font($font);



$font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
printer_select_font($handle, $font);


$noofRows = sizeof($items["items"]);



$axsis =37;




        for($j=0; $j<$noofRows; $j++){
            $y = ($axsis)+ $y;
            $x=$items["items"][$j];
            printer_draw_text($handle,$x["item"],25,$y);
            printer_draw_text($handle,$x["qty"] ,340,$y);
			if($x["rate"]<100){
				printer_draw_text($handle,$x["rate"],399,$y);
			}else{
				if($x["rate"]<1000){
				printer_draw_text($handle,$x["rate"],385,$y);
				}else{
					printer_draw_text($handle,$x["rate"],372,$y);
				}
			}
			
			if($x["amt"]<100){
				printer_draw_text($handle,$x["amt"],474,$y);
			}else{
				if($x["amt"]<1000){
				printer_draw_text($handle,$x["amt"],460,$y);
				}else{
					printer_draw_text($handle,$x["amt"],447,$y);
				}
			}
			
		}
			
            
     


$y = $y+37;

printer_draw_text($handle,"--------------------------------------------------------------",20,$y);


printer_delete_font($font);


if($taxTag == 0) {
    $fyTotal =": Rs  ". ' ' .$net_amount. ' ' .".00";

    $font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
    printer_select_font($handle, $font);
    $y = $y + 40;
    printer_draw_text($handle, "Sub Total", 70, $y);
    printer_draw_text($handle, $fysubtotal,335, $y);
    $y = $y + 37;

    printer_draw_text($handle, "CGST 9% @", 70, $y);
    printer_draw_text($handle, $fyCGST, 335, $y);
    $y = $y + 37;
    printer_draw_text($handle, "SGST 9% @", 70, $y);
    printer_draw_text($handle, $fyCGST, 335, $y);

    printer_delete_font($font);

    $font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
    printer_select_font($handle, $font);
    $y = $y + 37;
    printer_draw_text($handle, "-----------------------", 335, $y);
    printer_delete_font($font);
}
$font = printer_create_font("Arial", 35, 15, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);

$y = $y+37;
printer_draw_text($handle,"TOTAL ",70,$y);
printer_draw_text($handle,$fyTotal,320,$y);


printer_delete_font($font);

$font = printer_create_font("Arial", 30, 12, 100, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+40;
printer_draw_text($handle,"---------------------------------------------------------------",20,$y);


printer_delete_font($font);







$font = printer_create_font("Arial",30, 12, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"FOR QUERIES & COMPLAINTS",100,$y);
$y = $y+37;
printer_draw_text($handle,"PLEASE CONTACT - 0421-4971212",70,$y);
printer_delete_font($font);



$stTwoFiveTwo = mysql_query(" update takeaway set bill_no='$bill_no' where tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");
if (!empty($stTwoFiveTwo)) {

    $items["statusone"] = 1;

}

//$query =mysql_query("select * from past_bill_details where tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");
$stTwoFiveThree = mysql_query("update  takeaway_details set bill_no='$bill_no'  where tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");

if (!empty($stTwoFiveThree)) {
	
	 
		header("Location:choice.php");

}


    printer_end_page($handle);
    printer_end_doc($handle);

    printer_close($handle);


  }
?>