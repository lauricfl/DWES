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
  let atributo = e.target.id; //Aqui tengo el atributo con el id (coordenadas de la celda)
  //Añado un input tranparente para que viaje con las coordenadas al POST
  let input = document.createElement("input");
  input.setAttribute("name", "coordenadas");
  input.setAttribute("hidden",true);
  document.getElementById("datos").append(input);
  input.value = atributo;

  document.getElementById("color").hidden = false;
});


setInterval(()=>{
//Cada segundo, actualiza la página con los colores y las coordenadas de la BBDD
/* $.ajax({
  type: "post",
  url: "./index.php",
  data: $(this).serialize(),
  success: function (response) {
      console.log("+");
  }
});  */
},3000)