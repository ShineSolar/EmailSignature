<!doctype html>
<html lang='en-us' dir='ltr'>

<head>

	<!-- Base Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Rubik" rel="stylesheet">
	<link rel="stylesheet" href="/style/style.css">
	<title>Make your own email signature</title>

	<!-- Old Style SEO/IE Tags -->
	<meta name="description" content="This is the email signature page!">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

</head>

<body>

	<header>
		<img src='/assets/logo.svg' alt='Shine Solar Logo' title='Shine Solar Logo'>
	</header>

	<main>

		<!-- 
			Start expository section 
			TODO: Put this in a section tag and style it appropriately
			TODO: Progressively add service worker
			TODO: Put <head /> stuff in a head.php file
			Yeah, I put my HTML todos in HTML comments. What up :)
			If you're reading this, check out the GitHub repository at https://github.com/ShineSolar/EmailSignature - it's got all the source code!
		-->
		<h1>Create your email signature</h1>
		<p>Enter the information below as it should appear on your email signature.</p>
		<p>Your HTML email signature will be generated. Just copy and paste it into your email signature editor.</p>
		<p><a href='https://www.youtube.com/watch?v=2wJQydApwHE' id='videoLink' rel='noopener' target='_blank'>Video Tutorial - How to Create Your Email Signature</a></p>
		<!--/ End Expository section -->

		<!-- Start main form -->
		<form method='POST' action='.' enctype="application/x-www-form-urlencoded">

			<p id="formErrorContainer"><?php if (isset($error)) echo $error; ?></p>

			<label for='name'>Name
				<input type='text' id='name' name='name' title='Enter name' placeholder='e.g. John Doe' pattern='^([^0-9]*)$' required>
				<span>Enter valid name</span>
			</label>

			<label for='position'>Job Title
				<input type='text' id='position' name='position' title='Enter position' placeholder='e.g. Solar Installer' pattern='^([^0-9]*)$' required>
				<span>Enter valid title</span>
			</label>

			<label for='office_phone'>Office Phone Number (Optional)
				<input type='tel' id='office_phone' name='office_phone' title='Enter office phone number' placeholder='e.g. 555.123.4567'>
				<span>Enter valid phone number</span>
			</label>

			<label for='mobile_phone'>Mobile Phone Number (Optional)
				<input type='tel' id='mobile_phone' name='mobile_phone' title='Enter phone number' placeholder='e.g. 555.123.4567'>
				<span>Enter valid phone number</span>
			</label>

			<label for='email'>Work Email Address
				<input type='email' id='email' name='email' title='Enter email address' placeholder='e.g. email@shinesolar.com' required>
				<span>Enter valid email address</span>
			</label>

			<label for='logo'>Logo (Shine Solar or Shine Home Energy Solutions)

				<select id='logo' name='logo' required>
					<option class='disabled' value='' selected disabled>Select</option>
					<option value='solar'>Shine Solar</option>
					<option value='home'>Shine Home Energy Solutions</option>
				</select>

				<span>Please select a logo</span>
			</label>

			<button type="submit" title="Generate Email Signature!!!" id="generateButton">Generate Email Signature</button>

		</form>
		<!--/ End Main Form -->

	</main>

</body>
</html>
