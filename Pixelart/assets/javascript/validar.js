$(document).ready(function () {
  $.ajax({
    type: "post",
    url: "./index.php?action=inicio",
    data: $(this).serialize(),
    success: function (response) {
        // Recibo el JSON con los productos, que extraigo a un array
        const pixels = JSON.parse(response);
        //Pintar todos los pixeles
        pixels.forEach((element) => {
          $("#" + element[0] + "-" + element[1]).css(
            "background-color",
            element[2]
          );
        });
      },
    });

  $("#datos").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "./index.php?action=add",
      data: $(this).serialize(),
      success: function (response) {
        // Recibo el JSON con los productos, que extraigo a un array
        const pixels = JSON.parse(response);
        //Pintar todos los pixeles
        pixels.forEach((element) => {
          $("#" + element[0] + "-" + element[1]).css(
            "background-color",
            element[2]
          );
        });
      },
    });
  });
});

