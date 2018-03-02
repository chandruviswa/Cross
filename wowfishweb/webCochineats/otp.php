<?php
include ('config.php');
session_start();
if (isset($_GET['name']) && isset($_GET['mobile'])) {
    $name = $_GET['name'];
    $mobile = $_GET['mobile'];
    $random = rand(0000, 9999);

    $insertQuery = mysqli_query($con, "INSERT INTO `add_user` (`id`, `name`, `mobile`, `otp`) VALUES (NULL, '', '0', '$random');");
    if ($insertQuery) {
        $selectquery = mysqli_query($con, "SELECT * FROM `add_user` WHERE otp='$random'");
        $queryArray = mysqli_fetch_array($selectquery);
        $ch = curl_init();
        $user="stanly@falconsqr.com:fsstanly";
        $receipientno=$mobile;
        $senderID="COCHIN";
        $msgtxt="One order placed from ".$random;
        curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
        $buffer = curl_exec($ch);
        if(empty ($buffer))
        {
           echo " buffer is empty ";
            }
        else
        {
            echo $buffer;
        }
        curl_close($ch);
        //echo "Successfully Registered ";

        $_SESSION['trmp']=$queryArray['id'];
        $_SESSION['name']=$name ;
        $_SESSION['mobile']=$mobile;

       // echo $queryArray['id'];
    }
}
?>