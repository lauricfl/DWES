let fragmento = document.createDocumentFragment();
let tablero = document.getElementById("tablero");
//Insertar las 1024 celdas
for (let index = 0; index < 32; index++) {
  let fila = document.createElement("tr");
  for (let y = 0; y < 32; y++) {
    let td = document.createElement("td");
    td.setAttribute("id", y + "-" + index);
    fila.append(td);
  }
  fragmento.append(fila);
}
tablero.append(fragmento);

//Cuando se hace click sobre la tabla
tablero.addEventListener("click", function (e) {
  e.preventDefault();
  if (e.target.tagName === "TD") {
    $("#colorDiv").show();
    let atributo = e.target.id; //Aqui tengo el atributo con el id (coordenadas de la celda)
    $("#inputCoord").val("Coordenada seleccionada: "+atributo);

    //Añado un input tranparente para que viaje con las coordenadas al POST
    let input = document.createElement("input");
    input.setAttribute("name", "coordenadas");
    input.setAttribute("hidden", true);
    document.getElementById("datos").append(input);
    input.value = atributo;
    document.getElementById("colorDiv").hidden = false;
  }
});
//Cuando se pasa por encima de la tabla da las coordenadas
tablero.addEventListener("mouseover", function(e){
  if (e.target.tagName === "TD") {
    let atributo = e.target.id; 
    $("#coordenadas").html("Coordenada actual: "+atributo);
  }
})
//Cuando sale de la tabla se resetea el div de informacion
tablero.addEventListener("mouseout", function(e){
    $("#coordenadas").html("");
})

$("#boton").on("click", () => {
  $("#colorDiv").hide();
});


//Temporizador para recargar la tabla
setInterval(() => {
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
}, 2000);
