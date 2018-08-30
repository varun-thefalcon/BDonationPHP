<?php
session_start();
include_once __DIR__.DIRECTORY_SEPARATOR.'db_connect.php';
$connection = new DB_CONNECT();
$con = $connection->connect();

$result= array();
$_SESSION['isLoggedIn'] = false;

$params = validateParams($_REQUEST);

	if(!$params['valid']){
		$result['isSuccess'] = false;
		$result['errorMsg'] = "Entered data is not valid. Kindly enter valid details";
		echo json_encode($result);
		die;
	}

	$name = $params['name'];
	$email = $params['email'];	
	$phone = $params['phone'];
	$password = md5($params['password']);

// echo '<pre>';
// 	$name = 'name';
// 	$email = 'email';	
// 	$phone = 'phone';
// 	$password = 'password';

	$getQuery = "Select * from  users WHERE email = '".$email."' AND mobile = '".$phone."'";
	$check = mysqli_query($con,$getQuery);
	$rowcount=mysqli_num_rows($check);

	if($rowcount){
		$result['isSuccess'] = false;
		$result['errorMsg'] = "mobile or email already in use";
		echo json_encode($result);
		die;
		} else{
		$sql = "INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`) VALUES (NULL, '".$name."', '".$email."', '".$phone."', '".$password."')";
		$res = mysqli_query($con,$sql);
		$check = mysqli_query($con,$getQuery);
		 while($row = $check->fetch_assoc())
		{
			$rows[] = $row;
		}
		if(count($rows) == 1){
			$userId = $rows[0]['id'];
			$_SESSION['loginUserID'] = $userId;
			$_SESSION['isLoggedIn'] = true;
			$result['isSuccess'] = true;
			$result['successMsg'] = "Registered Successfully";
		}else{
			$result['isSuccess'] = false;
			$result['errorMsg'] = "mobile or email already in use";
		}
		echo json_encode($result);
		die;
	}
	mysqli_close($con);	




	function validateParams(array $params)
	{
		$params['valid'] = false;

		if( isset($params['email']) && isset($params['password']) && ( strlen($params['password']) > 7 ) && filter_var($params['email'], FILTER_VALIDATE_EMAIL) )
		{
			$params['valid'] = true;
		}

		return $params;
	}
?>
 

 <!-- while($row = $check->fetch_assoc())
	{
		$rows[] = $row;
	}

	print_r($rows); -->