<?php
require './config/config.php';

abstract class DB
{

    // Propiedades
    private static $conexion;
    private static $consulta;

    // Métodos estáticos

    /**
     * Conecta con la base de datos
     */

    public static function conectarDB()
    {
        // Conexión a base de datos
        $dsn = "mysql:host=" . HOST . ";dbname=" . DB . ";port=" . PORT;
        try {
            self::$conexion = new PDO($dsn, USER, PASSWORD, OPTIONS);
        } catch (PDOException $e) {
            echo "Excepción capturada: ", $e->getMessage(), (int) $e->getCode();
        }
    }

    /**
     * Cierra conexión con la base de datos
     */

    public static function desconectarDB()
    {
        // Cierro la consulta con la base de datos
        if (self::$consulta) {
            self::$consulta = null;
        }
        // Cierro la conexión con la base de datos
        if (self::$conexion) {
            self::$conexion = null;
        }
    }
/**
     * Función para insertar valores a todos los campos de una tabla
     * @param tabla Tabla de la que quiero recuperar los registros
     * @param columnas Array con los nombres de las columnas en las que quiero insertar valores
     * @param valores Array con los valores a insertar en la tabla
     */
    public static function insertar(string $tabla, array $columnas, array $valores)
    {

        // Planteo la consulta
        $query = 'INSERT INTO ' . $tabla . '(' . implode(',', $columnas) . ') VALUES(';

        // Cuento cuántos campos quiero incluir
        $numValores = count($valores);

        // Inserto '?' por cada valor a insertar
        for ($i = 0; $i < $numValores; $i++) {
            $query .= '?, ';
        }

        // Quito la última coma y el último espacio en blanco
        $query = substr($query, 0, -2);

        // Cierro la sentencia preparada de INSERT
        $query .= ')';

        // Preparo la query
        self::prepararQuery($query, $valores);

        // Ejecuto consulta preparada
        self::ejecutarQueryPreparada();
    }

}