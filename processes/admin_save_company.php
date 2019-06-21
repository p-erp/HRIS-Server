<?php

include_once('../database/database.php');

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$landline = $_POST['landline'];
$image = $_POST['image'];
		
$t=time();
$rand = generateRandomString(25);
$path = '../images/'.$rand.$t.'.jpg';
$newPath = 'images/'.$rand.$t.'.jpg';
function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


$sql = mysqli_query($conn,"SELECT * from company where name = '$name' and address = '$address'");
$check = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM company"));

if($check>0){
	if(mysqli_num_rows($sql)>0){
		echo "exist";
	}else{
		$insert = mysqli_query($conn,"INSERT INTO company(name
														 ,address
														 ,email
														 ,password
														 ,mobile
														 ,landline
														 ,image) 
															VALUES 
														 ('$name'
														 ,'$address'
														 ,'$email'
														 ,'$password'
														 ,'$mobile'
														 ,'$landline'
														 ,'$newPath')");
		if($insert){
			file_put_contents($path,base64_decode($image));
			echo "success";
		}else{		
			echo "failed";
		}

	}
}else{
	$insert = mysqli_query($conn,"INSERT INTO company(name
														 ,address
														 ,email
														 ,password
														 ,mobile
														 ,landline
														 ,image) 
															VALUES 
														 ('$name'
														 ,'$address'
														 ,'$email'
														 ,'$password'
														 ,'$mobile'
														 ,'$landline'
														 ,'$newPath')");
														 
		if($insert){
			file_put_contents($path,base64_decode($image));
			echo "success";
		}else{		
			echo "failed";
		}

		
}

?>
