<?php
require 'dbconnect.php';
session_start();
if($_SESSION['username']){
    if ($_SESSION['role'] == 'admin'){

        $query = "SELECT * FROM `gebruikers`";
        $results = mysqli_query($db_connect, $query);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="style.css">
            <title>Home</title>
        </head>
        <body>
        <div class="header">
            <nav class="nav-bar">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="index.php">Home</a></li>
                    <?php
                    if(!$_SESSION['username']){
                        ?>
                        <li class="nav-li"><a href="login/login.php">Login</a></li>
                        <?php
                    }
                    if($_SESSION['username'])
                    {
                        ?> <li class="nav-li"><a href="login/out.php">Logout</a></li><?php
                    }?>
                </ul>
            </nav>
        </div>
        <div class="wrapper">
            <div class="main-div">
                <?php
                if (mysqli_num_rows($results) == 0) {
                    ?><p>Er zijn geen klanten</p> <?php
                } else {
                    ?>
                    <table id="tableAanmelding" border="1">
                        <tr>
                            <th class="thAanmelding">Naam</th>
                            <th class="thAanmelding">Adres</th>
                            <th class="thAanmelding">Huis Type</th>
                            <th class="thAanmelding">Aantal Personen</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($results)) {
                            ?>
                            <tr>
                                <td><?=$row['Naam']?></td>
                                <td><?=$row['Adres']?></td>
                                <td><?=$row['huistype']?></td>
                                <td><?=$row['aantal_personen']?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>

                    <?php
                }
                ?>
            </div>
            <div class="toevoegForm" border="1">
                <form name="coinFormulier" id="main" method="post" action="toevoegVerwerk.php">
                    <table background-color="greenyellow">
                        <tr>
                            <td>Naam:</td>
                            <td><input type="text" name="naamVeld" required></td>
                        </tr>
                        <tr>
                            <td>Adres:</td>
                            <td><input type="text" name="adresVeld" required></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="usernameVeld" required/></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="passwordVeld" required/></td>
                        </tr>
                        <tr>
                            <td>Huistype:</td>
                            <td><input type="text" name="typeVeld" required/></td>
                        </tr>
                        <tr>
                            <td>Aantal personen:</td>
                            <td><input type="number" name="aantalVeld" required/></td>
                        </tr>
                        <tr>
                            <td for="rol">Rol:</td>
                            <td>
                                <select id="rol" name="rol">
                                    <option value="klant" selected>Klant</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="submitKnop"><input type="submit" name="verzend" value="Voeg toe aan het overzicht"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


        </body>
        </html>

        <?php
    }
}
else {
    header('Location: index.php');
}


?>

<style>
    .toevoegForm {
        border: 1px solid black;
        position: absolute;
        height: fit-content;
        width: fit-content;
        top: 25%;
        left: 50%;
    }

    .toevoegForm{
        text-align: center;
    }

</style>
