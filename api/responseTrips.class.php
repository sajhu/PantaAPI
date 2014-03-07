<?php

class TripsResponse {
	var $response;
	
	var $testMode;
	var $entries = 0;

	var $trips;

	
	public function __construct($response, $testMode = false)
	{
		$this->response = $response;
		$this->testMode = $testMode;
		$this->trips = array();
	
	}

	public function addTrip(Trip $trip)
	{
		$this->trips[] = $trip;
		$this->entries ++;
	}

}

?>