<?php

namespace Bert\TimezoneBundle\Services;
		
class TwitterTimezoneLookup {

	private $data;

	public function __construct($data) {
		
		$this->data = $data;
		
	}
	
	public function lookup($timezone) {
		
		if (isset($this->data[$timezone])) {
			return $this->data[$timezone];
		}
		
		return null;
		
	}
	
}