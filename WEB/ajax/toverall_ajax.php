<form method="post" action="" id="loginform" class="form-horizontal" role="form">
     <div class="clear"></div> 
            <div class="container1" style="position:fixed;width:100%;margin-top:-20px; z-index:999; background:url(images/btm_bg.png); border-bottom:1px solid #fff;">
            <button type="submit" name="submit" class="btn btn-success" style="float:left;padding:9px 9px; margin-left:0%;"><span class="glyphicon glyphicon-print"></button>
            <input type="text" class="form-control" placeholder="Total Amt" name="full_amount" id="famt" 
            style="border: 0px solid #505050;width:25%; float:left; background-color:transparent; font-size:x-large; color:#0F0; font-weight:bold; margin-left:0%;"  readonly="readonly" value="0" />
	        </div>
		<div class="clear"></div>  <br/><br/>
        	
<?php
	include('../session.php');
	include('../include/connect.php');
	$var=$_GET['val'];
	
	
	$item_cat = "";
    if(isset($_SESSION['titem_cat']))
	{
        $item_cat = $_SESSION['titem_cat']; 
	}
	
	$getcid=mysql_query("select itm_id from item_cat where item_cat='".$item_cat."'");
	$acc_id_val=mysql_fetch_array($getcid);
	$aid=$acc_id_val['itm_id'];
	
		
	$qry=mysql_query("select itm_code,item,unit_price from item_master where item like '%".$_GET['val']."%' and itm_cat='".$aid."'")or die(mysql_error());
	while($qry_val=mysql_fetch_array($qry))
	{
	?>
  
 	<div style="clear:both;"></div>
                
       	<input type="text" class="form-control"
        name="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code']."_itemname";}?>"
        style="border: 0px solid #505050; background-color:transparent;font-weight:bold; width:35%; float:left; color:#fff; font-size:18px;"
        readonly=true value="<?php if(isset($qry_val['item'])){echo $qry_val['item'];}?>">
        
        <span style="float: left;margin-top: 5px;font-weight: bold; color:#fff;"> Rs </span>
        <input id="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code']."_amount";}?>"
        name="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code']."_unitamount";}?>" type="text" class="form-control"
        style="border: 0px solid #505050;background-color:transparent;font-weight:bold;width:15%; color:#fff; float:left;font-size:18px;" readonly=true 
        value="<?php if(isset($qry_val['unit_price'])){echo $qry_val['unit_price'];}?>">
        
        <input id="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code'];}?>"
        name="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code']."_qty";}?>" 
        type="text" class="form-control" style=" color:#fff;border: 0px solid #505050;background-color:transparent;font-weight:bold;width:15%; float:left;font-size:18px;" 
        readonly=true value="0">
        
        <!--<span style="float: left;margin-top: 5px;font-weight: bold; color:#fff;"> Rs </span>-->
        <input id="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code']."_amt";}?>"
        name="<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code']."_totamt";}?>"
        type="hidden" class="form-control" style="font-size:18px; color:#fff;border: 0px solid #505050;background-color:transparent;width:15%;
        font-weight:bold; float:left;" readonly=true value="0">
        
        <button type="button" id="minus" onclick="buttonSubtract1('<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code'];}?>')" name="subtract1" 
		class="btn btn-info" style="padding:5px 5px; background-color:transparent;">
        <span class="glyphicon glyphicon-minus"></span></button>
        
        <button type="button" id="plus" onclick="buttonAdd1('<?php if(isset($qry_val['itm_code'])){echo $qry_val['itm_code'];}?>')" name="add1" 
        class="btn btn-info" style="padding:5px 5px; background-color:transparent;">
        <span class="glyphicon glyphicon-plus"></span></button>
            
        <br/>
       	<?php		
			}
	      ?>
    	<!--<button type="submit" name="submit" class="btn btn-success" style="float:right;">Order</button>
        <input type="text" class="form-control" placeholder="Total Amt" name="full_amount" id="famt" 
        style="border: 0px solid #505050;width:30%; float:right; background-color:transparent; font-size:x-large; color:#fff; font-weight:bold;"  readonly="readonly" value="0" />-->
       
</form>

