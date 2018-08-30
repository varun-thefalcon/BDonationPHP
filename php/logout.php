<?php
session_start();
if(isset( $_SESSION['isLoggedIn'])){
$isLoggedIn = $_SESSION['isLoggedIn'];
if($isLoggedIn){
    session_destroy();
header('Location: /index.php');
die;
}
}
?>