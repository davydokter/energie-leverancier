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
            <div class="container" style="width:1000px;">
                <h2>Overzicht van het verbruik</h2>
                <select class="year-select" name="jaar" id="jaar">
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>

                <canvas id="bar-chart" width="800" height="450"></canvas>
            </div>
        </div>

        <script>
            window.klantId = "<?php echo $klant_ID; ?>";
        </script>
        <script src="./overzichtKlant.js"></script>
        </body>
        </html>
        <?php
    }
} else {
    header('Location: index.php');
}
