<?php

// Importo el fichero de configuración
require_once("configDB.php");
require_once("funcionesDB.php");

// Conectar a la base de datos
$conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

// Si la conexión se establece
if (isset($conexion)) {
    //Llamo a la funcion que preapra y ejecuta la orden de insercion
    if (insertarCliente($conexion, array("Sergio", "González", "Perez", 23, "654987321", "sergiooo@gmail.com"))) {
        echo "Inserción realizada";
    }else{
        echo "Inserción fallida";
    }
}
