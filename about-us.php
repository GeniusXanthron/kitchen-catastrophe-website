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
    <title>About us</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/phx0aia.css">
    <title>Play!</title>
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <style>
        .box{
            margin: 30px 0px 0px 70px;
            background-color: #f7a1c6c4;
            width: 35%;
            border-radius: 20px;
        }
        .boxtext{
            font-size: 20px;
            padding: 0px 20px 20px 20px;
        }
        .boximg{
            width: 100%;
            padding: 30px;
        }
        .boximg img{
            border-radius: 10px;
            width: 80%;
        }
        button{
            position: fixed;
            bottom: 3%;
            right: 18%;
            padding: 10px;
            border-radius: 100%;
            width: 65px;
            height: 65px;
            font-size: 20px;
            background-image: url(https://cdn2.iconfinder.com/data/icons/web-and-apps-interface/32/Edit-512.png);
            background-size: cover;
            background-position: center center;
            background-color: black;
            border-color: #f783bf;
            border-style: solid;
        }
        button:hover{
            cursor: pointer;
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
    <?php 
    $query="SELECT * from info ORDER BY ID ASC";
    $result=mysqli_query($con,$query);
    while($info=mysqli_fetch_array($result)){
        $name=$info['Name'];
        $age=$info['Age'];
        $email=$info['Email'];
        $phone=$info['Phonenumber'];
        $image=$info['Image']
        ?>
        <div class="box">
        <div class="boximg"><img src="<?php echo $image; ?>"></div>
        <div class="boxtext">
            Name: <?php echo $name; ?><br>
            Age: <?php echo $age; ?><br>
            Email: <?php echo $email; ?><br>
            Phone number: <?php echo $phone; ?><br>
        </div>
    </div><br><br>
    <?php
    }
    if($_SESSION['admin']==true){
        echo "<button onClick='location.href=\"about-us-admin.php\"'></button>";
    }
    ?>
</body>
</html>