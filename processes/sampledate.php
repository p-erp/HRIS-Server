<?php

include_once('../database/database.php');
$day = $_POST['day'];
$time_start = $_POST['start'];
$time_end = $_POST['end'];
$year = $_POST['year'];
$company_id = $_POST['company_id'];
$sql = mysqli_query($conn,"SELECT * from dayofwork where work_day = '$day' AND company_id = '$company_id' and year = '$year'");
if(mysqli_num_rows($sql)>1){
	echo "exist";
}else{
	$insert = mysqli_query($conn,"INSERT INTO dayofwork(work_day,time_start,time_end,year) VALUES ('$day','$time_start','$time_end','$year')");
	if($insert){
		echo "success";
	}else{		
		echo "failed";
	}

}

	

?>