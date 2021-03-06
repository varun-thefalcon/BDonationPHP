<?php
session_start();
if(!isset( $_SESSION['isLoggedIn'])){
header('Location: /login.php');
die;
}

?>

<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/need.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=2.0"/>
    </hea2>
    <body>
    <nav>
    <div class="nav-wrapper">
      <a href="/" class="brand-logo center">BBank</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div class="title"><h2>Want Blood?</h2></div>
    <div class="container">
          <div class="formbox">
            <form id="needsForm" action="./php/needs.php">
            <div>
            <p>Patient Name</p>
            <input required type="text" name="firstName" id="firstName" placeholder="Your Name">
          </div>

          <div>
      <p>Hospital Name</p>
      <input required type="text" name="hospitalName"  id="hospitalName" placeholder="Hospital Name">
    </div>
          <div>
      <p>D.O.B</p>
      <input required type="text" class="datepicker" name="dob" id="dob" placeholder="Your date of birth">
    </div>
    <div>
      <p>Group</p>
      <select name="Bgroup" required>
      <option value="a.p">A +</option>
      <option value="a.n">A -</option>
      <option value="b.p">B +</option>
      <option value="b.n">B -</option>
      <option value="o.p">O +</option>
      <option value="o.n">O -</option>
      <option value="ab.p">AB +</option>
      <option value="ab.n">AB -</option>
  </select>    </div>

    <div  class="input-field">
      <p>Gender</p>
     <select id="gender" name="gender">
       <option value="MALE">Male</option>
       <option value="FEMALE">Female</option>
     </select>
    </div>
    <br>
    <div  class="input-field">
      <p>Mob.No</p>
      <input required type="text" name="mobile" id="mobile" placeholder="Your Phone Number">
    </div>
    <div  class="input-field">
      <p>Urgency</p>
      <input required type="number" name="urgency" id="urgency" placeholder="Needed within(days)">
    </div>
    <div>    
    <input class="btn waves-effect" type="submit" name="submit">
    </div>
    
          </form>
            
        </div>
    </div>
    
    <script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="js/materialize.js"></script>
    
    <script>
    $(document).ready(function(){
    $('select').formSelect();
  });
</script>
        <script>
            var ServerResult;
            $(document).ready(function() {
               
               
                $("#needsForm").submit(function(e){
        e.preventDefault();

            $.ajax({
                type: "POST",
                url: "/php/needs.php",   
                data: $('#needsForm').serialize(),
                success: function (result) {
                    ServerResult = JSON.parse(result);
                    proceedFurther(ServerResult);
                }
            });
        });
        });

        function proceedFurther(result) {

            if(!result.isSuccess){
                alert(result.errorMsg);
            }else{
                alert(result.successMsg);
                window.location = "/profile.php";
            }

        }
        </script>
        <script>
          $(document).ready(function(){
    $('.datepicker').datepicker();
  });
  </script>
      
</body>
</html>