$(document).ready(function () {
    //remove data from database button function.
    $('#DeleteLid').on('submit', function (e) {
        e.preventDefault();
        
        var data = {
            lid_ID: $('.selected').data('id'),
            persoon_ID: $('.selected').data('persoonnr'),
            organisatie_ID: $('.selected').data('organisatienr')
        };

        /* for(table.row('.selected').data().length in data)
         {

         }*/

        $.ajax({
            method: "POST",
            url: 'script/DeleteMember.php',
            data: data
        }).done(function (data) {
            $('#DeleteMemberModal').modal('hide');
            setTimeout(function () {
                document.location.href = "";
            }, 500);
        });
    });

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

    //Resets all the elements in the Modal to empty again.
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
    });
    //Function for selecting which buttons will be Activated and disabled. / Functie voor het selecteren in het ledenregister en welke button er klikbaar word en welke niet.
    $('#example tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
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