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
$tstmt = $conn->prepare('SELECT name FROM templates WHERE id = :id');
$tstmt->execute(array('id' => $_SESSION['templateid']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();

// Select all emails corresponding to the chosen list
$stmtmain = $conn->prepare('SELECT id, email FROM emails WHERE list_id = :listid');
$stmtmain->execute(array('listid' => $_SESSION['listid']));

$count = $stmtmain->rowCount();
	
switch ($trow['name']){
	case 'Basic':
		$template = 'templates/basic/basic-mini.html';
	break;
	case 'Basic-1-Column':
		$template = 'templates/basic/1-column-mini.html';
	break;
	case 'Basic-1-2-Column':
		$template = 'templates/basic/1-2-column-mini.html';
	break;
	case 'Basic-1-1-2-Column':
		$template = 'templates/basic/1-1-2-column-mini.html';
	break;	
	case 'Basic-1-1-3-Column':
		$template = 'templates/basic/1-1-3-column-mini.html';
	break;
	case 'Welcome':
		$template = 'templates/theme/welcome-mini.html';
	break;
	case 'Featured':
		$template = 'templates/theme/featured-mini.html';
	break;
	case 'Trial':
		$template = 'templates/theme/trial-mini.html';
	break;
	case 'Arrivals':
		$template = 'templates/theme/arrivals-mini.html';
	break;
}

// if there are more than 0 emails but less than 20 do once and finish right then
if($count > 0){
	require_once('phpmailer/class.phpmailer.php');

	$stmtc = $conn->prepare('INSERT INTO campaigns (id, user_id, list_id, subject, email_from, email_replyto, sent) VALUES (:cid, :userid, :listid,  :subject, :from, :replyto, :sent)');
	$stmtc->execute(array('cid' => $_SESSION['c_id'], 'userid' => $_SESSION['id'], 'listid' => $_SESSION['listid'], 'subject' => $_POST['subject'], 'from' => $_POST['fromEmail'], 'replyto' => 	    						$_POST['replyTo'], 'sent' => date('n/j/Y g:i A')));

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
			
	$patterns = array();
	$replacements = array();
				
	// Select all fields from template_fields and put them in template
	$stmtfields = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
	$stmtfields->execute(array('userid' => $_SESSION['id'], 'templateid' => $_SESSION['templateid']));
	$stmtfields->setFetchMode(PDO::FETCH_ASSOC);

	$placeholders = [];
	$values = [];

	// store fields to be replaced in arrays for replacement later
	while($rowfields = $stmtfields->fetch()){
		$placeholders[] = '%'.$rowfields['field'].'%';
		
		$values[] = str_replace(
			['http://','https://'],
			[THIS_WEBSITE_URI . '/receipt.php?link=http://', THIS_WEBSITE_URI . '/receipt.php?link=https://'],
			$rowfields['value']
		);
	}

	/// Select all emails from campaign_emails inserted above
	$stmtcid = $conn->prepare('SELECT id, c_id, email FROM campaign_emails WHERE c_id = :cid AND sent = 0 LIMIT 14');
	$stmtcid->execute(array('cid' => $_SESSION['c_id']));
	$stmtcid->setFetchMode(PDO::FETCH_ASSOC);
		
	while($rowcid = $stmtcid->fetch()){	
		
		$tracker = THIS_WEBSITE_URI . '/receipt.php?id=' . urlencode( $rowcid['id'] ) . '&cid=' . urlencode( $rowcid['c_id'] );
		
		$body = file_get_contents($template);
		$body = str_replace($placeholders, $values, $body);
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



/* old
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "send.one.com";
		$mail->SMTPDebug  = 2;                    
		
		$mail->SetFrom($_POST['fromEmail'], $_POST['fromName']);
		$mail->AddReplyTo($_POST['replyTo']);
		$mail->Subject = $_POST['subject'];

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
		$mail->MsgHTML($body); 
		$mail->AddAddress($rowcid['email']);
		
		if(!$mail->Send()) {				
	//	  echo "Mailer Error: " . $mail->ErrorInfo."<br/>";
		} else {
	//	  echo "Message sent to ".$rowcid['email']."<br/>";
		}
************************************/
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