<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$_SESSION['c_id'] = uniqid('C',true);
$_SESSION['listid'] = $_POST['listId'];

// Server side check for form inputs
if($_POST['listId'] != "" && $_POST['subject'] != "" && $_POST['fromName'] != "" && $_POST['fromEmail'] != "" && $_POST['replyTo'] != ""){

// Load the correct template
$tstmt = $conn->prepare('SELECT value FROM templates WHERE id = :tid');
$tstmt->execute(array('tid' => $_POST['tid']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();

// Select all emails corresponding to the chosen list
$stmtmain = $conn->prepare('SELECT id, email, fname, lname FROM emails WHERE list_id = :listid');
$stmtmain->execute(array('listid' => $_SESSION['listid']));
$count = $stmtmain->rowCount();

if($count > 0){
	require_once('phpmailer/class.phpmailer.php');

	$stmtc = $conn->prepare('INSERT INTO campaigns (id, user_id, list_id, subject, email_from, email_replyto, ga_link_tracking, sent) VALUES (:cid, :userid, :listid,  :subject, :from, :replyto, :galinktracking, :sent)');
	$stmtc->execute(array('cid' => $_SESSION['c_id'], 'userid' => $_SESSION['id'], 'listid' => $_SESSION['listid'], 'subject' => $_POST['subject'], 'from' => $_POST['fromEmail'], 'replyto' => $_POST['replyTo'], 'galinktracking' => $_POST['gaLinkTracking'], 'sent' => date('M d, Y g:i A')));

	while($campaignemails = $stmtmain->fetch()){
			
			// If the user has more than 0 emails left to send, it will create a campaign with the number of emails left
			if($_SESSION['emails'] > 0){
				// put all emails in campaign emails and subtract from emails remaining
				$stmcemails = $conn->prepare('INSERT INTO campaign_emails (c_id, e_id, email, fname, lname) VALUES (:cid, :eid, :email, :fname, :lname)');
				$resulctemails = $stmcemails->execute(array('cid' => $_SESSION['c_id'], 'eid' => $campaignemails['id'], 'email' => $campaignemails['email'], 'fname' => $campaignemails['fname'], 'lname' => $campaignemails['lname']));
				$_SESSION['emails']--;
			} else {
				break;
			}
	}	

	/// Select all emails from campaign_emails inserted above
	$stmtcid = $conn->prepare('SELECT id, c_id, e_id, email, fname, lname FROM campaign_emails WHERE c_id = :cid AND sent = 0 LIMIT 14');
	$stmtcid->execute(array('cid' => $_SESSION['c_id']));
	$stmtcid->setFetchMode(PDO::FETCH_ASSOC);
		
	while($rowcid = $stmtcid->fetch()){
		
		$tracker = THIS_WEBSITE_URI . '/receipt.php?id=' . urlencode($rowcid['id']) . '&cid=' . urlencode($rowcid['c_id']) . '&eid=' . urlencode($rowcid['e_id']);
		
		$body = str_replace(
			['%FNAME%','%LNAME%','href="http://',' href="https://','#%unsubscribe%'],
			[$rowcid['fname'],
			 $rowcid['lname'],
			 THIS_WEBSITE_URI . ' href="http://msmarandache.com/emarketing/app/receipt.php?id=%id%&cid=%cid%&link=http://', 
			 THIS_WEBSITE_URI . ' href="http://msmarandache.com/emarketing/app/receipt.php?link=https://',
			 THIS_WEBSITE_URI . 'http://msmarandache.com/emarketing/app/receipt-unsubscribe.php?id=' . $rowcid['id']],
			 $trow['value']
		);
		
		$body = str_replace('%id%', $rowcid['id'], $body);
		$body = str_replace('%cid%', $rowcid['c_id'], $body);

		$body .= '<img style="display:none;" border="0" src="'.$tracker.'" width="1" height="1" />';


		$mail = new PHPMailer();
 
		$mail->SMTPDebug  = 2;               
 
		// from email seems to matter if it the email on the domain where the email was sent from
		//$mail->From     = "mihai@msmarandache.com";
		//works, in this case have to keep the domain email address
		$mail->SetFrom("mihai@msmarandache.com", $_POST['fromName']);
		//$mail->SetFrom("mihai.sanfran@gmail.com", $_POST['fromName']);
		
		//$mail->SetFrom($_POST['fromEmail'], $_POST['fromName']);
		//$mail->SetFrom('mihai.sanfran@gmail.com', 'mihai smarandache');
		
		$mail->AddCustomHeader("x-email-check-id: Mihai");
		$mail->AddCustomHeader("Return-Path: mihai@msmarandache.com");
	
		$mail->AddAddress($rowcid['email']);
 
		$mail->AddReplyTo($_POST['replyTo']);
		$mail->Subject = $_POST['subject'];
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
		$mail->MsgHTML($body); 
 
		if(!$mail->Send()) {
		//  echo 'Message was not sent.';
		//  echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
		//  echo 'Message has been sent.';
		}


		// Update campaign_emails that the email has been sent so next go around it will pick the non sent ones
		$stmtupdatesent = $conn->prepare('UPDATE campaign_emails SET sent = 1 WHERE id = :id');
		$resultupdatesent = $stmtupdatesent->execute(array('id' => $rowcid['id']));


	} // should be the while loop

	// Update the total number of emails remaining
	$stmtc = $conn->prepare('UPDATE users SET emails = :emails WHERE id = :userid');
	$stmtc->execute(array('emails' => $_SESSION['emails'], 'userid' => $_SESSION['id']));
	
	// Update notifications
	$stmtn = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:userid, :notification, :date)');
	$resultn = $stmtn->execute(array('userid' => $_SESSION['id'], 'notification' => "Campaign <b>".$_POST['subject']."</b> has been successfully created and sent.", 'date' => date('M d, Y g:i A')));

	//	header('Location: templates.php?finished');
	//	exit;	
			
} // end if count is greater than 0
} else {
	echo 'failed';	
}
?>