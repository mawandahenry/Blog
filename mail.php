<?php
	
	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/
	
	$data['error'] = false;
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['message'];
	
	if( empty($name) ){
		$data['error'] = 'Please enter your name.';
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = 'Please enter a valid email address.';
	}else if( empty($message) ){
		$data['error'] = 'The message field is required!';
	}else{
		
		// $formcontent="From: $name\nPhone: $phone\nWebsite: $website\nEmail: $email\nMessage: $message";
		
		
		// //Place your Email Here
		// $recipient = "mawanda111@gmail.com";
		
		// $mailheader = "From: $email \r\n";
		
		// if( mail($recipient, $name, $formcontent, $mailheader) == false ){
		// 	$data['error'] = 'Sorry, an error occured!';
		// }else{
		// 	$data['error'] = false;
		// }
		$to = 'mawanda111@gmail.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Message from ' . $name;	
	$message = 'Name: ' . $name . '<br/><br/>
		       Email: ' . $email . '<br/><br/>		
		       Message: ' . nl2br($comment) . '<br/>';

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	
	
	}

	function sendmail($to, $subject, $message, $from) {
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: ' . $from . "\r\n";
		
		$result = mail($to,$subject,$message,$headers);
		
		if ($result) return 1;
		else return 0;
	}
	

	
?>