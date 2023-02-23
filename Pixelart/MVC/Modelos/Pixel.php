<?php

class Pixel
{
private $options = array('uri' => 'http://localhost/', 'location' => 'http://s936421440.mialojamiento.es/index.php');

    public function addColor($x,$y, $color)
    {
        $cliente = new SoapClient(null, $this->options);

        $resultado = $cliente->updateColor($x,$y,$color); 
        return $resultado;
        //: string --> Este método acepta tres parámetros (coordenadas y valor hexadecimal del color) y devuelve un mensaje 
        //explicativo de si se ha actualizado correctamente el color o no y por qué.
    }

    public function getPixels(){
        $cliente = new SoapClient(null, $this->options);

        return $cliente->getPixels();
        /*: array --> Este método no acepta parámetros y
        devuelve un array (asociativo y numérico) con los valores de todas las columnas de la tabla (x, y, color).*/
    }
}
