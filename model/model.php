<?php
declare(strict_types=1);

class ServerValidate {

	// Checks if the website is served over https or its localhost
	public static function checkHttps() : void {
		if ($_SERVER["REQUEST_SCHEME"] !== "https" && $_SERVER["HTTP_HOST"] !== "localhost") {
			throw new Exception("Not served over https");
		}
	}

	// Checks if the content type is what it should be
	public static function checkContentType(string $type) : void {
		if ($_SERVER["CONTENT_TYPE"] !== $type) {
			throw new Exception("Wrong content-type. Type provided was: $_SERVER[CONTENT_TYPE]");
		}
	}

	// Checks request method
	public static function checkRequestType(string $type) : void {
		if ($_SERVER["REQUEST_METHOD"] !== $type) {
			throw new Exception("Wrong request method. Request method used was $_SERVER[REQUEST_METHOD]");
		}
	}

	public static function getPhoneNumber(string $rawPhone) : string {
		$rawPhone = preg_replace('/[^0-9]/', '', $rawPhone);
		$firstCharacterOfNumber = substr($rawPhone, 0, 1);
			
		if ($firstCharacterOfNumber === '1') {
			$rawPhone = substr($rawPhone, 1);
		}

		$firstThree = substr($rawPhone, 0, 3);
		$secondThree = substr($rawPhone, 3, 3);
		$lastFour = substr($rawPhone, 6);
		$rawPhone = $firstThree.'.'.$secondThree.'.'.$lastFour;

		return $rawPhone;
	}

}