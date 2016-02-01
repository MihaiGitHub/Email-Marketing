<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';
	
$stmt = $conn->prepare('UPDATE templates SET value = :html WHERE id = :tid');
$result = $stmt->execute(array('html' => $_POST['html'], 'tid' => $_POST['tid']));
?>