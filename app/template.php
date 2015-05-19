<?php
ob_start();
session_start();

include 'include/dbconnect.php';





// Store template id for loop
if(isset($_GET['id']))
	$_SESSION['templateid'] = $_GET['id'];
	
// Load the correct template
$tstmt = $conn->prepare('SELECT name FROM templates WHERE id = :id');
$tstmt->execute(array('id' => $_POST['id']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();

// Store all field values that have been completed into an array. Fields in template are named 1, 2, 3... in order from beg to end
$stmt = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
$result = $stmt->execute(array('userid' => $_SESSION['id'], 'templateid' => $_GET['id']));
while($row = $stmt->fetch()){
	$fields[$row['field']] = $row['value'];	
}

switch ($trow['name']){
	case 'Basic':
	//	include 'templates/Newsletter.php';
	break;
	case 'Basic-1-Column':

		$str = file_get_contents('templates/basic/1-column.php');
		echo json_encode($str);
		
	break;
	case 'Basic-1-2-Column':
	//	include 'templates/RealEstate.php';
	break;
	case 'Basic-1-1-2-Column':
	//	include 'templates/TechSimple.php';
	break;
	case 'Basic-1-1-3-Column':
	//	include 'templates/TechFull.php';
	break;
	
}


?>