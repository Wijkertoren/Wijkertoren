<?php

include '../connection.php';
//Delete Member Information.
$Values = new stdClass();
foreach ($_POST as $key => $value) {
    //creates variable that loops through the $_POST to get the data.
    $Values->$key = $value;

    //encodes the value.
    $encodeValues = json_encode($Values);
}
echo $encodeValues;
$decodeJSON = json_decode($encodeValues);

//Delete script
function DeleteFROMpersonen($con) {
    global $decodeJSON;
    // prepare and bind
    $stmt = $con->prepare("DELETE FROM personen WHERE Persoon_nr = (?)");
    $stmt->bind_param("s", $persoonnr);
    // set parameters and execute
    $persoonnr = $decodeJSON->{'persoon_ID'};

    $stmt->execute();

    $stmt->close();
}

function DeleteFROMledenregister($con) {
    global $decodeJSON;

    // prepare and bind
    $stmt = $con->prepare("DELETE FROM ledenregister WHERE Lid_nr = (?)");
    $stmt->bind_param("s", $lid_ID);
    // set parameters and execute
    $lid_ID = $decodeJSON->{'lid_ID'};


    $stmt->execute();

    $stmt->close();
}

function DeleteFROMorganisaties($con) {
    global $decodeJSON;

    $stmt = $con->prepare("DELETE FROM organisaties WHERE Organisatie_nr = (?)");
    $stmt->bind_param("s", $organisatienr);
    // set parameters and execute
    $organisatienr = $decodeJSON->{'organisatie_ID'};

    $stmt->execute();

    $stmt->close();
}

if ($decodeJSON->{'persoon_ID'} != null) {
    DeleteFROMpersonen($con);
} elseif ($decodeJSON->{'organisatie_ID'} != null) {
    DeleteFROMorganisaties($con);
} else {
    
}
DeleteFROMledenregister($con);
