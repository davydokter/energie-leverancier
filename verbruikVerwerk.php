<?php
require 'dbconnect.php';
session_start();

if (isset($_POST['verzend'])) {
    $clientID = $_POST['clientID'];
    $jaarVeld = $_POST['jaarVeld'];
    $maandVeld = $_POST['maandVeld'];
    $gasVeld = $_POST['gasVeld'];
    $elektraVeld = $_POST['elektraVeld'];


    $query = "INSERT INTO verbruik (Klant_ID, jaar, maand, gas_verbruik, elektra_verbruik)
VALUES ('$clientID', '$jaarVeld', '$maandVeld', '$gasVeld', '$elektraVeld') ON DUPLICATE KEY UPDATE gas_verbruik='$gasVeld', elektra_verbruik='$elektraVeld'";
    $result = mysqli_query($db_connect, $query);

    if ($result) {
        header("Location: update.php?klantID=".$clientID);
    } else {
        echo "Fout met aanmelden! <br/>";
        echo $query . "<br/>";
        echo mysqli_error($result);
    }
} else
    {
        echo "Het formulier is niet (goed) verstuurd<br/>";
    }
