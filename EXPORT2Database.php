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

//Prepared query code for insert into "personen".
function InsertINTOpersonen() {
    global $decodeJSON;

    // prepare and bind
    $stmt = $con->prepare("INSERT INTO personen (Voornaam, Achternaam, Tussenvoegsel, Geslacht) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $voornaam, $achternaam, $tussenvoegsel, $geslacht);

    // set parameters and execute
    $voornaam = $decodeJSON->{'Voornaam'};
    $achternaam = $decodeJSON->{'Achternaam'};
    $tussenvoegsel = $decodeJSON->{'Tussenvoegsel'};
    $geslacht = $decodeJSON->{'Geslacht'};
    $stmt->execute();
    
    echo "Nieuw Lid is successvol toegevoegd";
    $stmt->close();

}

//Prepared query code for insert into "ledenregister".
function InsertINTOledenregister() {
    global $decodeJSON;
    
    //Change code to the corrisponding table
    /*
    // prepare and bind
    $stmt = $con->prepare("INSERT INTO personen (Voornaam, Achternaam, Tussenvoegsel, Geslacht) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $voornaam, $achternaam, $tussenvoegsel, $geslacht);

    // set parameters and execute
    $voornaam = $decodeJSON->{'Voornaam'};
    $achternaam = $decodeJSON->{'Achternaam'};
    $tussenvoegsel = $decodeJSON->{'Tussenvoegsel'};
    $geslacht = $decodeJSON->{'Geslacht'};
    $stmt->execute();
    
    echo "Nieuw Lid is successvol toegevoegd";
    $stmt->close();
     */
}

//Prepared query code for insert into "organisatie".
function InsertINTOorganisatie() {
    global $decodeJSON;
    
    //Change code to the corrisponding table
    /*
    // prepare and bind
    $stmt = $con->prepare("INSERT INTO personen (Voornaam, Achternaam, Tussenvoegsel, Geslacht) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $voornaam, $achternaam, $tussenvoegsel, $geslacht);

    // set parameters and execute
    $voornaam = $decodeJSON->{'Voornaam'};
    $achternaam = $decodeJSON->{'Achternaam'};
    $tussenvoegsel = $decodeJSON->{'Tussenvoegsel'};
    $geslacht = $decodeJSON->{'Geslacht'};
    $stmt->execute();
    
    echo "Nieuw Lid is successvol toegevoegd";
    $stmt->close();
     */
}

//Prepared query code for inserting into "donatie"
function InsertINTOdonatie() {
    global $decodeJSON;
    
    //Change code to the corrisponding table
    /*
    // prepare and bind
    $stmt = $con->prepare("INSERT INTO personen (Voornaam, Achternaam, Tussenvoegsel, Geslacht) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $voornaam, $achternaam, $tussenvoegsel, $geslacht);

    // set parameters and execute
    $voornaam = $decodeJSON->{'Voornaam'};
    $achternaam = $decodeJSON->{'Achternaam'};
    $tussenvoegsel = $decodeJSON->{'Tussenvoegsel'};
    $geslacht = $decodeJSON->{'Geslacht'};
    $stmt->execute();
    
    echo "Nieuw Lid is successvol toegevoegd";
    $stmt->close();
     */
}

InsertINTOpersonen();
InsertINTOledenregister();
InsertINTOorganisatie();
InsertINTOdonatie();
