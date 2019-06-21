<?php
    include_once('../database/database.php');
	$user = $_POST['user'];
	
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user'");
	if(mysqli_num_rows($sql_getCompany)>=1){
		if($sql_getCompany){
			
			$r = mysqli_fetch_array($sql_getCompany);
			$current_company = $r['current_company'];
			$sql = mysqli_query($conn,"SELECT * from company_group where company_id = $current_company");
			$count = mysqli_num_rows($sql);
			
			if($count > 0){
		
				if($sql){
				$rows =  array();
					while ($r = mysqli_fetch_array($sql)) 
					{
							$row_array = array();
							$row_array['group_id'] = trim($r['company_group_id']);
							$row_array['name'] = trim($r['name']);
							$row_array['description'] = trim($r['description']);
							$row_array['max_member'] = trim($r['max_member']);
							$row_array['supervisor'] = trim($r['supervisor']);
							array_push($rows,$row_array);
					}	
					echo json_encode(array("data"=>$rows));
				}else{
					echo "failed";
				}
			}else{
				echo "nodata";
			}
			
		}
		
	}else{
			echo "not_employed";
	
	}
		
 ?>