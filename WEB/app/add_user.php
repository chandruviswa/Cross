<?php
   //$con=mysqli_connect("localhost","username","password","student");
include ('config.php');

  
   
   
   $response = array();
   
    // include db connect class
    require_once __DIR__ . '/Dp_connect.php';



    // connecting to db
    $db = new DB_CONNECT();
	
	if (isset($_GET['username']) && isset($_GET['password'])) {
     $username = $_GET['username'];
   $password = $_GET['password'];
 
    // get a product from products table
    $result = mysqli_query($con,"SELECT * FROM `add_user` WHERE privilege=2 AND user_name='$username' AND password = '$password'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
 
            $result = mysqli_fetch_array($result);
            $curnt_date = date("Y-m-d");

            $shift = mysqli_query($con,"SELECT shift_id,emp_id FROM `shift_details` WHERE opening_date='$curnt_date' AND closing_date=''");
            if (mysqli_num_rows($shift) > 0) {
                $shift = mysqli_fetch_array($shift);
                $product = array();
                $product["username"] = $result["user_name"];
                $product["pwd"] = $result["password"];
                $product["emp_id"] =$shift["emp_id"] ;
                $product["shift"] =$shift["shift_id"] ;
                // $product["counter"] = $result["UserID"];

                // success
                $response["success"] = 1;
                $response["message"] = "Successfully Sign in";

                // user node
                $response["users"] = array();

                array_push($response["users"], $product);

                echo json_encode($response);

            }else{
                $response["success"] = 420;
                $response["message"] = "Shift not yet opened, please refer Cashier";

                // echo no users JSON
                echo json_encode($response);
            }
            // echoing JSON response

        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "Invalid username or password";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "Invalid username or password";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
	
	
/* 
   $result = mysqli_query($con,"SELECT * FROM users where username='$username' && pwd='$password'");

   //$sql="SELECT * FROM table1 where name='$username'";

 //$resultOne = mysqli_query ($con,$sql);
   
   $json_array =array();


   while( $row = mysqli_fetch_array($result))
{
	$json_array[] = $row;
}

echo json_encode ($json_array);
  /* 
   if($row)
   {
	   echo $row['id']."<br/>";
	   echo $row['name']."<br/>";
		echo $row['mob']."<br/>";
		echo  $password;
   }*/

   


?>