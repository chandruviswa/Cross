<?php

/**
 * A class file to connect to database
 */
class DB_CONNECT {

    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/config.php';

        // Connecting to mysql database
        //$con =mysqli_connect("localhost","root","")  or die(mysql_error());

       // $con =mysqli_connect("localhost","root","")  or die(mysqli_query());


        $con =mysqli_connect("120.138.8.94","fsman_kot","F$@Innov@t!ve9")  or die(mysql_error());



        // Selecing database
        //$db = mysqli_select_db($con, 'kitchen_mgt') or die(mysqli_error($con));
		
		//$db = mysqli_select_db($con, 'tripur_db') or die(mysqli_error($con));//local
		
		$db = mysqli_select_db($con, 'fsmanagers_kot') or die(mysqli_error($con));//live
		
		

        // returing connection cursor
        return $con;
		
		/* $con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,'kitchen_mgt') or die(mysqli_error($con)); */
    }

    /**
     * Function to close db connection
     */
    function close() {
		
		// $con =mysqli_connect("localhost","root","")  or die(mysql_error());
        //$con =mysqli_connect("localhost","root","")  or die(mysql_error());

        $con =mysqli_connect("120.138.8.94","fsman_kot","F$@Innov@t!ve9")  or die(mysql_error());
        // closing db connection
        mysqli_close($con);
    }

}

?>