<?php

include('config.php');
session_start();
$error='';



date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['logout'])){
    if(session_destroy())
    {
        header("Location: index.php");
    }
}


if(isset($_POST['register'])) {


   // echo "SELECT * FROM `add_user` WHERE `id`='" . $_SESSION['trmp'] . "' AND otp='" . $_POST['otp'] . "'";


    $result = mysqli_query($con, "SELECT * FROM `add_user` WHERE `id`='" . $_SESSION['trmp'] . "' AND otp='" . $_POST['otp'] . "'");
// $slectQury=mysqli_query($con,"");
    if (mysqli_num_rows($result) > 0) {
        $insertQuery = mysqli_query($con, "UPDATE `add_user` SET  `mobile` =  '" . $_SESSION['mobile'] . "',`name` =  '" . $_SESSION['name'] . "' WHERE  `id`='" . $_SESSION['trmp'] . "' AND otp='" . $_POST['otp'] . "'");
        if ($insertQuery) {

            $_SESSION['login_user']=$_SESSION['name'];
            $_SESSION['eid']=$_SESSION['trmp'];

        }
        else{
            echo "<script>alert('Invalid mobile numbers')</script>";
        }

    } else{
        echo "<script>alert( '".$_SESSION['trmp']."')</script>";
    }
}

if(isset($_POST['place']))
{

    $curentDate =date("Y-m-d");
    $currentTime =date("H:i:s");


    $id= $_SESSION['eid'];

    $total=0;

            foreach($_SESSION['main'] as $value)
            {
                $unit_price=0;
                $full_print_status=0;
                $kop_bill_status=0;

                foreach($value as $key=>$value2)
                {
                    $totalval=0;
                    $getname=mysqli_query($con,"SELECT unit FROM item_master WHERE itm_code='".$key."'");
                    $acc_id_val=mysqli_fetch_array($getname);
                    $unit_price=$acc_id_val['unit'];

                    $getitem=mysqli_query($con,"SELECT  item FROM item_master WHERE itm_code='".$key."'");
                    $acc_id_name=mysqli_fetch_array($getitem);
                    $item_nam=$acc_id_name['item'];

                    $totalval = $unit_price * $value2;

                    if(isset($value2) && $value2 !="" &&  $value2!= NULL &&  $value2!="0")
                    {
                        $add=mysqli_query($con,"INSERT INTO `past_bill_details`(`id`, `bill_no`, `itm_code`, `item`, `unit`, `qty`, `amt`, `date`, `time`, `sales_id`, `remarks`, `unit_type`, `tot_amt`, `cat`, `orderid`) VALUES (NULL ,0,'$key','$item_nam','$unit_price','$value2','$totalval','$curentDate','$currentTime','".$_SESSION['eid']."','','','','',0)");

                    }


                    }
                }



if($add) {
    $bill_no = '';
    $itm_code = '';
    $item = '';
    $unit = '';
    $qty = '';
    $amt = '';
    $date = '';
    $time = '';
    $sales_id = '';
    $e_id = '';
    $shift = '';
    $tables = '';
    $chair = '';

    unset($bill_no);
    unset($itm_code);
    unset($item);
    unset($unit);
    unset($qty);
    unset($amt);
    unset($date);
    unset($time);
    unset($sales_id);
    unset($e_id);
    unset($shift);
    unset($tables);
    unset($chair);

}
    $totalAmt = 0;
                $selectQuery=mysqli_query($con,"SELECT * FROM past_bill_details WHERE sales_id='". $_SESSION['eid']."' AND bill_no='0' AND orderid='0'");
                if($selectQuery){
                    while($rows=mysqli_fetch_array($selectQuery)){
                        $testID=$rows['id'];
                        $qty=(int)$rows['qty'];
                        $unit=(int)$rows['unit'];
                        $amt=$qty*$unit;
                        $totalAmt=$totalAmt+$amt;
                        $updateQuery=mysqli_query($con,"UPDATE past_bill_details SET amt='$amt' WHERE sales_id='". $_SESSION['eid']."' AND id='$testID' AND orderid='0' ");
                    }
                }

                $insertQuery=mysqli_query($con,"INSERT INTO `past_bill` (`bill_id`, `bill_no`, `date`, `time`, `amt`, `sub_tot`, `sales_id`, `description`, `status`) VALUES (NULL, '0', '$curentDate', '$currentTime', '$totalAmt', '$totalAmt', '$id', '', 'Unpaid');");

                if ($add) {

                    $ordiQuery=mysqli_query($con,"SELECT * FROM `past_bill` WHERE `date`='$curentDate' AND `sub_tot`='$totalAmt' AND `sales_id`='$id' AND `status`='Unpaid' AND `bill_no`=0");
                    $idarray=mysqli_fetch_array($ordiQuery);
                    $testIDOn=$idarray['bill_id'];

                    $selectQueryFive=mysqli_query($con,"SELECT * FROM past_bill_details WHERE sales_id='$id' AND bill_no='0' AND orderid='0'");
                    if($selectQueryFive){
                        while($rowsOne=mysqli_fetch_array($selectQueryFive)){
                            $testIDTWO=$rowsOne['id'];
                            $updateQuery=mysqli_query($con,"UPDATE past_bill_details SET orderId='$testIDOn' WHERE sales_id='$id' AND id='$testIDTWO' AND orderid='0' ");
                        }
                    }

                    $registrationIds = array();
                    $query="SELECT fcm_token FROM admin";
                    $result1 = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result1)) {
                        $sendId=$row["fcm_token"];
                        array_push($registrationIds,$row["fcm_token"]);
                    }
                    $testda=$sendId;
                    echo  $testda;

                    echo "<script>alert($testda);</script>";



                    if (!empty($sendId)) {

                      //  $response["registrationIds"] = $registrationIds;
// #API access key from Google API's Console
                        define( 'AIzaSyARlk4NHyHQnmL6bTzvLj-ZLMe6LigDkO4', 'AAAAL0AKYzg:APA91bF9dQL7vCLkLlLISq4UgnrUiPjSq4TDL6trp6UT00RLyTONAifp8otLZ9qUYpj_oCe_1ZjAXRdNwPLAY34NNTSQ0fNqn9lRXO2-ql-l_YfPLF_6ARS1CK-qkEFvFWWQsJb-leh_' );

#prep the bundle
                        $msg = array
                        (
                            'title'=> "Cochin Order",
                            'body'=>"You have new Order",
                            'sound'=>'default',
                            'click_action'=>'FCM_PLUGIN_ACTIVITY',
                            'icon'=>'fcm_push_icon'
                        );
                        $fields = array
                        (
                            'to'		=> $sendId,
                            'priority' => 'high',
                            'notification'	=> $msg
                        );


                        $headers = array
                        (
                            'Authorization: key=' .'AAAAL0AKYzg:APA91bF9dQL7vCLkLlLISq4UgnrUiPjSq4TDL6trp6UT00RLyTONAifp8otLZ9qUYpj_oCe_1ZjAXRdNwPLAY34NNTSQ0fNqn9lRXO2-ql-l_YfPLF_6ARS1CK-qkEFvFWWQsJb-leh_',
                            'Content-Type : application/json'
                        );
#Send Reponse To FireBase Server
                        $ch = curl_init();
                        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                        curl_setopt( $ch,CURLOPT_POST, true );
                        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                        $result1 = curl_exec($ch );
                        curl_close( $ch );

                }

                //$add=mysql_query("insert into past_bill (bill_no,e_id,date,time,amt,sales_id,shift,tables,chair,ser_tax,vat,status) values('".$bill_no."','".$e_id."',CURDATE(),CURTIME(),'".$ck2bill."','".$sales_id."','".$shift."','".$a."','".$b."','".$full_amount_service."','".$full_amount_vat."','Unpaid')");

    }


    $_SESSION['main']='';unset($_SESSION['main']);
}

