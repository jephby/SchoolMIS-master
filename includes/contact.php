<?php

//Retrieve form data. 
//POST - in case user does not support javascript, we'll use POST instead
$name = $_POST['fullname'];
$email = $_POST['email'];
$subject =$_POST['subject'];
$comment =$_POST['message'];

//flag to indicate which method it uses. If POST set it to 1
  $error = null;
  
if ($_POST) $post=1;

//Simple server side validation for POST data, of course, you should validate the email
if (!$name) {
	$errors = 'Please enter your name.';
}
if (!$email) $errors = 'Please enter your email.';
if (!$subject) $errors = 'Please enter a subject.'; 
if (!$comment) $errors = 'Please enter your message.'; 

//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'jephby@gmail.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject2 = 'Message from ' . $name . 'about ' .$subject;	
	$message = 'Name: ' . $name . '<br/><br/>
		       Email: ' . $email . '<br/><br/>		
		       Message: ' . nl2br($comment) . '<br/>';

	//send the mail
	$result = sendmail($to, $subject2, $message, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) echo 'Thank you! We have received your message.';
		
		else echo 'Sorry, unexpected error. Please try again later';
		
	//else if GET was used, return the boolean value so that 
	//ajax script can react accordingly
	//1 means success, 0 means failed
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	//display the errors message
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="../contact.php">Back</a>';
	exit;
}


//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject2,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>