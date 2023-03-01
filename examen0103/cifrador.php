<?php

/*Me he puesto a hacerlo diferenciando mayusculas y minusculas,
pero el ord() parece q no las distingue, porque me da el mismo numero
para la misma letra minuscula y mayuscula.
*/

if (isset($_POST['texto'])) {
    $mensaje = $_POST['texto'];
    $mensaje = strtoupper($mensaje);
    $tamano =  strlen($mensaje);
    $resultado = "";
    for ($pos = 0; $pos < $tamano; $pos++) {
        $char = $mensaje[$pos]; //Aquí tengo el char a secas, solo la letra.
        $charEnNumero = ord($char); //Aquí tengo el numero ASCII de la letra
        //Primero, las 3 excepciones con X,Y, Z.
        if ($charEnNumero == 88) {
            $resultado .= "A";
        } else if ($charEnNumero == 89) {
            $resultado .= "B";
        } else if ($charEnNumero == 90) {
            $resultado .= "C";
        } else if ($charEnNumero == 76) { //=> La L, para que nos salga la Ñ (sino nos sale la O).
            $resultado .= "Ñ";
        } else if ($char == "Ñ") { //Como la Ñ no tiene asci, lo hago con la letra, para que no de fallo.
            $resultado .= "Q";
        } else { //El resto de letras y otros caracteres
            if ($charEnNumero >= 65 && $charEnNumero <= 90) { //Son letras, por lo que hacemos la conversion
                for ($i = 65; $i <= 90; $i++) {
                    $letra = chr($i);
                    if ($char == $letra) {
                        $i = $i + 3;
                        $resultado .= chr($i);
                    }
                }
            } else { //Son otro caracter que no son letras, por lo que no lo traducimos
                $resultado .= $char;
            }
        }
    }
}
echo $resultado; 
