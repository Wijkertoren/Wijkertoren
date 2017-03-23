<?php
//creates an stdClass to view values given below.
$formValues = new stdClass();
foreach ($_POST as $key => $value)
{
    //creates variable that loops through the $_POST to get the data given with the input field.
    $formValues->$key = $value;
    
    //encodes the values given in the input field and puts them in JSON format.
    $encodeFormJSON = json_encode($formValues);
    
    //$decodeJSON = json_decode($encodeFormJSON);
}
echo $encodeFormJSON;