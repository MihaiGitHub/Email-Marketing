<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$stmt = $conn->prepare('INSERT INTO templates (user_id, name, type, picture) VALUES (:userid, :name, :type, :picture)');
$result = $stmt->execute(array('userid' => $_POST['userId'], 'name' => $_POST['title'], 'type' => 'custom', 'picture' => 'basic.png'));

if($result){
	$stmt2 = $conn->prepare('INSERT INTO template_fields (user_id, template_id, field, value) VALUES (:userid, :tid, :field, :value)');
	$result2 = $stmt2->execute(array('userid' => $_POST['userId'], 'tid' => $conn->lastInsertId($result), 'field' => 'block1', 'value' => $_POST['html']));
}
?>