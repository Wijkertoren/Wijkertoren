$(document).ready(function () {
    $('#2DB').on('submit', function (e) {
        e.preventDefault();
        
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

        $.ajax({
            method: "POST",
            url: 'EXPORT2Database.php',
            data: data
        }).done(function (data) {
            alert(data);
        });
    });
});