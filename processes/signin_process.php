<?php
    include_once('../database/database.php');
	$response = array();
	$email = $_POST['email'];
    $pass = $_POST['password'];


   	if(!preg_match("/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/",$email)){
		echo ("email_notvalid");	    
	}else{
		/*
		$sql = mysqli_query($conn,"SELECT id,email,password,role FROM user WHERE email='$email'");
			if (mysqli_num_rows($sql) > 0) {
                $data = $sql->fetch_array();
                if ($pass == $data['password']) {
                    $response["role"] = $data['role'];
                    $response["user_id"] = $data['id'];
                    $response["email"] = $data['email'];
                    echo json_encode($response);	
				}else{
					
					echo ("wrong_pass");
				}
			}else{
				echo ("not_registered");
			}
		*/
		
		
	/********************* CHECK IF ADMIN *********************************************/				
			$sql = mysqli_query($conn,"SELECT admin_id,email,password FROM admin WHERE email='$email'");
			if (mysqli_num_rows($sql) > 0) {
                $data = $sql->fetch_array();
                if ($pass == $data['password']) {
									
						$response["role"] = "admin";
						$response["id"] = $data["admin_id"];
						$response["email"] = $data["email"];
						echo json_encode($response);	
	
				}else{
					echo "wrong_pass";
				}
			} else {
/********************* CHECK IF USER  *********************************************/
				$sql = mysqli_query($conn,"SELECT email,password,id,role FROM user WHERE email='$email'");
					if (mysqli_num_rows($sql) > 0) {
					$data = $sql->fetch_array();
					if ($pass == $data['password']) {
						
						$response["role"] = $data["role"];
						$response["id"] = $data["id"];
						$response["email"] = $data["email"];
						echo json_encode($response);	
	
					}else{
						echo "wrong_pass";
					}
			
				}else{
/********************* CHECK IF COMPANY *********************************************/
					$sql = mysqli_query($conn,"SELECT email,password,company_id FROM company WHERE email='$email'");
					if (mysqli_num_rows($sql) > 0) {
					$data = $sql->fetch_array();
					if ($pass == $data['password']) {
						
						$response["role"] = "company";
						$response["id"] = $data["company_id"];
						$response["email"] = $data["email"];
						echo json_encode($response);	
	
						
					}else{
						echo "wrong_pass";
					}
			
				}else{
/**************************** NOT REGISTERED ****************************************/
						echo "not_registered";
				}
		
			}
			
			
		}
	}




	
	

?>