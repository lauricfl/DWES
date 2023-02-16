<?php

require './mvc/view/View.php';

final class ListaCompraView extends View {

    // Atributos
    // Los heredados de la clase padre

    // Métodos

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Cargar datos en una tabla de productos de la vista
     * @param keyword Palabra clave o texto configurable a sustituir en la vista.
     * @param data Datos a cargar en la tabla. En forma de array asociativo con claves "producto" y "cantidad"
     */
    public function renderProductsTable(string $keyword, array $data) {
        // Monto una tabla HTML con $data recorriendo cada posición del array multidimensional.
        $table = '';
        for ($i = 0; $i < count($data); $i++) {
            // Relleno cada fila individual de productos
            $table .= "<tr><td>" . $data[$i]['cantidad'] . "</td><td>" . $data[$i]['producto'] . "</td></tr>";
        }

        // Llamo al renderView que admite dos parámetros: texto configurable a sustituir y esta tabla.
        $this->renderViewKeyword($keyword, $table);
    }

}