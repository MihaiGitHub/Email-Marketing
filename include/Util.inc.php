<?php

class Util
{
	/**
	* Clean string to prevent SQL injection
	*
	* @param string $str
	* @return string
	*/
	public static function strCleanInjection($str)
	{
		$str = stripslashes(str_replace("'", "''", $str));
		return $str;
	}

	public static function GetNameFromUA($str)
	{
		global $CFG;
	
		// Connect and bind to the LDAP server
		$ld = ldap_connect($CFG['ldap']['host'], $CFG['ldap']['port']);
		ldap_bind($ld, $CFG['ldap']['user'], $CFG['ldap']['pass']);
		
		// Search for the user
		$res = ldap_search($ld, 'DC=unisource,DC=corp', 'sAMAccountName=' . trim($str));

		// Get entry point
		$entry = ldap_first_entry($ld, $res);
		
		if($entry === false)
		{
			return '';
		}
		else
		{
			// Get the display name information
			$displayname = ldap_get_values($ld, $entry, 'displayname');
		
			// Assign the full name to the global UserFullName variable
			return $displayname[0];	
		}
	}

	public static function GetEmailFromUA($str)
	{
		global $CFG;
	
		// Connect and bind to the LDAP server
		$ld = ldap_connect($CFG['ldap']['host'], $CFG['ldap']['port']);
		ldap_bind($ld, $CFG['ldap']['user'], $CFG['ldap']['pass']);
		
		// Search for the user
		$res = ldap_search($ld, 'DC=unisource,DC=corp', 'sAMAccountName=' . trim($str));

		// Get entry point
		$entry = ldap_first_entry($ld, $res);

		if($entry === false)
		{
			return '';
		}
		else
		{
			// Get the display name information
			$email = ldap_get_values($ld, $entry, 'mail');
		
			// Assign the full name to the global UserFullName variable
			return $email[0];	
		}
	}
	
	public static function GetUAFromEmail($str)
	{
		global $CFG;
	
		// Connect and bind to the LDAP server
		$ld = ldap_connect($CFG['ldap']['host'], $CFG['ldap']['port']);
		ldap_bind($ld, $CFG['ldap']['user'], $CFG['ldap']['pass']);
		
		// Search for the user
		$res = ldap_search($ld, 'DC=unisource,DC=corp', 'mail=' . trim($str));

		// Get entry point
		$entry = ldap_first_entry($ld, $res);

		if($entry === false)
		{
			return '';
		}
		else
		{
			// Get the display name information
			$ua = ldap_get_values($ld, $entry, 'sAMAccountName');
		
			// Assign the full name to the global UserFullName variable
			return $ua[0];	
		}
	}	
	
	public static function GetUAFromName($str)
	{
		global $CFG;
	
		// Connect and bind to the LDAP server
		$ld = ldap_connect($CFG['ldap']['host'], $CFG['ldap']['port']);
		ldap_bind($ld, $CFG['ldap']['user'], $CFG['ldap']['pass']);
		
		// Search for the user
		$res = ldap_search($ld, 'DC=unisource,DC=corp', 'displayName=' . trim(str_replace(array('(', ')'), array('\(', '\)'), $str)));

		// Get entry point
		$entry = ldap_first_entry($ld, $res);

		if($entry === false)
		{
			return '';
		}
		else
		{
			// Get the display name information
			$ua = ldap_get_values($ld, $entry, 'sAMAccountName');
		
			// Assign the full name to the global UserFullName variable
			return $ua[0];	
		}
	}		
	
	/**
	 * Clean string so it can be output to the browser safely (strips HTML formatting)
	 *
	 * @param string $str
	 * @return string
	 */
	public static function strCleanOutput($str)
	{
		$str = stripslashes(htmlentities(html_entity_decode($str, ENT_COMPAT ,'UTF-8'), ENT_COMPAT ,'UTF-8'));
		return $str;
	}

	/**
	 * Clean string so it can be output to the browser safely (retains HTML formatting)
	 *
	 * @param string $str
	 * @return string
	 */
	public static function strCleanOutputHTML($str)
	{
		$str = stripslashes($str);
		return $str;
	}

	/**
	 * Generates a 20 character random unique ID
	 *
	 * @param sting
	 * @return string
	 */
	public static function GenerateID($type)
	{
		return strtoupper(substr($type . microtime(true) . md5(uniqid()), 0, 20));
	}

	public static function AccessDeniedMessage()
	{
		print '<div id="Error">You do not have sufficient permissions to access this page. If you feel this is an error, please contact the <a href="mailto:webmaster@uns.com">Webmaster</a></div>';
	}

	public static function HasApprovalAccess()
	{
		if(count(@$_SESSION['permissions']['APPROVE']) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public static function inGroup($user, $group)
	{
		global $CFG;
	
		// Connect and bind to the LDAP server
		$ld = ldap_connect($CFG['ldap']['host'], $CFG['ldap']['port']);
		ldap_bind($ld, $CFG['ldap']['user'], $CFG['ldap']['pass']);
		
		// Search for the user
		$res = ldap_search($ld, 'DC=unisource,DC=corp', 'sAMAccountName=' . trim($user));

		// Get entry point
		$entry = ldap_first_entry($ld, $res);

		if($entry === false)
		{
			return false;
		}
		else
		{
			// Get the member of information
			$memberof = ldap_get_values($ld, $entry, 'memberof');
		
			// Build a list of all groups this user is a member of
			$Groups = array();
			foreach($memberof as $k => $v)
			{
				if($k !== 'count')
				{
					$Groups[] = substr($v, 3, strpos($v, ',', 0) - 3);
				}
			}
		
			return in_array($group, $Groups);
		}	
	}

	public static function SendMail($to, $from, $subject, $body, $sendReadReceipt = false)
	{
		// Create a new CDONTS.NewMail COM object
		$CDONTS = new COM("CDO.Message");

		// Set which user is sending this message.
		$CDONTS->From = $from;
		// Set the address of who this mail is goign to
		$CDONTS->To = $to;
		// Set the subject of the message
		$CDONTS->Subject  = $subject;
		// Body of our message.
		$CDONTS->HTMLBody = $body;

		if($sendReadReceipt == true) {
			// Read Receipt Change
			$CDONTS->DSNOptions = 4;
			$CDONTS->Fields['urn:schemas:mailheader:disposition-notification-to'] = $from;
			$CDONTS->Fields['urn:schemas:mailheader:return-receipt-to'] = $from;
			$CDONTS->Fields->Update();
		}

		// Send the message
		$CDONTS->Send();
		// Unset the object to close it.
		unset($CDONTS);
	}

		
}



?>