let fragmento = document.createDocumentFragment();

for (let index = 0; index < 32; index++) {
    let fila = document.createElement("tr");
    for (let index = 0; index < 32; index++) {
        let td = document.createElement("td");
        td.innerHTML="<input type='color'>";
        fila.append(td);
        
    }
    fragmento.append(fila);
}
    document.getElementById("tablero").append(fragmento);
