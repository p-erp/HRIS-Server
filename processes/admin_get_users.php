<?php
    include_once('../database/database.php');
	
			$sql = mysqli_query($conn,"SELECT * from user");
				$count = mysqli_num_rows($sql);
				if($count > 0){	
					if($sql){
						$rows =  array();
						while ($r = mysqli_fetch_array($sql)) 
						{
							
							$row_array = array();
							$row_array['id'] = $r['id'];
							$row_array['firstname'] = $r['firstname'];
							$row_array['lastname'] = $r['lastname'];
							$row_array['middlename'] = $r['middlename'];
							$row_array['password'] = $r['password'];
							$row_array['email'] = $r['email'];
							$row_array['age'] = $r['age'];
							$row_array['mobile'] = $r['mobile'];
							$row_array['role'] = $r['role'];
							$row_array['joined'] = $r['joined'];
							
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