<?php
include '../connection.php';
//Delete Member Information.

// Decode array die binnen komt
$decodeJSON = json_decode(file_get_contents('php://input'), true);

// Loop door input array heen
foreach ($decodeJSON as $key => $value) {
    // Roep voor ieder object in de array de functie aan om ze te verwijderen
    DeleteFROMledenregister($con, $value["LID_ID"]);
}

function DeleteFROMledenregister($con, $id)
{
    $stmt = $con->prepare("DELETE FROM ledenregister WHERE Lid_nr = (?)");
    $stmt->bind_param("s", $id);

    $stmt->execute();
    $stmt->close();
}

echo '{}';