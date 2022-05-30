<?php
session_start();
$con=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($con,"kcdb");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
    <title>Play!</title>
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <style>
        .form input[type=button] {
            outline: none;
            width: 20%;
            padding: 12px 16px;
            margin: 8px 0;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            border: 2px solid #BBAE80;
            border-radius: 16px;
            background-color: #BBAE80;
            font-family: basic-sans, sans-serif;
            font-size: 20px;
        }

        .form input[type=button]:hover {
            background-color: #FEFFD9;
            transition: background-color 100ms linear;
            -webkit-transition: background-color 100ms linear;
            -ms-transition: background-color 100ms linear;
        }
        
        .form input[type=number] {
            outline: none;
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            border: 2px solid #BBAE80;
            border-radius: 16px;
            background-color: #BBAE80;
        }

        .form input[type=number]:focus {
            background-color: #FEFFD9;
            transition: background-color 100ms linear;
            -webkit-transition: background-color 100ms linear;
            -ms-transition: background-color 100ms linear;
        }

        .form input[type=number]:focus:hover {
            background-color: #FEFFD9;
        }

        .form input[type=number]:hover {
            background-color: #cfc18f;
            transition: background-color 100ms linear;
            -webkit-transition: background-color 100ms linear;
            -ms-transition: background-color 100ms linear;
        }

    </style>
</head>
<body>
    <br>
    <div class="bar">
        <div id="nav-placeholder">
            </div>
    
            <script>
                    $(function(){
                        $("#nav-placeholder").load("nav.php");
                    });
            </script>
        </div><br><br>
    
    <div class="form">
    <h1>Add members information</h1>
    <form method="POST" action="insert.php">
        <label for="name">Name:</label><br>
        <input type="text" name="name"></input><br><br>

        <label for="age">Age:</label><br>
        <input type="number" name="age" step="1"></input><br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email"></input><br><br>

        <label for="phone">Phone number:</label><br>
        <input type="text" name="phone" maxlength="12"></input><br><br>
        
        <label for="image">Image link:</label><br>
        <input type="text" name="image"></input><br><br>

        <input type="button" value="Back" onClick="location.href='about-us-admin.php'"></input>
        <input type="submit" value="Submit!" name="insertdata"></input>
        <?php 
        if(isset($_POST["insertdata"]))
        {
            $name=$_POST["name"];
            $age=$_POST["age"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $image=$_POST["image"];
            
            $query="insert into info values ('','$name','$age','$email','$phone','$image')";
            $query_run=mysqli_query($con,$query);
            
            if($query_run)
            {
                echo "<script type='text/javascript'>alert ('Info added!')</script>";
                echo"<script type=text/javascript>window.location.replace('about-us-admin.php')</script>";
            }
            else
            {
                echo "<script type='text/javascript'>alert ('Whoops something went wrong')</script>";
            }
        }
        ?>
    </form>
    </div>
</body>
</html>