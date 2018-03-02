<?php



$printer_name = "doPDF 8";


//phpinfo();
/*$handle = printer_open();
if($handle==false){
    echo"False";
}
else{
    printer_write($handle, "Text to print");
    printer_close($handle);
}*/

/* function test (){
return "test" ;
}
 */
//var_dump(printer_list(PRINTER_ENUM_LOCAL | PRINTER_ENUM_SHARED));

/*$getprt=printer_list( PRINTER_ENUM_LOCAL | PRINTER_ENUM_SHARED );
echo json_encode ($getprt);*/

$handle = printer_open($printer_name);

printer_start_doc($handle, "Document");
printer_start_page($handle);
$font = printer_create_font("Arial", 100, 100, 400, false, false, false, 0);
printer_select_font($handle, $font);
printer_draw_text($handle, "test", 100, 400);
printer_delete_font($font);
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);

/*$printerList = printer_list(PRINTER_ENUM_LOCAL);
var_dump($printerList);
$printerName = $printerList[0]['NAME'];
echo $printerName;
$printer = $printerName;
if($ph = printer_open("doPDF 8")) {
    $content = "hello";

    // Set print mode to RAW and send PDF to printer
    printer_set_option($ph, PRINTER_MODE, "RAW");
    printer_write($ph, $content);
    printer_close($ph);
}
else{ echo "Couldn't connect...";}*/




/*$printer = printer_open("pdfFactory Pro");
if($ph = printer_open($printer))
{
    // Get file contents
    $fh = fopen("test.txt", "rb");
    $content = fread($fh, filesize("test.txt"));
    fclose($fh);

    // Set print mode to RAW and send PDF to printer
    printer_set_option($ph, PRINTER_MODE, "RAW");
    printer_write($ph, $content);
    printer_close($ph);
}
else "Couldn't connect...";*/
?>