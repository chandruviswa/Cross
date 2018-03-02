<?php
include('session.php');
include ('menu.php');
include('include/connect.php');


$curnt_date = date("Y-m-d");

    $a = "";
    if(isset($_POST['a'])){
      $_SESSION['a'] = $_POST['a'];
        $_SESSION['b'] = "A";
        $_SESSION['c']=0;
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
	 	header("Location: categories.php");
	} 
	
  }

  if(isset($_POST['paid'])){

      $pieces = explode("-", $_POST['paid']);

      $_SESSION['a'] = $pieces[1];
      $_SESSION['b'] = "A";
      $_SESSION['c']=$pieces[0];
      header("Location: categories.php");

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
li
		{
			float:left;
			list-style:none;
			width:100px;
			padding:5px;
			text-align:center;
		}
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

<!--<body class="animated slideInLeft" >-->
<!--<div class="container navbar"  style="background-color:transparent; width:100%;">-->
<!--<div class="row">-->
<!---->
<!--<a href="choice.php"><span class="glyphicon glyphicon-home" style="margin-left:10px;margin-top:5px; font-size:25px; color:green;"> </a></span>-->
<!--<h4 style="text-align:center; color:green; margin-top:-15px; font-weight:bold; font-size:22px;"> TABLES </h4>-->
<!--</div>-->
<!--</div>-->

<body class=""  style="background: url(images/bgfine.png);overflow: scroll" >
<div class="container navbar"  style="background-color:transparent; width:100%;">
    <div class="row">
        <a href="logout.php"><span class="glyphicon glyphicon-off" style="float:right;margin-left:10px;margin-top:5px; font-size:25px; color:#fff;"> </a></span>

        <h4 style="text-align:center; color:#fff; margin-top:-15px; font-weight:bold; font-size:15px;"> CHOOSE IT </h4>
    </div>
</div>

<div style="display:none" id="container" class="alert alert-danger col-sm-12"></div>
        <div class="">
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
         ?>
<li>
<div style="width:150px;">
<input id="<?php if(isset($cust_edit_val['tname'])){echo $cust_edit_val['tname'];}?>" type="submit" style="margin-top:10%;min-width:70%;background-size: cover;overflow: hidden;position: relative;
	 padding:35px;
<?php 
if($x_v['count(*)']==$y_v['count(*)'])
{
?>
	background-color: #BA1E20;
    background-size:180px 170px;
    background-repeat:no-repeat;
    border-radius:3px;
	border 2px solid green;
<?php
}
else
{
?>
	background-color: white;
    background-size:180px 570px;
    background-repeat:no-repeat;
        border-radius:3px;
	border 2px solid white;


<?php
}
?>
 font-weight:bold; color:#256AE3;font-size: 28px;text-align: center"
class="" name="a" value="<?php if(isset($cust_edit_val['tname'])){echo $cust_edit_val['tname'];}?>">
</div>
<div style="width:10%; float:right;font-weight:bold; color:transparent;">
<?php if(isset($cust_edit_val['tname'])){echo $cust_edit_val['tname'];}?>
</div>
</li>

            <?php
				if($j==5)
				{
					$j=0;
			?>
			<?php
				}
			}
        }
		

		?>
        </div>
            <form id="table_item" action="" method="post" >
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon"><i class="icon-th"></i></span>
                                    <h5>TABLE STATEMENT - <?php echo date("F j, Y "); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                        <th style="text-align: center"><h5>TABLE NO</h5></th>
                                        <th style="text-align: center"><h5>BILL NO</h5></th>
                                        <th style="text-align: center"><h5>TOTAL AMT</h5></th>
                                        <th style="text-align: center"><h5>ACTION</h5></th>
                                        </thead>
                                        <?php
                                        $cus = mysql_query("SELECT * FROM  `past_bill` WHERE status='Unpaid' AND date='$curnt_date' AND !bill_no='0'");

                                        // echo "SELECT date,bill_no,amt,mode,tables,chair FROM past_bill WHERE  ((date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."') OR date='".$_POST['from']."')";
                                        while($data = mysql_fetch_array($cus))
                                        {

                                            ?>
                                            <tr>
                                                <td><center> <input name="tableno" value="<?php echo $data['tables']; ?>" type="hidden"/><?php echo $data['tables']; ?></center></td>
                                                <td><center><?php echo $data['bill_no']; ?></center></td>
                                                <td><center> <?php echo $data['amt']; ?></center></td>
<!--                                                <td><center>--><?php //echo $data['par_com']; ?><!--</center></td>-->
<!--                                                <td><center>--><?php //echo $data['bar_code']; ?><!--</center></td>-->
<!---->
<!--                                                <td><center>--><?php //  $custome = mysql_query("select item_cat from item_cat WHERE itm_id='".$data['itm_cat']."'");
//                                                        $dataOne = mysql_fetch_array($custome);
//                                                        echo $dataOne['item_cat']; ?><!--</center></td>-->
<!--                                                <td><center>--><?php //echo $data['unit_price']; ?><!--</center></td>-->
                                                <td><center>

                                                        <button type="submit" value="<?php echo $data['bill_no']."-".$data['tables']; ?>" name="paid" class="btn btn-info btn-success">Paid</button></center></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        
</body>
</html>