<?php

include_once 'connection.php';
//creates an stdClass to view values given below.
$formValues = new stdClass();
foreach ($_POST as $key => $value) {
    //creates variable that loops through the $_POST to get the data given with the input field.
    $formValues->$key = $value;

    //encodes the values given in the input field and puts them in JSON format.
    $encodeFormJSON = json_encode($formValues);
}
$decodeJSON = json_decode($encodeFormJSON);

//function for inserting data into the database "personen"
function InsertINTOpersonen($con) {
    global $decodeJSON;
    if ($decodeJSON->{'Voornaam'} != "" && $decodeJSON->{'Achternaam'} != "") {
        // prepare and bind
        $stmt = $con->prepare("INSERT INTO personen (Voornaam, Achternaam, Tussenvoegsel, Geslacht) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $voornaam, $achternaam, $tussenvoegsel, $geslacht);

        // set parameters and execute
        $voornaam = $decodeJSON->{'Voornaam'};
        $achternaam = $decodeJSON->{'Achternaam'};
        $tussenvoegsel = $decodeJSON->{'Tussenvoegsel'};
        $geslacht = $decodeJSON->{'Geslacht'};
        $stmt->execute();

        $lastIDPersoon = $stmt->insert_id;
           
        
        $stmt->close();
        return $lastIDPersoon;
    } else {
        echo "skipped personen query required fields does not match requiremenrts";
        return $lastIDPersoon = null;
    }
}

//function for inserting data into the database "organisatie"
function InsertINTOorganisatie($con) {
    global $decodeJSON;
    if ($decodeJSON->{'Organisatie'} != "" && $decodeJSON->{'ContactPersoon'} != "") {
        //prepare and bind
        $stmt = $con->prepare("INSERT INTO organisaties (Organisatie_naam, Contact_persoon) VALUES (?, ?)");
        $stmt->bind_param("ss", $OrganisatieNaam, $ContactPersoon);

        // set parameters and execute
        $OrganisatieNaam = $decodeJSON->{'Organisatie'};
        $ContactPersoon = $decodeJSON->{'ContactPersoon'};
        $stmt->execute();

        $lastIDOrganisatie = $stmt->insert_id;

        $stmt->close();
        return $lastIDOrganisatie;
    } else {
        echo "skipped Organisatie query required fields does not match requiremenrts";
        return $lastIDOrganisatie = null;
    }
}

//function for inserting data into the database "ledenregister"
function InsertINTOledenregister($con, $lastIDPersoon, $lastIDOrganisatie) {
    global $decodeJSON;
    // prepare and bind
    $stmt = $con->prepare("INSERT INTO ledenregister (Persoon_nr, Organisatie_nr, Email, Extra_email, Telefoon, Mobiel, Adres, Woonplaats, Postcode, Extra_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssssss", $persoonsnr, $organisatienr, $email, $extraEmail, $telefoon, $mobiel, $adres, $woonplaats, $postcode, $extrainfo);

    // set parameters and execute
    $email = $decodeJSON->{'Email'};
    $extraEmail = $decodeJSON->{'ExtraEmail'};
    $telefoon = $decodeJSON->{'Telefoon'};
    $mobiel = $decodeJSON->{'Mobiel'};
    $adres = $decodeJSON->{'Adres'};
    $woonplaats = $decodeJSON->{'Woonplaats'};
    $postcode = $decodeJSON->{'Postcode'};
    $extrainfo = $decodeJSON->{'ExtraInfo'};
    $persoonsnr = $lastIDPersoon;
    $organisatienr = $lastIDOrganisatie;

    var_dump($lastIDPersoon);

    $stmt->execute();

    $lastIDLid = $stmt->insert_id;

    $stmt->close();
    return $lastIDLid;
}

//function for inserting data into the database "donaties"
function InsertINTOdonaties($con, $lastIDLid) {
    global $decodeJSON;
    $donatiekenmerk = $decodeJSON->{'DonatieKenmerk'};


    $stmt = $con->prepare("INSERT INTO donaties(Lid_nr, Donatie_kenmerk)VALUES(?,?)");
    $stmt->bind_param("ss", $lastIDLid, $donatiekenmerk);


    $stmt->execute();

    $stmt->close();
}

$lastIDPersoon = InsertINTOpersonen($con);
$lastIDOrganisatie = InsertINTOorganisatie($con);
$lastIDLid = InsertINTOledenregister($con, $lastIDPersoon, $lastIDOrganisatie);
InsertINTOdonaties($con, $lastIDLid);
