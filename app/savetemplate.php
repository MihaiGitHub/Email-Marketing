<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$stmt = $conn->prepare('UPDATE templates SET saved = 1 WHERE id = :tid');
$result = $stmt->execute(array('tid' => $_SESSION['templateid']));

$stmt = $conn->prepare('INSERT INTO template_fields (user_id, template_id, field, value) VALUES (:userid, :tid, "block1", :html) ON DUPLICATE KEY UPDATE value = :uhtml');
$result = $stmt->execute(array('userid' => $_SESSION['id'], 'tid' => $_SESSION['templateid'], 'html' => $_POST['html'], 'uhtml' => $_POST['html']));
?>