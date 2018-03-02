<?php
include('session.php');


    $a = "";
    if(isset($_POST['a'])){
      $_SESSION['a'] = $_POST['a'];
    }
	
	
  if (isset($_POST['a']))
  {
	        
	$user_check=$_SESSION['login_user'];
	$acc_qry4=mysql_query("select emp_id from add_user where user_name='".$user_check."'");
	$acc_id_val4=mysql_fetch_array($acc_qry4);
	$sales_id=$acc_id_val4['emp_id'];
			
	$tab_dis=mysql_query("select * from past_bill_details where bill_no='0' and tables='".$_SESSION['a']."' and sales_id !='".$sales_id."'");
	$tab_dis_val=mysql_num_rows($tab_dis);
	if($tab_dis_val>0)
	{
			echo "<script>alert('Table In Service')</script>";
	}
	else
	{
	 	header("Location: chairs.php");
	} 
	
  }
  
  $b = "";
    if(isset($_POST['b'])){
      echo $_SESSION['b'] = $_POST['b'];
	
    }
	


  if (isset($_POST['b']))
  {
	        
	$user_check=$_SESSION['login_user'];
	$acc_qry4=mysql_query("select emp_id from add_user where user_name='".$user_check."'");
	$acc_id_val4=mysql_fetch_array($acc_qry4);
	$sales_id=$acc_id_val4['emp_id'];
			
	/*$tab_dis=mysql_query("select * from past_bill_details where bill_no='0' and tables='".$_SESSION['a']."' and sales_id !='".$sales_id."'");
	$tab_dis_val=mysql_num_rows($tab_dis);
	if($tab_dis_val>0)
	{
		echo "<script> document.getElementById('mine-btn').style.backgroundImage = 'url('images/inprocess.png')'; </script>";		
	}
	else
	{
	 	header("Location: chairs.php");
	} */header("Location: categories.php");
  }
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="user-scalable=yes, width=device-width" />
<title>Tables</title>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<link  rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="animate/animate.min.css">
<style>

		/* Square btn*/
		.btn-sq-lg {
		  width: 150px !important;
		  height: 150px !important;

		}
		
		.btn-sq {
		  width: 100px !important;
		  height: 100px !important;
		  font-size: 10px;

		}
		
		.btn-sq-sm {
		  width: 50px !important;
		  height: 50px !important;
		  font-size: 10px;

		}
		
		.btn-sq-xs {
		  width: 25px !important;
		  height: 25px !important;
		  padding:2px;

		}
</style>
</head>

<body class="animated slideInLeft" style="background-image:url(images/bg.png);">
<div class="container navbar"  style="background-color:transparent; width:100%;">
<div class="row">

<a href="#"><span class="glyphicon glyphicon-home" style="margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>
<h4 style="text-align:center; color:#fff; margin-top:-15px; font-weight:bold; font-size:15px;"> TABLES </h4>
</div>
</div>

<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
        <div class="animated slideInLeft">                    
		<form method="post" action="" id="loginform" class="form-horizontal" role="form">
		<div style="width:100%;">
        
	    <?php
	
	    $cust_edit=mysql_query("select distinct tname from past_bill_table");
        $cust_edit_num=mysql_num_rows($cust_edit);
        if($cust_edit_num>0)
        {
			$j=0;
            while($cust_edit_val=mysql_fetch_array($cust_edit))
			{
				$j++;
				$x_q=mysql_query("select count(*) from past_bill_table where tname='".$cust_edit_val['tname']."'");
				$x_v=mysql_fetch_array($x_q);
				
				
				$y_q=mysql_query("select count(*) from past_bill where bill_no='0' and tables='".$cust_edit_val['tname']."'");
				$y_v=mysql_fetch_array($y_q);
				
				$cust_edit_chair=mysql_query("select distinct tid,chair from past_bill_table where tname='".$cust_edit_val['tname']."'");
	        $cust_edit_num_chair=mysql_num_rows($cust_edit_chair);
    	    if($cust_edit_num_chair>0)
        	{
			$k=0;
			
           
		}
				
				
         ?>
<li>
<div  style="width:100%" class="col-sm-12 col-md-12" >
<div  style="text-align:center;position: static;margin:auto" >
                    <div>
                    <h2  style="margin-bottom: 5px;margin-top:5px;font-size:22px;font-weight:bold;color:white">Table No : #<?php if(isset($cust_edit_val['tname'])){echo $cust_edit_val['tname'];}?></h2>
                   
				   </div>
                    <div align="center" style="margin: auto;">
					<?php
                    while($cust_edit_num_chair=mysql_fetch_array($cust_edit_chair))
			{
				$j++;
				//$qury=mysql_query("select * from past_bill_details where bill_no='0' and tables='".$_SESSION['a']."' and chair='".$cust_edit_val['chair']."'");
				$qury=mysql_query("select * from past_bill where bill_no='0' and tables='".$cust_edit_val['tname']."' and chair='".$cust_edit_num_chair['chair']."'");
				$num=mysql_num_rows($qury);
				
				?>
				
				<li style="float:left;
			list-style:none;
			width:100px;
			padding:5px;">
                <div style="width:140%; height:70px !important;">
				<input id="<?php if(isset($cust_edit_num_chair['tid'])){echo $cust_edit_num_chair['tid'];}?>" type="submit" style="min-width:70%;background-size: cover;overflow: hidden;position: relative; padding:15px;text-align:center;
				<?php if($num>0){ echo "background: url(images/inprocess.png);background-repeat:no-repeat;background-size:80px 70px;vertical-align: middle;height:150px !important;";}else{ echo "background: url(images/available.png);background-repeat:no-repeat;background-size:80px 70px;height:150px !important; ";} ?>border:none; font-weight:bold; color:transparent;"
				class="btn btn-sq-sm btn-info center" name="b" value="<?php if(isset($cust_edit_num_chair['chair'])){echo $cust_edit_num_chair['chair'];}?>">
                </div>
                
				<div style="width:10%; float:center;font-weight:bold; color:#fff;">
                <?php if(isset($cust_edit_num_chair['chair'])){echo $cust_edit_num_chair['chair'];}?>
                </div>
				</li>
				<?php
				if($j==5)
				{
					$j=0;
					?>
					</tr>
					<tr>
					<?php
				}
			}
			?>
                       
                    </div>
                </div>
				
<!--<img  style="margin : 10px;" class="img " src="images/table.png" > -->
</div>
<style type="text/css">
.center {
    margin: auto;
    width: 50%;
    border: 3px solid green;
    padding: 10px;
}
     .img {
		width: 100px;
		height: 100px;
		border:2px solid #fff;
		background: url(img/tiger.png) no-repeat;
		
		-moz-border-radius:25px;
		-webkit-border-radius:25px;
		border-radius:25px;
		margin:10px;
			}
      
      </style> 

</li>

            <?php
				if($j==5)
				{
					$j=0;
			?>
					</tr>
					<tr>
			<?php
				}
			}
        }
		

		?>
        </div>
		</div>
        
</body>
</html>