<?php

include '../connection.php';
//Delete Member Information.
$Values = new stdClass();
foreach ($_POST as $key => $value) {
    $Values->$key = $value;

    //encodes the value.
    $encodeFormJSON = json_encode($Values);
}
// echo $encodeFormJSON;
$decodeJSON = json_decode($encodeFormJSON);
//Delete script
global $decodeJSON;

// prepare and bind
$stmt = $con->prepare("DELETE FROM ledenregister WHERE Lid_nr = (?)");
$stmt->bind_param("s", $lid_ID);
// set parameters and execute
$lid_ID = $decodeJSON->{'lid_ID'};


$stmt->execute();

$stmt->close();
