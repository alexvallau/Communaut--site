<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require_once('./model/mail/PHP_Mailer/src/PHPMailer.php');
require_once('./model/mail/PHP_Mailer/src/SMTP.php');
require_once('./model/mail/PHP_Mailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_test_mail($key,$amail) {
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;              // or SMTP::DEBUG_OFF in production
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'lemauvaiscoinsavoie@gmail.com';               // SMTP username
		$mail->Password   = 'Lemauvaiscoinsavoie73!';                     // SMTP password
		$mail->SMTPSecure = 'ssl';
		$mail->Port       = 465;

		//Recipients
		$mail->setFrom('lemauvaiscoinsavoie@gmail.com');
		$mail->addAddress($amail);     // Add a recipient

		// Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'Voici la clé d\'inscription :'.$key;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
	?>