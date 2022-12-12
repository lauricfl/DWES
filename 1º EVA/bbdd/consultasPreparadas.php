<?php

//Incluir el fichero de configuracion
require_once("configDB.php");

//Conectar con la base de datos
$conexion = new mysqli();
$conexion->connect(HOST, USER, PASSWORD, DB);

//Preparo una consulta de inserion de datos
$valores = array("", "Pedro", "Picapiedra", null, 80, "987654321", "pepi@gmail.com");
if (insertarValores($conexion, "tclientes", $valores)) {
    echo "Insercion correcta";
} else {
    echo "La has cagado en algun sitio";
}

//Cierro conexion
$conexion->close();