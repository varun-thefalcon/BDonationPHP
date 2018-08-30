<html>
    <head>
        <title>Admin Page</title>
        <meta name="viewport" content="width=device=width,initial-scale=1, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="admins.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.toggle').click(function(){
                    $('ul').toggleClass('active');
                })
            })

        </script>
    </head>
    <body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
 <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
        <section>
            <header>
                <a href="#" class="logo"><img src="as.png"></a>
                <a class="toggle">Menu</a>
            
                <ul class="active">
                    <li><a href="#">Home</a>
                    <li><a href="#">About</a>
                    <li><a href="#">Team</a>
                    <li><a href="#">Contact</a>
                </ul>
            </header>
        </section>
    </body>
</html>