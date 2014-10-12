<?php
session_start();
if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}
include 'include/dbconnect.php';

$stmt = $conn->prepare('INSERT INTO template_fields (user_id, template_id, field, value) VALUES (:userid, :tid, :field, :value) ON DUPLICATE KEY UPDATE value = :uvalue');
$result = $stmt->execute(array('userid' => $_SESSION['id'], 'tid' => $_POST['templateid'], 'field' => $_POST['field'], 'value' => nl2br($_POST['text']), 'uvalue' => nl2br($_POST['text'])));

echo $_POST['text'];
?>