if(isset($_POST['submit']))
{

    if( empty($_POST['mobile']))
    {

        echo "<script>alert('Username or Password is need')</script>";

    }
    else
    {
       // $username=$_POST['name'];
        $password=$_POST['mobile'];
        $curnt_date = date("Y-m-d");
        $current_time=date("H:i:s");

        $query = mysqli_query($con,"select * from add_user where mobile='".$password."'");
        $rows = mysqli_num_rows($query);
        if($rows == 1)
        {

            $dash=mysqli_fetch_array($query);
                $_SESSION['login_user']=$dash['name'];
            $_SESSION['eid']=$dash['id'];

                echo "<script>alert('Successfull login')</script>";
            //header("location: wform.php");
        }
        else
        {
            echo "<script>alert('Username or Password is invalid  ')</script>";
        }

     //   mysqli_close($con);
    }
}
else
{
    //session_destroy();
}
if(isset($_SESSION['login_user']))
{
   // echo"<script type='text/javascript'>alert('success')</script>";

   // echo'<script type="text/javascript">show();</script>';
}
$tota=0;
if(isset($_SESSION['main']))
{
    foreach($_SESSION['main'] as $value)
    {

        foreach($value as $key=>$value2)
        {

            $tota=$tota+$value2;




        }
    }
}


?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Snack Bar a Restaurants Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- Meta tag keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Snack Bar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta tag keywords -->
<!-- Style sheet -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/lsb.css">
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />


