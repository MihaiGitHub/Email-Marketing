<?php
header( 'Content-Type: image/gif' );

include 'include/dbconnect.php';


// This will print user's real IP Address
// does't matter if user using proxy or not.
if (!empty($_SERVER["HTTP_CLIENT_IP"])){
	//check for ip from share internet
	$ip = $_SERVER["HTTP_CLIENT_IP"];
} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
	// Check for the Proxy User
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
	$ip = $_SERVER["REMOTE_ADDR"];
}

//$location = file_get_contents('http://freegeoip.net/json/'.$ip);
//$data = json_decode($location);



////////////////////////////////////////////////NEW
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
							'/trident/i'    =>  'Internet Explorer',
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();

//////////////////////
// Update parent email table with total opened count
$stmt = $conn->prepare('UPDATE campaign_emails SET opened = opened + 1, ip = :ip, country = :country, region = :region WHERE id = :id');
//$result = $stmt->execute(array('ip' => $_SERVER['REMOTE_ADDR'], 'country' => $data->country_name, 'region' => $data->region_name, 'id' => $_GET['id']));
$result = $stmt->execute(array('ip' => $_SERVER['REMOTE_ADDR'], 'country' => 'TEMP', 'region' => 'TEMP', 'id' => $_GET['id']));

// Insert a new record every time they reopen with more details about their environment
$stmt2 = $conn->prepare('INSERT INTO campaign_emails_detail (ce_id, browser, os) VALUES (:id, :browser, :os)');
$result2 = $stmt2->execute(array('id' => $_GET['id'], 'browser' => $user_browser, 'os' => $user_os));

////////////////////////////////////////////////////////////////////////
//define( 'THIS_ABSOLUTE_PATH', dirname( __FILE__ ) );
//echo 'here '.THIS_WEBSITE_URI;
    //Get the http URI to the image
 //   $graphic_http = THIS_WEBSITE_URI .'/blank.gif';
   $graphic_http = THIS_WEBSITE_URI.'/app/templates/images/blank.gif'; 
   
    //Get the filesize of the image for headers
   // $filesize = filesize( THIS_ABSOLUTE_PATH . '/blank.gif' );
//    $filesize = filesize( 'http://msmarandache.com/emarketing/app/templates/images/blank.gif' );
    
    //Now actually output the image requested, while disregarding if the database was affected
    header( 'Pragma: public' );
    header( 'Expires: 0' );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Cache-Control: private',false );
    header( 'Content-Disposition: attachment; filename="blank.gif"' );
    header( 'Content-Transfer-Encoding: binary' );
 //   header( 'Content-Length: '.$filesize );
    readfile( $graphic_http );
    
    exit;
	
?>