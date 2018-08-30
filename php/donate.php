<?php
session_start();
if(!isset( $_SESSION['isLoggedIn'])){
header('Location: /login.php');
die;
}

$result = array();

include_once __DIR__.DIRECTORY_SEPARATOR.'db_connect.php';
$connection = new DB_CONNECT();
$con = $connection->connect();

$result= array();
$_SESSION['isLoggedIn'] = false;


    $userID = $_SESSION['loginUserID'];
    $location = $_REQUEST["preLocation"];
    $date = date("Y/m/d");
    

		$sql = "INSERT INTO `donate` (`id`, `userId`, `location`, `date`) VALUES (NULL, '" .$userID."', '" .$location ."', '".$date."')";
		$res = mysqli_query($con,$sql);

        $result['isSuccess'] = true;
        $result['successMsg'] = "Requested Successfully. We will contact you now.";

        echo json_encode($result);
		die;

    mysqli_close($con);	
    