<!-- //Style sheet -->
<!-- //Online fonts -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>





    <script type="text/javascript">



        function getData(empid, divid){


            $.ajax({
                url: 'getCatname.php?id='+empid, //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplaysss = document.getElementById('menuheader');
                    ajaxDisplaysss.innerHTML = html;

                }
            });


            $.ajax({
                url: 'loademployeedata.php?item='+empid, //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });


        }


        function getDataTable(divid){

            $.ajax({
                url: 'checksession.php', //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }


        function getDataTableOne(divid){

            $.ajax({
                url: 'history.php', //call storeemdata.php to store form data
                success: function(html) {
                    var ajaxDisplay = document.getElementById(divid);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }

        function Register(){

            var  namess=document.getElementById('rname').value;
            var mobile=document.getElementById('rmobile').value;

            $.ajax({
                url: 'getMobile.php?id='+mobile, //call storeemdata.php to store form data
                success: function(html) {

                  if(html === mobile){
                      alert("Mobile number already exist!....");

                  }else {
                      //alert("Success!....");

                      $.ajax({

                          url: 'otp.php?name='+namess+'&&mobile='+mobile, //call storeemdata.php to store form data
                          success: function(html) {
                              alert(html);
                              otp_visibility();
                          }
                      });

                  }

                }
            });


        }


    </script>

    <script>
        //add Qty goes here...
        var i = 0;
        function buttonAdd1(x) {



            var pair = x.split(',');

            var x_n=parseInt(pair[0]);
            var y_n=parseInt(pair[1]);


            get_itms(x_n,y_n);
        }
        //sub Qty goes here...
        function buttonSubtract1(x) {

            var pair = x.split(',');

            var x_n=parseInt(pair[0]);
            var y_n=parseInt(pair[1]);
            sub_itms(x_n,y_n);
        }
        /*get_items code goes here*/

        function get_itms(x,y)
        {




            $.ajax({

                url: "get_items.php?val=" +x+"&&vala="+y, //call storeemdata.php to store form data
                success: function(html) {
                    // var test=document.getElementById('popup');
                    // test.innerText='Your Cart ( '+html+' )';

                    $.ajax({

                        url: 'loadcart.php', //call storeemdata.php to store form data
                        success: function(html) {
                            var test=document.getElementById('popup');
                            test.innerText='Your Cart ( '+html+' )';

                            getData(y,'displaydata');
                        }
                    });


                }
            });




        }

        function sub_itms(x,y)
        {



            $.ajax({

                url: "sub_itms.php?val=" +x+"&&vala="+y, //call storeemdata.php to store form data
                success: function(html) {
                    // var test=document.getElementById('popup');
                    // test.innerText='Your Cart ( '+html+' )';

                    $.ajax({

                        url: 'loadcart.php', //call storeemdata.php to store form data
                        success: function(html) {
                            var test=document.getElementById('popup');
                            test.innerText='Your Cart ( '+html+' )';

                            getData(y,'displaydata');
                        }
                    });


                }
            });


            // var xmlhttp = new XMLHttpRequest();
            // xmlhttp.onreadystatechange = function() {
            //     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //         //document.location.assign('categories.php');
            //     }
            // };
            // xmlhttp.open("POST", "ajax/sub_itms.php?val=" +x, true);
            // xmlhttp.send();
        }

    </script>
<!-- //Online fonts -->

  <style type="text/css">
      table {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: 1px solid #E7E3E3  ;
          overflow-y: scroll;

      }

      th{
          background-color: #0d69af;
          color: #FFFFFF;
      }

      th, td {
          text-align: left;
          padding: 8px;
          border: 1px solid #E7E3E3  ;
      }


      tr:nth-child(even){background-color: #f2f2f2}
      tr:nth-child(odd){background-color: #f2f2f2}






      ::placeholder {
          color: #E3E4E3  ;
          opacity: 1; /* Firefox */
      }

      :-ms-input-placeholder { /* Internet Explorer 10-11 */
          color: #E3E4E3  ;
      }

      ::-ms-input-placeholder { /* Microsoft Edge */
          color: #E3E4E3  ;
      }

      @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

      html{background:#2F3238; }


      #popup{
          position:aboslute;
          z-index:999;}

      .feedback-button {
          height:40px;
          border:solid 3px #CCCCCC;
          background:#36B046;
          line-height:32px;
          font-weight:600;
          color:white;
          text-align:center;
          font-size:17px;
          position:fixed;
          right:40px;
          top:5%;
          z-index:999; }

      .imagess{
          z-index:0;
          margin-right: -256px;
      }


      .parentDisable{
          position:fixed;
          top:0;
          left:0;
          background:#000;
          opacity:0.8;
          z-index:0;
          height:100%;
          width:100%;}


      #otp-page{

          display:none;
          float:left;
          padding-top:0px;
          line-height:32px;
          background:#000;
          position:fixed;
          right:50%;
          top:5%;
          z-index:999;
      }

      #otp-div {
          position: absolute;
          background-color:rgba(72,72,72,0.4);
          padding-left:15px;
          padding-right:15px;
          padding-top:15px;
          padding-bottom:50px;
          width: 450px;
          float: left;
          left: 50%;
          margin-top:30px;
          margin-left: -260px;
          -moz-border-radius: 7px;
          -webkit-border-radius: 7px;
      }


      #register-page{

          display:none;
          float:left;
          padding-top:0px;
          line-height:32px;
          background:#000;
          position:fixed;
          right:50%;
          top:5%;
          z-index:999;
      }

      #register-div {
          position: absolute;
          background-color:rgba(72,72,72,0.4);
          padding-left:15px;
          padding-right:15px;
          padding-top:15px;
          padding-bottom:50px;

          width: 450px;
          float: left;
          left: 50%;
          margin-top:30px;
          margin-left: -260px;
          -moz-border-radius: 7px;
          -webkit-border-radius: 7px;
      }

      #prev_page{

          display:none;
          float:left;
          padding-top:0px;
          line-height:32px;
          background:#000;
          position:fixed;
          right:54%;
          top:5%;
          z-index:999;
      }

      #prev-div {
          position: absolute;
          background-color:rgba(72,72,72,0.4);
          padding-left:15px;
          padding-right:15px;
          padding-top:15px;
          padding-bottom:50px;

          width: 650px;
          float: left;
          left: 65%;
          position: absolute;
          margin-top:30px;
          margin-left: -260px;
          -moz-border-radius: 7px;
          -webkit-border-radius: 7px;
      }




      #order_page{
          display:none;
          float:left;
          padding-top:0px;
          line-height:32px;
          position:fixed;
          right:50%;
          top:5%;
          z-index:999;
      }

      #order-div {
          background-color:rgba(72,72,72,0.4);
          padding-left:15px;
          padding-right:15px;
          padding-top:15px;
          padding-bottom:50px;
          width: 450px;
          float: left;
          left: 50%;
          position: absolute;
          margin-top:30px;
          margin-left: -260px;
          -moz-border-radius: 7px;
          -webkit-border-radius: 7px;
      }

      #feedback-main{
          display:none;
          float:left;
          padding-top:0px;
          line-height:32px;
          position:fixed;
          right:50%;
          top:5%;
          z-index:999;
      }

      #feedback-div {
          background-color:rgba(72,72,72,0.4);
          padding-left:15px;
          padding-right:15px;
          padding-top:15px;
          padding-bottom:50px;
          width: 450px;
          float: left;
          left: 50%;
          position: absolute;
          margin-top:30px;
          margin-left: -260px;
          -moz-border-radius: 7px;
          -webkit-border-radius: 7px;
      }



      .feedback-input {
          color:#3c3c3c;
          font-family: "Roboto", helvetica, arial, sans-serif;
          font-weight:500;
          font-size: 18px;
          border-radius: 0;

          line-height: 32px;
          background-color: #FFFFFF;
          padding: 13px 13px 13px 54px;
          margin-bottom: 10px;
          width:100%;
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          -ms-box-sizing: border-box;
          box-sizing: border-box;
          border: 3px solid rgba(0,0,0,0);
      }

      .feedback-input:focus{
          background: #fff;
          box-shadow: 0;
          border: 3px solid #3498db;
          color: #3498db;
          outline: none;
          padding: 13px 13px 13px 54px;
      }

      /* Icons ---------------------------------- */
      #feedback-name{
          background-image: url(http://rexkirby.com/kirbyandson/images/name.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
      }

      #feedback-name:focus{
          background-image: url(http://rexkirby.com/kirbyandson/images/name.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
      }

      #feedback-email{
          background-image: url(http://www.clker.com/cliparts/f/D/Z/i/d/G/phone-logo-md.png);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
      }

      #feedback-email:focus{
          background-image: url(http://www.clker.com/cliparts/f/D/Z/i/d/G/phone-logo-md.png);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
      }

      #feedback-comment{
          background-image: url(http://rexkirby.com/kirbyandson/images/comment.svg);
          background-size: 30px 30px;
          background-position: 11px 8px;
          background-repeat: no-repeat;
      }

      #feedback-comment {
          width: 100%;
          height: 150px;
          line-height: 150%;
          resize:vertical;
      }

      input:hover, #feedback-comment:hover, input:focus, #feedback-comment:focus {
          background-color:white;
      }

      #feedback-button-blue{
          font-family: "Roboto", helvetica, arial, sans-serif;
          float:left;
          width: 100%;
          border: #fbfbfb solid 4px;
          cursor:pointer;
          background-color: #36B046;
          color:white;
          font-size:16px;
          padding-top:5px;
          padding-bottom:5px;
          -webkit-transition: all 0.3s;
          -moz-transition: all 0.3s;
          transition: all 0.3s;
          margin-top:-4px;
          font-weight:700;
      }

      /*#feedback-button-blue:hover{*/
          /*background-color: rgba(0,0,0,0);*/
          /*color: #0493bd;*/
      /*}*/

      /*.feedback-button-blue:hover {*/
          /*color: #3498db;*/
      /*}*/

      .feedback-ease {
          width: 0px;
          height: 74px;
          background-color: #fbfbfb;
          -webkit-transition: .3s ease;
          -moz-transition: .3s ease;
          -o-transition: .3s ease;
          -ms-transition: .3s ease;
          transition: .3s ease;
      }

      /*.feedback-submit:hover .feedback-ease{*/
          /*width:100%;*/
          /*background-color:white;*/
      /*}*/

      @media only screen and (max-width: 580px) {
          #feedback-div{
              left: 3%;
              margin-right: 3%;
              width: 188%;
              margin-left: 0;
              padding-left: 3%;
              padding-right: 3%;
          }
      }



      /* carousel */

