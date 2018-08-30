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
        <title>SIGNUP</title>
        <link rel="stylesheet" type="text/css" href="./css/signup.css">
        <script src="./js/jquery.js"> </script>

    </head>
    <body>
        <div class="signinbox">
            <img src="./images/avatar.jpg" class="avatar">
            <h1>Signup Here</h1>
            <form id="signupForm" action="" >
                <p>Name</p>
                <input type="text" name="name" value="name" placeholder="Enter name" required>
                <p>E-mail</p>
                <input type="email" name="email" value="" placeholder="Enter email" required>
                <p>Phone</p>
                <input type="text" name="phone" value="" placeholder="Enter mobile number" required>
                <p>D.O.B</p>
                <input type="date" name="dob" value=""  required>
                <p>Blood Group</p>
                <select name="bloodGroup" required>
                    <option value="a.p">A +</option>
                    <option value="a.n">A -</option>
                    <option value="b.p">B +</option>
                    <option value="b.n">B -</option>
                    <option value="o.p">O +</option>
                    <option value="o.n">O -</option>
                    <option value="ab.p">AB +</option>
                    <option value="ab.n">AB -</option>
                </select>
                <p>Password</p>
                <input type="password" name="password" id="password" value="" required>
                <p>Confirm Password</p>
                <input type="password" name="cPassword" id="cPassword" value="" required>
                <input type="Submit" value="Submit" onclick="">
               </form>
        </div>

        <script>
            var ServerResult;
            $(document).ready(function() {
               
               
                $("#signupForm").submit(function(e){
        e.preventDefault();            
        if(paramsValidated()){

            $.ajax({
                type: "POST",
                url: "/php/signup.php",   
                data: $('#signupForm').serialize(),
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
            var cpassword = $("#cPassword").val();
            if(password.length < 8){
                alert("password must be more than 8 characters");
                return false;
            }
            if(password != cpassword){
                alert("passwords must match");
                return false;
            }
            
            return true;
        }
        function proceedFurther(result) {

            if(!result.isSuccess){
                alert(result.errorMsg);
            }else{
                alert(result.successMsg);
                window.location = "/profile.php";
            }

        }
        </script>
    </body>
</html>