<?php
    include_once('../database/database.php');
	
		//$company = $_POST["company_id"];
		$company = '1';
		$sql = mysqli_query($conn,"SELECT * from company_applicant where company_id = '$company'");
		$count = mysqli_num_rows($sql);
		if($count > 0){
				
			if($sql){
			$rows =  array();
				while ($r = mysqli_fetch_array($sql)) 
				{
					$row_array = array();
					$user_id = $r['employee_id'];
					$row_array["company_applicant_id"] = $r["company_applicant_id"];
					$row_array["employee_id"] = $r['employee_id'];
					$sql2 = mysqli_query($conn,"SELECT * from user where id = '$user_id'");
					while ($r2 = mysqli_fetch_array($sql2)) 
					{
						$row_info = array();
						$row_info["firstname"] = $r2["firstname"];
						$row_info["lastname"] = $r2["lastname"];
						$row_info["middlename"] = $r2["middlename"];
						$row_info["email"] = $r2["email"];
						$row_info["age"] = $r2["age"];
						$row_info["mobile"] = $r2["mobile"];
						$row_info["current_company"] = $r2["current_company"];
						
						$row_array["info"] = $row_info;
					}
					
					array_push($rows,$row_array);
					
				}	
				echo json_encode(array("data"=>$rows));
			}else{
				echo "failed";
			}
		}else{
			echo "nodata";
		}
 ?>