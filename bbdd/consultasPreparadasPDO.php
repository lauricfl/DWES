<?php

// Importo el fichero de configuración
require_once("configDB.php");

// Conectar a la base de datos
$conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

// Si la conexión se establece
if(isset($conexion)) {
    //Crear una consulta preparada
$sql = "INSERT INTO tclientes VALUES (':nom', ':ap1', ':ap2', ':edad', ':tlf', ':email')";
    //Prepararla 
    $conexion->prepare($sql);
    //Asignar valores
    $pdostmt->bindParam(':nom', "Sergio");
    $pdostmt->bindParam(':ap1', "Sanz");
    $pdostmt->bindParam(':ap2', "Gil");
    $pdostmt->bindParam(':edad', "46");
    $pdostmt->bindParam(':tlf', "963852741");
    $pdostmt->bindParam(':email', "sersagi@gmail.com");

    //Ejecutarla
    $pdostmt->exec();

}