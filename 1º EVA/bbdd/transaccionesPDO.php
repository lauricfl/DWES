<?php
//Importo el fichero de configuracion
require_once("configDB.php");

//Conectar a la BBDD
$conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
//si la conexion se establece
if (isset($conexion)) {
    //Comienza mi transaccion
    $conexion->beginTransaction();
    //Actualizo el nombre de Juan a Juana
    $sql= "UPDATE tclientes SET cNombre= 'Juana' WHERE cNombre='Juan'";
    echo " He modificado {$conexion->exec($sql)} registros <br>";
    //Borro los registros de Pedro
    $sql= "DELETE FROM tclientes WHERE cNombre = 'Marcos' AND cApellido1 = 'Calle'";
    echo "He borrado {$conexion->exec($sql)} registros";
    
    //Confirmo la transaccion
    $conexion->commit();
}