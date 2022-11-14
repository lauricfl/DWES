<?php

// Importo el fichero de configuración
require_once("configDB.php");

// Conectar a la base de datos
$conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

// Si la conexión se establece
if(isset($conexion)) {
    // Hacer una consulta de tipo SELECT
    $sql = "SELECT cNombre, nEdad FROM tclientes";
    $resultado = $conexion->query($sql);
    if($resultado) {
        // Asignación de valores a variables
        $resultado->bindColumn(1, $nombre);
        $resultado->bindColumn(2, $edad);
        // Recuperar los registros con PDO::FETCH_BOUND
        while($registro = $resultado->fetch()) {
            
            echo "El usuario $nombre tiene $edad años <br>";
        }
    }
}