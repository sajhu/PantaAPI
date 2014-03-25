<?php


class TestCase
{
	const TEST_TRUE 			= 0;
	const TEST_FALSE 			= 1;
	const TEST_EQUALS 			= 2;
	const TEST_NOT_EQUALS 		= 3;
	const TEST_POSITIVE 		= 4;
	const TEST_NOT_POSITIVE 	= 5;

	var $id;
	var $name;
	var $type;
	var $info;


	function __construct($id, $name, $type, $info = array()){
		$this->id = $id;
		$this->name = $name;
		$this->type = $type;
		$this->info = $info;

		echo "<b style='color:blue'>".($this->id)."</b>	Testing <b>{$this->name}</b> with assert ".$this->getTestName()."</b><br>";

		
		if(count($info) > 0)
		{
			$infoString = "ADDITIONAL INFO:";
			foreach ($info as $name => $value) {
				$infoString .= " {$name}: <b>{$value}</b>,";
			}

			echo substr($infoString, 0, -1);
		}
	}

	public function run($result)
	{
		switch ($this->type) {
			case self::TEST_TRUE:
				echo $this->testTrue($this->name, $result);
				break;
			case self::TEST_FALSE:
				echo $this->testFalse($this->name, $result);
				break;
			case self::TEST_POSITIVE:
				echo $this->testPositive($this->name, $result);
				break;
			case self::TEST_NOT_POSITIVE:
				echo $this->testNotPositive($this->name, $result);
				break;			
			default:
				echo $this->printResult($this->name, $result);
				break;
		}
		echo "=====================<br>";	

	}

	public function fail($info = '')
	{
		return "	ASSERT FAIL. {$this->name} test  <span style='color:red;font-weight:bold'>FAILED</span> <br>{$info}";

	}

	function getTestName()
	{
		switch ($this->type) {
			case self::TEST_TRUE:
				return "True";
				break;
			case self::TEST_FALSE:
				return "False";
				break;			
			case self::TEST_EQUALS:
				return "Equals";
				break;			
			case self::TEST_NOT_EQUALS:
				return "Not Equals";
				break;				
			case self::TEST_POSITIVE:
				return "Positive Integer";
				break;				
			case self::TEST_NOT_POSITIVE:
				return "Non Positive Integer";
				break;			
			default:
				return "No name";
				break;
		}
	}

	function testPositive($test, $int)
	{
		if($int > 0)
			return "	{$test} <span style='color:green;font-weight:bold;font-size: 20px'>OK</span> <br>";
		else
			return "	{$test} <span style='color:red;font-weight:bold;font-size: 20px'>FAILED</span> <br>";
	}

	function testNotPositive($test, $int)
	{
		if($int < 0 || !$int)
			return "	{$test} <span style='color:green;font-weight:bold;font-size: 20px'>OK</span> <br>";
		else
			return "	{$test} <span style='color:red;font-weight:bold;font-size: 20px'>FAILED</span> <br>";
	}

	function testTrue($test, $passed)
	{
		return $this->printResult($test, $passed);
	}

	function testFalse($test, $passed)
	{
		return $this->printResult($test, !$passed);
	}


	private function printResult($test, $passed)
	{
		if($passed)
			return "	{$test} <span style='color:green;font-weight:bold;font-size: 20px'>OK</span> <br>";
		else
			return "	{$test} <span style='color:red;font-weight:bold;font-size: 20px'>FAILED</span> <br>";	
	}


}

?>