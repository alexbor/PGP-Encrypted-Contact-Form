<!doctype html>

<!--[if lt IE 7]><html lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="en-US" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="en-US" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US" class="no-js"><!--<![endif]-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Encrypted Contact Form | Alex Bor - Demo | Web Developer</title>

	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<link href="assets/css/style.css" rel="stylesheet"></link>
	<link href="/global/assets/css/demobase.css" rel='stylesheet'></link>

</head>


<body>
<div id="demo_header">
Alex Bor - Demo

<span style="float: right;"><a href="https://alexbor.com/blog/building-pgp-enctypted-contact-form">&lt; Back to turorial</a></span>
</div>
<div id="main" class="container">
	<div class="col-md-12">
		<form role="form" id="contact_form">

			<div class="form-group">
				<label for="name">Your Name</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name">
			</div>

			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" placeholder="Enter email">
			</div>


			<div class="form-group">
				<label for="subject">Subject</label>
				<input type="text" id="subject" class="form-control"  placeholder="Enter subject">
			</div>

			<div class="form-group">
				<label for="message">Message</label><br /><small>Your message shall be encrypted before it is sent</small>
				<textarea class="form-control" id="message" placeholder="Enter your message"></textarea>
			</div>


			<button type="submit" data-loading-text="Sending Email..." data-complete-text="Email Sent!" id="submit_contact" class="btn btn-default">Send Email</button></p>
			
			<div class="alert alert-danger message_errors">Sorry, errors were found in the contact form. Each field is required.</div>
			
			
		</form>
		
		<div class="alert alert-success success_message">Your message has been encrypted and submitted successfully</div>
	</div>
</div>
</body>