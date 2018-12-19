<?php
declare(strict_types=1);

class HandleData {

	public $data;

	// Setting the data
	public function __construct(string $data) {
		$this->data = $data;
	}

	// Confirming valid email and making sure it's a shinesolar email address
	public function email() : array {
		$rawEmail = filter_var($this->data, FILTER_SANITIZE_EMAIL);
		if (!filter_var($rawEmail, FILTER_VALIDATE_EMAIL)) {
			throw new Exception('Please enter a valid email address');
		}
		$emailDomain = substr($rawEmail, strpos($rawEmail, "@") + 1);
		if ($emailDomain !== 'shinesolar.com') {
			throw new Exception('Please enter your Shine Solar email address');
		}
		return ['email' => $rawEmail, 'mailto' => 'mailto:'.$rawEmail];
	}

	public function phone() : array {

		$sanitizedPhone = filter_var($this->data, FILTER_SANITIZE_STRING);

		if (self::checkForShinePhone($sanitizedPhone)) {
			return ['phone' => '844.80.SHINE', 'tel_link' => 'tel:8448074463'];
		}

		$sanitizedPhone = preg_replace('/[^0-9]/', '', $sanitizedPhone);
		if (substr($sanitizedPhone, 0, 1) === '1') {
			$sanitizedPhone = substr($sanitizedPhone, 1);
		}

		if (strlen($sanitizedPhone) !== 10) {
			throw new Exception('Please provide a valid phone number');
		}

		$firstThree = substr($sanitizedPhone, 0, 3);
		$secondThree = substr($sanitizedPhone, 3, 3);
		$lastFour = substr($sanitizedPhone, 6);
		$dottedPhone = $firstThree.'.'.$secondThree.'.'.$lastFour;

		return ['phone' => $dottedPhone, 'tel_link' => 'tel:'.$sanitizedPhone];
	}

	private static function checkForShinePhone(string $phoneInput) : bool {
		// return true if the stripped phone == 844.80.SHINE or false otherwise
		$phoneToCheck = preg_replace('/[^a-zA-Z0-9]/', '', $phoneInput);
		return (strtoupper($phoneToCheck) === '84480SHINE') ? true : false;
	}

	public function logo() : array {
		$sanitizedLogoInput = filter_var($this->data, FILTER_SANITIZE_STRING);
		if ($sanitizedLogoInput === 'home') {
			return ['img' => 'https://signatures.shinesolar.com/assets/logos/shine-home-email.png', 'link' => 'https://shinesolar.com/reduce-consumption'];
		} else {
			return ['img' => 'https://signatures.shinesolar.com/assets/logos/shine-solar-email.png', 'link' => 'https://shinesolar.com'];
		}
	}

	public function plainString() : string {
		$str = filter_var($this->data, FILTER_SANITIZE_STRING);
		if (empty($str)) {
			throw new Exception('Please fill out all fields');
		} else {
			return $str;
		}
	}

	public static function output(string $dataToBeOutputted) : string {
		return htmlentities($dataToBeOutputted);
	}

}

class Http {
	public static function methodIs(string $methodToCheck) : bool {
		return ($methodToCheck === $_SERVER['REQUEST_METHOD']) ? true : false;
	}

	public static function requestTypeIs(string $desiredRequestType) : void {
		if ($desiredRequestType !== $_SERVER['CONTENT_TYPE']) {
			throw new Exception('Incorrect content type provided. Content type was: '.$_SERVER['CONTENT_TYPE']);
		}
	}

	public static function displayPage(string $relativeFilePath) : void {
		include_once filter_var($relativeFilePath, FILTER_SANITIZE_STRING);
	}
}
