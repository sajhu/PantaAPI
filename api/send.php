<?php
// Codificación JSON
header('Content-Type: application/json; charset=utf8');


include "settings.php";

//include "functions.php";

	


// ---------------------------
// DEFINICIÓN DE CAMPOS
// ---------------------------

// CAMPOS OBLIGATORIOS

	$descripcion = get("description");

	$hora = get("time"); 

	if(!$descripcion || $descripcion == "")
		error(MISSING_PARAMS, 'description'); // muere

	elseif(!$hora || $hora == "" )
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
		
	
	if($usaFecha)
	{
		if($pfecha == 'today')
			$fecha = "CURDATE( )";
		elseif ($pfecha == 'tomorrow')
			$fecha = date('Y-m-d', strtotime(' +1 day'));
		//elseif ($pfecha == 'both')  ESTO SE SOPORTA EN DAR LISTA DE VIAJES
		//	error(NOT_SUPPORTED);
		//elseif ($pfecha) mira el patron de fecha yyyy/mm/dd
		else
			error(ERROR_VALIDATING);
	}
	
		
	if(!is_numeric($sillas) || $sillas > 7)
		error(ERROR_VALIDATING);
		
		
// ---------------------------
// CONSULTA SQL
// ---------------------------

	$sql = 'INSERT INTO `'.TABLA_VIAJES.'` (`id`, `descripcion`, `fecha`, `hora`, `sillas`, `id_conductor`) 
	VALUES (NULL, \''.$descripcion.'\', '.$fecha.', \''.$hora.'\', \''.$sillas.'\', \''.$idUsuario.'\');';

	
	$DB->ExecuteSQL($sql);

//var_dump($DB);

	error(0); // acaba bien
?>
