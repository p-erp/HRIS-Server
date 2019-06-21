<?php
    include_once('../database/database.php');
	$user = $_POST['user'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$supervisor = $_POST['supervisor'];
	$max_member = $_POST['max_member'];
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id = '$user'");
	
	if(mysqli_num_rows($sql_getCompany)>=1){
		if($sql_getCompany){

			$r = mysqli_fetch_array($sql_getCompany);
			$current_company = $r['current_company'];
		
			$sql = mysqli_query($conn,"Select * from company_group where name = '$name' and company_id = $current_company");
			$count = mysqli_num_rows($sql);
			if($count > 0){
				echo "exist";
				
			}else{
				$sqlInsert = mysqli_query($conn,"INSERT INTO company_group(name,description,max_member,supervisor,company_id)
																   VALUES ('$name','$description','$max_member','$supervisor','$current_company')");					
				if($sqlInsert){
					echo "success";
				}else{
					echo "failed";
				}
			}
			
		}
		
	}else{
		
		echo "not_employed";
	
	}
	
 ?>