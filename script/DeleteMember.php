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
//    $stmt = $con->prepare("DELETE lid.*, p.*, d.* FROM ledenregister lid RIGHT JOIN donaties d ON lid.Lid_nr = d.Lid_nr LEFT JOIN personen p ON p.Persoon_nr = lid.Persoon_nr WHERE lid.Lid_nr = (?) AND lid.Organisatie_nr IS NULL");


    $stmt = $con->prepare("DELETE FROM personen where persoon_nr = (SELECT persoon_nr FROM ledenregister where lid_nr = (?))");
    $stmt->bind_param("s", $id);

    $stmt->execute();

    $stmt = $con->prepare("DELETE FROM organisaties where organisatie_nr = (SELECT organisatie_nr FROM ledenregister where lid_nr = (?))");
    $stmt->bind_param("s", $id);

    $stmt->execute();

    $stmt = $con->prepare("DELETE FROM donaties where lid_nr = (?)");
    $stmt->bind_param("s", $id);

    $stmt->execute();

    $stmt = $con->prepare("DELETE FROM ledenregister WHERE Lid_nr = (?)");
    $stmt->bind_param("s", $id);

    $stmt->execute();
    $stmt->close();
//
//    $stmt = $con->prepare("DELETE lid.*, o.*, d.* FROM ledenregister lid RIGHT JOIN donaties d ON lid.Lid_nr = d.Lid_nr LEFT JOIN organisaties o ON o.Organisatie_nr = lid.Organisatie_nr WHERE lid.Lid_nr = (?) AND lid.Persoon_nr IS NULL");
//    $stmt->bind_param("s", $id);
//
//    $stmt->execute();
//    $stmt->close();
}

echo '{}';