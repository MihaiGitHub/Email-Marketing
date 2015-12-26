<?php
session_start();
header("Content-type: application/json");
include 'include/dbconnect.php';

// Store template id for loop
//if(isset($_GET['id']))
$_SESSION['templateid'] = $_POST['id'];
	
// Load the correct template
$tstmt = $conn->prepare('SELECT name, original_value, saved FROM templates WHERE id = :id');
$tstmt->execute(array('id' => $_POST['id']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();



if($trow['saved'] == 1){
	$stmt = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
	$result = $stmt->execute(array('userid' => $_SESSION['id'], 'templateid' => $_POST['id']));
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$row = $stmt->fetch();

	echo json_encode($row['value']);
} else {
	echo json_encode($trow['original_value']);
}
?>