<?php
    session_start();
    $con=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($con,"kcdb");
    if (!$con) {
        echo "Something's wrong, I can feel it";
    }
    if (isset($_SESSION['login'])){
        echo '<script type="text/JavaScript"> window.location.replace("index.php"); </script>';
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
		<title>Kitchen Catastrophe!</title>
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
    <div class="logintitle">
		<h1>Login</h1>
	</div>
	<div class="form">
        <form method="post" action="logindb.php">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login" name="Login">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
        <?php
            if (isset($_POST["Login"])) {
                $username=$_POST["username"];
                $password=$_POST["password"];

                $query="select * from logins where username='$username' and password='$password'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) === 1) {
                    $row = mysqli_fetch_assoc($query_run);
                    $admin = $row['admin'];
                    if ($row['username'] === $username && $row['password'] === $password) {
                        $_SESSION['login']=1;
                        $_SESSION['username']=$username;
                        $_SESSION['admin']=$admin;
                        echo "<script> window.location.replace('index.php'); </script>";
                        header("Location: index.php");
                        die();
                        return;
                    }
                    echo "<script type='text/javascript'>
                    alert ('NOPE!!!!!')
                    </script>";
                }
            }
        ?>
	</div>
	<div class="copyright">
		<!--- <div class="crlogos">
			<img src="https://mirrors.creativecommons.org/presskit/icons/cc.xlarge.png" alt="">
			<img src="https://mirrors.creativecommons.org/presskit/icons/by.xlarge.png" alt="">
			<img src="https://mirrors.creativecommons.org/presskit/icons/nc.xlarge.png" alt="">
			<img src="https://mirrors.creativecommons.org/presskit/icons/sa.xlarge.png" alt="">
		</div> --->
	</div>
    </body>
    <footer>

    </footer>
</html>