<?php
include "functions.php";
include "MySQL.php";
include "error.class.php";
include "driver.class.php";
include "trip.class.php";
include "responseTrips.class.php";

	define("MYSQL_NAME", "a2030194_wheels");
	define("MYSQL_USER", "a2030194_wheels");
	define("MYSQL_PASS", "labredesML340");
	define("MYSQL_HOST", "mysql5.000webhost.com");


	global $DB;
	mb_internal_encoding("UTF-8");

	$DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST);

	
	
	define("TABLA_VIAJES", "viaje");
	define("TABLA_USUARIOS", "usuario");
	

	define("RESPONSE_OK", 0);
	define("RESPONSE_EMPTY", 1);
	
	define("AUTH_REQUIRED", 100);
	define("AUTH_FAILED", 101);
	define("MISSING_PARAMS", 102);
	define("NO_UTF8", 103);
	define("NOT_SUPPORTED", 104);
	define("SERVER_ERROR", 105);
	
	define("PROBLEM_PUBLISHING", 200);
	define("ERROR_VALIDATING", 201);
	

	// AUTENTICACIÓN DE USUARIOS
	$idUsuario = get("userId");
		if(!$idUsuario || $idUsuario == "")
			error(AUTH_REQUIRED);
		

?>
