<?php
require_once 'scripts/regex.php';

//Variables para errores
$errorLatitud = $errorLongitud = "";
//Variables para datos OK
$latitudOK = $longitudOK =  $comentarioOK =  $imagenOK = "";

if (!empty($_POST)) {
    //Varibale boolean
    $errores = false;
    //Variables para datos
    $latitud = htmlspecialchars($_POST['latitud']);
    $longitud = htmlspecialchars($_POST['longitud']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $imagen = $_FILES["imagen"];

    //Valida latitud
    if (!empty($latitud)) {
      if (validarLatitud($latitud, LATITUD)) {
            $latitudOK = $latitud;
        } else {
            $errores = true;
            $errorLatitud = "La latitud no es válida";
        }
    } else {
        $errorLatitud = "La latitud no es válida";
    }
    //Valida longitud
    if (!empty($longitud)) {
       if (validarLatitud($longitud, LONGITUD)) {
            $longitudOK = $longitud;
        } else {
            $errores = true;
            $errorLongitud = "La longitud no es válida";
        }
    } else {
        $errorLongitud = "La longitud no es válida";
    }
    //Si contiene comentario lo guardamos
    if (!empty($comentario)) {
        $comentarioOK = $comentario;
    }
    //Si el tamaño del fichero es mayor que 0, quiere decir que tenemos una imagen.
    if ($imagen["size"] > 0) {
        //Comprobamos el tipo de imagen del avatar
        $tipo = $imagen["type"];
        if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
            $imagenOK = $imagen;
        } else {
            $imagenError = "La imagen debe tener formato JPG, JPEG o PNG";
        }
    }

    //Si no contiene errores, guardamos los datos.
    if ($errores == false) {
        move_uploaded_file($imagen["tmp_name"], "/fotos");
        $rutaImagen = "/fotos/" . $imagen["name"];
        $lugares = fopen("./bbdd/lugares.txt", "a");
        fwrite($lugares, "$latitudOK*$longitudOK*$comentarioOK*$rutaImagen#" . PHP_EOL);
        fclose($lugares);
    }
    
} //FIN DEL POST
function validarLatitud($datoAValidar, $expresionRegular)
{   // Valido el campo
    if (preg_match($expresionRegular, $datoAValidar)) {
        $valida = true;
    } else {
        $valida = false;
    }

    return $valida;
}


function validarLongitud($datoAValidar, $expresionRegular)
{    // Valido el campo
    if (preg_match($expresionRegular, $datoAValidar)) {
        $valida = true;
    } else {
        $valida = false;
    }

    return $valida;
}
