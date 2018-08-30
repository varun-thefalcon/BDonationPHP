<?php
session_start();
if(!isset( $_SESSION['isLoggedIn'])){
header('Location: /login.php');
die;
}

$userID = $_SESSION['loginUserID'];
$result = array();

include_once __DIR__.DIRECTORY_SEPARATOR.'db_connect.php';
$connection = new DB_CONNECT();
$con = $connection->connect();

$result= array();
$_SESSION['isLoggedIn'] = false;


    $firstName = $_REQUEST["firstName"];
    $hospitalName = $_REQUEST["hospitalName"];
    $age = $_REQUEST["dob"];
    $Bgroup = $_REQUEST["Bgroup"];
    $gender = $_REQUEST["gender"];
    $mobile = $_REQUEST["mobile"];
    $urgency = $_REQUEST["urgency"];


		$sql = "INSERT INTO `needs` (`id`, `userId`, `patientName`, `hospitalName`, `age`, `bloodGroup`, `urgency`, `gender`, `mobile`) VALUES (NULL, '" .$userID."', '" .$firstName ."', '".$hospitalName ."', '". $age ."', '". $Bgroup ."', '".$urgency ."', '". $gender ."', '". $mobile."')";
		$res = mysqli_query($con,$sql);

        $result['isSuccess'] = true;
        $result['successMsg'] = "Requested Successfully. We will contact you now.";

        echo json_encode($result);
		die;

    mysqli_close($con);	
    
