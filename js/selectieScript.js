$(document).ready(function () {
    //remove data from database button function.
    $('#DeleteLid').on('submit', function (e) {
        e.preventDefault();

        var data = [];

        var countarr = $('#example').find("tr.selected").length;

        $( "#example" ).find("tr.selected").each(function() {
            //alert( $( this ).data('id') + " ");
            var obj = [{
                "lid_ID": $('.selected').data('id')
            }]
            data.push({"LID_ID": $(this).data('id')});
        });
        //ajax script voor doorsturen naar het database.
        $.ajax({
            method: "POST",
            url: 'script/DeleteMember.php',
            data: JSON.stringify(data),
            dataType: 'json',
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                //automatische herlaad script.
                $('#DeleteMemberModal').modal('hide');
                setTimeout(function () {
                    document.location.href = "";
                }, 250);
            }
        });
    });

    //Dit stuk triggered het bewerken van een lid nadat er op de knop "bewerken" is geklikt.
    $('#ShowMember').on('submit', function (e) {
        e.preventDefault();

        var data = {
            lid_ID: $('.selected').data('id')
        };

        $.ajax({
            method: "POST",
            url: 'script/EditMember.php'
        }).done(function (data) {
            $('#ModalLid').modal('hide');
            setTimeout(function () {
                document.location.href = "";
            }, 500);
        });
    });
    //horizontal Scrolling and vertical Scrolling
    $('#example').DataTable({"scrollX": true, "scrollY": '50vh'});
    var table = $('#example').DataTable();

    //Resets alle elementen in het Modal zodat deze leeg zijn.
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
    });
    //Functie voor het selecteren in het ledenregister en welke button er klikbaar word en welke niet.
    $('#example tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
        //kijkt hoeveel leden zijn geselecteerd voor meervoud van de buttons en text voor de modals.
        var count = $('#example').find("tr.selected").length;
        if (count <= 1) {
            $("#EmailModal").text("Email Lid");
            $("#VerwijderLidModal").text("Verwijder Lid");
            $("#Verwijderen").text("Weet u zeker dat u dit lid wilt verwijderen?");
            $("#Verwijderleden").text("Lid Verwijderen");
        } else {
            $("#EmailModal").text("Email Leden");
            $("#VerwijderLidModal").text("Verwijder Leden");
            $("#Verwijderen").text("Weet u zeker dat u deze leden wilt verwijderen?");
            $("#Verwijderleden").text("Leden Verwijderen");
        }
        $("#LidModal").attr("disabled", $('#example').find("tr.selected").length !== 1);
        $("#EmailModal").attr("disabled", $('#example').find("tr.selected").length === 0);
        $("#VerwijderLidModal").attr("disabled", $('#example').find("tr.selected").length === 0);
    });
});