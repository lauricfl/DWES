$(document).ready(function () {
  //De primeras va a pintar la vista
  $.ajax({
    type: "post",
    url: "./index.php",
    data: $(this).serialize(),
    success: function (response) {
      },
    });  
  //Cuando ya este la vista puesta le pedimos los colores para pintar
  $.ajax({
    type: "post",
    url: "./index.php?action=paint",
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
//Cuando seleccionemos un color lo mete a la BD y vuelve a pintar la tabla
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

