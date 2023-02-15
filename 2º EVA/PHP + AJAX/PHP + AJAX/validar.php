<?php

function validarNombre($nombre) {
    if (strlen($nombre) < 4)
        return false;
    return true;
}

function validarEmail($email) {
    return preg_match("/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i", $email);
}

function validarPasswords($pass1, $pass2) {
    return $pass1 == $pass2 && strlen($pass1) > 5;
}

// Creo un array para la respuesta
$respuesta = array();

// Compruebo el nombre
if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    // Valido el nombre
    $respuesta['nombre'] = validarNombre(htmlspecialchars($_POST['nombre']));
} else {
    $respuesta['nombre'] = false;
}

// Compruebo las contraseñas
if (isset($_POST['password1']) && !empty($_POST['password1']) && isset($_POST['password2']) && !empty($_POST['password2'])) {
    // Valido el nombre
    $respuesta['passwords'] = validarPasswords(htmlspecialchars($_POST['password1']), htmlspecialchars($_POST['password2']));
} else {
    $respuesta['passwords'] = false;
}

// Compruebo el email
if (isset($_POST['email']) && !empty($_POST['email'])) {
    // Valido el nombre
    $respuesta['email'] = validarEmail(htmlspecialchars($_POST['email']));
} else {
    $respuesta['email'] = false;
}

/***********************************************************
// Aquí es donde tiene el sentido el PHP
// Puedo registrar al usuario en la base de datos, por ejemplo, cuando todos los datos hayan validado.
***********************************************************/

// Envío la información de vuelta al AJAX codificada en JSON
echo json_encode($respuesta);
?>