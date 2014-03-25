<?php

include_once "settings.php";

	$userId = get('userId') or error(MISSING_PARAMS);
	$userSecret = get('userSecret') or error(MISSING_PARAMS);


	$codigo = auth($userId, $userSecret, $DB);

	
	if(REQUIRE_AUTH && $valid < 0)
		error(AUTH_FAILED);
	else if(get('auth'))
		error(AUTH_SUCCESS);

?>