<?php
$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,'student') or die(mysqli_error($con));  
	
//$sql = "SELECT * FROM table1";
//$result = mysqli_query ($con,$sql);

 /*
  $users_name = $_POST['name'];
  $users_mob = $_POST['mob'];

  

  $users_name = mysql_real_escape_string($users_name);
  $users_mob = mysql_real_escape_string($users_mob);


  $query = "
  INSERT INTO `table1` (`id`, `name`, `mob`) VALUES ('3', 'ererer', '23783');

  mysql_query($query);

  echo "<h2>Thank you for your Comment!</h2>";

  mysql_close($con);
  
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "INSERT INTO table1 (id, name, mob)
VALUES ('5', 'Doe', '45476543')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['mob']); 
      
      $sql = "SELECT id FROM table1 WHERE name = '$myusername' and mob = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
       session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
		 echo "New record created successfully";
      }else {
        // $error = "Your Login Name or Password is invalid";
		
		  echo "Your Login Name or Password is invalid";
      }
   }
   */
   
   
   if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$name = intval($_GET['name']);
$sql = "SELECT * FROM table1 WHERE name=$name";
while ($row = mysql_fetch_array($sql))     
      {
$url = $row['mob'];
echo $url; //Outputs: 2
}


$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    //while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mob"];
    //}
	
	while ($row = mysql_fetch_array($name))     
{       
    $url = $row['mob'];
    echo $url; //Outputs: 2
}
} else {
    echo "0 results";
}



/*
$mob = mysql_query("SELECT * FROM table1 WHERE name=$name");    
while ($row = mysql_fetch_array($mob))     
{       
    $url = $row['mob'];
    echo $url; //Outputs: 2
}


$sql = "SELECT id, name, mob FROM table1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["mob"]. "<br>";
    }
} else {
    echo "0 results";
}*/
$con->close();

?>