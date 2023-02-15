<?php

// Datos de conexión a bases de datos
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "db_listacompra");
define("PORT", "3306");
define("OPTIONS", [
        'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
        'PDO::ATTR_DEFAULT_FETCH_MODE' => 'PDO::FETCH_BOTH'
    ]);

// Datos de las tablas
define("T_PRODUCTO", 'productos');
define("T_PRODUCTO_CANTIDAD", 'cantidad');
define("T_PRODUCTO_PRODUCTO", 'producto');
