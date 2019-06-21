<?php
    include_once('../database/database.php');
	date_default_timezone_set("Asia/Manila");
	$response = array();
	$user_id = $_POST['user_id'];
	$month = (date('m'));
	$year = (date('Y'));
	$day = (date('d'));
	$time = date("h:i:s a");
	
	$location_in_lat = $_POST['location_in_lat'];
    $location_in_long = $_POST['location_in_long'];
	$location_out_lat = $_POST['location_out_lat'];
    $location_out_long = $_POST['location_out_long'];
	
	
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user_id'");
	if($sql_getCompany){
		
		$r = mysqli_fetch_array($sql_getCompany);
		$current_company = $r['current_company'];
		if($current_company == ''){
			echo "not_employed";
		}else{
		
			$sql = mysqli_query($conn,"SELECT attendance_id  FROM attendance where user_id = '$user_id' AND time_in != '' AND time_out = '' AND company_id = '$current_company'");
			
			if (mysqli_num_rows($sql) > 0){
				
				$update = mysqli_query($conn,"UPDATE attendance set time_out = '$time'
					,year_out = '$year'
					,month_out = '$month'
					,day_out = '$day'
					,location_out_lat = '$location_out_lat'
					,location_out_long = '$location_out_long'
										WHERE user_id = '$user_id' and company_id = '$current_company'");
				if($update){
					echo "time_out_success";					
				}else{
					echo "time_out_failed";	
				}
		
			}else{
				//insert
				$insert = mysqli_query($conn,"INSERT INTO attendance(user_id,time_in,month_in,day_in,year_in,location_in_lat,location_in_long,company_id) 
				values ('$user_id','$time','$month','$day','$year','$location_in_lat','$location_in_long','$current_company')");
				if($insert){
					echo "time_in_success";					
				}else{
					echo "time_in_failed";	
				}
			}
		}
	
	}else{
		echo "failed";
	}
	
	
	
	
		
		
		
		
	


 ?>