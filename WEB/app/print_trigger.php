<?php
// open a connection to your printer
$my_printer = printer_open('Microsoft XPS Document Writer');
echo '<table style="border-collapse:collapse;">';
echo '<tr><td>X Resolution:</td><td>'.printer_get_option($my_printer, PRINTER_RESOLUTION_X).'</td></tr>';
echo '<tr><td>Y Resolution:</td><td>'.printer_get_option($my_printer, PRINTER_RESOLUTION_Y).'</td></tr>';
echo '<tr><td>Paper Format:</td><td>'.printer_get_option($my_printer, PRINTER_PAPER_FORMAT).'</td></tr>';
echo '<tr><td>Paper Length:</td><td>'.printer_get_option($my_printer, PRINTER_PAPER_LENGTH).'</td></tr>';
echo '<tr><td>Paper Width:</td><td>'.printer_get_option($my_printer, PRINTER_PAPER_WIDTH).'</td></tr>';
printer_set_option( $my_printer,PRINTER_PAPER_WIDTH, 340);
echo '<tr><td>Paper Width:</td><td>'.printer_get_option($my_printer, PRINTER_PAPER_WIDTH).'</td></tr>';
echo '<tr><td>Printer Scale:</td><td>'.printer_get_option($my_printer, PRINTER_SCALE).'</td></tr>';
echo '<tr><td>Printer Mode:</td><td>'.printer_get_option($my_printer, PRINTER_MODE).'</td></tr>';
echo '</table>';
$printit = "1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111";
printer_write($my_printer, $printit);
printer_close($my_printer);
?>