<?php

include_once "settings.php";


	if (REQUIRE_AUTH) 
	{

		$userId = get('userId') or error(MISSING_PARAMS);
		$userSecret = get('userSecret') or error(MISSING_PARAMS);

		$codigo = auth($userId, $userSecret, $DB);

		if($codigo  == -1)	
			error(AUTH_FAILED);
	}

	if(get('auth'))
		error(AUTH_SUCCESS);
	


?>