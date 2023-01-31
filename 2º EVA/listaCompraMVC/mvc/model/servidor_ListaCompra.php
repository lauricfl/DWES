<?php    
class Compra{


    public function addProductoALaCesta($producto, $cantidad){
        require_once '../../db/DB.php'; 
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
  
    public function recuperarProductos() : array {
        require_once '../../db/DB.php'; 
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

$options = array('uri' => 'http://localhost/');
$server = new SoapServer(NULL, $options);
$server->setClass('Compra');
$server->handle();