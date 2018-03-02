<?php
include('config.php');


//if ((isset($_GET['table'])) && (isset($_GET['chair']))  && (isset($_GET['salesId']))){

    /*$table =$_GET['table'];
    $chair =$_GET['chair'];
    $salesId =$_GET['salesId'];*/

require_once __DIR__ . '/Dp_connect.php';

// connecting to db
$db = new DB_CONNECT();

$x=0;
$y=0;
$table = "";
$chair = "";
$name1 = "";
$bill_no = "";
 $salesId="";



        if((isset($_GET['cust'])) && (isset($_GET['sales_id'])) && (isset($_GET['table_id'])) && (isset($_GET['chair_id']))){
    $taxTag =$_GET['cust'];
	 $salesId = $_GET['sales_id'];
     $table = $_GET['table_id'];
     $chair = $_GET['chair_id'];

	//echo $salesId;
	 //echo $table ;
	 // echo $chair;
      



date_default_timezone_set("Asia/Kolkata");
    $curnt_date = date("Y-m-d");
    $dispdate =date("Y-m-d h:i:sa");


$print = mysqli_query($con," select billing_print from printer");
if (mysqli_num_rows($print) > 0) {

    while ($rowsprint=mysqli_fetch_array($print)){

        $handle = printer_open($rowsprint["billing_print"]);
		
		printer_set_option($handle, PRINTER_MODE, "raw"); 
    }
}


    printer_start_doc($handle, "Document");
	

printer_draw_bmp($handle, "c:\\logosss.bmp", 65, 10);  // Logo Dir, lenght H , With V



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

//SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='$categories' AND m.chair ='$chair' AND m.date='$date'AND c.date='$date'  AND m.bill_no = 0  AND c.bill_no='0'

//select bill_no,sales_id,date,amt,tables,chair,sub_tot,ser_tax,vat,amt from past_bill where date='$curnt_date' and  tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no='0' and status='Unpaid' order by bill_no DESC LIMIT 0,1
   // $st = mysqli_query($con,"select bill_no,sales_id,date,amt,tables,chair,sub_tot,ser_tax,vat,amt from past_bill where  tables='$table' and chair='$chair ' and sales_id=' $salesId ' order by bill_no DESC LIMIT 0,1");
$st = mysqli_query($con,"SELECT c.bill_no,c.tables,c.sales_id,c.amt,c.status,m.amt AS xamt,m.item,m.unit,m.qty,m.itm_code,c.sub_tot,c.ser_tax,c.vat FROM past_bill AS c LEFT JOIN past_bill_details AS m ON c.tables = m.tables AND c.chair = m.chair where m.tables ='$table' AND m.chair ='$chair' AND m.date='$curnt_date'AND c.date='$curnt_date' AND c.sales_id='$salesId'  AND c.sales_id='$salesId'  AND m.bill_no = '0'  AND c.bill_no='0'");
    if (mysqli_num_rows($st) > 0) {
$items["items"] = array();
        while ($rows =mysqli_fetch_array($st)){
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

    $stOne = mysqli_query($con,"select MAX(bill_no) from past_bill where date='$curnt_date'");
    if (mysqli_num_rows($stOne) > 0) {

        while ($rowsOne =mysqli_fetch_array($stOne)){
            $bill_no= $rowsOne["MAX(bill_no)"];
        }
    }
$bill_no = (int)$bill_no + 1;
   // echo $bill_no;
    $fybill = "Bill.No :". ' ' .$bill_no;

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
/*
$font = printer_create_font("Arial", 27,10, 100, false, false, false, 0);
printer_select_font($handle, $font);

    printer_draw_text($handle,$line4,120,$y);

$y = $y+37;
printer_delete_font($font);*/



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

/*
$stpastdetails = mysqli_query($con,"select item,unit,qty,amt,itm_code from past_bill_details where date='$curnt_date' and tables='$table'and chair='$chair' and bill_no='0' and sales_id='$salesId'");
if (mysqli_num_rows($stpastdetails) > 0) {
    $items["items"] = array();

    while ($rowspast=mysqli_fetch_array($stpastdetails)){

        $product = array();
        $product["item"]= $rowspast["item"];
        $product["qty"] =$rowspast["qty"];
        $product["rate"]  =$rowspast["unit"];
        $product["amt"] =$rowspast["amt"];

        array_push($items["items"], $product);

    }
}

*/

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
			
            
         //   printer_draw_text($handle,$x["amt"] ,460,$y);
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








/*$font = printer_create_font("Arial",20, 10, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"we are under GST Composition Tax scheme",70,$y);
$y = $y+37;
printer_draw_text($handle,"Please do not ask carry bag for each parce",70,$y);
$y = $y+37;
printer_draw_text($handle,"Consume milk sweets on the same day",80,$y);
printer_delete_font($font);


$font = printer_create_font("BlessedDay",20, 10, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"!!!Thank You, Visit Again!!!",100,$y);

printer_delete_font($font);*/
$font = printer_create_font("Arial",30, 12, PRINTER_FW_BOLD, false, false, false, 0);
printer_select_font($handle, $font);
$y = $y+37;
printer_draw_text($handle,"FOR QUERIES & COMPLAINTS",100,$y);
$y = $y+37;
printer_draw_text($handle,"PLEASE CONTACT - 0421-4971212",70,$y);
printer_delete_font($font);



$stTwoFiveTwo = mysqli_query($con," update past_bill set bill_no='$bill_no' where tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");
if (!empty($stTwoFiveTwo)) {

    $items["statusone"] = 1;

}

$query =mysqli_query($con,"select * from past_bill_details where tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");
//$stTwoFiveThree = mysqli_query($con,"update past_bill_details set bill_no='$bill_no' where tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");

if (!empty($query)) {
	
	while ($rowt=mysqli_fetch_array($query)){
            $ids= $rowt["id"];
			//echo  $ids;
			
			$stTwoFiveThree = mysqli_query($con,"update past_bill_details set bill_no='$bill_no' where id='$ids' and tables='$table' and chair='$chair' and sales_id='$salesId' and bill_no=0");
            if (!empty($stTwoFiveThree)) {
           $items["statustwo"] = 2;
}   
        }  

}




/*
$stTwoFiveFOUR = mysqli_query($con,"delete from cashier_print where table_id='$table' and chair_id='$chair' and sales_id='$salesId'" );

if (!empty($stTwoFiveFOUR)) {

    $items["statusCode"] = 201;
    $items["message"] = "Success";

// echo no users JSON
    echo json_encode($items);
}
*/


/*if (x == 1)
            {
                connection.Close();
                connection.Open();
                cmd = new MySqlCommand("delete from cashier_print where table_id='" + tables + "' and chair_id='" + chair + "' and sales_id='" + sales_id + "'", connection);
                cmd.ExecuteNonQuery();
                connection.Close();
            }

            //update the bill no in past bill
            connection.Close();
            connection.Open();
            cmd = new MySqlCommand("update past_bill set bill_no='" + billno + "' where tables='" + tables + "' and chair='" + chair + "' and sales_id='" + sales_id + "' and bill_no=0", connection);
            cmd.ExecuteNonQuery();
            connection.Close();

            //update the bill no in past bill details
            connection.Close();
            connection.Open();
            cmd = new MySqlCommand("update past_bill_details set bill_no='" + billno + "' where tables='" + tables + "' and chair='" + chair + "' and sales_id='" + sales_id + "' and bill_no=0", connection);
            cmd.ExecuteNonQuery();
            connection.Close();*/


    /*printer_draw_text($handle,$header,0,110);


    $yStart=140;
    for($i=0; $i<$noofRows; $i++){
        $y=($i*$Yaxis)+$yStart;
        $tdCount=count($dataArray[0]);
        for($j=0; $j<$tdCount; $j++){
            $x=$XaxisArray[$j];
            printer_draw_text($p,$dataArray[$i][$j],$x,$y);
        }

    }*/
 //   printer_draw_text($handle,"Thank You!!! Visit Again!!!",100,50);
//printer_set_option ($handle , PRINTER_RESOLUTION_X , 30);
    printer_end_page($handle);
    printer_end_doc($handle);
//printer_set_option ($handle , PRINTER_PAPER_FORMAT , PRINTER_FORMAT_A4);

    printer_close($handle);





/*$estprin =printer_list(PRINTER_ENUM_LOCAL);

echo json_encode ($estprin);


 $getprt=printer_list( PRINTER_ENUM_LOCAL );
//printer_start_doc($ph, "Start Doc");
$tessst =printer_open("pdfFactory Pro");*/
 //echo json_encode ($getprt);

  }
?>