body{padding-top:20px;}
.carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
}
/* The controlsy */
.carousel-control {
    left: -12px;
    height: 40px;
    width: 40px;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    margin-top: 90px;
}
.carousel-control.right {
    right: -12px;
}
/* The indicators */
.carousel-indicators {
    right: 50%;
    top: auto;
    bottom: -10px;
    margin-right: -19px;
}
/* The colour of the indicators */
.carousel-indicators li {
    background: #cecece;
}
.carousel-indicators .active {
background: #428bca;
}

  </style>
  <script type="text/javascript">

$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 5000
    })
});
  </script>

</head>

<body>
<!-- banner -->
	<div class="banner-figures">
		<div class="banner">
			<div class="container banner-drop">
				<div class="header">
					<div class="header-left">

					</div>
					<div class="header-right">
						<nav>
						  <ul>
							<li class="active">
								<a href="index.html" class="active"><span>Home</span></a>
							</li>
							<li>
								<a href="#about" class="scroll"><span>About</span></a>
							</li>
							<li>
								<a href="#chefs" class="scroll"><span>Chefs</span></a>
							</li>
							<li>
								<a href="#menu" class="scroll"><span>Menu</span></a>
							</li>
							<li>
								<a href="#contact" class="scroll"><span>Contact</span></a>
							</li>
						  </ul>
						</nav>
						<div class="menu-icon animated wow zoomIn" data-wow-duration="1000ms" data-wow-delay="800ms"><span></span></div>
						<!-- start search-->
				      <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form action="#" method="post">
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="logo-w3ls">
					<h1><a href="index.html">Snack Bar</a></h1>
				</div>
				<div class="bnr-sub-text" >
					<p>Feel the taste of mexico</p>
				</div>
				<div class="book-form">
			<!--<p>Prearrange a Table.</p>
			   <form action="#" method="post">
					<div class="col-md-4 form-time-w3layouts">
							<label><i class="fa fa-clock-o" aria-hidden="true"></i></label>
							<input type="text" id="timepicker" name="Time" placeholder="Time" class="timepicker form-control hasWickedpicker" value="Time" onkeypress="return false;" required="" >
					</div>
					<div class="col-md-4 form-date-w3-agileits">
						        <label><i class="fa fa-calendar" aria-hidden="true"></i> </label>
									<input  id="datepicker1" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" >
								</div>
					<div class="col-md-4 form-left-agileits-w3layouts ">
							<label><i class="fa fa-users" aria-hidden="true"></i></label>
							<select class="form-control">
								<option>No.of People</option>
								<option>1 Person</option>
								<option>2 People</option>
								<option>3 People</option>
								<option>4 People</option>
								<option>5 People</option>
								<option>More</option>
							</select>
					</div>
					<div class="clearfix"> </div>
					<div class="col-md-3 form-left">
						  <ul>
							<li><i class="fa fa-check-square-o" aria-hidden="true"></i>Over 10,000 restaurants Worldwide</li>
							<li><i class="fa fa-check-square-o" aria-hidden="true"></i>No booking fees</li>
						  </ul>
					</div>
					<div class="col-md-3 form-left-agileits-submit">
						  <input type="submit" value="Book a table">
					</div>
					<div class="clearfix"> </div>
				</form>-->
			</div>

			</div>
		</div>

	</div>

