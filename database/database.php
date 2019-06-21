<?php 

	// LIVE DATABASE
	 $host = "localhost";
	 $user = "root";
	 $password = "";
	 $database = "hr_application";

	$conn = mysqli_connect($host, $user, $password, $database);

	if (!$conn) 
	{
		echo "Error connecting to database: " . mysqli_error($con) . "";	
	}
 ?>