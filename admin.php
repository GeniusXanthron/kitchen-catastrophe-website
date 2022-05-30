<?php
    $con=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($con,"kcdb");
    if (isset($_SESSION['login'])){
        echo '<script type="text/JavaScript"> window.location.replace("index.php"); </script>';
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="register.css">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
		<title>Register</title>
        <link rel="icon" type="image/x-icon" href="images/icon.png">
    </head>
<body>
	<style>
		body {
			min-height: 919px;
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
    
    </body>
    <footer>

    </footer>
</html>
