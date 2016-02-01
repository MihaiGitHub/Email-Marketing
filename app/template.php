<?php
session_start();
header("Content-type: application/json");
include 'include/dbconnect.php';

$_SESSION['templateid'] = $_POST['id'];
	
// Load the correct template
$tstmt = $conn->prepare('SELECT value FROM templates WHERE id = :id');
$tstmt->execute(array('id' => $_POST['id']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();

echo json_encode($trow['value']);
?>