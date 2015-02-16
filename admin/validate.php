<?php
// Use fsock or curl (depending on admin/config.php) to validate the IPN with PayPal
// Once validation is complete we'll have a boolean variabled $valid that we can use throughout the rest of the script.
if(!$curl_validation)
{
	// Validate with fsock
	if($ssl)   
	{   
	 $header = '';   
	 $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";   
	 $header .= "Host: " . $ppHost . ":443\r\n";   
	 $header .= "Content-Type: application/x-www-form-urlencoded\r\n";   
	 $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";   
	 $fp = fsockopen ('ssl://' . $ppHost, 443, $errno, $errstr, 30);   
	}   
	else  
	{   
	 $header = '';   
	 $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";   
	 $header .= "Host: " . $ppHost . ":80\r\n";   
	 $header .= "Content-Type: application/x-www-form-urlencoded\r\n";   
	 $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";   
	 $fp = fsockopen ($ppHost, 80, $errno, $errstr, 30);   
	}   
	
	if (!$fp)   
		$valid = false;
	else  
	{      
		fputs ($fp, $header . $req);   
		while(!feof($fp))   
		{   
			$res = fgets ($fp, 1024);    
			if(strcmp ($res, "VERIFIED") == 0)   
				$valid = true;   
			elseif (strcmp ($res, "INVALID") == 0)   
				$valid = false;   
		}   
		fclose ($fp);   
	}
}
else
{
	// Validate with curl
	$curl_result=$curl_err='';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$ppHost . '/cgi-bin/webscr');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "Content-Length: " . strlen($req)));
	curl_setopt($ch, CURLOPT_HEADER , 0);   
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $ssl);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);

	$curl_result = curl_exec($ch);
	$curl_err = curl_error($ch);
	curl_close($ch);
	
	//are we verified? If so, let's process the IPN
	if (strpos($curl_result, "VERIFIED")!==false) 
		$valid = true;
	else
		$valid = false;
}
?>