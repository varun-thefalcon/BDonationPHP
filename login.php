<?php
session_start();
if(isset( $_SESSION['isLoggedIn'])){
$isLoggedIn = $_SESSION['isLoggedIn'];
if($isLoggedIn){
header('Location: /profile.php');
die;
}
}
?>

<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="./css/login.css">
        <script src="./js/jquery.js"> </script>
    </head>
    <body>
        <div class="loginbox">
            <img src="./images/avatar.jpg" class="avatar">
            <h1>Login Here</h1>
            <form id="loginForm" action="" >
                <p>Username</p>
                <input type="email" name="email" id="email" placeholder="Enter email" required>
                <p>Password</p>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                <input type="Submit" value="Login">
                <a href="signup.php">Don't have an Account?</a>
        </div>

        <script>
            var ServerResult;
            $(document).ready(function() {
                $("#loginForm").submit(function(e){
                e.preventDefault();

                if(paramsValidated()){
                $.ajax({
                    type: "POST",
                    url: "/php/login.php",   
                    data: $('#loginForm').serialize(),
                    success: function (result) {
                    ServerResult = JSON.parse(result);
                    proceedFurther(ServerResult);
                }
            });
                }
        });
        });

        function paramsValidated() {
            var email = $("#email").val();
            var password = $("#password").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)){
                alert("invalid email id");
                return false;
            }
            if(password.length < 8){
                alert("password must be more than 8 characters");
                return false;
            }
            
            return true;
        }



        function proceedFurther(result) {
            if(!result.isSuccess){
                alert(result.errorMsg); 
            }else{
                window.location = "/profile.php";
            }
        }
        </script>
    </body>
</html>