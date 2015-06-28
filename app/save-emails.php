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
			
			$stmt = $conn->prepare('UPDATE emails SET email = :email WHERE id = :emailid');
			$result = $stmt->execute(array('email' => $_POST['email'], 'emailid' => $_POST['emailid']));
			
		break;
		case 'delete':
			
			$stmt = $conn->prepare('DELETE FROM emails WHERE id = :emailid');
			$result = $stmt->execute(array('emailid' => $_POST['emailid']));
			
			
		break;
	}
}

?>