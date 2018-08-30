<?php
session_start();
if(isset( $_SESSION['isLoggedIn'])){
	$isLoggedIn = $_SESSION['isLoggedIn'];
	if($isLoggedIn){
		header('Location: /profile.php');
		die;
	}
}
include_once __DIR__.DIRECTORY_SEPARATOR.'db_connect.php';
$connection = new DB_CONNECT();
$con = $connection->connect();

$result = array();

$params = validateParams($_REQUEST);

	if(!$params['valid']){
		$result['isSuccess'] = false;
		$result['errorMsg'] = "Entered data is not valid. Kindly enter valid details";
		echo json_encode($result);
		die;
	}

	$email = $params['email'];	
	$password = md5($params['password']);

	$getQuery = "Select * from  users WHERE email = '".$email."' AND password = '".$password."'";
	$check = mysqli_query($con,$getQuery);
	$row = $check->fetch_assoc();

	if(count($row) < 0 || $row == null){
		$result['isSuccess'] = false;
		$result['errorMsg'] = "Invalid credentials. Please check your email and password.";
		echo json_encode($result);
		die;
	}

	$row['isSuccess'] = true;
	$_SESSION['isLoggedIn'] = true;
	$_SESSION['loginUserID'] = $row['id'];
	echo json_encode($row);

	
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