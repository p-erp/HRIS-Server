<?php
    include_once('../database/database.php');
	
	$month = $_POST['month'];
	$year = $_POST['year'];
	$day = $_POST['day'];
	$name = $_POST['name'];
	
	
		$sql = mysqli_query($conn,"Select * from holiday");
		$count = mysqli_num_rows($sql);
		if($count > 0){
				$check  = mysqli_query($conn,"Select * from holiday where day = '$day' and month = '$month' and year = '$year' and name = '$name'");
				if(mysqli_num_rows($check)){
						echo "exist";			
				}else{
					$insert = mysqli_query($conn,"INSERT INTO holiday(day,month,year,name) VALUES ('$day','$month','$year','$name')");
					if($insert){
						echo "insertion_success";			
					}else{
						echo "insertion_failed";		
					}
				}
				
		}else{
			$insert = mysqli_query($conn,"INSERT INTO holiday(day,month,year,name) VALUES ('$day','$month','$year','$name')");
			if($insert){
				echo "insertion_success";			
			}else{
				echo "insertion_failed";		
			}
		}
 ?>