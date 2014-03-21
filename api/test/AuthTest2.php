<?php

include "../credentials.php";
include "../functions.php";
include "../lib/MySQL.php";
include "C:\wamp\bin\php\php5.4.12\pear\PHPUnit\TestCase.php";

class AuthTest extends PHPUnit_TestCase
{
    // ...

    public function testAuth()
    {
        $DB = new MySQL(MYSQL_NAME, MYSQL_USER, MYSQL_PASS, MYSQL_HOST);

        
        $userId = "s.rojas963";
        $password = "123456789";

        // Assert
        $this->assertTrue(auth($userId, simulateHash($password), $DB));
    }

    public function simulateHash($password)
    {
        $salt = generateRandomString();

        $hash = md5($password . ":" . $salt);

        return $hash . ":" . $salt;

    }

}