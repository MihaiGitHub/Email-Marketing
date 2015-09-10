<?php
$inbox = imap_open('{imap.one.com:993/imap/ssl/novalidate-cert}INBOX', 'mihai@msmarandache.com', 'Dumbbell_007') or die('Cannot connect: ' . print_r(imap_errors(), true));

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
		
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
	foreach($emails as $email_number) {
				
		$message = imap_fetchbody($inbox,$email_number,2);
		
		$pieces = explode(" ", $message);
		
		foreach($pieces as $piece){
		
			$findme   = '@';
			//$findme2 = '.com';
			
			$pos = strpos($piece, $findme);

			if ($pos !== false) {
				echo "The string '$findme' was found in the string '$piece'";
				echo " and exists at position $pos <br><br>";
			}
			
						
		}
		
	}
		
}

?>