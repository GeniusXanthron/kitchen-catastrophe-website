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
            margin: 30px 0px 0px 20px;
            background-color: #f7a1c6;
            width: 35%;
            border-radius: 20px;
            display: inline-block;
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
        input[name="insert"]{
            position: fixed;
            bottom: 3%;
            right: 18%;
            padding: 10px;
            border-radius: 100%;
            width: 65px;
            height: 65px;
            font-size: 35px;
            background-size: cover;
            background-position: center center;
            background-color: #ed98c4;
            border-color: #ed98c4;
            border-style: solid;
            color: #a1456a;
            transition-duration: 0.4s;
        }
        input[name="insert"]:hover{
            cursor: pointer;
            background-color: #fcd2e3;
        }
        input[type="checkbox"]{
            margin-left: 70px;
            transform: scale(1.5);
        }

        .tools{
            width: 80%;
            background-color: #d6cd96;
            display: inline-block;
            height: 50px;
            border-radius: 10px 10px 0px 0px;
            height: 80px;
        }
        .tools input[name=deletebtn]{
            font-family: basic-sans, sans-serif;
            margin: 20px;
            padding: 10px;
            font-size: 18px;
            width: 77px;
            border-radius: 8px;
            border: 3px solid #ede4ad;
            background-color: #ede4ad;
            transition-duration: 0.5s;
        }
        .tools input[name=deletebtn]:hover{
            cursor: pointer;
            background-color: #ede4adab;
        }
        .tools input[name=deletebtn]:disabled{
            cursor: not-allowed;
            background-color: #ede4ad;
        }
        .tools input[type=search] {
            outline: none;
            width: 30%;
            padding: 12px 20px;
            margin: 8px 0;
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
            border: 2px solid #ede4ad;
            border-radius: 16px;
            background-color: #ede4ad;
        }

        .tools input[type=search]:focus {
            background-color: #FEFFD9;
            transition: background-color 100ms linear;
            -webkit-transition: background-color 100ms linear;
            -ms-transition: background-color 100ms linear;
        }

        .tools input[type=search]:focus:hover {
            background-color: #FEFFD9;
        }

        .tools input[type=search]:hover {
            background-color: #f2ebc2;
            transition: background-color 100ms linear;
            -webkit-transition: background-color 100ms linear;
            -ms-transition: background-color 100ms linear;
        }
        
        .tools input[name=searchbtn] {
        outline: none;
        width: 11%;
        padding: 8px;
        margin: 8px 0;
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
        border: 2px solid #BBAE80;
        border-radius: 16px;
        background-color: #BBAE80;
        font-family: basic-sans, sans-serif;
        font-size: 18px;
        }

        .tools input[name=searchbtn]:hover {
        background-color: #FEFFD9;
        transition: background-color 100ms linear;
        -webkit-transition: background-color 100ms linear;
        -ms-transition: background-color 100ms linear;
        }

        .results{
            background-color: #ab8e5c;
            width: 80%;
            display: inline-block;
            border-radius: 0px 0px 10px 10px;
            padding: 10px 0px 10px 0px;
        }
        input[name=edit]{
            background: transparent;
            border: none;
            font-size: 25px;
        }
        input[name=edit]:hover{
            cursor: pointer;
        }
        hr{
            width: 80%;
            border: transparent;
            border-top: 1px solid #917749;
        }
        a{
            color: black;
            text-decoration: none;
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
        </div> <br><br>
    <form method="POST" action="about-us-admin.php">
        <div style="text-align:center;">
            <div class="tools">
                <input type="submit" name="deletebtn" id="delete" value="Delete" disabled></input>

                <input type="search" name="search"></input>
                <input type="submit" name="searchbtn" value="Search"></input>
            </div>

            <div class="results">
                <?php
                    if(isset($_POST['searchbtn'])){
                        echo 'Your search results...';
                        echo '<a href="about-us-admin.php" style="float:right; margin-right: 20px;">Clear results</a>';
                        $search=$_POST['search'];

                        $results1="SELECT info.Name, info.ID FROM info WHERE Name like '%$search%' ORDER BY ID ASC";
                        $a=mysqli_query($con,$results1);
                        while($nameresults=mysqli_fetch_array($a)){
                            echo "<hr><a href='#".$nameresults['ID']."'>".$nameresults['Name']."<br>Name: ".$nameresults['Name']."</a>";
                        }

                        $results2="SELECT info.Age, info.ID, info.Name FROM info WHERE Age like '%$search%' ORDER BY ID ASC";
                        $b=mysqli_query($con,$results2);
                        while($ageresults=mysqli_fetch_array($b)){
                            echo "<hr><a href='#".$ageresults['ID']."'>".$ageresults['Name']."<br>Age: ".$ageresults['Age']."</a>";
                        }

                        $results3="SELECT info.Email, info.ID, info.Name FROM info WHERE Email like '%$search%' ORDER BY ID ASC";
                        $c=mysqli_query($con,$results3);
                        while($emailresults=mysqli_fetch_array($c)){
                            echo "<hr><a href='#".$emailresults['ID']."'>".$emailresults['Name']."<br>Email: ".$emailresults['Email']."</a>";
                        }

                        $results4="SELECT info.Phonenumber, info.ID, info.Name FROM info WHERE Phonenumber like '%$search%' ORDER BY ID ASC";
                        $d=mysqli_query($con,$results4);
                        while($phoneresults=mysqli_fetch_array($d)){
                            echo "<hr><a href='#".$phoneresults['ID']."'>".$phoneresults['Name']."<br>Phone number: ".$phoneresults['Phonenumber']."</a>";
                        }
                    }                
                ?>
            </div>
        </div>
        <input type="button" onClick='location.href="insert.php"' name="insert" value="+"></input>

        <?php 
        $query="SELECT * from info ORDER BY ID ASC";
        $result=mysqli_query($con,$query);
        while($info=mysqli_fetch_array($result)){
            $id=$info['ID'];
            $name=$info['Name'];
            $age=$info['Age'];
            $email=$info['Email'];
            $phone=$info['Phonenumber'];
            $image=$info['Image'];
            ?>
            
        
        <input type="checkbox" class="check" name="delete[]" value="<?php echo $id; ?>" onClick="check(this)">
            <input type="button" name="edit" value="✏️" onClick="location.href='edit.php?id=<?php echo $id;?>'"></input>
            <div class="box" id="<?php echo $id; ?>">
            <div class="boximg"><img src="<?php echo $image; ?>"></div>
            <div class="boxtext">
                Name: <?php echo $name; ?><br>
                Age: <?php echo $age; ?><br>
                Email: <?php echo $email; ?><br>
                Phone number: <?php echo $phone; ?><br>
            </div>
            </div>
        </input><br>

        <?php
        }

        if(isset($_POST['deletebtn'])){
            foreach($_POST['delete'] as $deleteid){
                $query2="DELETE FROM info WHERE ID='$deleteid'";
                mysqli_query($con,$query2);
            }
            echo '<script type="text/JavaScript"> window.location.replace("about-us-admin.php"); </script>';
        }
        ?>
        
    </form> <br><br>
    <script>
        function check(CheckBox){
            if(CheckBox.checked){
                document.getElementById("delete").disabled = false;
            } else{
                document.getElementById("delete").disabled = true;
            }
        }
        $('.check').click(function(){
            if($(this).is(':checked')){
                $('#delete').attr("disabled", false);
            } else{
                $('#delete').attr("disabled", true);
            }
        });
    </script>
</body>
</html>