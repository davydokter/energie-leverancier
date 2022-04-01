<?php
require 'dbconnect.php';

$query = "SELECT * FROM `verbruik`";
$result = mysqli_query($db_connect, $query);

foreach($result as $row)
{
    $output[] = array(
        'id' => $row["Klant_ID"],
        'maand'   => $row["maand"],
        'gas' => $row["gas_verbruik"],
        'elektra' => $row["elektra_verbruik"],
        'jaar' => $row["jaar"],
        'klantID' => $row["Klant_ID"],
    );
}
echo json_encode($output);
