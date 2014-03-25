<?php

class Error {
	var $response;
	
	var $description;
	
	private $nombres;
	
	public function __construct($id)
	{
		$this->response = $id;
		
		$this->nombres = array(
			RESPONSE_OK => "solicitud correcta",
			RESPONSE_EMPTY => "resultado vacio",
			AUTH_SUCCESS => "credenciales validas",
			AUTH_REQUIRED => "autorizacion requerida para acceder a este recurso",
			AUTH_FAILED => "error de autenticacion",
			MISSING_PARAMS => "faltan parametros",
			NO_UTF8 => "codificacion incorrecta. Use UTF-8",
			NOT_SUPPORTED => "caracteristica no soportada",
			SERVER_ERROR => "Error en el servidor",
			PROBLEM_PUBLISHING => "HTTP 500 no se pudo publicar",
			ERROR_VALIDATING => "campos invalidos"
		);

			$this->description =  $this->nombres[$id];

	}

	public function appendInfo($info)
	{
		$this->description .= " (".$info.")";
	}
	
	public function toJson()
	{
		return json_encode($this);
	}

}
?>