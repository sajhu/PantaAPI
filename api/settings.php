<?php
include "functions.php";
include "MySQL.php";
include "error.class.php";
include "driver.class.php";
include "trip.class.php";
include "responseTrips.class.php";

	// -- Configuraciones de Entorno

	global $DB;
	mb_internal_encoding("UTF-8");
	error_reporting(E_ALL ^ E_NOTICE);

	// -- Acceso MySQL

	define("MYSQL_NAME", "panta");
	define("MYSQL_USER", "root");
	define("MYSQL_PASS", "");
	define("MYSQL_HOST", "localhost");


	// -- URLs

	define("RELATIVE_URL", "/panta/api/");
	define("ABSOLUTE_URL", "http://localhost/panta/api/");

	define('ACTUAL_URL', $_SERVER['PHP_SELF']); // Don't edit this one

	define("PICS_URL", "http://localhost/panta/fotos/");

	
	// -- Tablas MySQL

	define("TABLA_VIAJES", "viaje");
	define("TABLA_USUARIOS", "usuario");
	

	// -- Códigos de Estado

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


	// -- Conexión a la DB

	$DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST);

	// AUTENTICACIÓN DE USUARIOS debe ir en otro lado
	$idUsuario = get("userId");
		if(!$idUsuario || $idUsuario == "")
			error(AUTH_REQUIRED);
		

?>
