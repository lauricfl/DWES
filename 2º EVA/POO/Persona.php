<?php
class Persona { 

	private $id; 
	private $nombre;
	private $email;
	
    public function __set($var, $valor) {
		if (property_exists(__CLASS__, $var)) { 
			$this->$var = $valor; 
		} else {
			echo "No existe el atributo $var."; 
		}
	}
	public function __get($var) {
		if (property_exists(__CLASS__, $var)) { 
			 return $this->$var; 
		}
	} 
}	

