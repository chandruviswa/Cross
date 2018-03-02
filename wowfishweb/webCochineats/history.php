
<?php
include ('config.php');
session_start();

?>
<table>
    <tr>
        <th>SNo</th>
        <th>Name</th>
        <th>Bill No</th>
        <th>Date</th>
        <th>Time</th>
        <th>Amount</th>
        <th>Status</th>

    </tr>
    <tbody>
    <?php
    $total=0;
    $getSelectedname=mysqli_query($con,"SELECT * FROM `past_bill` WHERE sales_id='".$_SESSION['eid']."'");
    $sno=0;
    while ($accs_id_name=mysqli_fetch_array($getSelectedname)){

        $sno=$sno+1;
        ?>


        <tr>
            <td><?php if(isset($sno)){echo $sno;}?></td>
            <td><?php if(isset($accs_id_name['sales_id'])){echo$accs_id_name['sales_id'];}?> </td>
            <td><?php if(isset($accs_id_name['bill_id'])){echo $accs_id_name['bill_id'];}?></td>
            <td><?php if(isset($accs_id_name['date'])){echo $accs_id_name['date'];}?></td>
            <td><?php if(isset($accs_id_name['time'])){echo $accs_id_name['time'];}?></td>
            <td><?php if(isset($accs_id_name['amt'])){echo $accs_id_name['amt'];}?></td>
            <td><?php if(isset($accs_id_name['status'])){echo $accs_id_name['status'];}?></td>

        </tr>



        <?php



    }




    ?>
    </tbody>
</table>

