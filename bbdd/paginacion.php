<?php

// Cargar la configuración de la base de datos
include_once('./configDB.php');

// Establecer el número de registros por página que queremos mostrar
define("REGISTROS_POR_PAGINA", 2);

// Conectar a la base datos
$conexion = new PDO(DSN, USER, PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Contar cuántos registros tenemos
try {
    $sql = "SELECT COUNT(*) FROM tclientes";
    $result = $conexion->query($sql);
    $arrayRegistros = $result->fetch(PDO::FETCH_NUM);
} catch (PDOException $p) {
    echo "Error en la consulta: " . $p->getMessage() . "<br/>";
}

// Calculamos cuántas páginas vamos a tener
$totalPaginas = ceil($arrayRegistros[0] / REGISTROS_POR_PAGINA);

// Obtener número de página de parámetro GET
if (isset($_GET['pagina'])) {
    // Me guardo este número de página
    $pagina = intval(htmlspecialchars($_GET['pagina']));
    // Calculo el offset
    $offset = ($pagina - 1) * REGISTROS_POR_PAGINA;
} else {
    $pagina = 1;
    $offset = 0;
}

// Hago la consulta paginada para la página actual
try {
    $sql = "SELECT * FROM tclientes ORDER BY id ASC LIMIT " . $offset . ", " . REGISTROS_POR_PAGINA;
    $result = $conexion->query($sql);
    echo "<table border=1>
    <tr>
        <th>Nombre</th>
        <th>Apellido 1</th>
        <th>Apellido 2</th>
        <th>Edad</th>
        <th>Teléfono</th>
        <th>Email</th>
    </tr>";
    while ($registro = $result->fetch(PDO::FETCH_ASSOC)) {
        // Mostrar los datos
        echo "<tr>
            <td>{$registro['cNombre']}</td>
            <td>{$registro['cApellido1']}</td>
            <td>{$registro['cApellido2']}</td>
            <td>{$registro['nEdad']}</td>
            <td>{$registro['cTelefono']}</td>
            <td>{$registro['cEmail']}</td>
        </tr>";
    }
    echo "</table>";
} catch (PDOException $p) {

}

// Muestro los enlaces al resto de páginas
if ($totalPaginas > 1) {
    switch ($pagina) {
        case 1:
            // 1 2 3 4 ... n >
            for ($i=1; $i <= $totalPaginas; $i++) { 
                echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$i'>$i</a> ";
            }
            $nextPage = $pagina + 1;
            echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$nextPage'>></a>";
            break;

        case $pagina > 1 && $pagina < $totalPaginas:
            // < 1 2 3 4 ... n >
            $previousPage = $pagina - 1;
            echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$previousPage'><</a>";
            for ($i=1; $i <= $totalPaginas; $i++) { 
                echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$i'>$i</a> ";
            }
            $nextPage = $pagina + 1;
            echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$nextPage'>></a>";
            break;
        
        case $totalPaginas:
            // < 1 2 3 4 ... n
            $previousPage = $pagina - 1;
            echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$previousPage'><</a>";
            for ($i=1; $i <= $totalPaginas; $i++) { 
                echo "<a href='{$_SERVER['PHP_SELF']}?pagina=$i'>$i</a> ";
            }
            break;
        
        default:
            echo "Número de página no válido";
            break;
    }
}
// ALTERNATIVA
/*
// Y ahora pinto los enlaces a las páginas
if ($totalPaginas > 1) {
    if ($pagina != 1)
        echo '<a href="' . $_SERVER['PHP_SELF'] . '?pagina=' . ($pagina - 1) . '"><</a>';
    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
        else
            //si el índice no corresponde con la página
            //mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo ' <a href="' . $_SERVER['PHP_SELF'] . '?pagina=' . $i . '">' . $i . '</a> ';
    }
    if ($pagina != $totalPaginas)
        echo '<a href="' . $_SERVER['PHP_SELF'] . '?pagina=' . ($pagina + 1) . '">></a>';
}
*/

?>