<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
<div class="container">
	<div class="col-md-3 left-logo-main">
		<div class="left-logo-w3ls">
			<img src="images/side.png" alt="logo">
		</div>
	</div>
	<div class="col-md-3 bnr-btn-grids one">
		<i class="fa fa-comments-o" aria-hidden="true"></i>
		<p><span>Read</span> Reviews</p>
		<a href="#testimonials" class="scroll" ><i class="fa fa-level-down" aria-hidden="true"></i></a>
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-6 bnr-btn-grids two">
		<i class="fa fa-phone" aria-hidden="true"></i>
		<p><span>Call us now for</span> Home delivery</p>
		<h2>1-002 003 004</h2>
		<div class="clearfix"> </div>
	</div>
</div>
</div>
<!-- //banner-bottom -->
<!-- about -->
<div class="about" id="about">
<div class="about-left-w3-agileits">
	<h6>Welcome to Snack Bar</h6>
	<h3>Perfect experience & high quality services</h3>
	<p class="para-w3-agile">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed sollicitudin ante. Nullam condimentum mollis odio, sed aliquet dolor consectetur vel. Proin faucibus pellentesque eros nec volutpat. Nulla facilisi. Nam eu dolor eget ligula molestie condimentum.</p>
</div>
<div class="col-md-7 about-right-w3-agileits">
<div  class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="banner-text1">
						</div>
					</li>
					<li>
						<div class="banner-text2">
						</div>
					</li>
					<li>
						<div class="banner-text3">
						</div>
					</li>
					<li>
						<div class="banner-text4">
						</div>
					</li>
				</ul>
			</div>
</div>
<div class="clearfix"> </div>
</div>
<!-- //about -->
<!-- team -->
<!--	<div class="team" id="chefs">-->
<!--		<div class="container">-->
<!--			<h4 class="title-w3ls">Meet Our Chefs</h4>-->
<!--			<div class="team-grids">-->
<!--				<ul class="ch-grid">-->
<!--					<li class="ch-grid-item">-->
<!--						<div class="ch-item ch-img-1">-->
<!--						</div>-->
<!--						<div class="ch-info">-->
<!--								<h3>Eva Adamson</h3>-->
<!--								<p>Chef</p>-->
<!--								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">-->
<!--										<ul class="top-links">-->
<!--											<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--										</ul>-->
<!--										<div class="clearfix"> </div>-->
<!--								</div>-->
<!--						</div>-->
<!--					</li>-->
<!--					<li class="ch-grid-item">-->
<!--						<div class="ch-item ch-img-2">-->
<!--						</div>-->
<!--							<div class="ch-info">-->
<!--								<h3>Natalie Barnes</h3>-->
<!--								<p>Saucier</p>-->
<!--								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">-->
<!--										<ul class="top-links">-->
<!--											<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--										</ul>-->
<!--										<div class="clearfix"> </div>-->
<!--								</div>-->
<!--							</div>-->
<!--					</li>-->
<!--					<li class="ch-grid-item">-->
<!--						<div class="ch-item ch-img-3">-->
<!--						</div>-->
<!--							<div class="ch-info">-->
<!--								<h3>David Austin</h3>-->
<!--								<p>Chef</p>-->
<!--								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">-->
<!--										<ul class="top-links">-->
<!--											<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--										</ul>-->
<!--										<div class="clearfix"> </div>-->
<!--								</div>-->
<!--							</div>-->
<!--					</li>-->
<!--					<li class="ch-grid-item">-->
<!--						<div class="ch-item ch-img-4">-->
<!--						</div>-->
<!--							<div class="ch-info">-->
<!--								<h3>Thomas Bishop</h3>-->
<!--								<p>Saucier</p>-->
<!--								<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">-->
<!--										<ul class="top-links">-->
<!--											<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--										</ul>-->
<!--										<div class="clearfix"> </div>-->
<!--								</div>-->
<!--							</div>-->
<!--					</li>-->
<!--				</ul>-->
<!--				<div class="clearfix"> </div>-->
<!--			</div>-->
<!--			<div class="clearfix"> </div>-->
<!--		</div>-->
<!--	</div>-->
	<!-- //team -->
