<?php

require_once './db/DB.php';

class ListaCompraModel {

    // Atributos

    // Modelos

    /**
     * Método de inserción en base de datos de un producto con su cantidad correspondiente
     * @param producto Producto que se quiere insertar (string)
     * @param cantidad Número de unidades del producto
     */
    public function insertarProducto(string $producto, int $cantidad) {
        
        // Conecto a la base de datos
        DB::conectarDB();

        // Busco si ya hay productos como el que quiero insertar
        if (DB::buscarFilas(T_PRODUCTO, T_PRODUCTO_PRODUCTO, $producto)) {
            // Actualizo la cantidad
            DB::actualizar(T_PRODUCTO, T_PRODUCTO_CANTIDAD, $cantidad, T_PRODUCTO_PRODUCTO, $producto);
        } else {
            // Inserto un nuevo registro
            DB::insertar(T_PRODUCTO, array(T_PRODUCTO_PRODUCTO, T_PRODUCTO_CANTIDAD), array($producto, $cantidad));
        }

        // Desconecto de la base de datos
        DB::desconectarDB();
    }

    /**
     * Método de listado de productos
     * @return array Array asociativo con los productos y sus cantidades
     */
    public function recuperarProductos() : array {

        // Conecto a la base de datos
        DB::conectarDB();

        // Hago la recuperación de los datos según query preparada
        $sql = "SELECT * FROM " . T_PRODUCTO;
        DB::prepararQuery($sql);
        DB::ejecutarQueryPreparada();
        $listadoProductos = DB::devuelveTodo();

        // Desconecto la base de datos
        DB::desconectarDB();

        // Devuelvo array
        return $listadoProductos;
    }

}