<?php
require 'dbconnect.php';
session_start();
if ($_SESSION['username']) {
    if ($_SESSION['role'] == 'klant' || $_SESSION['role'] == 'admin' && $_SESSION['']) {
        $klant_ID = $_GET['klantID'];

        $query = "SELECT * FROM verbruik WHERE Klant_ID = {$klant_ID}";
        $result = mysqli_query($db_connect, $query);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>overzicht gas en electriciteit</title>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
                    integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="./style.css">
        </head>

        <body>
        <div class="header">
            <nav class="nav-bar">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="index.php">Home</a></li>
                    <?php
                    if (!$_SESSION['username']) {
                        ?>
                        <li class="nav-li"><a href="login/login.php">Login</a></li>
                        <?php
                    }
                    if ($_SESSION['username']) {
                        ?>
                        <li class="nav-li"><a href="login/out.php">Logout</a></li><?php
                        ?> <li class="nav-li"><a href="update.php?klantID=<?=$_SESSION['id'];?>">Gegevens Veranderen</a></li><?php
                    } ?>
                </ul>
            </nav>
        </div>
        <div class="main-div">
            <div class="toevoegForm" border="1">
                <form name="coinFormulier" id="main" method="post" action="verbruikVerwerk.php">
                    <table background-color="greenyellow">
                        <input type="hidden" value="<?php echo $_GET['klantID']?>" name="clientID">
                        <tr>
                            <td>Jaar:</td>
                            <td>
                                <select name="jaarVeld" required>
                                    <option value="">Jaar</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Maand:</td>
                            <td>
                                <select name="maandVeld" required>
                                    <option value="">Maand</option>
                                    <option value="1">Jan</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Mar</option>
                                    <option value="4">Apr</option>
                                    <option value="5">May</option>
                                    <option value="6">Jun</option>
                                    <option value="7">Jul</option>
                                    <option value="8">Aug</option>
                                    <option value="9">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Gas verbruik:</td>
                            <td><input type="number" name="gasVeld" required/></td>
                        </tr>
                        <tr>
                            <td>Elektra verbruik:</td>
                            <td><input type="number" name="elektraVeld" required/></td>
                        </tr>
                        <tr>
                            <td class="submitKnop"><input type="submit" name="verzend" value="Voeg toe aan het overzicht"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </body>
        </html><?php
    }
} else {
    header("Location: index.php");
}