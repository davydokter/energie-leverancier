<?php
require 'dbconnect.php';
session_start();

if (isset($_POST['verzend'])) {
    $naam = $_POST['naamVeld'];
    $adres = $_POST['adresVeld'];
    $gebruikersnaam = $_POST['usernameVeld'];
    $wachtwoord = $_POST['passwordVeld'];
    $huistype = $_POST['typeVeld'];
    $aantalPersonen = $_POST['aantalVeld'];
    $rolVeld = $_POST['rol'];

    $query = "INSERT INTO gebruikers";
    $query .= "(Naam, Adres, username, password, role, huistype, aantal_personen)";
    $query .= "VALUES ('$naam', '$adres', '$gebruikersnaam', '$wachtwoord', '$rolVeld','$huistype', '$aantalPersonen')";
    $result = mysqli_query($db_connect, $query);

    if ($result) {
        echo "U bent aangemeld<br/>";
        header("Location: overzicht.php");
    } else {
        echo "Fout met aanmelden! <br/>";
        echo $query . "<br/>";
        echo mysqli_error($result);
    }
} else
    {
        echo "Het formulier is niet (goed) verstuurd<br/>";
    }
