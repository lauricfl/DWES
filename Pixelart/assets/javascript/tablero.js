let fragmento = document.createDocumentFragment();

for (let index = 0; index < 32; index++) {
    let fila = document.createElement("tr");
    for (let y = 0; y < 32; y++) {
        let td = document.createElement("td");
        td.setAttribute("id",index+"-"+y);
        fila.append(td);
        
    }
    fragmento.append(fila);
}
    document.getElementById("tablero").append(fragmento);

document.getElementById("tablero").addEventListener("click", function(e){
    e.preventDefault();
    let atributo = e.target.id; //Aqui tengo el atributo con el id (coordenadas de la celda)
    document.getElementById("color").hidden = false;
})