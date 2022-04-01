<?php
    require '../dbconnect.php';
    session_start();
    $message="";
    if(count($_POST)>0) {
        $query = "SELECT * FROM `gebruikers` WHERE `username` = '".$_POST["username"]."' AND `password` = '".$_POST["password"]."'";
        $result = mysqli_query($db_connect, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            echo $row["username"];
            $_SESSION["username"] = $row['username'];
            echo $row["role"];
            $_SESSION["role"] = $row['role'];
            $_SESSION["id"] = $row['Klant_ID'];
        } else {
            $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["username"])) {
        header("Location:../index.php");
    }
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="username">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>