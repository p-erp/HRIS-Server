<?php
    include_once('../database/database.php');
	
		//$user = $_POST['user'];
		$user = '3';
		$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user'");
		if(mysqli_num_rows($sql_getCompany)>=1){
			if($sql_getCompany){
				
				$r = mysqli_fetch_array($sql_getCompany);
				$current_company = $r['current_company'];
				$sql = mysqli_query($conn,"SELECT * from offset where user_id = $user and company_id = $current_company");
				$count = mysqli_num_rows($sql);
				if($count > 0){	
					if($sql){
						$rows =  array();
						while ($r = mysqli_fetch_array($sql)) 
						{
							$row_array = array();
							$row_array['offset_id'] = $r['offset_id'];
							$row_array['dayoffset_new_day'] = $r['dayoffset_new_day'];
							$row_array['dayoffset_new_month'] = $r['dayoffset_new_month'];
							$row_array['dayoffset_new_year'] = $r['dayoffset_new_year'];
							$row_array['dayoffset_day'] = $r['dayoffset_day'];
							$row_array['dayoffset_month'] = $r['dayoffset_month'];
							$row_array['dayoffset_year'] = $r['dayoffset_year'];
							
							
							array_push($rows,$row_array);
						}	
						echo json_encode(array("data"=>$rows));
					}else{
						echo "failed";
					}
				}else{
					echo "nodata";
				}
			}else{
				echo "failed";	
			}	
		
		}else{
			echo "not_employed";
		
		}
 ?>