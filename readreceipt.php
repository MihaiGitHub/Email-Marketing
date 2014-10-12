<?php
ini_set('date.timezone', 'America/Phoenix');
include 'include/dbconnect.php';
$date = date('n/j/Y g:i A');

$location = file_get_contents('http://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']);
$data = json_decode($location);

$stmt = $conn->prepare('UPDATE campaign_emails SET opened = opened + 1, ip = :ip, country = :country, region = :region, timeopened = :timeopened WHERE id = :id');
$result = $stmt->execute(array('ip' => $_SERVER['REMOTE_ADDR'], 'country' => $data->country_name, 'region' => $data->region_name, 'timeopened' => $date, 'id' => $_GET['idce']));
?>