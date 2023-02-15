function validar() {
    var objXMLHttpRequest = new XMLHttpRequest();
    var formData = new FormData(document.getElementById('datos'))
    objXMLHttpRequest.onreadystatechange = function () {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                const json = objXMLHttpRequest.responseText;
                const arr = JSON.parse(json);
                if (!arr.nombre) {
                    // Nombre inválido
                    document.getElementById("errorNombre").innerText = "Debe tener más de 3 caracteres.";
                    document.getElementById("errorNombre").className = 'error';
                } else {
                    // Nombre inválido
                    document.getElementById("errorNombre").innerText = "";
                    document.getElementById("errorNombre").className += 'oculto';
                }
                if (!arr.passwords) {
                    // Passwords inválidas
                    document.getElementById("errorPassword").innerText = "Debe ser mayor de 5 caracteres o no coinciden.";
                    document.getElementById("errorPassword").className = 'error';
                } else {
                    // Passwords válidas
                    document.getElementById("errorPassword").innerText = "";
                    document.getElementById("errorPassword").className += 'oculto';
                }
                if (!arr.email) {
                    // Email inválido
                    document.getElementById("errorEmail").innerText = "La dirección de email no es válida.";
                    document.getElementById("errorEmail").className = 'error';
                } else {
                    // Email inválido
                    document.getElementById("errorEmail").innerText = "";
                    document.getElementById("errorEmail").className += 'oculto';
                }

                // En caso de estar todos los campos bien, escribo el texto de usuario registrado
                if (arr.nombre && arr.email && arr.passwords) {
                    document.getElementById('registrado').innerText = "Usuario registrado";
                }
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }
    objXMLHttpRequest.open('POST', 'validar.php');
    objXMLHttpRequest.send(formData);
}