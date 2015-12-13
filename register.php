<?php
include 'app/include/dbconnect.php';

require_once('app/phpmailer/class.phpmailer.php');

$stmt = $conn->prepare('INSERT INTO users (username, password, role, emails) VALUES (:username, :password, :role, :emails)');
$result = $stmt->execute(array('username' => $_POST['email'], 'password' => md5($_POST['pass']), 'role' => 'buyer', 'emails' => 5));

if($result){
	$mail = new PHPMailer();
 
	$mail->SMTPDebug  = 2;               

	// from email seems to matter if it the email on the domain where the email was sent from
	//$mail->From     = "mihai@msmarandache.com";
	//works, in this case have to keep the domain email address
	$mail->SetFrom("mihai@msmarandache.com", "Mihai");
	//$mail->SetFrom("mihai.sanfran@gmail.com", $_POST['fromName']);
	
	//$mail->SetFrom($_POST['fromEmail'], $_POST['fromName']);
	//$mail->SetFrom('mihai.sanfran@gmail.com', 'mihai smarandache');
	
//	$mail->AddCustomHeader("x-email-check-id: Mihai");
//	$mail->AddCustomHeader("Return-Path: mihai@msmarandache.com");

//	$mail->AddAddress($rowcid['email']);

	$mail->AddReplyTo("mihai.sanfran@gmail.com");
	
	$mail->Subject = 'You have registered successfully';
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
	
	$patterns['name'] = '/FNAME/';
	$patterns['payment'] = '/GROSS/';
	$patterns['currency'] = '/CURRENCY/';
	$patterns['username'] = '/USERNAME/';
	$patterns['password'] = '/PASSWORD/';
	$patterns['root'] = '/ROOT/';
	
	$replacements['name'] = $_POST['first_name'];
	$replacements['payment'] = $_POST['mc_gross'];
	$replacements['currency'] = $_POST['mc_currency'];
	$replacements['username'] = $_POST['email'];
	$replacements['password'] = $password;
	$replacements['root'] = getenv('HTTP_HOST');
	
	$body = file_get_contents('app/templates/registration.html');
	$body = preg_replace($patterns, $replacements, $body);

	$mail->MsgHTML($body); 
	$mail->AddAddress($_POST['email'], $_POST['email']);

	if($mail->Send()){
		$mail -> ClearAddresses();
	
		echo json_encode('Email Sent');
	}
}
?>