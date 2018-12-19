<?php include_once 'html_includes/head.php'; ?>

<body>

	<!-- 
		Start Email Template 
		TODO: Output this from the database and fill in the variables that way.
		TODO: Multiple email templates
		TODO: Use classes in email signatures to clean this up
		Yeah, I put my HTML todos in HTML comments. What up :)
		If you're reading this, check out the GitHub repository at https://github.com/ShineSolar/EmailSignature - it's got all the source code!
	-->
	<table cellpadding="0" cellspacing="0" border="0" style="background: none; border-width: 0px; border: 0px; margin: 0; padding: 0;">
	
		<!-- Name Row -->
		<tr>
			<td colspan="2" style="padding-bottom: 0px; color: #3F4E58; font-size: 30px; font-weight: 600; line-height: 32px; font-family: trebuchet ms, sans-serif;">
			<?=HandleData::output($name)?>
			</td>
		</tr>
		<!--/ End Name Row -->

		<!-- Job Title Row -->
		<tr>
			<td colspan="2" style="padding-bottom: 2px; color: #FF6900; font-size: 17px; font-weight: 600;  line-height: 24px; font-family: trebuchet ms, sans-serif;">
				<?=HandleData::output($position)?>
			</td>
		</tr>
		<!--/ End Job Title Row -->

		<!-- Office Phone Row -->
		<?php if(!empty($officePhone)) : ?>
		<tr>
			<td colspan="2" style="padding-bottom: 2px; color: #ffffff; font-size: 15px; font-weight: 400; line-height: 19px; font-family: trebuchet ms, sans-serif;">
				<a href=<?=HandleData::output($officeTelPhone)?> style="color: #ffffff; text-decoration:none !important;">
					<span style="color:#B1BBC2 !important">Office: </span><span style="color:#7D8D9A !important"><?=HandleData::output($officePhone)?></span>
				</a>
			</td>
		</tr>
		<?php endif; ?>
		<!--/ End Office Phone Row -->

		<!-- Mobile Phone Row -->
		<?php if(!empty($mobilePhone)) : ?>
		<tr>
			<td colspan="2" style="padding-bottom: 2px; color: #ffffff; font-size: 15px; font-weight: 400; line-height: 19px; font-family: trebuchet ms, sans-serif;">
				<a href=<?=HandleData::output($mobileTelPhone)?> style="color: #ffffff; text-decoration:none !important;">
					<span style="color:#B1BBC2 !important">Mobile: </span><span style="color:#7D8D9A !important"><?=HandleData::output($mobilePhone)?></span>
				</a>
			</td>
		</tr>
		<?php endif; ?>
		<!--/ End Mobile Phone Row -->

		<!-- Email Address Row -->
		<tr>
			<td colspan="2" style="padding-bottom: 4px; color: #ffffff; font-size: 15px; font-weight: 400; line-height: 19px; font-family: trebuchet ms, sans-serif; text-decoration:none;">
				<a href=<?=HandleData::output($mailToEmail)?> style="color: #ffffff; text-decoration-color:#ffffff !important; text-decoration:none !important;">
					<span style="color:#B1BBC2 !important">Email: </span><span style="color:#7D8D9A !important"><?=HandleData::output($emailAddress)?></span>
				</a>
			</td>
		</tr>
		<!--/ End Email Address Row -->
		
		<!-- Logo Row -->
		<tr>
			<td>
				<a href=<?=HandleData::output($logoHref)?> target="_blank" rel="noopener">
					<img src=<?=HandleData::output($logo)?> width="400px" alt="Logo they picked" title="Nice little logo" />
				</a>
			</td>
		</tr>
		<!--/ End Logo Row -->
	
	</table>
	<!--/ End Email Template -->

</body>
</html>