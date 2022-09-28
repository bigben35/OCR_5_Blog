<?php
// Check for empty fields
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$message = filter_input(INPUT_POST, 'message');
if(empty($name)  		||
   empty($email) 		||
   empty($phone) 		||
   empty($message)	||
   !filter_var($email,FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name1 = strip_tags(htmlspecialchars($name));
$email_address1 = strip_tags(htmlspecialchars($email));
$phone1 = strip_tags(htmlspecialchars($phone));
$message1 = strip_tags(htmlspecialchars($message));
	
// Create the email and send the message
$to = 'josselincrenn@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
