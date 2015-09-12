<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$stmt = $conn->prepare('SELECT country, region, city, browser FROM campaign_emails_detail WHERE c_id = :cid');
$result = $stmt->execute(array('cid' => $_POST['cid']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$browsers = $stmt->fetchAll();

$stmt = $conn->prepare('SELECT clicked, count( * ) count FROM campaign_emails_links WHERE c_id = :cid GROUP BY clicked');
$result = $stmt->execute(array('cid' => $_POST['cid']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$links = $stmt->fetchAll();

$stmt = $conn->prepare('SELECT country, region, city, COUNT( * ) count FROM campaign_emails_detail WHERE c_id = :cid GROUP BY country');
$result = $stmt->execute(array('cid' => $_POST['cid']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$countries = $stmt->fetchAll();

$stmt = $conn->prepare('SELECT opened, COUNT( * ) count FROM campaign_emails_detail WHERE c_id = :cid GROUP BY opened');
$result = $stmt->execute(array('cid' => $_POST['cid']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$timeframe = $stmt->fetchAll();

echo json_encode(array(
	'error' => false,
	'timeframe' => $timeframe,
	'browsers' => $browsers,
	'countries' => $countries,
	'links' => $links
), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
?>