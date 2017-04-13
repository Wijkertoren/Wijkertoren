//Opent de Modal van Lid Informatie en word de data doorgegeven naar "ShowMember.php".
$(document).ready(function () {
    $('#LidModal').click(function (e) {
        //Haalt het lid id op van het geselecteerde lid.
        var data = {
            lid_ID: $('.selected').data('id')
        };

        //Voert het geselecteerde lid id door naar "ShowMember.php".
        $.ajax({
            method: "POST",
            url: 'script/ShowMember.php',
            data: data
        }).done(function (data) {

        });
    });
});
