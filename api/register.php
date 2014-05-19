<?php
// Codificación JSON
header('Content-Type: application/json; charset=utf8');

define("REQUIRE_AUTH", false);
include "settings.php";

//include "functions.php";





// ---------------------------
// DEFINICIÓN DE CAMPOS
// ---------------------------

	// CAMPOS OBLIGATORIOS

	$nombre = get("name") or error(MISSING_PARAMS, 'name');
	
	$apellido = get("surname") or error(MISSING_PARAMS, 'surname');

	$user = get("userId") or error(MISSING_PARAMS, 'userId');

	$telefono = get("phone") or error(MISSING_PARAMS, 'phone');

	$clave = get("clave") or error(MISSING_PARAMS, 'clave'); 

	if(!$nombre || $nombre == "")
		error(MISSING_PARAMS, 'nombre'); // muere

	else if(!$user || $user == "")
		error(MISSING_PARAMS, 'usuario');

	else if(!$clave || $clave == "")
		error(MISSING_PARAMS, 'clave'); // muere
	
	else if(!$telefono || $telefono == "")
		error(MISSING_PARAMS, 'telefono'); // muere

	// POR DEFECTO

	$fecha = "CURDATE()"; // si se cambia hay que agregar \'


		
// ---------------------------
// VALIDACIÓN DE CAMPOS
// ---------------------------


// ---------------------------
// CONSULTA SQL
// ---------------------------


	$sql = "INSERT INTO `".TABLA_USUARIOS."` (`codigo`, `nombre`, `apellido`, `correo`, `foto`, `telefono`, `placa`, `pasajeros`, `viajes`, `clave`) 
	VALUES (NULL, '".$nombre."', '".$apellido."', '".$correo."', '', '".$telefono."', '', '0', '0', '".$clave."');";
	
	$DB->ExecuteSQL($sql) or error(PROBLEM_PUBLISHING, $DB->lastError);

//var_dump($DB);

	error(RESPONSE_OK); // acaba bien
?>
