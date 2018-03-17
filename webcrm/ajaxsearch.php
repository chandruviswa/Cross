<?php
include ('config.php');
session_start();

//if(isset($_GET['qno'])  && isset($_GET['id'])){
//    $qno = $_GET['qno'];
//    $deleteid = $_GET['id'];
//    $insertQuery = mysqli_query($con, "DELETE FROM `quotation` WHERE `id` = '".$deleteid."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' AND qno='".$qno."'");
//    if ($insertQuery) {
//    }
//}


?>
<table class="table table-striped custome" >
    <tr>
        <th>SNo</th>
        <th>Company Name</th>
        <th>Contact Person</th>
        <th>Employee</th>
        <th>Branch</th>
        <th>Update date</th>
        <th>Status</th>
        <th>Follow date</th>
        <th>Expected date</th>
        <th>product</th>
        <th>Total</th>
        <th>Edit</th>
    </tr>
    <?php

    $qury="SELECT * FROM  `leads` WHERE eid='".$_SESSION['eid']."' AND sid='".$_SESSION['sid']."' AND aid='".$_SESSION['aid']."' ";

    if (isset($_GET['cname'])  && isset($_GET['name']) && isset($_GET['fdate']) && isset($_GET['product'] )&& isset($_GET['status'])) {


        $cname = $_GET['cname'];
        $name = $_GET['name'];
        $fdate = $_GET['fdate'];
        $product = $_GET['product'];
        $status =$_GET['status'];


        if($cname !="All" ){
            $qury=$qury."AND companyname='".$cname."'";
        }
        if($name !="All" ){
            $qury=$qury."AND contactperson='".$name."'";
        }
        if( $fdate !="All" ){
            $qury=$qury."AND followdate='".$fdate."'";
        }
        if(  $product !="All" ){
            $qury=$qury."AND product='".$product."'";
        }
        if(  $status !="All" ){
            $qury=$qury."AND status='".$status."'";
        }



//
//    $insertQuery = mysqli_query($con, "INSERT INTO `quotation_details`(`id`, `sid`, `aid`, `qno`, `product`, `unit`, `qty`, `amt`) VALUES (NULL ,'".$_SESSION['sid']."','".$_SESSION['aid']."','$qno','$name','$unit','$qty','$amt')");
//    if ($insertQuery) {
//    }

    }



    if(isset($_POST['serch'])){

        $searchquery =mysqli_query($con,"SELECT * FROM  `add_company`  WHERE mobile ='".$_POST['serch']."' ");
        $searchAreray = mysqli_fetch_array($searchquery);
        $searchkey =$searchAreray['id'];

        if(empty( $searchkey)){
            //echo  "<script>alert('success')</script>";

            $searchquery =mysqli_query($con,"SELECT * FROM  `add_contacts`  WHERE mobile ='".$_POST['serch']."' ");
            $searchAreray = mysqli_fetch_array($searchquery);
            $searchkey =$searchAreray['id'];
            $qury=$qury."AND 	contactperson='".$searchkey."'";
        }else{
            $qury=$qury."AND 	companyname='".$searchkey."'";
        }



    }
    $SelectLeadQuery=mysqli_query($con,$qury);

    // $SelectLeadQuery=mysqli_query($con,);
    $sno=0;
    while($arraylead=mysqli_fetch_array($SelectLeadQuery)){
        $sno=$sno+1;
        ?>
        <tr>
            <td> <a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($sno)){echo $sno;}?></a></td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                    $selectOne=mysqli_query($con,"SELECT * FROM  `add_company` WHERE id='".$arraylead['companyname']."'");
                    $arrayleads=mysqli_fetch_array($selectOne);
                    if(isset($arrayleads['cname']))
                    {
                        echo $arrayleads['cname'];
                    }?></a>
            </td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                    $selectOne=mysqli_query($con,"SELECT * FROM  `add_contacts` WHERE id='".$arraylead['contactperson']."'");
                    $arrayleads=mysqli_fetch_array($selectOne);
                    if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
            </td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                    $selectOne=mysqli_query($con,"SELECT * FROM  `add_lead` WHERE id='".$arraylead['eid']."'");
                    $arrayleads=mysqli_fetch_array($selectOne);
                    if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
            </td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php
                    $selectOne=mysqli_query($con,"SELECT * FROM  `admin` WHERE id='".$arraylead['aid']."'");
                    $arrayleads=mysqli_fetch_array($selectOne);
                    if(isset($arrayleads['name'])){echo $arrayleads['name'];}?></a>
            </td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['updatedate'])){echo $arraylead['updatedate'];}?></a></td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['status'])){
                        // echo $arraylead['status'];
                        if($arraylead['status'] == "HotFunnel"){
                            ?>
                            <span class="label box label-success">HotFunnel</span>
                            <?php
                        }else if($arraylead['status'] == "OrderLost"){
                            ?>
                            <span class="label box label-danger">Orderlost</span>
                            <?php
                        }else if($arraylead['status'] == "DealClose"){
                            ?>
                            <span class="label box " style="background-color: #2D6FE2  ">DealClose</span>
                            <?php
                        }else if($arraylead['status'] == "Forecast"){
                            ?>
                            <span class="label box" style="background-color: #9d28ce  ">Forecast</span>
                            <?php
                        }else if($arraylead['status'] == "Pipeline"){
                            ?>
                            <span class="label box label-warning">Pipeline</span>
                            <?php
                        }
                        else if($arraylead['status'] == "Invoiced"){
                            ?>
                            <span class="label box" style="background-color: #CEB904  ">Invoiced</span>
                            <?php
                        }else if($arraylead['status'] == "PostSale"){
                            ?>
                            <span class="label box" style="background-color: #6e7f02">PostSale</span>
                            <?php
                        }
                    }?></a></td>
            <td ><a style="color: red" href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['followdate'])){echo $arraylead['followdate'];}?></a></td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['expecteddate'])){echo $arraylead['expecteddate'];}?></a> </td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['product'])){echo $arraylead['product'];}?></a></td>
            <td><a href="viewcustomer.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><?php if(isset($arraylead['total'])){echo $arraylead['total'];}?></a></td>
            <!--                                                    <td><button type="submit" name="view" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-success">View</button></td>-->
            <td><a href="employeeaddlead.php?edit=<?php if(isset($arraylead['id'])){echo $arraylead['id'];}?>"><img style="width: 20px;height: 20px;margin-left: 10px;margin-right: 10px"  src="assets/img/document.png"> </a></td>
            <!--                                                    <td> <button  name="delete" value="--><?php //if(isset($arraylead['id'])){echo $arraylead['id'];}?><!--" class="btn btn-danger">Delete</button></td>-->
        </tr>
        <!--                                <input style="width: 100%;margin: 2px" type="submit" name="lead" value="--><?php //if(isset($arraylead['name'])){echo $arraylead['name'];}?><!--">-->
        <?php

    }
    ?>
</table>
