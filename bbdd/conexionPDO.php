<?php
//Importo el fichero de configuracion
require_once("configDB.php");

//Conectar a la BBDD
$dsn = DRIVER.':host = '.HOST.':db = '.DB;
$conexion = new PDO( $dsn, USER, PASSWORD);

//si la conexion se establece
if(isset($conexion)){
    
    //Recuperar indormacion de la conexion (getAttribute)
    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "La version de la BBDD es $version <br>";
    //Setear uno de los atributos
    $case = $conexion->getAttribute(PDO::ATTR_CASE);
    echo "Los campos de la BBDD se devolveran en $case case <br>";
    $conexion->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
    $case = $conexion->getAttribute(PDO::ATTR_CASE);
    echo "Y tras la modificacion en $case case <br>" ;


}else{
    echo "No se ha conectado correctamente a la base de datos";
}


