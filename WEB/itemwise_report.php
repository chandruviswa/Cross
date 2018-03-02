<?php
include('config.php');

require_once __DIR__ . '/Dp_connect.php';
require_once __DIR__ . '/pdf/fpdf.php';
require('mc_table.php');

$db = new DB_CONNECT();



$response = array();

if((isset($_GET['categories'])) && (isset($_GET['start_date'])) && (isset($_GET['end_date'])) && (isset($_GET['shift']))  && (isset($_GET['group'])) && (isset($_GET['pdf']))) {

    $cat = $_GET['categories'];
    $date1 = $_GET['start_date'];
    $date2 = $_GET['end_date'];
    $shift = $_GET['shift'];
    $group = $_GET['group'];
    $pdftag = $_GET['pdf'];

    //  q = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from bill_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id ";
    // q += "where (bs.date BETWEEN '" + dateTimePicker1.Text + "' AND '" + dateTimePicker2.Text + "')";


    if ($cat == "Line") {
        $itemWiseQueryOne = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from past_bill_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id";
        $itemWiseQueryOne = $itemWiseQueryOne . '' . "where (bs.date BETWEEN '$date1' AND '$date2')";
        if ($group != "All") {
            $itemWiseQueryOne = $itemWiseQueryOne . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryOne = $itemWiseQueryOne . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryOne = $itemWiseQueryOne . '' . " GROUP BY bs.itm_code order by CONCAT(ic.item_cat,bs.item)";
        $result = mysqli_query($con, $itemWiseQueryOne);

        if ($pdftag == 0) {
            if (!empty($result)) {
                // check for empty result
                if (mysqli_num_rows($result) > 0) {
                    $items["statusCode"] = 201;
                    $items["message"] = "Item cat list successfully retrived";
                    $items["report"] = array();
                    while ($rows = mysqli_fetch_array($result)) {

                        $head = "";
                        $head_ck = "";
                        $head1 = "";
                        $total = 0;
                        $i = 0;
                        $gp_total = 0;

                        $head = $rows["item_cat"];
                        if ($head == $head_ck) {
                            $head1 = "";
                            $product = array();
                            $product["item_cat"] = $rows["item_cat"];
                            $product["itm_code"] = $rows["itm_code"];
                            $product["item"] = $rows["item"];
                            $product["qty"] = $rows["qty"];
                            $product["amt"] = $rows["amt"];
                            $product["unit_type"] = $rows["unit_type"];
                            array_push($items["report"], $product);

                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        } else {
                            if ($i != 0) {

                                $product = array();
                                $product["item_cat"] = "";
                                $product["itm_code"] = "";
                                $product["item"] = "";
                                $product["qty"] = "";
                                $product["amt"] = "";
                                $product["unit_type"] = "";
                                $product["groupTotal"] = $gp_total;
                                array_push($items["report"], $product);
                                $gp_total = 0;
                            }
                            $head1 = $rows["item_cat"];

                            $product = array();
                            $product["item_cat"] = $rows["item_cat"];
                            $product["itm_code"] = $rows["itm_code"];
                            $product["item"] = $rows["item"];
                            $product["qty"] = $rows["qty"];
                            $product["amt"] = $rows["amt"];
                            $product["unit_type"] = $rows["unit_type"];
                            array_push($items["report"], $product);

                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }

                        $head_ck = $head;
                        $i++;

                        $product = array();
                        $product["item_cat"] = "";
                        $product["itm_code"] = "";
                        $product["item"] = "";
                        $product["qty"] = "";
                        $product["amt"] = "";
                        $product["unit_type"] = "";
                        $product["groupTotal"] = $gp_total;
                        array_push($items["report"], $product);
                        $gp_total = 0;
                    }

                    echo json_encode($items);
                } else {
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
        } else {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(200, 12, "BILLWISE REPORT", 0, 0, 'C');

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(27, 12, "GROUP", 1, 0, 'C');
            $pdf->Cell(27, 12, "ITEM CODE", 1, 0, 'C');
            $pdf->Cell(27, 12, "ITEM NAME", 1, 0, 'C');
            $pdf->Cell(27, 12, "QUANTITY", 1, 0, 'C');
            $pdf->Cell(27, 12, "UNIT", 1, 0, 'C');
            $pdf->Cell(27, 12, "AMOUNT", 1, 0, 'C');
            $pdf->Cell(27, 12, "GROUP TOTAL", 1, 0, 'C');

            if (mysqli_num_rows($result) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty = 0;
                $totalAmt = 0;
                $val = 0;
                while ($rows = mysqli_fetch_array($result)) {

                    $product = array();

                    $pdf->SetFont('Arial', '', 12);
                    $pdf->Ln();

                    $head = "";
                    $head_ck = "";
                    $head1 = "";
                    $total = 0;
                    $i = 0;
                    $gp_total = 0;

                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {

                        $head1 = "";
                        $pdf->Cell(27, 12, $rows["item_cat"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["itm_code"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["item"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["qty"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["unit_type"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["amt"], 1, 0, 'C');

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];


                    } else {
                        if ($i != 0) {

                            $pdf->Cell(27, 12, "", 1, 0, 'C');
                            $pdf->Cell(27, 12, "", 1, 0, 'C');
                            $pdf->Cell(27, 12, "", 1, 0, 'C');
                            $pdf->Cell(27, 12, "", 1, 0, 'C');
                            $pdf->Cell(27, 12, "", 1, 0, 'C');
                            $pdf->Cell(27, 12, "", 1, 0, 'C');
                            $pdf->Cell(27, 12, $gp_total, 1, 0, 'C');
                            $gp_total = 0;
                        }
                        $head1 = $rows["item_cat"];
                        $pdf->Cell(27, 12, $rows["item_cat"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["itm_code"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["item"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["qty"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["unit_type"], 1, 0, 'C');
                        $pdf->Cell(27, 12, $rows["amt"], 1, 0, 'C');

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];

                    }
                    $head_ck = $head;
                    $i++;
                }

                $pdf->Cell(27, 12, "", 1, 0, 'C');
                $pdf->Cell(27, 12, "", 1, 0, 'C');
                $pdf->Cell(27, 12, "", 1, 0, 'C');
                $pdf->Cell(27, 12, "", 1, 0, 'C');
                $pdf->Cell(27, 12, "", 1, 0, 'C');
                $pdf->Cell(27, 12, "", 1, 0, 'C');
                $pdf->Cell(27, 12, $gp_total, 1, 0, 'C');
                $gp_total = 0;


                // $totalAmt = $totalAmt + (int)$rows["amt"];
                /*$product["date"] = $rows["date"];
                $product["bill_no"] = $rows["bill_no"];
                $product["type"] = "Restarunt";
                $product["amt"] = $rows["amt"];

                $product["mode"] = $rows["mode"];
                $product["tables"] = $rows["tables"];
                $product["chair"] = $rows["chair"];*/


                // array_push($items["report"], $product);


                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;

                $pdf->Ln();
                $pdf->Cell(40, 10, "TOTAL AMT      :", 0, 0, 'C');
                $pdf->Cell(40, 10, $totalAmt, 0, 0, 'C');

                $pdf->Output();

            } // echo json_encode($items);
            else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }


        }


    } else if ($cat == "Parcel") {
        $itemWiseQueryTwo = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from parcel_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id  ";
        $itemWiseQueryTwo = $itemWiseQueryTwo . '' . "where (bs.date BETWEEN '$date1' AND '$date2')";

        if ($group != "All") {
            $itemWiseQueryTwo = $itemWiseQueryTwo . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryTwo = $itemWiseQueryTwo . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryTwo = $itemWiseQueryTwo . '' . " GROUP BY bs.itm_code order by CONCAT(ic.item_cat,bs.item)";
        $resultOne = mysqli_query($con, $itemWiseQueryTwo);

        if (!empty($resultOne)) {
            // check for empty result
            if (mysqli_num_rows($resultOne) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                while ($rows = mysqli_fetch_array($resultOne)) {

                    $product = array();

                    $product["item_cat"] = $rows["item_cat"];
                    $product["itm_code"] = $rows["itm_code"];
                    $product["item"] = $rows["item"];
                    $product["qty"] = $rows["qty"];
                    $product["amt"] = $rows["amt"];
                    $product["unit_type"] = $rows["unit_price"];
                    $product["itm_id"] = $rows["itm_id"];
                    $product["id"] = $rows["id"];
                    $product["date"] = $rows["date"];
                    $product["shift"] = $rows["shift"];
                    $product["branch"] = $rows["branch"];
                    array_push($items["report"], $product);
                }

                echo json_encode($items);
            } else {
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


    } else if ($cat == "Room") {

        $itemWiseQueryThree = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from room_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id ";
        $itemWiseQueryThree = $itemWiseQueryThree . '' . "where (bs.date BETWEEN '$date1' AND '$date2')";

        if ($group != "All") {
            $itemWiseQueryThree = $itemWiseQueryThree . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryThree = $itemWiseQueryThree . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryThree = $itemWiseQueryThree . '' . " GROUP BY bs.itm_code order by CONCAT(ic.item_cat,bs.item)";
        $resultTwo = mysqli_query($con, $itemWiseQueryThree);

        if (!empty($resultTwo)) {
            // check for empty result
            if (mysqli_num_rows($resultTwo) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                while ($rows = mysqli_fetch_array($resultTwo)) {

                    $product = array();


                    $product["item_cat"] = $rows["item_cat"];
                    $product["itm_code"] = $rows["itm_code"];
                    $product["item"] = $rows["item"];
                    $product["qty"] = $rows["qty"];
                    $product["amt"] = $rows["amt"];
                    $product["unit_type"] = $rows["unit_price"];
                    $product["itm_id"] = $rows["itm_id"];
                    $product["id"] = $rows["id"];
                    $product["date"] = $rows["date"];
                    $product["shift"] = $rows["shift"];
                    $product["branch"] = $rows["branch"];
                    array_push($items["report"], $product);
                }

                echo json_encode($items);
            } else {
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


    } else if ($cat == "Restaurant") {

        //select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,bs.unit_type,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from past_bill_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id where (bs.date BETWEEN '2017-10-02' AND '2017-10-03') and ic.itm_id=---All--- and bs.shift=2 GROUP BY bs.itm_code order by CONCAT(ic.item_cat,bs.item)

        $itemWiseQueryFour = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,bs.unit_type,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from past_bill_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id  ";
        $itemWiseQueryFour = $itemWiseQueryFour . "WHERE (bs.date BETWEEN '$date1' AND '$date2')";
        // echo  $date1 ;
        //echo $date2;

        if ($group != "All") {
            $itemWiseQueryFour = $itemWiseQueryFour . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryFour = $itemWiseQueryFour . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryFour = $itemWiseQueryFour . '' . " GROUP BY bs.itm_code,bs.unit_type  order by CONCAT(ic.item_cat,bs.item)";


        $resultThree = mysqli_query($con, $itemWiseQueryFour);

        if ($pdftag == 0) {
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;
                $tot_qty = 0;
                $head = "";
                $TotalAmt = 0;
                $totalQty = 0;
                while ($rows = mysqli_fetch_array($resultThree)) {
                    $product = array();
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_type"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    } else {
                        if ($i != 0) {

                            $product["item_cat"] = "";
                            $product["itm_code"] = "";
                            $product["item"] = "";
                            $product["qty"] = "";
                            $product["amt"] = "";
                            $product["unit_type"] = "";
                            $product["groupTotal"] = $gp_total;
                            $TotalAmt = $TotalAmt + $gp_total;

                            array_push($items["report"], $product);
                            $gp_total = 0;
                        }
                        $head1 = $rows["item_cat"];

                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_type"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    }
                    $head_ck = $rows["item_cat"];
                    $i = $i + 1;

                }


                $product["item_cat"] = "";
                $product["itm_code"] = "";
                $product["item"] = "";
                $product["qty"] = "";
                $product["amt"] = "";
                $product["unit_type"] = "";
                $product["groupTotal"] = $gp_total;
                array_push($items["report"], $product);
                $TotalAmt = $TotalAmt + $gp_total;
                $gp_total = 0;


                $items["TotalQty"] = $tot_qty;
                $items["TotalAmt"] = $TotalAmt;
                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        } else {

            $pdf=new PDF_MC_Table();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(38, 12, "GROUP", 1, 0, 'C');
            $pdf->Cell(18, 12, "CODE", 1, 0, 'C');
            $pdf->Cell(45, 12, "ITEM NAME", 1, 0, 'C');
            $pdf->Cell(18, 12, "QTY", 1, 0, 'C');
            $pdf->Cell(18, 12, "UNIT", 1, 0, 'C');
            $pdf->Cell(18, 12, "AMT", 1, 0, 'C');
            $pdf->Cell(22, 12, "TOTAL", 1, 0, 'C');

            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty = 0;
                $totalAmt = 0;
                $tot_qty = 0;
                $val = 0;
                $head = "";
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;


                $pdf->SetWidths(array(38,18,45,18,18,18,22));
                $pdf->SetFont('Arial','',12);
                $pdf->Ln();
                while ($rows = mysqli_fetch_array($resultThree)) {
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {
                            $pdf->Row(array("",$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_type"],$rows["amt"],""));


                           /* $pdf->Cell(38, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["itm_code"], 1, 0, 'C');
                            $pdf->Cell(45, 12, $rows["item"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["qty"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["unit_type"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["amt"], 1, 0, 'C');
                            $pdf->Cell(22, 12, "", 1, 0, 'C');*/


                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }
                    } else {

                        if ($i != 0) {
                            $pdf->Row(array("","", "","","","",$gp_total));
                            /*$pdf->Cell(38, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(45, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(22, 12, $gp_total, 1, 0, 'C');*/
                            $totalAmt = $totalAmt + $gp_total;
                            $gp_total = 0;


                        }


                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {

                            $pdf->Row(array($rows["item_cat"],$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_type"],$rows["amt"],""));

                            /*$pdf->Cell(38, 12, $rows["item_cat"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["itm_code"], 1, 0, 'C');
                            $pdf->Cell(45, 12, $rows["item"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["qty"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["unit_type"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["amt"], 1, 0, 'C');
                            $pdf->Cell(22, 12, "", 1, 0, 'C');*/

                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }


                    }
                    $head_ck = $head;
                    $i = $i + 1;
                }

                $pdf->Row(array("","", "","","","",$gp_total));
                /*$pdf->Cell(38, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(45, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(22, 12, $gp_total, 1, 0, 'C');*/

                $totalAmt = $totalAmt + $gp_total;
                $totalQty = $totalQty + $gp_total;

                $gp_total = 0;

                $items["TotalQty"] = $gp_total;
                $items["TotalAmt"] = $totalAmt;
                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL Quanty      :",0,0,'C');
                $pdf->Cell(40,10,  $totalQty,0,0,'C');


                $pdf->Ln();
                $pdf->Cell(40, 10, "TOTAL AMT      :", 0, 0, 'C');
                $pdf->Cell(40, 10, $totalAmt, 0, 0, 'C');

                $pdf->Output();

            } // echo json_encode($items);
            else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }


        }


    } else if ($cat == "Takeaway") {

        $itemWiseQueryFIve = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from takeaway_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id ";
        $itemWiseQueryFIve = $itemWiseQueryFIve . '' . "where (bs.date BETWEEN '$date1' AND '$date2')";

        if ($group != "All") {
            $itemWiseQueryFIve = $itemWiseQueryFIve . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryFIve = $itemWiseQueryFIve . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryFIve = $itemWiseQueryFIve . '' . "  GROUP BY bs.itm_code  order by CONCAT(ic.item_cat,bs.item)";


        $resultFour = mysqli_query($con, $itemWiseQueryFIve);

        if ($pdftag == 0) {
            // check for empty result
            if (mysqli_num_rows($resultFour) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;
                $tot_qty = 0;
                $head = "";
                $TotalAmt = 0;
                $totalQty = 0;
                while ($rows = mysqli_fetch_array($resultFour)) {
                    $product = array();
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_price"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    } else {
                        if ($i != 0) {

                            $product["item_cat"] = "";
                            $product["itm_code"] = "";
                            $product["item"] = "";
                            $product["qty"] = "";
                            $product["amt"] = "";
                            $product["unit_type"] = "";
                            $product["groupTotal"] = $gp_total;
                            $TotalAmt = $TotalAmt + $gp_total;

                            array_push($items["report"], $product);
                            $gp_total = 0;
                        }
                        $head1 = $rows["item_cat"];

                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_price"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    }
                    $head_ck = $rows["item_cat"];
                    $i = $i + 1;

                }


                $product["item_cat"] = "";
                $product["itm_code"] = "";
                $product["item"] = "";
                $product["qty"] = "";
                $product["amt"] = "";
                $product["unit_type"] = "";
                $product["groupTotal"] = $gp_total;
                array_push($items["report"], $product);
                $TotalAmt = $TotalAmt + $gp_total;
                $gp_total = 0;


                $items["TotalQty"] = $tot_qty;
                $items["TotalAmt"] = $TotalAmt;
                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        } else {


            $pdf=new PDF_MC_Table();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(38, 12, "GROUP", 1, 0, 'C');
            $pdf->Cell(18, 12, "CODE", 1, 0, 'C');
            $pdf->Cell(45, 12, "ITEM NAME", 1, 0, 'C');
            $pdf->Cell(18, 12, "QTY", 1, 0, 'C');
            $pdf->Cell(18, 12, "UNIT", 1, 0, 'C');
            $pdf->Cell(18, 12, "AMT", 1, 0, 'C');
            $pdf->Cell(22, 12, "TOTAL", 1, 0, 'C');

            if (mysqli_num_rows($resultFour) > 0) {


/*                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();*/

                $totalQty = 0;
                $totalAmt = 0;
                $tot_qty = 0;
                $val = 0;
                $head = "";
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;


                $pdf->SetWidths(array(38,18,45,18,18,18,22));
                $pdf->SetFont('Arial','',12);
                $pdf->Ln();
               while ($rows = mysqli_fetch_array($resultFour)) {


                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {
                            $pdf->Row(array("",$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_price"],$rows["amt"],""));



                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }
                    } else {

                        if ($i != 0) {
                            $pdf->Row(array("","", "","","","",$gp_total));

                            $totalAmt = $totalAmt + $gp_total;
                            $gp_total = 0;

                        }


                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {

                            $pdf->Row(array($rows["item_cat"],$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_price"],$rows["amt"],""));



                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }


                    }
                    $head_ck = $head;
                    $i = $i + 1;
               }
                $pdf->Row(array("","", "","","","",$gp_total));


                $totalAmt = $totalAmt + $gp_total;
                $totalQty = $gp_total;

                $gp_total = 0;

                //$items["TotalQty"] = $totalQty;
                //$items["TotalAmt"] = $totalAmt;
                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL Quanty      :",0,0,'C');
                $pdf->Cell(40,10,  $totalQty,0,0,'C');


                $pdf->Ln();
                $pdf->Cell(40, 10, "TOTAL AMT      :", 0, 0, 'C');
                $pdf->Cell(40, 10, $totalAmt, 0, 0, 'C');

               $pdf->Output();

            } // echo json_encode($items);
            else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }


        }


    } else if ($cat == "Doordelivery") {


        $itemWiseQueryFour = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from door_del_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id ";
        $itemWiseQueryFour = $itemWiseQueryFour . '' . "where (bs.date BETWEEN '$date1' AND '$date2')";

        if ($group != "All") {
            $itemWiseQueryFour = $itemWiseQueryFour . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryFour = $itemWiseQueryFour . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryFour = $itemWiseQueryFour . '' . " GROUP BY bs.itm_code  order by CONCAT(ic.item_cat,bs.item)";
        $resultThree = mysqli_query($con, $itemWiseQueryFour);


        if ($pdftag == 0) {
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;
                $tot_qty = 0;
                $head = "";
                $TotalAmt = 0;
                $totalQty = 0;
                while ($rows = mysqli_fetch_array($resultThree)) {
                    $product = array();
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_price"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    } else {
                        if ($i != 0) {

                            $product["item_cat"] = "";
                            $product["itm_code"] = "";
                            $product["item"] = "";
                            $product["qty"] = "";
                            $product["amt"] = "";
                            $product["unit_type"] = "";
                            $product["groupTotal"] = $gp_total;
                            $TotalAmt = $TotalAmt + $gp_total;

                            array_push($items["report"], $product);
                            $gp_total = 0;
                        }
                        $head1 = $rows["item_cat"];

                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_price"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    }
                    $head_ck = $rows["item_cat"];
                    $i = $i + 1;

                }


                $product["item_cat"] = "";
                $product["itm_code"] = "";
                $product["item"] = "";
                $product["qty"] = "";
                $product["amt"] = "";
                $product["unit_type"] = "";
                $product["groupTotal"] = $gp_total;
                array_push($items["report"], $product);
                $TotalAmt = $TotalAmt + $gp_total;
                $gp_total = 0;


                $items["TotalQty"] = $tot_qty;
                $items["TotalAmt"] = $TotalAmt;
                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        } else {

            $pdf=new PDF_MC_Table();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(38, 12, "GROUP", 1, 0, 'C');
            $pdf->Cell(18, 12, "CODE", 1, 0, 'C');
            $pdf->Cell(45, 12, "ITEM NAME", 1, 0, 'C');
            $pdf->Cell(18, 12, "QTY", 1, 0, 'C');
            $pdf->Cell(18, 12, "UNIT", 1, 0, 'C');
            $pdf->Cell(18, 12, "AMT", 1, 0, 'C');
            $pdf->Cell(22, 12, "TOTAL", 1, 0, 'C');

            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty = 0;
                $totalAmt = 0;
                $tot_qty = 0;
                $val = 0;
                $head = "";
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;


                $pdf->SetWidths(array(38,18,45,18,18,18,22));
                $pdf->SetFont('Arial','',12);
                $pdf->Ln();
                while ($rows = mysqli_fetch_array($resultThree)) {
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {
                            $pdf->Row(array("",$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_price"],$rows["amt"],""));


                            /* $pdf->Cell(38, 12, "", 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["itm_code"], 1, 0, 'C');
                             $pdf->Cell(45, 12, $rows["item"], 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["qty"], 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["unit_type"], 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["amt"], 1, 0, 'C');
                             $pdf->Cell(22, 12, "", 1, 0, 'C');*/


                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }
                    } else {

                        if ($i != 0) {
                            $pdf->Row(array("","", "","","","",$gp_total));
                            /*$pdf->Cell(38, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(45, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(22, 12, $gp_total, 1, 0, 'C');*/
                            $totalAmt = $totalAmt + $gp_total;
                            $gp_total = 0;

                        }


                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {

                            $pdf->Row(array($rows["item_cat"],$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_price"],$rows["amt"],""));

                            /*$pdf->Cell(38, 12, $rows["item_cat"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["itm_code"], 1, 0, 'C');
                            $pdf->Cell(45, 12, $rows["item"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["qty"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["unit_type"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["amt"], 1, 0, 'C');
                            $pdf->Cell(22, 12, "", 1, 0, 'C');*/

                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }


                    }
                    $head_ck = $head;
                    $i = $i + 1;
                }


                $pdf->Row(array("","", "","","","",$gp_total));
                /*$pdf->Cell(38, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(45, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(22, 12, $gp_total, 1, 0, 'C');*/

                $totalAmt = $totalAmt + $gp_total;
                $totalQty =  $gp_total;

                $gp_total = 0;

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;
                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL Quanty      :",0,0,'C');
                $pdf->Cell(40,10,  $totalQty,0,0,'C');


                $pdf->Ln();
                $pdf->Cell(40, 10, "TOTAL AMT      :", 0, 0, 'C');
                $pdf->Cell(40, 10, $totalAmt, 0, 0, 'C');

                $pdf->Output();

            } // echo json_encode($items);
            else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }



        }


    } else if ($cat == "FoodPanda") {


        $itemWiseQueryFour = "select ic.item_cat,bs.itm_code,bs.item,sum(bs.qty) as qty,sum(bs.amt) as amt,im.unit_price,ic.itm_id,bs.date,bs.id,bs.shift,ae.branch from foodpanda_details bs left join item_master im on im.itm_code=bs.itm_code left join item_cat ic on ic.itm_id=im.itm_cat left join add_employee ae on ae.eid=bs.e_id ";
        $itemWiseQueryFour = $itemWiseQueryFour . '' . "where (bs.date BETWEEN '$date1' AND '$date2')";

        if ($group != "All") {
            $itemWiseQueryFour = $itemWiseQueryFour . ' ' . " and ic.itm_id='$group'";
        }
        if ($shift != "All") {

            if ($shift == "Morning") {
                $shift = "1";
            } else {
                $shift = "2";
            }
            $itemWiseQueryFour = $itemWiseQueryFour . ' ' . " and bs.shift='$shift'";
        }

        $itemWiseQueryFour = $itemWiseQueryFour . '' . "GROUP BY bs.itm_code  order by CONCAT(ic.item_cat,bs.item)";

        $resultThree = mysqli_query($con, $itemWiseQueryFour);

        if ($pdftag == 0) {
            // check for empty result
            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;
                $tot_qty = 0;
                $head = "";
                $TotalAmt = 0;
                $totalQty = 0;
                while ($rows = mysqli_fetch_array($resultThree)) {
                    $product = array();
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_price"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    } else {
                        if ($i != 0) {

                            $product["item_cat"] = "";
                            $product["itm_code"] = "";
                            $product["item"] = "";
                            $product["qty"] = "";
                            $product["amt"] = "";
                            $product["unit_type"] = "";
                            $product["groupTotal"] = $gp_total;
                            $TotalAmt = $TotalAmt + $gp_total;

                            array_push($items["report"], $product);
                            $gp_total = 0;
                        }
                        $head1 = $rows["item_cat"];

                        $product["item_cat"] = $head1;
                        $product["itm_code"] = $rows["itm_code"];
                        $product["item"] = $rows["item"];
                        $product["qty"] = $rows["qty"];
                        $product["amt"] = $rows["amt"];
                        $product["unit_type"] = $rows["unit_price"];
                        $product["groupTotal"] = "";
                        array_push($items["report"], $product);

                        $total = $total + (int)$rows["amt"];
                        $gp_total = $gp_total + (int)$rows["amt"];
                        $tot_qty = $tot_qty + (int)$rows["qty"];
                    }
                    $head_ck = $rows["item_cat"];
                    $i = $i + 1;

                }


                $product["item_cat"] = "";
                $product["itm_code"] = "";
                $product["item"] = "";
                $product["qty"] = "";
                $product["amt"] = "";
                $product["unit_type"] = "";
                $product["groupTotal"] = $gp_total;
                array_push($items["report"], $product);
                $TotalAmt = $TotalAmt + $gp_total;
                $gp_total = 0;


                $items["TotalQty"] = $tot_qty;
                $items["TotalAmt"] = $TotalAmt;
                echo json_encode($items);
            } else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }
        } else {

            $pdf=new PDF_MC_Table();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(38, 12, "GROUP", 1, 0, 'C');
            $pdf->Cell(18, 12, "CODE", 1, 0, 'C');
            $pdf->Cell(45, 12, "ITEM NAME", 1, 0, 'C');
            $pdf->Cell(18, 12, "QTY", 1, 0, 'C');
            $pdf->Cell(18, 12, "UNIT", 1, 0, 'C');
            $pdf->Cell(18, 12, "AMT", 1, 0, 'C');
            $pdf->Cell(22, 12, "TOTAL", 1, 0, 'C');

            if (mysqli_num_rows($resultThree) > 0) {
                $items["statusCode"] = 201;
                $items["message"] = "Item cat list successfully retrived";
                $items["report"] = array();

                $totalQty = 0;
                $totalAmt = 0;
                $tot_qty = 0;
                $val = 0;
                $head = "";
                $head_ck = "";
                $head1 = "";
                $total = 0;
                $i = 0;
                $gp_total = 0;


                $pdf->SetWidths(array(38,18,45,18,18,18,22));
                $pdf->SetFont('Arial','',12);
                $pdf->Ln();
                while ($rows = mysqli_fetch_array($resultThree)) {
                    $head = $rows["item_cat"];
                    if ($head == $head_ck) {
                        $head1 = "";
                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {
                            $pdf->Row(array("",$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_price"],$rows["amt"],""));


                            /* $pdf->Cell(38, 12, "", 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["itm_code"], 1, 0, 'C');
                             $pdf->Cell(45, 12, $rows["item"], 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["qty"], 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["unit_type"], 1, 0, 'C');
                             $pdf->Cell(18, 12, $rows["amt"], 1, 0, 'C');
                             $pdf->Cell(22, 12, "", 1, 0, 'C');*/


                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }
                    } else {

                        if ($i != 0) {
                            $pdf->Row(array("","", "","","","",$gp_total));
                            /*$pdf->Cell(38, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(45, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(18, 12, "", 1, 0, 'C');
                            $pdf->Cell(22, 12, $gp_total, 1, 0, 'C');*/
                            $totalAmt = $totalAmt + $gp_total;
                            $gp_total = 0;

                        }


                        if (!empty($rows["amt"]) && !empty($rows["qty"])) {

                            $pdf->Row(array($rows["item_cat"],$rows["itm_code"], $rows["item"],$rows["qty"],$rows["unit_price"],$rows["amt"],""));

                            /*$pdf->Cell(38, 12, $rows["item_cat"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["itm_code"], 1, 0, 'C');
                            $pdf->Cell(45, 12, $rows["item"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["qty"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["unit_type"], 1, 0, 'C');
                            $pdf->Cell(18, 12, $rows["amt"], 1, 0, 'C');
                            $pdf->Cell(22, 12, "", 1, 0, 'C');*/

                            $total = $total + (int)$rows["amt"];
                            $gp_total = $gp_total + (int)$rows["amt"];
                            $tot_qty = $tot_qty + (int)$rows["qty"];
                        }


                    }
                    $head_ck = $head;
                    $i = $i + 1;
                }

                $pdf->Row(array("","", "","","","",$gp_total));
                /*$pdf->Cell(38, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(45, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(18, 12, "", 1, 0, 'C');
                $pdf->Cell(22, 12, $gp_total, 1, 0, 'C');*/

                $totalAmt = $totalAmt + $gp_total;
                $totalQty = $gp_total;

                $gp_total = 0;

                $items["TotalQty"] = $totalQty;
                $items["TotalAmt"] = $totalAmt;
                $pdf->Ln();
                $pdf->Cell(40,10, "TOTAL Quanty      :",0,0,'C');
                $pdf->Cell(40,10,  $totalQty,0,0,'C');


                $pdf->Ln();
                $pdf->Cell(40, 10, "TOTAL AMT      :", 0, 0, 'C');
                $pdf->Cell(40, 10, $totalAmt, 0, 0, 'C');

                $pdf->Output();

            } // echo json_encode($items);
            else {
                // no product found
                $items["statusCode"] = 202;
                $items["message"] = "No Restarunt item found";

                // echo no users JSON
                echo json_encode($items);
            }


        }


    }
}



?>