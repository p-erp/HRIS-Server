<?php
    include_once('../database/database.php');
	$response = array();
	$email = $_POST['email'];
    $contact = $_POST['contact'];
	$joined = $_POST['joined'];
    $password = $_POST['password'];



    if(!preg_match("/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/",$email)){
		echo ("email_notvalid");	    

		}else if(strlen($contact) < 11){		
		echo ("contact_notvalid");	    
	}else{
		$sql = mysqli_query($conn,"SELECT email,mobile  FROM user");
		if (mysqli_num_rows($sql) > 0) {
				$data = $sql->fetch_array();
                if ($email == $data['email']) {
                	echo ("email_used");
				}else if ($contact == $data['mobile']) {
					echo ("contact_used");
				}else{
					//insert
					$insert = mysqli_query($conn,"INSERT INTO user(email,mobile,joined,password) values ('$email','$contact','$joined','$password')");
					if($insert){
						echo ("signup_success");
						
					}else{
						echo ("signup_failed");
					
					}
				}
		}else{
					//insert
						$insert = mysqli_query($conn,"INSERT INTO user(email,mobile,joined,password) values ('$email','$contact','$joined','$password')");
					if($insert){
						echo "signup_success";
						
					}else{
						echo "signup_failed";
					
					}
		
		}
		
	}


 ?>