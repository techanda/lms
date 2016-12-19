<?php
ini_set("SMTP", $smtp_server);
// ini_set("sendmail_from", $from_email);

//sets the necessary mail variables from POST information if it is sent
if (isset($_POST['message_type']) && $_POST['message_type'] == 'feedback') {
	$mail_to = $_POST['mail_to'];
	$subject = $_POST['subject'];
	$reply_to_mail = $_POST['user_mail'];
	$user_name = $_POST['user_name'];
	$user_mail = $_POST['user_mail'];
	isset($_POST['mail_from']) && $_POST['mail_from'] != '' ? $mail_from = $_POST['mail_from'] : $mail_from = $from_email;
	$user_message = str_replace('\r\n', '',$mysqli->real_escape_string($_POST['message']));
	include $PATH['MAILERS'].'mailer.feedback.php';
} else {
	$mail_from = $from_email;
	$reply_to_mail = $admin_email;
}

$message = "<!DOCTYPE html>
<html>
<body>
".$pre_message."
</body>
</html>";


$headers = "From: " . $mail_from. "\r\n";
$headers .= "Reply-To: ". $reply_to_mail . "\r\n";
isset($mail_cc) && $mail_cc != '' ? $headers .= "Cc: ".$mail_cc . "\r\n" : $headers .='';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($mail_to, $subject, $message, $headers);

header('Location: .?'.$_POST['url_redirect']);