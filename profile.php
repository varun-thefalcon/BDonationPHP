<?php
session_start();
if(!isset( $_SESSION['isLoggedIn'])){
    header('Location: /login.php');
    die;
    }

// echo "<pre>";
// print_r($_SESSION);
$id = $_SESSION['loginUserID'];

include_once __DIR__.DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'db_connect.php';
$connection = new DB_CONNECT();
$con = $connection->connect();

$profile= array();

        $getQuery = "Select * from  users WHERE id = '".$id."'";
        $check = mysqli_query($con,$getQuery);
		$row = $check->fetch_assoc();

        $name = $row["name"]; 
        $email = $row["email"]; 
        $dob = $row["dob"]; 
        $mobile = $row["mobile"]; 
        $Bgroup = $row["Bgroup"]; 


    ?>
  <!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/profile.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <nav>
    <div class="nav-wrapper">
    <a href="/" class="brand-logo center">BBank</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="./php/logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

<div class="container-fluid">
<div class="row">
    <div class="col s2 customSidebar">
    <ul >
      <li><a href="needs.php">Request</a></li>
      <li><a href="donate.php">Donate</a></li>
    </ul>
    </div>

    <div class="col s10 mainContent">
    
    <form >
                <p>Name</p>
                <input type="text" name="name" value="<?php echo $name; ?>" disabled>
                <p>E-mail</p>
                <input type="email" name="email" value="<?php echo $email; ?>" disabled>
                <p>Phone</p>
                <input type="text" name="phone" value="<?php echo $mobile; ?>" disabled>
                <p>Blood Group</p>
                <input type="text" name="Bgroup" value="<?php echo $Bgroup; ?>" disabled>
                <p>D.O.B</p>
                <input type="text" name="Bgroup" value="<?php echo $dob; ?>" disabled>
                
               </form>
    </div>
</div>
</div>
    <script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="js/materialize.js"></script>

    </body>
  </html>