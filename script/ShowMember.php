<?php

include '../connection.php';
//Showing Member Information.
$Values = new stdClass();
foreach ($_POST as $key => $value) {
    $Values->$key = $value;

    //encodes the values given in the input field and puts them in JSON format.
    $encodeFormJSON = json_encode($Values);
}
echo $encodeFormJSON;
$decodeJSON = json_decode($encodeFormJSON);
