<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

try {
	include 'include/dbconnect.php';
	
	if($_GET['action'] == 'list'){
		$stmt = $conn->prepare('SELECT id, name, created FROM lists WHERE user_id = :user ORDER BY id DESC');
		$result = $stmt->execute(array('user' => $_SESSION['id']));
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		//Add all records to an array
		$rows = array();
		while($row = $stmt->fetch())
		{
			$stmtcount = $conn->prepare('SELECT COUNT(id) as Total FROM emails WHERE list_id = :listid');
			$resultcount = $stmtcount->execute(array('listid' => $row['id']));
			$rowcount = $stmtcount->fetch();
			
			$row['contacts'] = $rowcount['Total'];
			
		     $rows[] = $row;
		}
		
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['data'] = $rows;
		print json_encode($jTableResult);
	}
	else if ($_GET['action'] == 'create'){
		$stmt = $conn->prepare('INSERT INTO lists (user_id, name, created) VALUES (:id, :name, :created)');
		$result = $stmt->execute(array('id' => $_SESSION['id'], 'name' => $_POST['list'], 'created' => date('M d, Y g:i A')));
		$id = $conn->lastInsertId($result);
		if($result){
			// Update notifications
			$stmt = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
			$result = $stmt->execute(array('id' => $_SESSION['id'], 'notification' => "List <b>".$_POST['list']."</b> has been successfully created.", 'timestamp' => date('M d, Y g:i A')));
			
			
			//Return result to jTable
			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Id'] = $id;
			print json_encode($jTableResult);
		}
	}
	else if ($_GET['action'] == 'update'){
		$stmt = $conn->prepare('UPDATE lists SET name = :name WHERE id = :listid');
		$result = $stmt->execute(array('name' => $_POST['list'], 'listid' => $_POST['listid']));

		if($result){
			// Update notifications
			$stmt = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
			$result = $stmt->execute(array('id' => $_SESSION['id'], 'notification' => "List <b>".$_POST['list']."</b> has been successfully updated.", 'timestamp' => date('M d, Y g:i A')));
			
			//Return result to jTable
			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}
	}
	else if ($_GET['action'] == 'delete'){
		$stmt = $conn->prepare('DELETE FROM emails WHERE list_id = :listid');
		$result = $stmt->execute(array('listid' => $_POST['listid']));
		if($result){
			// Update notifications
			$stmt = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
			$result = $stmt->execute(array('id' => $_SESSION['id'], 'notification' => "List <b>".$_POST['list']."</b> has been successfully deleted.", 'timestamp' => date('M d, Y g:i A')));
			
			$stmt = $conn->prepare('DELETE FROM lists WHERE id = :listid');
			$result = $stmt->execute(array('listid' => $_POST['listid']));
	
			//Return result to jTable
			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
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