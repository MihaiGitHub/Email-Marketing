<?php
include 'include/dbconnect.php';
require_once('phpmailer/class.phpmailer.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$stmt = $conn->prepare('SELECT id, fname, username FROM users WHERE username = :email');
		$result = $stmt->execute(array('email' => $_POST['email']));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$row = $stmt->fetch();
		if($row['username'] == ""){
			echo json_encode("error");	
		} else {
			$mail = new PHPMailer();
			$mail->SMTPDebug  = 2;  
			
			$mail->SetFrom("mihai@msmarandache.com", "Mihai");
			$mail->AddReplyTo("mihai.sanfran@gmail.com");
			
			$mail->Subject = 'Reset your password';
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
			
			$patterns['id'] = "/idd/";
			$patterns['fname'] = "/fname/";
			$patterns['uemail'] = "/uemail/";
	
			$replacements['id'] = $row['id'];
			$replacements['fname'] = $row['fname'];
			$replacements['uemail'] = $row['username'];
			
			$body = file_get_contents('templates/reset-password.html');
			$body = preg_replace($patterns, $replacements, $body);
		
			$mail->MsgHTML($body);
			$mail->AddAddress($_POST['email'], $_POST['email']);
		
			if($mail->Send()){
				$mail -> ClearAddresses();
		
				echo "success";
			}	
		}
}
?>