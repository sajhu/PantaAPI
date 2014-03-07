<?php

class Driver {
	var $id;
	
	var $name;
	
	var $picture;
	
	var $phone;
	
	public function __construct($id, $nombre, $foto, $telefono)
	{
		$this->id = $id;
		$this->name = $nombre;
		$this->picture = $foto;
		$this->phone = $telefono;
	
	}

}

?>