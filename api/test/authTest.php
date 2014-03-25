<?php
	
define("TEST_ENV", true);	

include "../credentials.php";
include "../functions.php";
include "../lib/MySQL.php";
include "testCase.php";

	global $DB;

	error_reporting(E_ERROR);

	function runTests()
	{

		echo "<title>PANTA TEST</title><pre>";
		echo "RUNNING PANTA API TEST SUIT<br><br>";
		echo "=====================<br>";

		$inicio = microtime();
		$userIds = array("s.rojas963", "ja.hernandez13", "s.rojas963", "ja.hernandez13", "usuarioerroneo");

		$passwords = array("123456789", "mexico", "mexico", "123456789", "sdf");

		$types = array(TestCase::TEST_POSITIVE, TestCase::TEST_POSITIVE, TestCase::TEST_NOT_POSITIVE, TestCase::TEST_NOT_POSITIVE, TestCase::TEST_NOT_POSITIVE);

		$test = new TestCase(0, "MySQL Connection", TestCase::TEST_TRUE);
		try {
			$DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST);
			$test->run($DB->databaseLink);
		} catch (Exception $e) {
			$test->fail();
		}



		for ($i=0; $i < count($userIds); $i++) { 
			$userId = $userIds[$i];
			$password = $passwords[$i];
			$type = $types[$i];

			$test = new TestCase($i+1, "Authentication", $type);
			try {
				$result = testAuth($userId, $password, $DB);
				echo $test->run($result);

			} catch (Exception $e) {
				echo $test->fail($e);
			}
		}

		$fin = microtime();

		echo "TIEMPO TOTAL: <span style='font-size: 20px'>" . ($fin - $inicio) . "s";
		echo "</pre>";
	}

	runTests();

	function testAuth($userId, $password, $db)
	{


		$salt = generateRandomString();

		$hash = md5($password . ":" . $salt);


		$userSecret = $hash . ":" . $salt;

		echo "	userSecret calculated to ". $userSecret ."<br>";

		$result = auth($userId, $userSecret, $db);

		return $result;
	}


	function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>