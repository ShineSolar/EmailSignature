<?php
declare(strict_types=1);

// remember, includes and requires are relative to the location of the controller. Our controller is at root
require_once 'model/model.php';

if (Http::methodIs('POST')) {

	// Checking that the content-type is correct
	try {
		Http::requestTypeIs('application/x-www-form-urlencoded');
	} catch (Exception $ex) {
		$error = 'Something went wrong.';
		Http::displayPage('view/page.php');
		exit;
	}

	// Validating the name
	try {
		$HandleName = new HandleData($_POST['name']); 
		$name = $HandleName->plainString();
	} catch (Exception $ex) {
		$error = $ex->getMessage();
		Http::displayPage('view/page.php');
		exit;
	}

	// Validating the position
	try {
		$HandlePosition = new HandleData($_POST['position']); 
		$position = $HandlePosition->plainString();
	} catch (Exception $ex) {
		$error = $ex->getMessage();
		Http::displayPage('view/page.php');
		exit;
	}

	// Validating the office phone
	try {
		$HandleOfficePhone = new HandleData($_POST['office_phone']);
		if (!empty($HandleOfficePhone->data)) {
			$officePhone = $HandleOfficePhone->phone();
			$officeTelPhone = $officePhone['tel_link'];
			$officePhone = $officePhone['phone'];
		}
	} catch (Exception $ex) {
		$error = $ex->getMessage();
		Http::displayPage('view/page.php');
		exit;
	}

	// Validating the mobile phone
	try {
		$HandleMobilePhone = new HandleData($_POST['mobile_phone']);
		if (!empty($HandleMobilePhone->data)) {
			$mobilePhone = $HandleMobilePhone->phone();
			$mobileTelPhone = $mobilePhone['tel_link'];
			$mobilePhone = $mobilePhone['phone'];
		}
	} catch (Exception $ex) {
		$error = $ex->getMessage();
		Http::displayPage('view/page.php');
		exit;
	}

	// Validating the email address
	try {
		$HandleEmail = new HandleData($_POST['email']);
		$emailAddress = $HandleEmail->email();
		$mailToEmail = $emailAddress['mailto'];
		$emailAddress = $emailAddress['email'];
	} catch (Exception $ex) {
		$error = $ex->getMessage();
		Http::displayPage('view/page.php');
		exit;
	}

	// Validating the logo input
	try {
		$HandleLogo = new HandleData($_POST['logo']);
		$logo = $HandleLogo->logo();
		$logoHref = $logo['link'];
		$logo = $logo['img'];
	} catch (Exception $ex) {
		$error = $ex->getMessage();
		Http::displayPage('view/page.php');
		exit;
	}

	include_once 'view/template.php';

} else {

	Http::displayPage('view/page.php');

}

exit;
