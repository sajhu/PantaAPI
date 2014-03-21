<?php

class Trip {
	var $id;
	
	var $description;
	var $date;
	var $time;
	var $seats;
	var $driver;
	
	public function __construct($id, $descripcion, $fecha, $hora, $sillas)
	{
		$this->id = $id;
		$this->description = $descripcion;
		$this->date = $fecha;
		$this->time = $hora;
		$this->seats = $sillas;
	
	}

	public function setDriver(User $driver)
	{
		$this->driver = $driver;
	}

}

?>