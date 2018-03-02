
 <?php
 include ('config.php');
session_start();

?>
 <table>
 <tr>
     <th>SNo</th>
     <th>ITEM</th>
     <th>UNIT</th>
     <th>QTY</th>
     <th>RATE</th>

 </tr>
     <tbody>
 <?php


                if(isset($_SESSION['main']))
                {
                    $sno=0;
                    $total=0;
                    foreach($_SESSION['main']as $value)
                    {



                        foreach($value as $key=>$value2)
                        {
                            $getSelectedname=mysqli_query($con,"SELECT item,itm_code,unit FROM item_master WHERE itm_code='".$key."'");
                            $accs_id_name=mysqli_fetch_array($getSelectedname);
                            $items_nam=$accs_id_name['item'];
                            if($value2>0){
                                $sno=$sno+1;
                                ?>


<tr>
                                <td><?php if(isset($sno)){echo $sno;}?></td>
                                <td><?php if(isset($accs_id_name['item'])){echo$accs_id_name['item'];}?> </td>
                                <td><?php if(isset($accs_id_name['unit'])){echo $accs_id_name['unit'];}?></td>
                                <td><?php if(isset($value2)){echo $value2;}?></td>
                                <td><?php if(isset($value2)){echo ($value2* (int)$accs_id_name['unit']);  $total =$total +($value2* (int)$accs_id_name['unit']);}?></td>

</tr>



                                <?php
                            }
                        }
                    }
                }
                ?>
     </tbody>
 </table>

                  <h4 style="margin-top: 10%;margin-bottom: 10%;color: white;text-align: right;font-weight: bold;font-size: 22px">Total Amount : Rs.<?php  if(isset($total)){echo  $total;}?>.00</h4>


