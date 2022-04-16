<?php
$to      = 'vincentbettoh@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

if(mail($to, $subject, $message, $headers))
{
	echo "send mail was successful";
}
else{
	echo "Error in sending";
}
?>