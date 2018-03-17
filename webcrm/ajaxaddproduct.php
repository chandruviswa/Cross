<?php
include ('config.php');
session_start();
if (isset($_GET['qno'])  && isset($_GET['name']) && isset($_GET['unit']) && isset($_GET['qty'])) {


    $qno = $_GET['qno'];
    $unit = $_GET['unit'];
    $qty = $_GET['qty'];
    $name = $_GET['name'];
    $amt = (int)$unit * (int)$qty ;




    $insertQuery = mysqli_query($con, "INSERT INTO `quotation_details`(`id`, `sid`, `aid`, `qno`, `product`, `unit`, `qty`, `amt`) VALUES (NULL ,'".$_SESSION['sid']."','".$_SESSION['aid']."','$qno','$name','$unit','$qty','$amt')");
    if ($insertQuery) {
    }

}
if(isset($_GET['qno'])  && isset($_GET['id'])){
    $qno = $_GET['qno'];
    $deleteid = $_GET['id'];
    $insertQuery = mysqli_query($con, "DELETE FROM `quotation` WHERE `id` = '".$deleteid."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='".$qno."'");
    if ($insertQuery) {
    }
}


?>
<table>
    <tr>
        <th>SNo</th>
        <th>ITEM</th>
        <th>UNIT</th>
        <th>QTY</th>
        <th>RATE</th>
        <th>ACTION</th>

    </tr>
    <tbody>
    <?php
$slelectQuery = mysqli_query($con,"SELECT * FROM `quotation_details` WHERE sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='".$qno."'");
    $sno=0;
    $total =0;

    while ($accs_id_name = mysqli_fetch_array($slelectQuery)){




    $sno=$sno+1;

                    ?>


                    <tr>
                        <td><?php if(isset($sno)){echo $sno;}?></td>
                        <td><?php if(isset($accs_id_name['product'])){echo$accs_id_name['product'];}?> </td>
                        <td><?php if(isset($accs_id_name['unit'])){echo $accs_id_name['unit'];}?></td>
                        <td><?php  if(isset($accs_id_name['qty'])){echo$accs_id_name['qty'];}?></td>
                        <td><?php if(isset($accs_id_name['qty'])){echo ($accs_id_name['qty']* (int)$accs_id_name['unit']);  $total =$total +($accs_id_name['qty']* (int)$accs_id_name['unit']);}?></td>
                        <td><button id="btn" onclick="deletequotation('displaydata')" value="<?php if(isset($accs_id_name['id'])){echo$accs_id_name['id'];}?> " style="color: red">DELETE</button></td>

                    </tr>



                    <?php
    }

    ?>
    </tbody>
</table>

<h4 style="margin-top: 5%;margin-bottom: 5%;color: black;text-align: right;font-weight: bold;font-size: 22px">Total Amount : Rs.<?php  if(isset($total)){echo  $total;}?>.00</h4>
