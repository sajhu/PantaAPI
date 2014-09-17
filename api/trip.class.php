<?php

class Trip {
	var $id;
	
	var $description;
	var $destination;
	var $date;
	var $time;
	var $latitud;
	var $longitud;
	var $seats;
	var $driver;
	
	public function __construct($id, $descripcion, $destination, $fecha, $hora, $sillas, $lat, $lon)
	{
		$this->id = $id;
		$this->description = $descripcion;
		$this->destination = $destination;	
		$this->date = $fecha;
		$this->time = $hora;
		$this->latitud = $lat;
		$this->longitud = $lon;
		$this->seats = $sillas;
	
	}

	public function setDriver(User $driver)
	{
		$this->driver = $driver;
	}

}

?>