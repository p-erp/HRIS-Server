<?php
    include_once('../database/database.php');
	
			$sql = mysqli_query($conn,"SELECT * from company");
				$count = mysqli_num_rows($sql);
				if($count > 0){	
					if($sql){
						$rows =  array();
						while ($r = mysqli_fetch_array($sql)) 
						{
							$row_array = array();
							$row_array['company_id'] = $r['company_id'];
							$row_array['name'] = $r['name'];
							$row_array['address'] = $r['address'];
							$row_array['email'] = $r['email'];
							$row_array['password'] = $r['password'];
							$row_array['mobile'] = $r['mobile'];
							$row_array['landline'] = $r['landline'];
							$row_array['image'] = $r['image'];
							
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