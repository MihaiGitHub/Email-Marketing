<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$_SESSION['c_id'] = uniqid('C',true);
$_SESSION['listid'] = $_POST['listId'];

// Load the correct template
$tstmt = $conn->prepare('SELECT value FROM template_fields WHERE user_id = :u_id AND template_id = :t_id');
$tstmt->execute(array('u_id' => $_SESSION['id'], 't_id' => $_SESSION['templateid']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();

// Select all emails corresponding to the chosen list
$stmtmain = $conn->prepare('SELECT id, email FROM emails WHERE list_id = :listid');
$stmtmain->execute(array('listid' => $_SESSION['listid']));
$count = $stmtmain->rowCount();

if($count > 0){
	require_once('phpmailer/class.phpmailer.php');

	$stmtc = $conn->prepare('INSERT INTO campaigns (id, user_id, list_id, subject, email_from, email_replyto, sent) VALUES (:cid, :userid, :listid,  :subject, :from, :replyto, :sent)');
	$stmtc->execute(array('cid' => $_SESSION['c_id'], 'userid' => $_SESSION['id'], 'listid' => $_SESSION['listid'], 'subject' => $_POST['subject'], 'from' => $_POST['fromEmail'], 'replyto' => $_POST['replyTo'], 'sent' => date('n/j/Y g:i A')));

	while($campaignemails = $stmtmain->fetch()){
			
			// If the user has more than 0 emails left to send, it will create a campaign with the number of emails left
			if($_SESSION['emails'] > 0){
				// put all emails in campaign emails and subtract from emails remaining
				$stmcemails = $conn->prepare('INSERT INTO campaign_emails (c_id, email) VALUES (:cid, :email)');
				$resulctemails = $stmcemails->execute(array('cid' => $_SESSION['c_id'], 'email' => $campaignemails['email']));
				$_SESSION['emails']--;
			} else {
				break;
			}	
	
	}	

	/// Select all emails from campaign_emails inserted above
	$stmtcid = $conn->prepare('SELECT id, c_id, email FROM campaign_emails WHERE c_id = :cid AND sent = 0 LIMIT 14');
	$stmtcid->execute(array('cid' => $_SESSION['c_id']));
	$stmtcid->setFetchMode(PDO::FETCH_ASSOC);
		
	while($rowcid = $stmtcid->fetch()){	
		
		$tracker = THIS_WEBSITE_URI . '/receipt.php?id=' . urlencode( $rowcid['id'] ) . '&cid=' . urlencode( $rowcid['c_id'] );
		
		$body = str_replace(
			['http://','https://','%unsubscribe%'],
			[THIS_WEBSITE_URI . '/receipt.php?id=%id%&cid=%cid%&link=http://', 
			 THIS_WEBSITE_URI . '/receipt.php?link=https://',
			 THIS_WEBSITE_URI . '/receipt-unsubscribe.php'],
			$trow['value']
		);
		
		$body = str_replace('%id%', $rowcid['id'], $body);
		$body = str_replace('%cid%', $rowcid['c_id'], $body);

		$body .= '<img style="display:none;" border="0" src="'.$tracker.'" width="1" height="1" />';
		


		$mail = new PHPMailer();
 
		$mail->SMTPDebug  = 2;               
 
		// from email seems to matter if it the email on the domain where the email was sent from
		//$mail->From     = "mihai@msmarandache.com";
		$mail->SetFrom("mihai@msmarandache.com", $_POST['fromName']);
		//$mail->SetFrom($_POST['fromEmail'], $_POST['fromName']);
		//$mail->SetFrom('mihai.sanfran@gmail.com', 'mihai smarandache');
	
		$mail->AddAddress($rowcid['email']);
 
		$mail->AddReplyTo($_POST['replyTo']);
		$mail->Subject = $_POST['subject'];
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
		$mail->MsgHTML($body); 
 
if(!$mail->Send()) {
 // echo 'Message was not sent.';
 // echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
 // echo 'Message has been sent.';
}


		// Update campaign_emails that the email has been sent so next go around it will pick the non sent ones
		$stmtupdatesent = $conn->prepare('UPDATE campaign_emails SET sent = 1 WHERE id = :id');
		$resultupdatesent = $stmtupdatesent->execute(array('id' => $rowcid['id']));


	} // should be the while loop

	// Update the total number of emails remaining
	$stmtc = $conn->prepare('UPDATE users SET emails = :emails WHERE id = :userid');
	$stmtc->execute(array('emails' => $_SESSION['emails'], 'userid' => $_SESSION['id']));

	//	header('Location: templates.php?finished');
	//	exit;	
			
} // end if count is greater than 0
?>