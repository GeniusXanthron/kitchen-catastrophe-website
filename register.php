<?php
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"kcdb");
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
    <div class="logintitle">
		<h1>Register</h1>
	</div>
	<div class="form">
        <form method="post" action="register.php">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Register" name="Register">
        </form>
        <p class="register-successful invisible">Register successful!</p>
        <p class="register-failed invisible">Register failed!</p>
        <?php
            if(isset($_POST["Register"]))
            {
                $username=$_POST["username"];
                $password=$_POST["password"];
                $conflict="select * from logins where username='$username'";
                // $conflict_run=mysqli_query($con, $conflict);
                // if (mysqli_num_rows($conflict_run) === 1) {
                //     $row = mysqli_fetch_assoc($conflict_run);
                //     if ($row['username'] === $username) {
                //         echo "<script type='text/javascript'>
                //         alert ('NO!!!')
                //         </script>";
                //         return;
                //     }
                    $query="insert into logins values ('','$username','$password')";
                        $query_run=mysqli_query($con, $query);
                        if($query_run)
                        {
                             echo "<script type='text/javascript'>
                            alert ('SUCCESS!!!!!')
                            </script>";
                         }
                }
            // }
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