<?php
//Incluir el fichero de configuracion;
require_once("configDB.php");

//Conectar con la base de datos
$conexion = new mysqli(HOST, USER, PASSWORD, DB);

//Si la conexion se ha establecido...
if (isset($conexion->connect_errno) && $conexion->connect_errno == 0) {

    //Instertar los valores con una query tipo insert
    $query = "INSERT INTO `tclientes`(`cNombre`, `cApellido1`, `cApellido2`, `nEdad`, `cTelefono`, `cEmail`) VALUES
    ('Sergio','Perez','Fernández',58,'612345678','sergiopefe'),
    ('Mery','Brown',null,17,'623456789','mary.brown@hotmail.com'),
    ('Juan','Sevilla','García',45,'734567890','juan.sega@educa.jcyl.es'),
    ('Silvia','González','Fiz',20,'845678901','silvia_fg'),
    ('Marcos','Calle','Andrés',15, null,'marcando@iesgaliloe.es')";

    //Si esto es true...
    if ($conexion->query($query)) {
        //Comprobar que se han insertado (affected_rows)
        echo "$conexion->affected_rows";

        //2. Borrar un registro
        $query = "DELETE from `tclientes` WHERE `cNombre` = 'Pepe' ";
        $conexion->query($query);
        echo "<br>$conexion->affected_rows";
        if ($conexion->affected_rows > 0) {
            echo "<br>Se ha borrado el registro especificado</br>";
        } else {
            echo "<br>No se ha borrado nada</br>";
        }
        //3.Acualizar el tenefono de otro
        $query = "UPDATE `tclientes` SET `ctelefono` = '123456789' WHERE cNombre = 'Mery' ";
        $conexion->query($query);
        if ($conexion->affected_rows > 0) {
            echo "<br>Se ha actualizado el telefono</br>";
        } else {
            echo "<br>No se ha actualizado nada</br>";
        }
    } else {
        echo "La query no se ha ejecutado correctamente";
    }


    //Cerrar conexion
    $conexion->close();
} else {
    echo "No se ha establecido la conexion con la BBDD";
}
