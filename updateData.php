<?php
require 'dbconnect.php';
session_start();
if($_SESSION['username']){
    if ($_SESSION['role'] == 'admin'){

        $query = "SELECT * FROM `gebruikers`";
        $results = mysqli_query($db_connect, $query);
?>
        <link rel="stylesheet" href="style.css">
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
        <div class="toevoegForm" border="1">
            <p></p>
            <form name="coinFormulier" id="main" method="post" action="toevoegVerwerk.php">
                <table background-color="greenyellow">
                    <tr>
                        <td>Jaar gebruik:</td>
                        <td><input type="nummer" name="jaarVeld" required></td>
                    </tr>
                    <tr>
                        <td>Maand Nummer:</td>
                        <td><input type="nummer" name="maandVeld" required></td>
                    </tr>
                    <tr>
                        <td>Gas verbruik:</td>
                        <td><input type="nummer" name="gasVeld" required/></td>
                    </tr>
                    <tr>
                        <td>Elektra Verbruik:</td>
                        <td><input type="nummer" name="elektraVeld" required/></td>
                    </tr>

                    <tr>
                        <td class="submitKnop"><input type="submit" name="verzend" value="Voeg toe aan het overzicht"></td>
                    </tr>
                </table>
            </form>
        </div>
        </div>
<?php
    }
}