<?php
    include_once('../database/database.php');
	$response = array();
	$user_id = $_POST['user_id'];
	$sql = mysqli_query($conn,"SELECT email,firstname,lastname,middlename,age,mobile  FROM user where id = '$user_id'");
	if (mysqli_num_rows($sql) > 0){
		if($sql){
				$r = mysqli_fetch_array($sql);
				$response["email"] = $r["email"];
				$response["firstname"] = $r["firstname"];
				$response["lastname"] = $r["lastname"];
				$response["middlename"] = $r["middlename"];
				$response["age"] = $r["age"];
				$response["mobile"] = $r["mobile"];
				
				echo json_encode($response);	
	
		}else{
			echo ("cantfetch");
			
		}
	
	}else{
		echo ("nodata");
			
	}
 ?>