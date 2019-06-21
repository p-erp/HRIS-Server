<?php
    include_once('../database/database.php');
	$user = $_POST['user'];
	

	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user'");
	if(mysqli_num_rows($sql_getCompany)>=1){
		if($sql_getCompany){
		$r = mysqli_fetch_array($sql_getCompany);
		$current_company = $r['current_company'];
		$sql = mysqli_query($conn,"SELECT * from dayofwork where company_id = '$current_company'");
		$count = mysqli_num_rows($sql);
		if($count > 0){
				if($sql){
				$rows =  array();
					while ($r = mysqli_fetch_array($sql)) 
					{
							$row_array = array();
							$row_array['dayofwork_id'] = $r['dayofwork_id'];
							$row_array['work_day'] = $r['work_day'];
							$row_array['time_start'] = $r['time_start'];
							$row_array['time_end'] = $r['time_end'];
							$row_array['year'] = $r['year'];
						
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