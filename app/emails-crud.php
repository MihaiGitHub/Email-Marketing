<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

try {
	include 'include/dbconnect.php';
	
	if($_GET['action'] == 'list'){
		$stmt = $conn->prepare('SELECT id, email, fname, lname, date_added FROM emails WHERE list_id = :listid ORDER BY id DESC');
		$result = $stmt->execute(array('listid' => $_SESSION['listid']));
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
	else if ($_GET['action'] == 'create'){
		$stmt = $conn->prepare('INSERT INTO emails (list_id, email, fname, lname, source, date_added) VALUES (:listid, :email, :fname, :lname, :source, :date)');
		$result = $stmt->execute(array('listid' => $_SESSION['listid'], 'email' => $_POST['email'], 'fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'source' => 'Manual Add', 'date' => date('M d, Y g:i A')));
		$id = $conn->lastInsertId($result);
		
		if($result){			
			//Return result to jTable
			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Id'] = $id;
			print json_encode($jTableResult);
		}
	}
	else if ($_GET['action'] == 'update'){
		$stmt = $conn->prepare('UPDATE emails SET email = :email, fname = :fname, lname = :lname WHERE id = :id');
		$result = $stmt->execute(array('email' => $_POST['email'], 'fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'id' => $_POST['id']));

		if($result){			
			//Return result to jTable
			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}
	}
	else if ($_GET['action'] == 'delete'){
		$stmt = $conn->prepare('DELETE FROM emails WHERE id = :id');
		$result = $stmt->execute(array('id' => $_POST['id']));
		
		if($result){	
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