<?php

include '../connection.php';
//Showing Member Information.
$Values = new stdClass();
foreach ($_GET as $key => $value) {
    $Values->$key = $value;

    //encodes the values given in the input field and puts them in JSON format.
    $encodeFormJSON = json_encode($Values);
}
$decodeJSON = json_decode($encodeFormJSON);

$lid_id = $decodeJSON->{'lid_ID'};
$persoon_id = $decodeJSON->{"persoon_ID"};
$organisatie_id = $decodeJSON->{"organisatie_ID"};

if($persoon_id > 0) {

    $queryselectedLid = "SELECT p.Voornaam, p.Achternaam, p.Tussenvoegsel, p.Geslacht, lid.Email, lid.Extra_email, lid.Telefoon, lid.Mobiel, "
        . "lid.Adres, lid.Woonplaats, lid.Postcode, lid.Extra_info "
        . "FROM ledenregister lid RIGHT JOIN personen p ON p.Persoon_nr = lid.Persoon_nr WHERE lid.Lid_nr = " . $lid_id . "";

    if ($result = mysqli_query($con, $queryselectedLid)) {

        //while ($lid = mysqli_fetch_array($result)) {
        $lid = mysqli_fetch_array($result);
            //echo "m00: " . $lid_id;

            $arraypersonen = array('Voornaam' => $lid["Voornaam"], 'Achternaam' => $lid["Achternaam"], 'Tussenvoegsel' => $lid["Tussenvoegsel"], 'Geslacht' => $lid["Geslacht"],
                'Email' => $lid["Email"], 'Extra_email' => $lid["Extra_email"],
                'Telefoon' => $lid["Telefoon"], 'Mobiel' => $lid["Mobiel"],
                'Adres' => $lid["Adres"], 'Woonplaats' => $lid["Woonplaats"], 'Postcode' => $lid["Postcode"], 'Extra_info' => $lid["Extra_info"]);
            echo json_encode($arraypersonen);
        //}
    }
}

if ($organisatie_id > 0 ) {
    $queryselectedOrganisatie = "SELECT o.Organisatie_naam, o.Contact_persoon, lid.Email, lid.Extra_email, lid.Telefoon, lid.Mobiel, "
        . "lid.Adres, lid.Woonplaats, lid.Postcode, lid.Extra_info "
        . "FROM ledenregister lid LEFT JOIN organisaties o ON o.Organisatie_nr = lid.Organisatie_nr WHERE lid.Lid_nr = " . $lid_id . "";

    if ($result = mysqli_query($con, $queryselectedOrganisatie)) {
        while ($lid = mysqli_fetch_array($result)) {
            $arrayorganisatie = array('Organisatie_naam' => $lid["Organisatie_naam"], 'Contact_persoon' => $lid["Contact_persoon"],
                'Email' => $lid["Email"], 'Extra_email' => $lid["Extra_email"],
                'Telefoon' => $lid["Telefoon"], 'Mobiel' => $lid["Mobiel"],
                'Adres' => $lid["Adres"], 'Woonplaats' => $lid["Woonplaats"], 'Postcode' => $lid["Postcode"], 'Extra_info' => $lid["Extra_info"]);
            echo json_encode($arrayorganisatie);
        }
    }
}