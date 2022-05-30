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
    <title>About us</title>

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
        </div>    
    <br>

    <div class="form">
        <h1>Update members information</h1>

        <?php
            $id=$_GET['id'];
            
            $query="SELECT * FROM info WHERE ID='$id'";
            $data=mysqli_fetch_array(mysqli_query($con,$query));

            $name=$data['Name'];
            $age=$data['Age'];
            $email=$data['Email'];
            $phone=$data['Phonenumber'];
            $image=$data['Image'];
        ?>

    <form method="POST" action="edit.php?id=<?php echo $id; ?>">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="<?php echo $name;?>"></input><br><br>

        <label for="age">Age:</label><br>
        <input type="number" name="age" step="1" value="<?php echo $age;?>"></input><br><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" value="<?php echo $email;?>"></input><br><br>

        <label for="phone">Phone number:</label><br>
        <input type="text" name="phone" maxlength="12" value="<?php echo $phone;?>"></input><br><br>
        
        <label for="image">Image link:</label><br>
        <input type="text" name="image" value="<?php echo $image;?>"></input><br><br>

        <input type="button" value="Back" onClick="location.href='about-us-admin.php'"></input>
        <input type="submit" value="Update!" name="edit"></input>

        <?php
            if(isset($_POST['edit'])){
                $name=$_POST['name'];
                $age=$_POST['age'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $image=$_POST['image'];
                $query2="UPDATE info SET Name='$name', Age='$age', Email='$email', Phonenumber='$phone', Image='$image' WHERE ID=$id";

                if(mysqli_query($con,$query2)){
                    echo "<script type=text/javascript>alert ('Updated!')</script>";
                    echo "<script type='text/JavaScript'> window.location.replace('about-us-admin.php'); </script>";
                }
                else{
                    echo "<script type=text/javascript>alert ('Whoops something went wrong')</script>";
                }
            }
        ?>
    </form>
</body>
</html>