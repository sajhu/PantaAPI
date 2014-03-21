<?php


	function auth($mail, $secret, $db)
	{
		$parts = explode(":", $secret);

		$hash = $parts[0];

		$salt = $parts[1];

		return checkUser($mail, $hash, $salt, $db);
	}

	function checkUser($mail, $hash, $salt, $db)
	{
		$usuario = $db->Select(TABLA_USUARIOS, array("correo" => $mail), '', 1);


		if(!$usuario || $db->records != 1)
			return false;

		$clave = $usuario['clave'];

		$salted = $clave . ":" . $salt;

		$generated = md5($salted);


		return $hash == $generated;

	}
	
		/**
	 * Sanitizes any input string agaist SQLInjections and XSS
	 * @requires 	An existing MySQL connection is required for it to work. Will put scape slashes if there isn't one.
	 */
	function sanitize($string)
	{
		//TODO should check first for Magic Quotes GPC
		try {
			return mysql_real_escape_string(htmlspecialchars(trim($string)));	
		} catch (Exception $e) {
			return addslashes(htmlspecialchars(trim($string)));
		}
	}
	
	function get($key)
	{
		return sanitize($_GET[$key]);
	}
	
	function error($id, $info = '')
	{
		$error = new Error($id);

		if($info != '')
			$error->appendInfo($info);
		
		echo $error->toJson();
		
		exit($id);
	}

	/**
	 * Sends a mail
	 * @param $fromEmail senders email address
	 * @param $toEmail recipients email address
	 * @param $subject mail's subject
	 * @param $message mail's content
	 * @param $fromName senders name, optional
	 * @param $toName recipients name, optional
	 * @return should check === true for confirmation. otherwise a string with the error message will be returned
	 */
	function sendMail($fromEmail, $toEmail, $subject, $message, $fromName = '', $toName = '')
	{
		try {
			include_once(LIB_FOLDER.'Mailer.php');

			// minimal requirements to be set
			$Mailer = new Mailer();
			$Mailer->setFrom($fromName, $fromEmail);
			$Mailer->addRecipient($toName, $toEmail);
			$Mailer->fillSubject($subject);
			$Mailer->fillMessage($message);
			

			
			// now we send it!
			$Mailer->send();
			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	/**
	 * Returns the time elapsed between a time given and now in human-readable form
	 * For example: 4 days, 3 minutes
	 * @param $time measured in the Unix Epoch format
	 * @return String saying the time between that date and now in a human form
	 */
	function humanTiming ($time)
	{

	    $time = time() - $time; // to get the time since that moment

	    $tokens = array (
	        31536000 => 'year',
	        2592000 => 'month',
	        604800 => 'week',
	        86400 => 'day',
	        3600 => 'hour',
	        60 => 'minute',
	        1 => 'second',
	        0 => 'just now'
	    );

	    foreach ($tokens as $unit => $text) {
	        if ($time < $unit) continue;
	        $numberOfUnits = floor($time / $unit);
	        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	    }
	}



?>
