<?php
session_start();
$isLoggedIn = false;
if(isset( $_SESSION['isLoggedIn'])){
$isLoggedIn = $_SESSION['isLoggedIn'];
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>WELCOME</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.js">
        </script>
        <script type="text/javascript">
            $(window).on('scroll', function() {
                if($(window).scrollTop()) {
                    $('nav').addClass('black');
                }
                else
                {
                    $('nav').removeClass('black');
                }
            });
            </script>
    </head>
    <body>
        <div class="wrapper">
            <nav>
                <ul>
                    <li><a href="#">How We Work</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <?php
                    if($isLoggedIn){ ?>
                        <li><a class="active" href="/profile.php">My Profile</a></li>
                        <li><a href="/php/logout.php">Logout</a></li>                        
                    <?php } else{ ?>
                        <li><a class="active" href="/login.php">LogIn</a></li>
                    <?php } ?>
                </ul>
            </nav>
            <section class="sec1"></section>
            <section class="content">
               <div class="a">
                    <h2>WHY SOULD I DONATE BLOOD ?</h2>
               </div>
               <div class="b">
                    <p>Blood is the most precious gift that anyone can give to another person the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components red cells, platelets and plasma which can be used individually for patients with specific conditions.
                    </p>
               </div>

       <ul class="d" style="list-style-type:disc">
            <li> women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.</li>
            <li>children with severe anaemia often resulting from malaria or malnutrition.</li>
            <li>people with severe trauma following man-made and natural disasters.  And</li>
            <li>many complex medical and surgical procedures and cancer patients.</li>
       </ul>  
       <a href="login.php">
       <button class="button">I LIKE TO DONATE</button>
       </a>
       <a href="needs.php">       
       <button class="button">I WANT BLOOD</button>
       </a>
    
       </section>
                <div style="margin-top:40px"></div>
        </div>
    </body>
</html>