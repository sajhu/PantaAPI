<?php
// Codificación JSON
header('Content-Type: application/json; charset=utf8');


include "settings.php";

//include "functions.php";

	


// ---------------------------
// DEFINICIÓN DE CAMPOS
// ---------------------------

	// CAMPOS OBLIGATORIOS

	$nombre = get("nombre") or error(MISSING_PARAMS, 'description');

	$user = get("user");

	$clave = get("clave"); 

	if(!$nombre || $nombre == "")
		error(MISSING_PARAMS, 'description'); // muere

	else if(!$user || $user == "")
		error(MISSING_PARAMS, 'to');

	else if(!$clave || $clave == "")
		error(MISSING_PARAMS, 'time'); // muere


	// POR DEFECTO

	$fecha = "CURDATE( )"; // si se cambia hay que agregar \'

	$sillas = 0;

	// OPCIONALES

	$pfecha = get("date");
	if($pfecha || $pfecha != "")
		$usaFecha = true;
		
	$psillas = get("seats");
	if($psillas || $psillas != "")
		$sillas = $psillas;	
		
// ---------------------------
// VALIDACIÓN DE CAMPOS
// ---------------------------

	if (strlen($hora) != 4)
		error(ERROR_VALIDATING);
	

	if($to != DESTINATION_UNIANDES && $to != DESTINATION_HOME)
	{
		var_dump($_GET);
				error(ERROR_VALIDATING, 'destination param \'to\'');

	}

	if($usaFecha)
	{
		if($pfecha == 'today')
			$fecha = "CURDATE( )";
		elseif ($pfecha == 'tomorrow')
			$fecha = "DATE_ADD(NOW(), INTERVAL 1 DAY)";
		elseif ($pfecha == 'both') // ESTO SE SOPORTA EN DAR LISTA DE VIAJES, NO PUBLICAR
			error(NOT_SUPPORTED);
		//elseif ($pfecha) mira el patron de fecha yyyy/mm/dd
		else
			error(ERROR_VALIDATING);
	}
	
		
	if(!is_numeric($sillas) || $sillas > 7)
		error(ERROR_VALIDATING);
		
		
// ---------------------------
// CONSULTA SQL
// ---------------------------

	$sql = 'INSERT INTO `'.TABLA_VIAJES.'` (`id`, `descripcion`, `fecha`, `hora`, `sillas`, `id_conductor`, `destino`) VALUES (NULL, \''.$descripcion.'\', '.$fecha.', \''.$hora.'\', \''.$sillas.'\', \''.$codigo.'\', \''.$to.'\');';

	
	$DB->ExecuteSQL($sql) or error(PROBLEM_PUBLISHING, $DB->lastError);

//var_dump($DB);

	error(RESPONSE_OK); // acaba bien
?>
