<?php
//Primer paso: que no caduque la cookie
session_set_cookie_params(20, "/");

//Inicio sesion
session_start();


//Compruebo si existe el contador
if (isset($_SESSION["contador"])) {
    $_SESSION["contador"] += 1;
} else {
    //Añado al fichero el contador
    $_SESSION["contador"] = 1;
}
//Informo al usuario de las veces
echo "<h2>Has entrado {$_SESSION["contador"]} veces</h2>";
