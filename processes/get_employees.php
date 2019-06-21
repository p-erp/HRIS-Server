<?php
	include_once('../database/database.php');
	$company_id = $_POST['company_id'];
	
	$query = mysqli_query($conn,"select * from user where current_company  = '$company_id'");
	if(mysqli_num_rows($query)>0){
		if($query){
			$rows = array();
			while($r = mysqli_fetch_array($query)){
				$row_array = array();
				$row_array["id"] = $r["id"];
				$row_array["firstname"] = $r["firstname"];
				$row_array["lastname"] = $r["lastname"];
				$row_array["middlename"] = $r["middlename"];
				$row_array["email"] = $r["email"];
				$row_array["role"] = $r["role"];
				$row_array["mobile"] = $r["mobile"];
				$row_array["age"] = $r["age"];
				array_push($rows,$row_array);
			}
			echo(json_encode(array("data"=>$rows)));
		}else{
	
			echo "failed";
		}
		
	}else{
		echo "no_data";
	}

?>