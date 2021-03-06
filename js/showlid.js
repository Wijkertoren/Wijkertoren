//Opent de Modal van Lid Informatie en word de data doorgegeven naar "ShowMember.php".
$(document).ready(function () {
    $('#LidModal').click(function (e) {
        //Haalt het lid id op van het geselecteerde lid.
        var data = {
            lid_ID: $('.selected').data('id'),
            persoon_ID: $('.selected').data('persoonnr'),
            organisatie_ID: $('.selected').data('organisatienr')
        };

        console.log(data);

        //Voert het geselecteerde lid id door naar "ShowMember.php".
        $.ajax({
            method: "GET",
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            url: 'script/ShowMember.php',
            data: data
        }).done(function (test) {
            var Array = test;
            if (Array["Voornaam"] && Array["Achternaam"] != ""){
                $('#VoornaamFromDB').val(Array["Voornaam"]);
                $('#AchternaamFromDB').val(Array["Achternaam"]);
                $('#TussenvoegselFromDB').val(Array["Tussenvoegsel"]);
                $('#GeslachtFromDB').val(Array["Geslacht"]);
                $('#EmailFromDB').val(Array["Email"]);
                $('#Extra_emailFromDB').val(Array["Extra_email"]);
                $('#TelefoonFromDB').val(Array["Telefoon"]);
                $('#MobielFromDB').val(Array["Mobiel"]);
                $('#AdresFromDB').val(Array["Adres"]);
                $('#WoonplaatsFromDB').val(Array["Woonplaats"]);
                $('#PostcodeFromDB').val(Array["Postcode"]);
                $('#ZoektermenFromDB').val(Array["Extra_info"]);
                $('#DonatieKenmerkFROMDB').val(Array["DonatieKenmerk"]);
                $('#Extra_InfoFromDB').val(Array["Eigenschappen"]);
            } else {
                $('#OrganisatieFromDB').val(Array["Organisatie_naam"]);
                $('#Contact_persoonFromDB').val(Array["Contact_persoon"]);
                $('#EmailFromDB').val(Array["Email"]);
                $('#Extra_emailFromDB').val(Array["Extra_email"]);
                $('#TelefoonFromDB').val(Array["Telefoon"]);
                $('#MobielFromDB').val(Array["Mobiel"]);
                $('#AdresFromDB').val(Array["Adres"]);
                $('#WoonplaatsFromDB').val(Array["Woonplaats"]);
                $('#PostcodeFromDB').val(Array["Postcode"]);
                $('#ZoektermenFromDB').val(Array["Extra_info"]);
                $('#DonatieKenmerkFROMDB').val(Array["DonatieKenmerk"]);
                $('#Extra_InfoFromDB').val(Array["Eigenschappen"]);
            }
        });
    });
});
