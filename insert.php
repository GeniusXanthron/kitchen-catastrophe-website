<?php
session_start();
$con=mysqli_connect("localhost","root","");
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

        .file-input::-webkit-file-upload-button {
            visibility: hidden;
            display: none;
        }
        .file-input::before {
            content: 'Select image';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #aba695;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
            margin-right: 15px;
        }
        .file-input:hover::before {
            border-color: #c29bb3;
        }
        .file-input:active::before {
            background: #f0d5e6;
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
    <form method="POST" action="insert.php" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" name="name"></input><br><br>

        <label for="age">Age:</label><br>
        <input type="number" name="age" step="1"></input><br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email"></input><br><br>

        <label for="phone">Phone number:</label><br>
        <input type="text" name="phone" maxlength="12"></input><br><br>
        
        <label for="image">Image link:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" class="file-input"></input><br><br>

        <input type="button" value="Back" onClick="location.href='about-us-admin.php'"></input>
        <input type="submit" value="Submit!" name="insertdata"></input>
        <?php 
        if(isset($_POST["insertdata"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
            
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $name=$_POST["name"];
                    $age=$_POST["age"];
                    $email=$_POST["email"];
                    $phone=$_POST["phone"];
                    
                    $query="insert into info values ('','$name','$age','$email','$phone','$target_file')";
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
            }
            
        }
        ?>
    </form>
    </div>
</body>
</html>