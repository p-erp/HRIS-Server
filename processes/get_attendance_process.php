<?php
    include_once('../database/database.php');
	$response = array();
	$user_id = $_POST['user_id'];
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user_id'");
	
	if(mysqli_num_rows($sql_getCompany)>=1){
		$r = mysqli_fetch_array($sql_getCompany);
		$current_company = $r['current_company'];
		$sql = mysqli_query($conn,"SELECT attendance_id  FROM attendance 
									where user_id = '$user_id' 
									AND time_in != '' 
									AND time_out = ''
									AND company_id = $current_company");
		if (mysqli_num_rows($sql) > 0){
				echo ("exist");	
		
		}else{
				echo ("not");	
	
		}
	}else{
		
		
	}
 ?>