<?php
//Paso 1: abrir sesion
session_start();
//Paso 2: almacenar informacion de la sesion
$_SESSION["fechaHoraActual"] = date("d-m-Y H:i:s");
$_SESSION["nombreUsuario"] = "Pepe";
//Paso 3: borramos informacion de sesión
unset($_SESSION["nombreUsuario"]);
//Paso 4: borrar toooooda la informacion del servidor
session_unset();
var_dump($_SESSION);

//Paso 5: Eliminar totalmente la sesion. No existe fichero.
//session_destroy();

//Paso 6: elimino la cookie
if(!isset($_COOKIE["PHPSESSID"])){
    //La borro
    unset($_COOKIE["PHPSESSID"]);
    setcookie("PHPSSESID", null, -1, "/");
}
?>