<!-- Stats -->
<!--	<div class="stats-agileits" id="stats">-->
<!--	<div class="container">-->
<!--		<h4 class="title-w3ls">Our Achievements</h4>-->
<!--	</div>-->
<!--		<div class="stats-info agileits w3layouts">-->
<!--		<div class="container">-->
<!--			<div class="col-md-3 agileits w3layouts col-sm-6 stats-grid stats-grid-1">-->
<!--				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='2500' data-delay='3' data-increment="2">2500</div>-->
<!--				<div class="stat-info-w3ls">-->
<!--					<h4 class="agileits w3layouts">Visitors daily</h4>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-3 col-sm-3 agileits w3layouts stats-grid stats-grid-2">-->
<!--				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='150' data-delay='3' data-increment="2">150</div>-->
<!--				<div class="stat-info-w3ls">-->
<!--					<h4 class="agileits w3layouts">Chefs and sous chefs</h4>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-3 col-sm-3 stats-grid agileits w3layouts stats-grid-3">-->
<!--				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='3421' data-delay='3' data-increment="2">3421</div>-->
<!--				<div class="stat-info-w3ls">-->
<!--					<h4 class="agileits w3layouts">Orders served daily</h4>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-3 col-sm-3 stats-grid stats-grid-4 agileits w3layouts">-->
<!--				<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='210' data-delay='3' data-increment="2">210</div>-->
<!--				<div class="stat-info-w3ls">-->
<!--					<h4 class="agileits w3layouts">Total dishes</h4>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="clearfix"></div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
	<!-- //Stats -->
<!--dishes -->
		<div class="dishes" id="dishes">
		    <h4 class="title-w3ls">This Week's Dishes</h4>
			<div class="inst-grids">
					<div class="col-md-3 blog-gd-w3ls">
						<img src="images/blog3.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 18.50</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Red-cake Dessert</h5>
						 </div>
					</div>
					<div class="col-md-3 blog-gd-w3ls">
						<img src="images/blog4.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 50.00</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Grilled Spare-rib</h5>
						 </div>
					</div>
					<div class="col-md-3 blog-gd-w3ls last">
						<img src="images/blog2.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 10.65</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Tofu Mushrooms-fry</h5>
						 </div>
					</div>
					<div class="col-md-3 blog-gd-w3ls last">
						<img src="images/blog1.jpg" alt="blog-image">
						<div class="date-w3">
							<h4>$ 10.45</h4>
						</div>
						<div class="blog-description-w3agile">
							<h5>Strawberry-dessert</h5>
						 </div>
					</div>

					<div class="clearfix"> </div>
				</div>
	</div>
<!--//dishes -->

<!-- testimonials -->
	<div id="testimonials" class="testimonials">
		<div class="container">
		<h4 class="title-w3ls white-agileits">What Our Customers Says</h4>
			<div class="w3_agile_team_grids">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="agile_testimonials_grid">
									<div class="agileits_w3layouts_testimonials_grid">
										<img src="images/p1.jpg" alt=" " class="img-responsive" />
										<div class="wthree_test_social_pos">
											<ul class="w3_agileits_social_list1">
												<li><a href="#" class="w3_agile_facebook1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="agile_twitter2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" class="w3_agile_dribble3"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<h3>Peter Parker <span>Customer</span></h3>
									<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem,
										ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est
										eu accumsan cursus.</p>
								</div>
							</li>
							<li>
								<div class="agile_testimonials_grid">
									<div class="agileits_w3layouts_testimonials_grid">
										<img src="images/p2.jpg" alt=" " class="img-responsive" />
										<div class="wthree_test_social_pos">
											<ul class="w3_agileits_social_list1">
												<li><a href="#" class="w3_agile_facebook1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="agile_twitter2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" class="w3_agile_dribble3"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<h3>Johan Botha <span>Customer</span></h3>
									<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem,
										ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est
										eu accumsan cursus.</p>
								</div>
							</li>
							<li>
								<div class="agile_testimonials_grid">
									<div class="agileits_w3layouts_testimonials_grid">
										<img src="images/p3.jpg" alt=" " class="img-responsive" />
										<div class="wthree_test_social_pos">
											<ul class="w3_agileits_social_list1">
												<li><a href="#" class="w3_agile_facebook1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="agile_twitter2"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#" class="w3_agile_dribble3"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									<h3>Steven Wilson <span>Customer</span></h3>
									<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem,
										ac scelerisque nisl nibh vel lacus. Proin eget gravida odio. Donec ullamcorper est
										eu accumsan cursus.</p>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- testimonials -->




	<form method="get">

		<div class="dishes" id="dishes">
		    <h4 class="title-w3ls">Featured Category</h4>
			<div class="row">
        <div class="col-md-12">
                <div id="Carousel" class="carousel slide">

                <ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner">

				<?php


				?>

                <div class="item active">
                    <div class="row">
					<?php
							 $result = mysqli_query($con, "SELECT *FROM  item_cat LIMIT 0,4 ");
							 while ($row = mysqli_fetch_array($result)) {

								 ?>
								 <div onclick="getData(<?php if(isset($row['itm_id'])){echo $row['itm_id'];}?>, 'displaydata')" class="col-md-3"><img src="http://www.cochineats.in/cochin_eats/image/<?php if(isset($row['image_path'])){echo $row['image_path'];}?>" alt="Image" style="max-width:100%;" width="500px" height="200px"><?php if(isset($row['item_cat'])){echo $row['item_cat'];}?></div>

								 <?php


							 }


							?>

                    </div><!--.row-->
                </div><!--.item-->


					<?php
					$countquery =mysqli_query($con,"SELECT COUNT(*) FROM  `item_cat`");
					$countarry=mysqli_fetch_array($countquery);
					$count=$countarry['COUNT(*)'];

					for($i=4;$i<$count ;$i++){

                        $s=0;


                        if($i<$count) {

                            $s =4;


                            ?>

                            <div class="item">
                                <div class="row">

                                    <?php


                                    $countqueryOne = mysqli_query($con, "SELECT * FROM  `item_cat` LIMIT $i, $s");
                                    while ($row = mysqli_fetch_array($countqueryOne)) {

                                        ?>

                                        <div onclick="getData(<?php if(isset($row['itm_id'])){echo $row['itm_id'];}?>, 'displaydata')" class="col-md-3"><img
                                                        src="http://www.cochineats.in/cochin_eats/image/<?php if (isset($row['image_path'])) {
                                                            echo $row['image_path'];
                                                        } ?>" alt="Image"
                                                        style="max-width:100%;"  width="500px" height="200px" ><?php if (isset($row['item_cat'])) {
                                                echo $row['item_cat'];
                                            } ?></div>

                                        <?php


                                    }

                                    ?>

                                </div><!--.row-->
                            </div><!--.item-->
                            <?php
                            $i=$i+3;

                        }
					}

							?>




                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel" class="left carousel-control">&#8678;</a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control">&#x21E8;</a>
                </div><!--.Carousel-->

        </div>
    </div>









                        </div>







