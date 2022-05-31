<?php
    session_start();
    $con=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($con,"kcdb");
    if (!$con) {
        echo "Something's wrong, I can feel it";
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
		<title>Kitchen Catastrophe!</title>
        <link rel="icon" type="image/x-icon" href="images/icon.png">
    </head>
<body class="animate__animated animate__fadeInDown">
    <style>
        body {
            min-height: 2688px;
        }
    </style>
    <br>
    <div class="bar">
    <div id="nav-placeholder">
		</div>

		<script>
				$(function(){
					$("#nav-placeholder").load("nav.php");
				});
		</script>
    </div>

    <!---<br>

    <div class="unconst">
        <img alt="Under construction" src="images/under_const.gif">
    </div>--->
        <h1 style="text-align: center; font-family: basic-sans, sans-serif; font-weight: bolder; font-size: 48px; margin-bottom: 16px;">Hello, <?php if(isset($_SESSION['login'])){echo $_SESSION['username']; echo '<a href="index.php?logout=true" style="font-size: 20px;">Logout</a>';} else {echo "Guest";} ?>!</h1>
        <?php
            if (isset($_GET['logout'])) {
                session_destroy();
                echo '<script type="text/JavaScript"> window.location.replace("index.php"); </script>';
            }
        ?>
        <h1 style="text-align: center; font-family: basic-sans, sans-serif; font-weight: bolder; font-size: 48px; margin-bottom: 16px;">About the Team!</h1>
    <div class="about">
        <img src="images/char.png" alt="pfp">
        <div class="about-text">
        <h3>About the Creator! :D</h3>
            <p>She's Joan You, creator of Kitchen Catastrophe!<br>
        (not actual photo)</p>
        <h3>Other members of the Team</h3>
        <p style="font-size: 24px;">Aman Darwisy <sm style="font-size: 12px;">(web developer)</sm></p>
        <p style="font-size: 24px;">Iman Nasuha</p>
        <p style="font-size: 24px;">Danyl Muqri</p>
        </div>
        <img src="images/start.png" alt="the game" class="aboutgameimg">
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1 style="text-align: center; font-family: basic-sans, sans-serif; font-weight: bolder; font-size: 48px; margin-bottom: 16px; margin-top: 48px;">About the Game!</h1>
<div class="aboutgame" style="margin-top: 16px;">
    <div class="abtgame1">
        <img src="images/game/Slide1.PNG" alt="game" style="min-width: 320px; min-height: 240px;">
        <div class="about-text" style="margin-top: 48px;">
        <h3>One day, you woke up and felt like you wanted to bake something. You went to the kitchen, but all of a sudden...</h3>
        </div>
    </div>
    <div class="abtgame2">
        <img src="images/game/Slide2.PNG" alt="game" style="min-width: 320px; min-height: 240px;">
        <div class="about-text" style="margin-top: 48px;">
        <h3>Some animals have broken into your house! They stole all of your ingredients, you have to get them back!</h3>
        </div>
    </div>
    <div class="abtgame3">
        <img src="images/game/Slide3.PNG" alt="game" style="min-width: 320px; min-height: 240px;">
        <div class="about-text" style="margin-top: 72px;">
        <h3>So go outside and shoot birds! <small style="font-size: 16px;">(with water)</small></h3>
        </div>
    </div>
    <div class="abtgame4">
        <img src="images/game/Slide4.PNG" alt="game" style="min-width: 320px; min-height: 240px;">
        <div class="about-text" style="margin-top: 64px;">
        <h3>Play Whack-a-Mole with stubborn bunnies! <br><small style="font-size: 16px;">(they have bombs, apparently)</small></h3>
        </div>
    </div>
    <div class="abtgame5">
        <img src="images/game/Slide5.PNG" alt="game" style="min-width: 320px; min-height: 240px;">
        <div class="about-text" style="margin-top: 64px;">
        <h3>Do parkour to chase your dog! <br><small style="font-size: 16px;">(I don't even know how it got up there!)</small></h3>
        </div>
    </div>
    <div class="abtgame6">
        <img src="images/game/Slide6.PNG" alt="game" style="min-width: 320px; min-height: 240px;">
        <div class="about-text" style="margin-top: 64px;">
        <h3>And finally, be shrunken and escape an ant colony! <small style="font-size: 16px;">(rocks coming out from nowhere!)</small></h3>
        </div>
    </div>
</div>
    <br><br><br><br>
    <div class="homelinks">
        <div>
            <a href="play.php"><img src="images/controller.png" alt="game" class="homelinkimg1"></a>
            <div class="homelinktext1">
                <h3>Play the Game!</h3>
            </div>
        </div>
        <div>
            <a href="contact.html"><img src="images/phone.png" alt="game" class="homelinkimg2"></a>
            <div class="homelinktext2">
                <h3>Contact us!</h3>
            </div>
        </div>
    </div>
	<div class="copyright">
		<!--- <div class="crlogos">
			<img src="https://mirrors.creativecommons.org/presskit/icons/cc.xlarge.png" alt="">
			<img src="https://mirrors.creativecommons.org/presskit/icons/by.xlarge.png" alt="">
			<img src="https://mirrors.creativecommons.org/presskit/icons/nc.xlarge.png" alt="">
			<img src="https://mirrors.creativecommons.org/presskit/icons/sa.xlarge.png" alt="">
		</div> --->
		<div class="crtext">
			<p><!---The game is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International license, unless otherwise noted.<br>--->
			The website, excluding the game, is licensed under a GNU General Public License v3.0, unless otherwise noted. External assets belong to their respective owners and licensed under their respective licenses.<br>
			The source code can be found <a href="https://github.com/GeniusXanthron/kitchen-catastrophe-website">here</a>.</p>
		</div>
	</div>
    </body>
    <footer>

    </footer>
</html>
