<?php
//	 Codificación JSON
header('Content-Type: application/json; charset=utf8');


include "settings.php";

// ---------------------------
// DEFINICIÓN DE CAMPOS
// ---------------------------



	// POR DEFECTO

	$hora = date('Hi'); // hora militar sin puntos
	$usaHora = false;

	$hashtags = array();
	$numHashtags = 0;

	// OPCIONALES

	$pTime = get("time");
	if($pTime || $pTime != "")
		$usaHora = true;
		
	$pHashtags = get("hashtag");
	if($pHashtags || $pHashtags != "")
		$numHashtags = 1;	
		
// ---------------------------
// VALIDACIÓN DE CAMPOS
// ---------------------------

	if($usaHora)
	{
		if(!is_numeric($hora) || strlen($hora) != 4)
			error(ERROR_VALIDATING);
		else
			$hora = $pTime;
	} 
		
	
	if($numHashtags)
	{
		$hashtags = explode(',', $pHashtags);
		$numHashtags = count($hashtags);
	}
		
// ---------------------------
// CONSULTA SQL
// ---------------------------


	$query = "SELECT * FROM `".TABLA_VIAJES."`, `".TABLA_USUARIOS."` 
	WHERE `viaje`.`id_conductor` = `usuario`.`codigo` AND `fecha` = CURDATE() AND";

	foreach ($hashtags as $hashtag)
		$query .= " `descripcion` LIKE '%#".$hashtag."%' AND";
	
	if ($usaHora)
		$query .= " `hora` >= ". $hora . " AND";

	$query = substr($query, 0, -3);

	$query .= " ORDER BY hora";
	$array = $DB->ExecuteSQL($query);
	$numViajes = $DB->records;

	var_dump($DB);


	if($DB->lastError != null)
		error(SERVER_ERROR, $DB->lastError);
	elseif($numViajes == 0)
		error(RESPONSE_EMPTY);

// ---------------------------
// CONVERSIÓN A OBJETOS
// ---------------------------


	$response = new TripsResponse(RESPONSE_OK, true);

	if($numViajes == 1)
		$viajesArray[0] = $array;
	else 
		$viajesArray = $array;

	foreach ($viajesArray as $viaje)
	{
		$viajeId = $viaje['id'];
		$descripcion = $viaje['descripcion'];
		$fecha = $viaje['fecha'];
		$hora = $viaje['hora'];
		$sillas = $viaje['sillas'];

		$trip = new Trip($viajeId, $descripcion, $fecha, $hora, $sillas);

		$codigo = $viaje['codigo'];
		$nombre = $viaje['nombre'];
		$foto = $viaje['foto'];
		$telefono = $viaje['telefono'];

		$driver = new Driver($codigo, $nombre, $foto, $telefono);

		$trip->setDriver($driver);

		$response->addTrip($trip);
	}


// ---------------------------
// EXPORTADO A JSON
// ---------------------------

echo json_encode($response);
?>