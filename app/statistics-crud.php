<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

try {
	include 'include/dbconnect.php';
	
	if($_GET['action'] == 'uniqueopens'){
		$stmt = $conn->prepare('SELECT email, opened, bounced, bounced_date, error_code, unsubscribed, unsubscribed_date FROM `campaign_emails` WHERE c_id = :cid');
		$result = $stmt->execute(array('cid' => $_POST['cid']));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		//Add all records to an array
		$uniqueopens = array();
		$unsubscribes = array();
		$bounces = array();
		while($row = $stmt->fetch())
		{
			if($row['opened'] != 0){
					$uniqueopens[] = $row;
			}
			if($row['unsubscribed'] == 1){
					$unsubscribes[] = $row;
			}
			if($row['bounced'] == 1){
					$bounces[] = $row;
			}	
		}
		
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['uniqueopens'] = $uniqueopens;
		$jTableResult['unsubscribes'] = $unsubscribes;
		$jTableResult['bounces'] = $bounces;
		print json_encode($jTableResult);
	}
	else if ($_GET['action'] == 'linkclicks'){
		$stmt = $conn->prepare('SELECT link, count( * ) count FROM  `campaign_emails_links` WHERE c_id = :cid GROUP BY link');
		$result = $stmt->execute(array('cid' => $_GET['cid']));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		//Add all records to an array
		$rows = array();
		while($row = $stmt->fetch())
		{			
		     $rows[] = $row;
		}
		
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['data'] = $rows;
		print json_encode($jTableResult);
	}
}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
?>