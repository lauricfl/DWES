$(document).ready(function () {
    $('#texto').keyup(function (e) {
        $('#traduccion').val("");
/*         $('#texto').val($('#texto').val().toUpperCase());
 */        $.ajax({
            type: "post",
            url: "cifrador.php",
            data: $(this).serialize(),
            success: function (response) {
                $('#label').html(response);

             }
        });
    });
});

