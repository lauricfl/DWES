<?php
if (!isset($_COOKIE["ultimaVisita"])) {
    //si es su primera visita:
    //Le damos la bienvenida al usuario
    echo "<h1>Bienvenido</h1>";
    echo "<h2>Es tu primera visita</h2>";
    //Crear cookie con marca temporal de visita del usuario
    setcookie("ultimaVisita", time(), time() + 60 * 60);
} else {
    //Si no es su primera visita:
    //Le damos la bienvenida y mostramos fecha
    echo "<h1>Bienvenido</h1>";
    echo "<h2>Tu ultima vista fue:</h2>";
    echo "<p>El " . date("d-m-Y", $_COOKIE["ultimaVisita"])
        . " a las " . date("H:i:s", $_COOKIE["ultimaVisita"]) . "</p>";
    //Actualizo la cookie a la marca tmeporal de esta NUEVA ultima visita
    setcookie("ultimaVisita", time(), time() + 60 * 60);
}
