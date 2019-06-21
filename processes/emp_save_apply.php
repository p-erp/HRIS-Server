<?php
    include_once('../database/database.php');
	
	$user = $_POST['user'];
	$company = $_POST['company_id'];
	$month = (date('m'));
	$year = (date('Y'));
	$day = (date('d'));
	$sql_getCompany = mysqli_query($conn,"SELECT current_company from user where id =	'$user'");
	if($sql_getCompany){
		$r = mysqli_fetch_array($sql_getCompany);
		$company_id = $r['current_company'];
		if($company_id == ''){

			$sql_checkIfExist = mysqli_query($conn,"SELECT * from company_applicant where employee_id = '$user' AND company_id = '$company' ");
			if($sql_checkIfExist){
				if(mysqli_num_rows($sql_checkIfExist)>=1){
					echo "exist";
				}else{
					$sql_insertApplicant = mysqli_query($conn,"INSERT INTO company_applicant(company_id
																					,employee_id
																					,day
																					,month
																					,year)
															  VALUES 
																					($company
																					,$user
																					,'$day'
																					,'$month'
																					,'$year')");
					if($sql_insertApplicant){
						echo "success";
					}else{
						echo "failed";
					}
				}
			}else{
				echo "failed";
			}
		}else{
			echo "employed";
		}
	}else{
		echo "failed";
	}
	

	
 ?>