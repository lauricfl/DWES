<?php
//Incluir el fichero de configuracion;

use function PHPSTORM_META\type;

require_once("configDB.php");

//Conectar con la base de datos
$conexion = new mysqli(HOST, USER, PASSWORD, DB);

//Si la conexion se ha establecido...
if (isset($conexion->connect_errno) && $conexion->connect_errno == 0) {
    //Hago la query tip oselect
    $query  = "SELECT * FROM tclientes WHERE nedad > 18";
    $resultados = $conexion->query($query);
    //Compruebo el tipo devuelto
    var_dump($resultados);
    echo "<br><br>";

    //Recupero cada uno de los registros almacenados en memoria
    /* $registro = $resultados->fetch_array(MYSQLI_ASSOC);
    echo $registro['cNombre'];
    echo "<br><br>"; */
    while($registro = $resultados->fetch_object()){
        var_dump($registro);
        echo "<br><br>";
        echo $registro->cNombre;
    }
    



    //Cerrar conexion
    $conexion->close();
} else {
    echo "No se ha establecido la conexion con la BBDD";
}
