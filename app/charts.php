<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';
/*
$stmt = $conn->prepare('SELECT browser, os, opened FROM campaign_emails_detail WHERE c_id = :cid');
$result = $stmt->execute(array('cid' => $_POST['cid']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetchAll();
*/

$stmt = $conn->prepare('SELECT opened, COUNT( * ) count FROM  `campaign_emails_detail` WHERE c_id = :cid GROUP BY opened');
$result = $stmt->execute(array('cid' => $_POST['cid']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetchAll();

echo json_encode(array(
	'error' => false,
	'emails' => $row
), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
?>