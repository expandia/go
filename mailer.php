<?php

if(isset($_POST['submit'])) {

	// data the visitor provided
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$clientType = filter_var($_POST['clientType'], FILTER_SANITIZE_STRING);

	$to = "sam@expandia.co";

	$subject = "Lead from Carrick Johnson website";

	// Create the message
	$message = "Name: $name \n\n Phone: $telephone \n\n Email: $email \n\n Client Type: $clientType";

	$headers = 'From: mail@carrickjohnson.com';

	// ...and away we go!
	mail( $to, $subject, $message, $headers );

	// redirect to confirmation
	header('Location: /thanks');

} else {

}

?>