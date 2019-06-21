
 <?php
    include_once('../database/database.php');
	$user_id = $_POST['user_id'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user_id'");
	if($sql_getCompany){
		$r = mysqli_fetch_array($sql_getCompany);
		$current_company = $r['current_company'];
		if($current_company == ''){
			$sql = mysqli_query($conn,"SELECT * from holiday where year = '$year' and month = '$month'");
			$count = mysqli_num_rows($sql);
			if($count > 0){
				
				if($sql){
					$rows =  array();
					while ($r = mysqli_fetch_array($sql)) 
					{
							$row_array = array();
							$row_array['holiday_id'] = $r['holiday_id'];
							$row_array['day'] = $r['day'];
							$row_array['year'] = $r['year'];
							$row_array['month'] = $r['month'];
							$row_array['name'] = $r['name'];
						
							array_push($rows,$row_array);
					}	
					echo json_encode(array("data"=>$rows));
				}else{
					echo "failed";
				}
			}else{
				echo trim("nodata");
			}
		
		}else{
			$sql = mysqli_query($conn,"SELECT * from company_holiday where  year = '$year' and month = '$month' and company_id = '$current_company'");
			$count = mysqli_num_rows($sql);
			if($count > 0){
				
				if($sql){
					$rows =  array();
					while ($r = mysqli_fetch_array($sql)) 
					{
							$row_array = array();
							$row_array['holiday_id'] = $r['holiday_id'];
							$row_array['day'] = $r['day'];
							$row_array['year'] = $r['year'];
							$row_array['month'] = $r['month'];
							$row_array['name'] = $r['name'];
						
							array_push($rows,$row_array);
					}	
					echo json_encode(array("data"=>$rows));
				}else{
					echo "failed";
				}
			}else{
				echo trim("nodata");
			}

		
		}
		
	}else{
		echo "failed";
	}
 ?>