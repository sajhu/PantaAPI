<?php

class User {
	var $id;
	
	var $name;

	var $surname;
	
	var $picture;
	
	var $phone;

	
	
	public function __construct($id, $nombre, $apellido, $foto, $telefono)
	{
		$this->id = $id;
		$this->name = $nombre;
		$this->surname = $apellido;
		$this->picture = $foto;
		$this->phone = $telefono;
	
	}

}

?>