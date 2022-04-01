<?php
require 'dbconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div class="header">
        <nav class="nav-bar">
            <ul class="nav-ul">
                <li class="nav-li"><a href="#">Home</a></li>
                <?php
                if(!$_SESSION['username']){
                    ?>
                    <li class="nav-li"><a href="login/login.php">Login</a></li>
                <?php
                }
                if($_SESSION['username'])
                {
                    ?> <li class="nav-li"><a href="login/out.php">Logout</a></li><?php
                }
                if($_SESSION['username']){
                    if($_SESSION['role'] == 'admin'){
                        ?> <li class="nav-li"><a href="overzicht.php">Overzicht</a></li><?php
                    }
                }
                if($_SESSION['username']){
                    if($_SESSION['role'] == 'klant'){
                        ?> <li class="nav-li"><a href="overzichtKlant.php?klantID=<?=$_SESSION['id'];?>">Overzicht Verbruik</a></li><?php
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="main-div">
        <h1>Energie Verbruik</h1>
        <p>Op deze website kunt u uw verbruik per jaar zien in de vorm van een grafiek. Ook krijgt u een mooi overzicht te zien van het verbruikt van de afgelopen tijd.</p>
        <h3>1. Voorkom sluipverbruik</h3>
        <h3>2. Vervang lampen voor LED verlichting</h3>
        <h3>3. Gebruik energiezuinige apparaten</h3>
        <h3>4. Dicht spleten en kieren</h3>
        <h3>5. Isoleren</h3>
        <h3>6. Installeer een programmeerbare thermostaat</h3>
        <h3>7. Warmtepomp</h3>
    </div>

</body>
</html>

<style>
    * {
        font-family: 'Poppins', sans-serif;
        background-color: white;
    }
    .header {
        position: absolute;
        width: 99%;
        border: 1px solid black;
    }

    .nav-bar {
        position: relative;
        float: right;
    }

    .nav-bar .nav-ul .nav-li {
        right: 150px;
        list-style-type: none;
        display: inline;
        margin: 0.5rem;
        border: 1px solid black;
        padding: 5px;
        border-radius: 5px;
    }

    .nav-bar .nav-ul .nav-li a{
        text-decoration: none;
        color: black;
    }

    .main-div {
        border: 1px solid black;
        position: absolute;
        height: fit-content;
        width: 50%;
        top: 25%;
        left: 25%;
    }

    .main-div{
        text-align: center;
    }

</style>