<!-- gallery -->
	<div class="gallery-grids" id="menu">
		<div class="container">
		<h4 id="menuheader" class="title-w3ls">Featured Menu</h4>

            <div id="displaydata">




		</div>
	</div>


	</form>
<!-- //gallery -->
<!-- contact -->
<div class="contact" id="contact">
	<div class="container">
	<h4 class="title-w3ls white-agileits">Get in Touch</h4>
		<div class="col-md-6 contact-agileits-w3layouts">
		<h5 class="sub">Send us a message</h5>
		<form action="#" method="post">
				<input type="text" class="name" name="Your Name" placeholder="Name" required="" />
				<input type="email" class="email" name="Your Email" placeholder="Email" required="" />
				<input type="text" Name="Phone Number" placeholder="Number" required=""/>
				<textarea name="Message" placeholder="Message" required=""></textarea>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div class="col-md-6 contact-agileits-left">
			<h5 class="sub">Looking for Address</h5>
			<p><span>Location</span>London Luton Airport, Airport Way, Luton, United Kingdom.</p>
			<p><span>Phone</span>+33 892 35 35 35</p>
			<p><span>Email</span><a href="mailto:example@mail.com">mail@example.com</a></p>
			<div class="social-icons animated wow bounceInDown" data-wow-duration="1000ms" data-wow-delay="800ms">
					<ul class="top-links">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
			</div>
		</div>
	</div>
</div>


<div id="otp-page">
    <div class="parentDisable"></div>
    <div id="otp-div">
        <a href="index.php"><img class="imagess"  id="close" src="images/close.png" name="cacustomer"></a>
        <form action="" method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">
            <h3 style="text-align: center;padding: 10px;font-weight: bold;color: white">OTP Verification</h3>


            <h5>Its Take time 2minutes.if donot get Otp click to resend otp option</h5>

            <input name="otp" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required placeholder="otp" id="feedback-name" />

            <div class="clearfix"></div>





            <!--            <p class="text">-->
            <!--                <textarea name="comment" type="comment" class="validate[required,length[6,300]] feedback-input" id="feedback-comment" required placeholder="Hey, I really love the site but I believe that you could incorporate some ..... and also get rid of the ...... on the section."></textarea>-->
            <!--            </p>-->

            <div class="feedback-submit">
                <input type="submit" value="Submit" name="register" id="feedback-button-blue"/>
                <div class="feedback-ease"></div>
            </div>
        </form>

        <form onsubmit="return false">


            <button id="feedback-button-blue" onclick="order_visibility();history_visibility();" >Resend OTP</button>

        </form>
    </div>
</div>


<div id="register-page">
    <div class="parentDisable"></div>
    <div id="register-div">
        <a href="index.php"><img class="imagess"  id="close" src="images/close.png" name="cacustomer"></a>
        <form action="" method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">
            <h3 style="text-align: center;padding: 10px;font-weight: bold;color: white">Register</h3>


            <input  name="rname" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required placeholder="Name" id="rname" />

            <div class="clearfix"></div>


            <input name="rmobile" type="number"       class="validate[required,custom[onlyLetter],length[0,10]]  feedback-input" id="rmobile" placeholder="Mobile" required />


            <!--            <p class="text">-->
            <!--                <textarea name="comment" type="comment" class="validate[required,length[6,300]] feedback-input" id="feedback-comment" required placeholder="Hey, I really love the site but I believe that you could incorporate some ..... and also get rid of the ...... on the section."></textarea>-->
            <!--            </p>-->

