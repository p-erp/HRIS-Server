<?php
    include_once('../database/database.php');
	
	
		$sql = mysqli_query($conn,"SELECT * from holiday");
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
			echo "nodata";
		}
 ?>