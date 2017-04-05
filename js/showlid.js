$(document).ready(function () {
    $('#LidModal').click(function (e) {
        var data = {
            lid_ID: $('.selected').data('id')
        };
        
        $.ajax({
            method: "POST",
            url: 'script/ShowMember.php',
            data: data
        }).done(function (data) {

        });
    });
});
