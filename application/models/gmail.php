<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - GMail SMTP test</title>
</head>
<body>
<?php

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require ('application/libs/PHPMailer/PHPMailerAutoload.php');

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
 $mail->CharSet = "utf-8";
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "teamstyle16@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "/[F=ma/]";

//Set who the message is to be sent from
$mail->setFrom('teamstyle16@gmail.com', 'teamstyle16 web');

//Set an alternative reply-to address
$mail->addReplyTo('teamstyle16@gmail.com', 'teamstyle16 web');

//Set who the message is to be sent to
$mail->addAddress("$result->user_email","$result->user_nickname");

//Set the subject line
$mail->Subject = '队式16找回密码';
$URL=URL . "login/refindaction/" . $key . "?user_nickname=" . $result->user_nickname;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<html><body>To change your password, please click here <a href='{$URL}'$>{$URL}</a></body></html>");

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('');

//send the message, check for errors
if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;

    $_SESSION['feedback_negative'][]='Mailer Error:' . $mail->ErrorInfo;
		  
} else {
		$_SESSION['feedback_positive'][]="Message sent!";
}
?>
</body>
</html>
