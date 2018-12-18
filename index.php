<?php
declare(strict_types=1);

require_once 'model/model.php';

switch($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		$name = htmlentities(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING), ENT_NOQUOTES, 'UTF-8');
		$position = htmlentities(filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING));
		$phoneNumber = htmlentities(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)); $phoneNumber = ServerValidate::getPhoneNumber($phoneNumber);
		$telPhone = 'tel:'.$phoneNumber;
		$emailAddress = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
		$mailToEmail = 'mailto:'.$emailAddress;
		$logoInput = filter_input(INPUT_POST, 'logo', FILTER_SANITIZE_STRING);
		$logo = ($logoInput === 'home') ? 'https://www.shinesolar.com/image_hosting/email-logo-shine-home.png' : 'https://www.shinesolar.com/image_hosting/email-logo.png';
		include_once 'view/template.php';
	break;

	default:
		include_once 'view/page.php';
	break;
}