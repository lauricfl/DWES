<?php

class DB
{
    /**
     * Constantes
     */
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "dbEmpresa";

    /**
     * Atributos o propiedades
     */
    private $conexion;

    /**
     * Métodos
     */
    public function connect()
    {
        //Creamos conexion PDO a BD
        $this->conexion = new PDO('mysql:host=' . self::HOST . ';dbname=' . DB::DB, DB::USER, DB::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    public function insertObject(Producto $p, $tabla)
    {
        //Preparar la consulta de insercion
        $sql = "INSERT INTO " . $tabla . " (id, producto) VALUES ('', '" . serialize($p) . "')";
        //Ejecutar la consulta
        $this->conexion->exec($sql);
    }

    public function queryObject($tabla)
    {//Sentencia SQL
        $sql = "SELECT * FROM ".$tabla;
        //Ejecucion de la query con reusltado objeto PDOStatement
        $resultado = $this->conexion->query($sql);
        //Recuperacion del registro con fetch
        $registro = $resultado->fetch(PDO::FETCH_NUM);
        return unserialize($registro[0]);
    }
}
