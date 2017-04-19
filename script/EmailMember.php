<?php
include '../connection.php';

$formValues = new stdClass();
foreach ($_GET as $key => $value) {
    //creates variable that loops through the $_POST to get the data given with the input field.
    $formValues->$key = $value;

    //encodes the values given in the input field and puts them in JSON format.
    $encodeFormJSON = json_encode($formValues);
}
$decodeJSON = json_decode($encodeFormJSON);

$lidID = $decodeJSON->{"lid_ID"};


var_dump($lidID);

$querytest = "SELECT Persoon_nr, Organisatie_nr, Email, Extra_email, "
    . "Telefoon, Mobiel, Adres, Woonplaats, Postcode, Extra_info "
    . "FROM ledenregister "
    . "WHERE Lid_nr = ". $lidID ."";

if ($result = mysqi_query($con, $querytest)){
    while ($lid = mysqli_fetch_array($result)){
        echo $lid["Email"];
        var_dump($lid);
    }
}
