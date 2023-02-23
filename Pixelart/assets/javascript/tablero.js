let fragmento = document.createDocumentFragment();

for (let index = 0; index < 32; index++) {
  let fila = document.createElement("tr");
  for (let y = 0; y < 32; y++) {
    let td = document.createElement("td");
    td.setAttribute("id", index + "-" + y);
    fila.append(td);
  }
  fragmento.append(fila);
}
document.getElementById("tablero").append(fragmento);

document.getElementById("tablero").addEventListener("click", function (e) {
  e.preventDefault();
  if (e.target.tagName === "TD") {
    let atributo = e.target.id; //Aqui tengo el atributo con el id (coordenadas de la celda)
    //Añado un input tranparente para que viaje con las coordenadas al POST
    let input = document.createElement("input");
    input.setAttribute("name", "coordenadas");
    input.setAttribute("hidden", true);
    document.getElementById("datos").append(input);
    input.value = atributo;
    document.getElementById("color").hidden = false;
  }
});

setInterval(() => {
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
}, 3000);
