$(document).ready(function () {
  /*   $.ajax({
        type: "post",
        url: "./index.php",
        data: $(this).serialize(),
        success: function (response) {
            // Recibo el JSON con los productos, que extraigo a un array
            const arr = JSON.parse(response);
            console.log(arr);
        }
    }); */

    $('#datos').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./index.php?action=add",
            data: $(this).serialize(),
            success: function (response) {
                // Recibo el JSON con los productos, que extraigo a un array
                const arr = JSON.parse(response);
                $("#"+arr[0]).css('background-color', arr[1]);
            }
        });
    });
});