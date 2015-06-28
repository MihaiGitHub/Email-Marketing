<?php
session_start();

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	switch ($_POST['action']){
		case 'save':
			
			
			
			$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:id, :email)');
			$result = $stmt->execute(array('id' => $_SESSION['list'], 'email' => $_POST['email']));
			
			
			
			
		break;
		case 'update':
			/*
			$stmt = $conn->prepare('UPDATE lists SET name = :name WHERE id = :listid');
			$result = $stmt->execute(array('name' => $_POST['name'], 'listid' => $_POST['listid']));
			*/
		break;
		case 'delete':
			/*
			$stmt = $conn->prepare('DELETE FROM emails WHERE list_id = :listid');
			$result = $stmt->execute(array('listid' => $_POST['listid']));
			if($result){
				$stmt = $conn->prepare('DELETE FROM lists WHERE id = :listid');
				$result = $stmt->execute(array('listid' => $_POST['listid']));
			}
			*/
		break;
	}
}

?>