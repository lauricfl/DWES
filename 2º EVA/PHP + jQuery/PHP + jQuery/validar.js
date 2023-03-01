$(document).ready(function () {
    $('#datos').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "validar.php",
            data: $(this).serialize(),
            success: function (response) {
                const arr = JSON.parse(response);
                console.log(arr);
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
            }
        });
    });
});
