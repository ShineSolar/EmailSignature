<?php
declare(strict_types=1);

?>

<!doctype html>
<html lang='en-us' dir='ltr'>

<head>

	<!-- Base Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Rubik" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title><?=$name?> email signature</title>

	<!-- Old Style SEO/IE Tags -->
	<meta name="description" content="This is the email signature page!">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

</head>

<body>

	<table cellpadding="0" cellspacing="0" border="0" style="background: none; border-width: 0px; border: 0px; margin: 0; padding: 0;" >
	<tr><td colspan="2" style="padding-bottom: 0px; color: #3F4E58; font-size: 28px; font-weight: 600; line-height: 30px; font-family: trebuchet ms, sans-serif;"><?=$name?></td></tr>
	<tr><td colspan="2" style="padding-bottom: 2px; color: #FF6900; font-size: 17px; font-weight: 600;  line-height: 24px; font-family: trebuchet ms, sans-serif;"><?=$position?></td></tr>
	<tr><td colspan="2" style="padding-bottom: 2px; color: #7D8D9A; font-size: 15px; font-weight: 400; line-height: 18px; font-family: trebuchet ms, sans-serif;"><a href=<?=$telPhone?> style="color: #7D8D9A; text-decoration:none !important;"><?=$phoneNumber?></a></td></tr>
	<tr><td colspan="2" style="padding-bottom: 4px; color: #7D8D9A; font-size: 15px; font-weight: 400; line-height: 18px; font-family: trebuchet ms, sans-serif; text-decoration:none;"><a href=<?=$mailToEmail?> style="color: #7D8D9A; text-decoration:none !important;"><?=$emailAddress?></a></td></tr>
	<tr><td><a href="https://shinesolar.com"><img src=<?=$logo?> width="380px" /></a></td></tr>
	</table>

</body>
</html>