<?php
include 'connection.php';
//Showing Member Information.
$Values = new stdClass();
foreach ($_POST as $key => $value) {
    $Values->$key = $value;

    //encodes the values given in the input field and puts them in JSON format.
    $encodeFormJSON = json_encode($Values);
}

$decodeJSON = json_decode($encodeFormJSON);
//Delete script
global $decodeJSON;

// prepare and bind

$stmt = $con->prepare("DELETE * FROM ledenregister WHERE Lid_nr = (Lid_nr) VALUES (?)");
var_dump($stmt);
$stmt->bind_param("i", lid_ID);



// set parameters and execute
$lid_ID = $decodeJSON->{'lid_ID'};

$stmt->execute();
$stmt->close();
