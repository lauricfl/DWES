<?php

class Pixel
{

    public function addColor($x,$y)
    {
        $options = array('uri' => 'http://localhost/', 'location' => 'http://s936421440.mialojamiento.es/index.php');
        $cliente = new SoapClient(null, $options);

        //$cliente->updateColor(int x, int y, string color) 
        //: string --> Este método acepta tres parámetros (coordenadas y valor hexadecimal del color) y devuelve un mensaje 
        //explicativo de si se ha actualizado correctamente el color o no y por qué.
    }

    public function getPixels(){
        $options = array('uri' => 'http://localhost/', 'location' => 'http://s936421440.mialojamiento.es/index.php');
        $cliente = new SoapClient(null, $options);

        $cliente->getPixels();
        /*: array --> Este método no acepta parámetros y
        devuelve un array (asociativo y numérico) con los valores de todas las columnas de la tabla (x, y, color).*/
    }
}
