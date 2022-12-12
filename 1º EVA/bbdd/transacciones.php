<?php
//Incluir el fichero de configuraciony las funciones;
require_once("configDB.php");
require_once("funcionesDB.php");

//Conectar con la base de datos
$conexion = new mysqli();
$conexion->connect(HOST, USER, PASSWORD, DB);


//Recupero la informacion original de la tabla
 echo "<h1>Informacion original</h1>";
 recuperarTodo($conexion, 'tclientes');

 //Deshabilito el autocommit
 $conexion->autocommit(false);

 /*Todo lo que haga desde aqui hasta encontrar un commit
  o un rollback no es definitivo en la bbdd*/

//Borramos todos los clientes que no tengan @ en su correo.
echo "<h1>Borro emails sin @</h1>";
$sql_email = "DELETE FROM tclientes WHERE cEmail NOT LIKE '%@%'";
if($conexion->query($sql_email)){
 //Se ha ejecutado correctamente
    echo "Borrado de emails: <span style='color:green'>OK</span><br>";
    echo "Se han borrado {$conexion->affected_rows} registros<br>";
    echo "El dataset queda ahora (OJO: tmeporal) asi: <br>";
    recuperarTodo($conexion, 'tclientes');
   
}else{
    echo "Borrado de emails: <span style='color:red'>NO OK</span><br>";
}

//Borramos todos los clientes sin segundo apellido
echo "<h1>Borro clientes sin segundo apellido</h1>";

$sql_apellido2 = "DELETE FROM tclientes WHERE cApellido2 IS NULL";
if($conexion->query($sql_apellido2)){
 //Se ha ejecutado correctamente
    echo "Borrado de apellidos 2: <span style='color:green'>OK</span><br>";
    echo "Se han borrado {$conexion->affected_rows} registros<br>";
    echo "El dataset queda ahora (OJO: tmeporal) asi: <br>";
    recuperarTodo($conexion, 'tclientes');
   
}else{
    echo "Borrado de apellidos 2: <span style='color:red'>NO OK</span><br>";
}

//Cierro la transaccion con un rollback (deshace los cambios hecho en la BD)
//Si quisiera fijar los cambios, haria un $conexion->commit();
$conexion->rollback();

//Recupero todos los registos
echo "<h1>El estado final de la tabla es:</h1>";
recuperarTodo($conexion, 'tClientes');

//Cierro la conexion
$conexion->close();