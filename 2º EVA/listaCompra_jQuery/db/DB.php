<?php

/**
 * Description of DB
 *
 * @author Alejandro Catalá Espí (alejandroce@iesgalileo.es)
 */

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
     * Prepara una consulta para ejectuar en la base de datos. Asumimos que la consulta viene con interrogantes para los parámetros
     * @param sql Sentencia SQL
     * @param params Array con los valores con los que sustituir los interrogantes
     */

    public static function prepararQuery(string $sql, $params = array())
    {
        self::$consulta = self::$conexion->prepare($sql);
        for ($i = 0; $i < count($params); $i++) {
            self::$consulta->bindParam($i + 1, $params[$i]);
        }
    }

    /**
     * Ejecuta una consulta preparada con antelación
     */

    public static function ejecutarQueryPreparada(): bool
    {
        try {
            // Ejecutamos consulta preparada
            self::$consulta->execute();
        } catch (PDOException $pexc) {
            return false;
        }

        return true;
    }

    /**
     * Devuelve el número de filas devueltas / afectadas
     */

    public static function registrosAfectados(): int
    {
        return self::$consulta->rowCount();
    }

    /**
     * Busca si existe algún registro en una tabla que cumple con un criterio de valor de una columna
     * @param tabla Tabla de la que quiero recuperar los registros
     * @param column Columna en la que quiero buscar
     * @param value Valor a buscar
     */
    public static function buscarFilas(string $tabla, string $column, string $value)
    {
        // Escribo la sentencia SQL a ejecutar
        $sql = "SELECT COUNT(*) FROM $tabla WHERE $column = ?";

        // Preparo la query
        self::prepararQuery($sql, array($value));

        // Ejecuto consulta preparada
        self::ejecutarQueryPreparada();

        // Comprobamos cuenta
        $registro = self::devuelveTodo();
        if ($registro[0][0] == 0) {
            $found = false;
        } else {
            $found = true;
        }

        // Devuelvo si he encontrado lo que buscaba
        return $found;
    }

    /**
     * Devuelve número de registros de la tabla pasada como parámetro
     * @param tabla Nombre de la tabla de la que quiero saber cuántas filas tiene
     */

    public static function contarFilas(string $tabla): int
    {
        // Escribo sentencia
        $sql = 'SELECT COUNT(*) FROM ' . $tabla;

        // Preparo consulta
        self::prepararQuery($sql);

        // Ejecuto la consulta preparada
        self::ejecutarQueryPreparada();

        // Devolvemos cuenta
        $registro = self::$consulta->fetch(PDO::FETCH_NUM);
        return $registro[0];
    }

    /**
     * Devuelve un array con todos los datos resultantes de la última query ejecutada. Requiere la ejecución previa de los métodos prepararQuery y ejecutarQueryPreparada.
     */

    public static function devuelveTodo(): array
    {
        return self::$consulta->fetchAll();
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

    /**
     * Función para añadir valor de un campo de un registro existente
     * @param tabla Tabla de la que quiero recuperar los registros
     * @param columnaActualizar Columna que quiero actualizar
     * @param valorActualizar Valor al que quiero actualizar
     * @param columnaFiltrar Columna que quiero utilizar de filtro
     * @param valorFiltrar Valor del filtro
     */
    public static function actualizar($tabla, $columnaActualizar, $valorActualizar, $columnaFiltrar, $valorFiltrar)
    {

        // Planteo la consulta
        $query = "SELECT $columnaActualizar FROM $tabla WHERE $columnaFiltrar = ?";

        // Preparo la query
        self::prepararQuery($query, array($valorFiltrar));

        // Ejecuto consulta preparada
        self::ejecutarQueryPreparada();

        // Recupero el valor actual
        $valorActual = self::$consulta->fetchColumn();

        // Planteo la consulta
        $query = "UPDATE $tabla SET $columnaActualizar = ? WHERE $columnaFiltrar = ?";

        // Preparo la query
        self::prepararQuery($query, array($valorActual + $valorActualizar, $valorFiltrar));

        // Ejecuto consulta preparada
        self::ejecutarQueryPreparada();
    }

    /**
     * Función para borrar todos los registros de una tabla que cumplan con un criterio
     * @param tabla Tabla de la que quiero borrar
     * @param columna Columna por la que filtro
     * @param valor Valor de la columna de filtro
     */
    function borrar($tabla, $columna, $valor)
    {
        // Planteo la consulta
        $query = "DELETE FROM $tabla WHERE $columna = ?";

        // Preparo la query y asocio parámetros
        self::prepararQuery($query, array($valor));

        // Ejecuto consulta preparada
        self::ejecutarQueryPreparada();
    }
}
