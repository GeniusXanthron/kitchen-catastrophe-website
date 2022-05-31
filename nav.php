<?php
    session_start();
    $con=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($con,"kcdb");
    if (!$con) {
        echo "Something's wrong, I can feel it";
    }
?>
<link rel="stylesheet" href="nav.css">
<link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
<ul class="main">
  <li><a href="index.php" class="img"><img src="images/logo.png" alt="Home"></a></li>
  <li><a href="about-us.php" class="text">About Us</a></li>
  <li><a href="play.php" class="text">Play</a></li>
  <li><a href="contact.html" class="text">Contact</a></li>
  <!---<li><a href="feedback.html" class="text">Feedback</a></li>--->
  <li><?php if(isset($_SESSION['login']) and $_SESSION['admin']==true){echo '<a href="about-us-admin.php" class="text">Admin</a>';}?></li>
  <li><?php if(isset($_SESSION['login'])){echo '<a class="logintext">'.$_SESSION['username'].'</a>';} else {echo '<a href="logindb.php" class="logintext">Login</a>';} ?></li>
</ul>