<!--            <div class="feedback-submit">-->
<!--                <input type="submit" value="Register" name="register" id="feedback-button-blue"/>-->
<!--                <div class="feedback-ease"></div>-->
<!--            </div>-->
        </form>
        <form onsubmit="return false">


            <button id="feedback-button-blue" onclick="Register();register_visibility()" >Register</button>

        </form>

    </div>
</div>


<div id="prev_page">
    <div class="parentDisable"></div>

    <div id="prev-div">
        <a href="index.php"><img class="imagess"  id="close" src="images/close.png" name="cacustomer"></a>
        <form action="" method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">
            <h3 style="text-align: center;padding: 10px;font-weight: bold;color: white">Order history</h3>
            <div id="displaydatatableOne"></div>
        </form>
    </div>
</div>

<div id="order_page">


    <div class="parentDisable"></div>
    <div id="order-div">
        <a href="index.php"><img class="imagess"  id="close" src="images/close.png" name="cacustomer"></a>
        <form action="" method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">
            <h3 style="text-align: center;padding: 10px;font-weight: bold;color: white">Order details</h3>
            <button name="logout" class="btn-success btn">Logout</button>
                <div id="displaydatatable"></div>
            <div class="feedback-submit">
                <input type="submit" value="Place Orders" name="place" id="feedback-button-blue"/>
                <div class="feedback-ease"></div>
            </div>
        </form>

        <form onsubmit="return false">


            <button id="feedback-button-blue" onclick="order_visibility();history_visibility();getDataTableOne('displaydatatableOne');" >Order history</button>

        </form>
    </div>
</div>



<div id="feedback-main">
    <div class="parentDisable"></div>
    <div id="feedback-div">
        <a href="index.php"><img class="imagess"  id="close" src="images/close.png" name="cacustomer"></a>
        <form action="" method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">
            <h3 style="text-align: center;padding: 10px;font-weight: bold;color: white">Login</h3>

<!--                <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required placeholder="Name" id="feedback-name" />-->
<!---->
<!--            <div class="clearfix"></div>-->


                <input name="mobile" type="number"       class="validate[required,custom[onlyLetter],length[0,10]]  feedback-input" id="feedback-email" placeholder="Mobile" required />


<!--            <p class="text">-->
<!--                <textarea name="comment" type="comment" class="validate[required,length[6,300]] feedback-input" id="feedback-comment" required placeholder="Hey, I really love the site but I believe that you could incorporate some ..... and also get rid of the ...... on the section."></textarea>-->
<!--            </p>-->

            <div class="feedback-submit">
                <input type="submit" value="Submit" name="submit" id="feedback-button-blue"/>
                <div class="feedback-ease"></div>
            </div>

            <h5 style="text-align: center;color: white;font-weight: bold;padding: 10px">OR</h5>

<!--            <div class="feedback-submit">-->
<!--                <input type="submit" value="Register" name="submit" id="feedback-button-blue"/>-->
<!--                <div class="feedback-ease"></div>-->
<!--            </div>-->


        </form>

        <form onsubmit="return false">


            <button id="feedback-button-blue" onclick="toggle_visibility();register_visibility();" >Register</button>

        </form>


    </div>
</div>
<form onsubmit="return false;">
    <?php
    if(!isset($_SESSION['login_user']))
    {
       ?>
        <button  id="popup" class="feedback-button" onclick="toggle_visibility()" >Your Cart (  <?php  if(isset($tota)){   echo $tota;} ?> )  </button>

        <?php
    }else{
        ?>

        <button  id="popup" class="feedback-button" onclick="order_visibility();getDataTable('displaydatatable');" >Your Cart (  <?php  if(isset($tota)){   echo $tota;} ?> ) - <?php  if(isset($_SESSION['login_user'])){   echo $_SESSION['login_user'];} ?></button>



        <?php
    }

    ?>


<script src="js/feedback.js"></script>
    <script src="js/order.js"></script>
    <script src="js/history.js"></script>
    <script src="js/register.js"></script>
    <script src="js/otp.js"></script>
</form>


<!-- //contact -->
	<div class="map-agileits-w3layouts">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2463.161495163648!2d-0.37393578421642976!3d51.8762645796975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487637d0e4f706d5%3A0x2e06e7f34ad91ad0!2sLondon+Luton+Airport+(LTN)!5e0!3m2!1sen!2sin!4v1496042920328"></iframe>
	</div>
	<div class="footer">
		<div class="container">
			<p>� 2017 Snack Bar. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>


<!-- //footer -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
			<script>
				(function($){
				  $(".menu-icon").on("click", function(){
						$(this).toggleClass("open");
						$(".container").toggleClass("nav-open");
						$("nav ul li").toggleClass("animate");
				  });

				})(jQuery);
			</script>
<!-- Calendar -->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
			$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
			});
		</script>
<!-- //Calendar -->
<!-- time -->
<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
<!-- //time -->
<!--search-scripts-->
	<script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>
<!--//search-scripts-->
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!-- responsiveslides -->
<script src="js/responsiveslides.min.js"></script>


			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: true,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
<!-- //responsiveslides -->
<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  </script>
<!-- //flexSlider -->
<!-- lightspeedBox -->
	<script src="js/lsb.js"></script>
			<script>
				$(window).load(function() {
				  $.fn.lightspeedBox();
				});

			</script>
<!-- //lightspeedBox -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->

</body>
</html>