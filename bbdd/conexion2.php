<?php
//Incluir dichero de configuracion de DB
require_once("configDB.php");

//Conectar con la base de datos utilizando llamadas a metodos
$conexion = new mysqli(HOST, USER, PASSWORD, DB);

//Vamos a ver si ha conectado
if(isset($conexion->connect_errno) && $conexion->connect_errno==0){
    //Muestro los detalles del objeto devuelto
    var_dump($conexion);
   //Cerrar conexion
   $conexion->close();
}
