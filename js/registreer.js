$(document).ready(function () {
    //Searches the Form id '2DB' and waits when a button with the type "submit" has been triggered
    $('#2DB').on('submit', function (e) {
        e.preventDefault();
        
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
            ZoekTerm: $('#Zoekterm').val(),
            Eigenschappen: $('#Extra_info').val(),
            DonatieKenmerk: $('#Donatie_kenmerk').val()
        };

        //Sends the value of the array above into a list to show.
        $.ajax({
            method: "POST",
            url: 'script/AddMember.php',
            data: data
        }).done(function (data) {
            $('#ModalAdd').modal('hide');
            setTimeout(function () {
                document.location.href = "";
            }, 500);
        });
    });
});