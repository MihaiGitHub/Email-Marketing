<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

try {
	include 'include/dbconnect.php';
	
	if($_GET['action'] == 'list'){
		$stmt = $conn->prepare('SELECT c.id, c.c_id, c.subject, c.sent, l.name FROM campaigns as c LEFT JOIN lists as l ON c.list_id = l.id WHERE c.user_id = :user ORDER BY sent DESC');
		$result = $stmt->execute(array('user' => $_SESSION['id']));
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
	else if ($_GET['action'] == 'delete'){
		$stmt = $conn->prepare('DELETE FROM campaign_emails WHERE c_id = :cid');
		$result = $stmt->execute(array('cid' => $_POST['cid']));
		
		if($result){
			$stmt1 = $conn->prepare('DELETE FROM campaign_emails_detail WHERE c_id = :cid');
			$result1 = $stmt1->execute(array('cid' => $_POST['cid']));
			
			if($result1){
		
				$stmt2 = $conn->prepare('DELETE FROM campaign_emails_links WHERE id = :cid');
				$result2 = $stmt2->execute(array('cid' => $_POST['cid']));
				
				if($result2){
					$stmt3 = $conn->prepare('DELETE FROM campaigns WHERE id = :id');
					$result3 = $stmt3->execute(array('id' => $_POST['cid']));
					
					//Return result to jTable
					$jTableResult = array();
					$jTableResult['Result'] = "OK";
					print json_encode($jTableResult);
				}
			}
		}
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