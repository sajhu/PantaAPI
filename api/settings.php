<?php

include "credentials.php";
include "functions.php";
include "lib/MySQL.php";
include "error.class.php";
include "user.class.php";
include "trip.class.php";
include "responseTrips.class.php";

	// -- Configuraciones de Entorno

	global $DB;
	mb_internal_encoding("UTF-8");
	error_reporting(E_ALL ^ E_NOTICE);

	// -- Acceso MySQL


	define("TRIPS_LIMIT", "30");
	define("REQUIRE_AUTH", true);


	// -- URLs



	define('ACTUAL_URL', $_SERVER['REQUEST_URI']); // Don't edit this one

	
	define("LIB_FOLDER", "lib/");
	

	// -- Códigos de Estado

	define("RESPONSE_OK", 0);
	define("RESPONSE_EMPTY", 1);
	
	define("AUTH_SUCCESS", 100);
	define("AUTH_REQUIRED", 101);
	define("AUTH_FAILED", 102);
	define("MISSING_PARAMS", 103);
	define("NO_UTF8", 104);
	define("NOT_SUPPORTED", 105);
	define("SERVER_ERROR", 106);
	
	define("PROBLEM_PUBLISHING", 200);
	define("ERROR_VALIDATING", 201);


	// -- Códigos tipos de favoritos

	define("USER_FAVORITE", 0);
	define("HASHTAG_FAVORITE", 1);


	// -- Códigos

	define("DESTINATION_UNIANDES", 0);
	define("DESTINATION_HOME", 1);

	// -- Conexión a la DB

	$DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST) or error(SERVER_ERROR, $DB->lastError);

	// AUTENTICACIÓN DE USUARIOS 
	include "auth.php";


?>
