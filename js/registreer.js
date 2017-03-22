$(document).ready(function () {
    //Searches the Form id '2DB' and waits when a button with the type "submit" has been triggered
    $('#2DB').on('submit', function (e) {
        e.preventDefault();
        
//        var form_id = getElementById("#2DB");
//        var form = FormData(form_id);
        
        //Array for data value to be send to the database
        var data = {
            Voornaam: $('#Voornaam').val(),
            Achternaam: $('#Achternaam').val(),
            Tussenvoegsel: $('#Tussenvoegsel').val(),
            Geslacht: $('#Geslacht').val(),
            Organisatie: $('#Organisatie').val(),
            ContactPersoon: $('#Contact_persoon').val(),
            Email: $('#Email').val(),
            ExtraEmail: $('#Extra_email').val(),
            Telefoon: $('#Telefoon').val(),
            Mobiel: $('#Mobiel').val(),
            Adres: $('#Adres').val(),
            Woonplaats: $('#Woonplaats').val(),
            Postcode: $('#Postcode').val(),
            ExtraInfo: $('#Extra_info').val()
        };

        //Sends the value of the array above into a list to show.
        $.ajax({
            method: "POST",
            url: 'EXPORT2Database.php',
            data: data
        }).done(function (data) {
            
        });
    });
});