<?php
include ('config.php');
session_start();
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
echo $tota;
?>