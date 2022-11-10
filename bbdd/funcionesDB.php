<?php

/**
 * Recuperar todos los datos de una tabla
 * @param conexion Objeto mysqli resultado de la conexión a la DB
 * @param tabla Tabla de la que quiero recuperar los registros
 */
function recuperarTodo($conexion, $tabla) {
    // Escribo la sentencia SQL a ejecutar
    $sql = "SELECT * FROM " . $tabla;
    // Ejecuto la query
    $resultado = $conexion->query($sql);
    // Itero por todos los registros devueltos
    while($registro = $resultado->fetch_row()) {
        var_dump($registro);
        echo "<br>";
    }
    $resultado->free();
}

/**
 * Función para insertar valores a todos los campos de una tabla
 * @param conexion Objeto mysqli resultado de la conexión a la DB
 * @param tabla Tabla de la que quiero recuperar los registros
 * @param valores Array con los valores a insertar en la tabla
 */
function insertarValores($conexion, $tabla, $valores) {
    // Preparo la consulta
    $consultaPreparada = $conexion->stmt_init();

    // Contar cuantos valores tengo en mi array
    $numValores = count($valores);
    // Preparo la sentencia con parámetros configurables '?' para tantos valores como tenga mi array
    $query = 'INSERT INTO ' . $tabla . '() VALUES(';
    for ($i=0; $i < $numValores; $i++) { 
        $query .= '?, ';
    }
    // Quito la última coma y el último espacio en blanco
    $query = substr($query, 0, -2);
    // Cierro la sentencia preparada de INSERT
    $query .= ')';
    // Preparo la query
    $consultaPreparada->prepare($query);

    // Asocio valores a parámetros configurables y los tipos de datos
    $tiposDatos = '';
    for ($i=0; $i < $numValores; $i++) {
        $tiposDatos .= 's';
    }
    $consultaPreparada->bind_param($tiposDatos, ...$valores);

    // Ejecutar consulta preparada
    $success = $consultaPreparada->execute();
    
    // Cerrar consulta preparada
    $consultaPreparada->close();

    return $success;
}