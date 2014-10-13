<?php
ini_set('date.timezone', 'America/Phoenix');
include 'include/dbconnect.php';
$date = date('n/j/Y g:i A');

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

$location = file_get_contents('http://freegeoip.net/json/'.$ip);
$data = json_decode($location);

$stmt = $conn->prepare('UPDATE campaign_emails SET opened = opened + 1, ip = :ip, country = :country, region = :region, timeopened = :timeopened WHERE id = :id');
$result = $stmt->execute(array('ip' => $_SERVER['REMOTE_ADDR'], 'country' => $data->country_name, 'region' => $data->region_name, 'timeopened' => $date, 'id' => $_GET['idce']));
?>