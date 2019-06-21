<?php
    include_once('../database/database.php');
	$company = $_POST['company_id'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$day = $_POST['day'];
	$name = $_POST['name'];

		$sql = mysqli_query($conn,"Select * from company_holiday");
		$count = mysqli_num_rows($sql);
		if($count > 0){
				$check  = mysqli_query($conn,"Select * from company_holiday where day = '$day' and month = '$month' and year = '$year' and name = '$name' and company_id = '$company'");
				if(mysqli_num_rows($check)){
						echo "exist";			
				}else{
					$insert = mysqli_query($conn,"INSERT INTO company_holiday(day,month,year,name,company_id) VALUES ('$day','$month','$year','$name','$company')");
					if($insert){
						echo "insertion_success";			
					}else{
						echo "insertion_failed";		
					}
				}
				
		}else{
			$insert = mysqli_query($conn,"INSERT INTO company_holiday(day,month,year,name,company_id) VALUES ('$day','$month','$year','$name','$company')");
			if($insert){
				echo "insertion_success";			
			}else{
				echo "insertion_failed";		
			}
		}
 ?>