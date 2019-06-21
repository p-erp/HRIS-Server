<?php

include_once('../database/database.php');
$day = $_POST['day'];
$time_start = $_POST['start'];
$time_end = $_POST['end'];
$year = $_POST['year'];
$user_id = $_POST['user'];


$sql = mysqli_query($conn,"SELECT * from dayofwork where work_day = '$day' AND company_id = '$user_id' and year = '$year'");
$check = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dayofwork"));

if($check>0){
	if(mysqli_num_rows($sql)>0){
		echo "exist";
	}else{
		$insert = mysqli_query($conn,"INSERT INTO dayofwork(work_day,time_start,time_end,year,company_id) VALUES ('$day','$time_start','$time_end','$year',$user_id)");
		if($insert){
			echo "success";
		}else{		
			echo "failed";
		}

	}
}else{
		$insert = mysqli_query($conn,"INSERT INTO dayofwork(work_day,time_start,time_end,year,company_id) VALUES ('$day','$time_start','$time_end','$year',$user_id)");
		if($insert){
			echo "success";
		}else{		
			echo "failed";
		}

}
	

?>