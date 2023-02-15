$(document).ready(function () {
  $("#datos").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "./index.php?action=add",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        const arr = JSON.parse(response);
        //Vamos a sustituir con Javascript contenido de la vista cargada

        //Vaciamos todas las filas del tbody de la tabla de productos porque están desactualizadas
        $("#products_table > tbody").empty();

        //Cargar las nuevas filas en la tabla
        arr.forEach((element) => {
          //Creo una fila de la tabla
          $("#products_table > tbody").append(
            "<tr><td>" +
              element["cantidad"] +
              "</td><td>" +
              element["producto"] +
              "</td></tr>");
        });
        //Vaciar los campos del formulario
        $("#cantidad").val('0');
        $('#producto').val(null);
      },
    });
  });
});
