<?php
	include_once('../database/database.php');
	$query = $_POST['query'];
	if($query == ""){
		$SQLquery = mysqli_query($conn,"Select * from company");
		if($SQLquery){
			if(mysqli_num_rows($SQLquery)>=1){
				$rows = array();
				while($r = mysqli_fetch_array($SQLquery)){
				$row_array = array();
				$row_array["company_id"] = $r['company_id'];
				$row_array["name"] = $r['name'];
				$row_array["address"] = $r['address'];
				$row_array["email"] = $r['email'];
				$row_array["mobile"] = $r['mobile'];
				$row_array["landline"] = $r['landline'];
				$row_array["image"] = $r['image'];
				array_push($rows,$row_array);
			
				}
				echo json_encode(array("data"=>$rows));
			
			}else{
				echo "no_data";
			}
		}else{
			echo "failed";
		}
	}else{
	//query name
	$SQLqueryName = mysqli_query($conn,"select * from company where name  LIKE '%$query%'");
	if($SQLqueryName){
		if(mysqli_num_rows($SQLqueryName)>=1){
			$rows = array();
			while($r = mysqli_fetch_array($SQLqueryName)){
				$row_array = array();
				$row_array["company_id"] = $r['company_id'];
				$row_array["name"] = $r['name'];
				$row_array["address"] = $r['address'];
				$row_array["email"] = $r['email'];
				$row_array["mobile"] = $r['mobile'];
				$row_array["landline"] = $r['landline'];
				$row_array["image"] = $r['image'];
				array_push($rows,$row_array);
			}
			echo json_encode(array("data"=>$rows));
			
		}else{
			//query address	
			$SQLqueryAddress = mysqli_query($conn,"select * from company where address  LIKE '%$query%'");
			if($SQLqueryAddress){
				if(mysqli_num_rows($SQLqueryAddress)>=1){
					$rows = array();
					while($r = mysqli_fetch_array($SQLqueryAddress)){
					$row_array = array();
					$row_array["company_id"] = $r['company_id'];
					$row_array["name"] = $r['name'];
					$row_array["address"] = $r['address'];
					$row_array["email"] = $r['email'];
					$row_array["mobile"] = $r['mobile'];
					$row_array["landline"] = $r['landline'];
					$row_array["image"] = $r['image'];
					array_push($rows,$row_array);
					
					}
					echo json_encode(array("data"=>$rows));

				}else{
						//query email
						$SQLqueryEmail = mysqli_query($conn,"select * from company where email LIKE '%$query%'");
						if($SQLqueryEmail){
							if(mysqli_num_rows($SQLqueryEmail)>=1){
								$rows = array();
								while($r = mysqli_fetch_array($SQLqueryEmail)){
									$row_array = array();
									$row_array["company_id"] = $r['company_id'];
									$row_array["name"] = $r['name'];
									$row_array["address"] = $r['address'];
									$row_array["email"] = $r['email'];
									$row_array["mobile"] = $r['mobile'];
									$row_array["landline"] = $r['landline'];
									$row_array["image"] = $r['image'];
									array_push($rows,$row_array);
								}
								echo json_encode(array("data"=>$rows));
			
							}else{
									echo "no_data";
							}
						
						}else{
							echo "failed";
						}
				}
			
			
			}else{
				echo "failed";
				
			}
		}
	}else{
		echo "failed";
	}
	}
	
?>