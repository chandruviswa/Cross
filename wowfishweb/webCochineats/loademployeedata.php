
<?php
include('config.php');
session_start();
//include ('session.php');
//$empid = $_GET['empid'];
//$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
//$db = mysql_select_db("company", $connection); // Selecting Database
//if (isset($empid)) {
   // $query = " SELECT * FROM emp_info WHERE emp_id = '$empid'";
   // $result = mysqli_query($con,$query);
   // echo '<table border="1px solid black; ">';
   // while($row = mysql_fetch_object($result)){
     //   echo '<tr>'
    //        .'<td>'.$row->emp_name.'</td>'
     //       .'<td>'.$row->email.'</td>'
     //       .'<td>'.$row->phone.'</td>'
       //     .'</tr>';
   // }
   // echo '</table>';
//}
//mysql_close($connection); // Connection Closed


$item= $_GET['item'];
if(isset($item)){
        $countquery =mysqli_query($con,"SELECT COUNT(*) FROM  `item_master` WHERE `itm_cat`='".$_GET['item']."'");
        $countarry=mysqli_fetch_array($countquery);
        $count=$countarry['COUNT(*)'];
        for($i=0;$i<$count ;$i++){
            $s=0;
            if($i<$count) {
                $s = 4;
                ?>
                <div class="show-reel">
                    <?php


                    $countqueryOne = mysqli_query($con, "SELECT * FROM  `item_master` WHERE `itm_cat`='" . $_GET['item'] . "' LIMIT $i,$s");
                    while ($row = mysqli_fetch_array($countqueryOne)) {



                        ?>

                        <div class="col-md-3 agile-gallery-grid">
                            <div class="agile-gallery">
                                <a  class="lsb-preview" data-lsb-group="header">
                                    <img width="500px" height="200px" src="http://www.cochineats.in/cochin_eats/image/<?php if (isset($row['image_path'])) {
                                        echo $row['image_path'];
                                    } ?>" alt=""/>

                                    <div style="background: rgba(12, 12, 12, 0.48);color: #FFFFFF;padding-top: 10px;">
                                        <h5 style="font-weight: bold;font-size: 16px"><?php if (isset($row['item'])) {
                                                echo $row['item'];
                                            } ?></h5>

                                        <h4 style="font-family: Arial">&#8377;<?php if (isset($row['unit'])) {
                                                echo $row['unit'];
                                            } ?></h4>

                                    </div>

<!--                                    <div style="background-color: rgba(72,72,72,0.4)">-->
<!---->
<!--                                        <h4>&#8377;--><?php //if (isset($row['unit'])) {
//                                                echo $row['unit'];
//                                            } ?><!--</h4>-->
<!--                                    <div class="date-w3">-->
<!--                                        <h4>&#8377;--><?php //if (isset($row['unit'])) {
//                                                echo $row['unit'];
//                                            } ?><!--</h4>-->
<!--                                    </div>-->
<!--                                    <div class="blog-description-w3agile">-->
<!--                                        <h5 style="color: #FFFFFF;font-weight: bold">--><?php //if (isset($row['item'])) {
//                                                echo $row['item'];
//                                            } ?><!--</h5>-->
<!--                                    </div>-->
<!--                                    </div>-->



                                       <?php

                                       $sampleflag= false;

                                       $kye="";
                                       $valueser=0;

                                       if(isset($_SESSION['main']))
                                       {
                                           foreach($_SESSION['main'] as $value)
                                           {
                                               foreach($value as $key=>$value2)
                                               {
                                                   $kye=$key;
                                                   $valueser=$value2;
                                                   if( $kye == $row['itm_code']){

                                                       if($value2>0 ){
                                                           $sampleflag=true;
                                                           ?>
                                                           <form onsubmit="return false">
                                                               <button onclick="buttonSubtract1('<?php if(isset($row['itm_code'])){echo $row['itm_code'];}?>,<?php if (isset($row['itm_cat'])){echo $row['itm_cat'];}?>')" class="btn btn-success">-</button>

                                                               <?php if (isset($valueser)){echo $valueser;}?>
                                                               <button onclick="buttonAdd1('<?php if(isset($row['itm_code'])){echo $row['itm_code'];}?>,<?php if (isset($row['itm_cat'])){echo $row['itm_cat'];}?>')" class="btn btn-success">+</button>
                                                           </form>
                                                           <?php
                                                       }
                                                   }
                                                   }
                                           }
                                       }
                                       if( $sampleflag == false){
                                           ?>
                                           <form onsubmit="return false">
                                               <button onclick="buttonAdd1('<?php if(isset($row['itm_code'])){echo $row['itm_code'];}?>,<?php if (isset($row['itm_cat'])){echo $row['itm_cat'];}?>')" class="btn btn-success">Add to Cart</button>
                                           </form>

                                           <?php

                                       }



                                       ?>







                                       <!--                                       <form onsubmit="return false">-->
<!--                                       <button onclick="addData('sampbutton')" class="btn-success btn">Add to cart</button>-->
<!--                                           <button class="btn btn-success" id="btn1">+</button><button class="btn-success btn" id="btn2">-</button>-->
<!--                                       </form>-->

                                </a>

                            </div>
                        </div>


                        <?php


                    }

                    ?>

                    <div class="clearfix"></div>
                </div>
                <?php
                $i=$i+3;

            }

        }

}
?>




