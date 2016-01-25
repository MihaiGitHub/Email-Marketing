<?php
include 'include/dbconnect.php';

$inbox = imap_open('{imap.one.com:993/imap/ssl/novalidate-cert}INBOX', 'mihai@msmarandache.com', 'Dumbbell_007') or die('Cannot connect: ' . print_r(imap_errors(), true));

/* grab emails */
$emails = imap_search($inbox, 'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
	
	/* for every email... */
	foreach($emails as $email_number) {
		
		$message = imap_fetchbody($inbox,$email_number,2);
		$code = explode('Diagnostic-Code: smtp;', $message);
		
		$pattern="/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
		
		preg_match_all($pattern, $message, $matches);
		
		foreach($matches[0] as $email){
				$stmt = $conn->prepare('UPDATE campaign_emails SET bounced = 1, error_code = :code WHERE email = :email');
				$result = $stmt->execute(array('code' => $code[1], 'email' => $email));

				if($result){
					imap_delete($inbox, $email_number);
				}
		}
	}		
}
?>