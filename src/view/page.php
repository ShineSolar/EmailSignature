<?php include_once 'html_includes/head.php'; ?>

<body>

	<header>
		<img src='/assets/logo.svg' alt='Shine Solar Logo' title='Shine Solar Logo'>
	</header>

	<main>

		<!-- 
			Start expository section 
			TODO: Progressively add service worker
			Yeah, I put my HTML todos in HTML comments. What up :)
			If you're reading this, check out the GitHub repository at https://github.com/ShineSolar/EmailSignature - it's got all the source code!
		-->
		<section class='expository'>
			<h1>Create your email signature</h1>
			<p>Enter the information below as it should appear on your email signature.</p>
			<p>Your HTML email signature will be generated. Just copy and paste it into your email signature editor.</p>
			<p>
				<a href='https://www.youtube.com/watch?v=5pGRWepi5TM' title='Watch the video tutorial!' id='videoLink' rel='noopener' target='_blank'>Video Tutorial - How to Create Your Email Signature</a>
			</p>
		</section>
		<!--/ End Expository section -->

		<!-- Start main form -->
		<form method='POST' action='.' enctype="application/x-www-form-urlencoded">

			<p id="formErrorContainer"><?php if (isset($error)) echo $error; ?></p>

			<label for='name'>Name
				<input type='text' id='name' name='name' title='Enter name' placeholder='e.g. John Doe' pattern='^([^0-9]*)$' required>
				<span>Enter valid name</span>
				<span class='success-validation-check'></span>
			</label>

			<label for='position'>Job Title
				<input type='text' id='position' name='position' title='Enter position' placeholder='e.g. Solar Installer' pattern='^([^0-9]*)$' required>
				<span>Enter valid title</span>
				<span class='success-validation-check'></span>
			</label>

			<label for='office_phone'>Office Phone Number (Optional)
				<input type='tel' id='office_phone' name='office_phone' title='Enter office phone number' placeholder='e.g. 555.123.4567'>
				<span>Enter valid phone number</span>
				<span class='success-validation-check'></span>
			</label>

			<label for='mobile_phone'>Mobile Phone Number (Optional)
				<input type='tel' id='mobile_phone' name='mobile_phone' title='Enter phone number' placeholder='e.g. 555.123.4567'>
				<span>Enter valid phone number</span>
				<span class='success-validation-check'></span>
			</label>

			<label for='email'>Work Email Address
				<input type='email' id='email' name='email' title='Enter Shine Solar email address' placeholder='e.g. email@shinesolar.com' pattern='^[A-Za-z0-9._%+-]+@shinesolar.com$' required>
				<span>Enter valid Shine Solar email address</span>
				<span class='success-validation-check'></span>
			</label>

			<label for='logo'>Logo (Shine Solar or Shine Home Energy Solutions)

				<select id='logo' name='logo' required>
					<option class='disabled' value='' selected disabled>Select</option>
					<option value='solar'>Shine Solar</option>
					<option value='home'>Shine Home Energy Solutions</option>
				</select>

				<span>Please select a logo</span>
				<span class='success-validation-check'></span>
			</label>

			<button type="submit" title="Generate Email Signature!!!" id="generateButton">Generate Email Signature</button>

		</form>
		<!--/ End Main Form -->

	</main>

	<?php include_once 'html_includes/mobile_checker.php'; ?>

<script src='/js/main.js'></script>

</body>
</html>
