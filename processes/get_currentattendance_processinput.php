<?php
    include_once('../database/database.php');
	
	//$user_id = $_POST['user_id'];
	$user_id = '6';
	$month = $_POST['month_in'];
	$day = $_POST['day_in'];
	$year = $_POST['year_in'];	
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user_id'");
	if($sql_getCompany){
		$r = mysqli_fetch_array($sql_getCompany);
		$current_company = $r['current_company'];
		if($current_company === ''){
			echo "not_employed";
		}else{
			$sql = mysqli_query($conn,"SELECT * FROM `attendance` 
											where user_id = '$user_id' 
											AND month_in = '$month'
											AND day_in = '$day' 
											AND year_in = '$year'
											AND company_id = $current_company");
			$count = mysqli_num_rows($sql);
			if($count > 0){
				
				if($sql){
					$rows =  array();
					while ($r = mysqli_fetch_array($sql)) 
					{
							$row_array = array();
							$row_array['user_id'] = $r['user_id'];
						
							$row_array['attendance_id']	= $r['attendance_id'];
							
							$row_array['month_in']	= $r['month_in'];
							$row_array['day_in'] = $r['day_in'];
							$row_array['year_in'] = $r['year_in'];	
							$row_array['time_in'] = $r['time_in'];
							
							$row_array['time_out'] = $r['time_out'];	
							$row_array['month_out'] = $r['month_out'];	
							$row_array['day_out'] = $r['day_out'];	
							$row_array['year_out'] = $r['year_out'];	
							
							$row_array['location_in_lat'] = $r['location_in_lat'];	
							$row_array['location_in_long'] = $r['location_in_long'];	
							$row_array['location_out_lat'] = $r['location_out_lat'];	
							$row_array['location_out_long'] = $r['location_out_long'];

							array_push($rows,$row_array);
					}	
					echo json_encode(array("data"=>$rows));
				}else{
					echo ("failed");
				}
			}else{
				echo ("nodata");
			}	
		}
	}else{
		echo "failed";
	}
	/*
	if(mysqli_num_rows($sql_getCompany)>=1){
	
	}else{
		echo ("nodata");
		
	}
	*/
 ?>