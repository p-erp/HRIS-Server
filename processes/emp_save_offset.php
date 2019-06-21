<?php
    include_once('../database/database.php');
	
	$user = $_POST['user'];
	$new_day = $_POST['new_day'];
	$new_year = $_POST['new_year'];
	$new_month = $_POST['new_month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user'");
	
	if(mysqli_num_rows($sql_getCompany)>=1){
		if($sql_getCompany){
	
			$r = mysqli_fetch_array($sql_getCompany);
			$current_company = $r['current_company'];
			$sql = mysqli_query($conn,"Select * from offset where user_id = $user and company_id = $current_company");
			$count = mysqli_num_rows($sql);
			
			if($count > 0){
				
				$check  = mysqli_query($conn,"Select * from offset where 
																	dayoffset_day = '$day' and 
																	dayoffset_month = '$month' and 
																	dayoffset_year = '$year' and 
																	dayoffset_new_day = '$new_day' and 	
																	dayoffset_new_month = '$new_month' and 
																	dayoffset_new_year = '$new_year' and 
																	user_id= $user and
																	company_id = $current_company ");
				if(mysqli_num_rows($check)){
					
						echo "exist";		
						
				}else{
					
					$insert = mysqli_query($conn,"INSERT INTO offset(dayoffset_day,
																	dayoffset_month, 
																	dayoffset_year, 
																	dayoffset_new_day, 
																	dayoffset_new_month, 
																	dayoffset_new_year, 
																	user_id,
																	company_id)
															VALUES ('$day',
																	'$month',
																	'$year',
																	'$new_day',
																	'$new_month',
																	'$new_year',
																	$user,
																	$current_company)");
					if($insert){
						echo "insertion_success";			
					}else{
						echo "insertion_failed";		
					}
				}
				
			}else{
				$insert = mysqli_query($conn,"INSERT INTO offset(dayoffset_day,
																	dayoffset_month, 
																	dayoffset_year, 
																	dayoffset_new_day, 
																	dayoffset_new_month, 
																	dayoffset_new_year, 
																	user_id,
																	company_id)
															VALUES ('$day',
																	'$month',
																	'$year',
																	'$new_day',
																	'$new_month',
																	'$new_year',
																	'$user',
																	'$current_company')");
				if($insert){
					echo "insertion_success";			
				}else{
					echo "insertion_failed";		
				}
			}
			
		}
		
	}else{
		
		echo "not_employed";
	
	}
	
 ?>