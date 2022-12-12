<?php
// Definir constantes relacionadas con la base de datos
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "dbEmpresa");
define("DRIVER", "mysql");  // Para PDO
define("DSN", DRIVER . ':host=' . HOST . ';dbname=' . DB);
define("OPTIONS", array(PDO::FETCH_BOUND));

?>