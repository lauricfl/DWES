<?php

interface iInventario{
    public function anadirProducto(Producto $p);
    public function eliminarProducto(Producto $p);
}