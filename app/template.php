<?php
session_start();

include 'include/dbconnect.php';

// Store template id for loop
//if(isset($_GET['id']))
$_SESSION['templateid'] = $_POST['id'];
	
// Load the correct template
$tstmt = $conn->prepare('SELECT name, saved FROM templates WHERE id = :id');
$tstmt->execute(array('id' => $_POST['id']));
$tstmt->setFetchMode(PDO::FETCH_ASSOC);
$trow = $tstmt->fetch();

// Store all field values that have been completed into an array. Fields in template are named 1, 2, 3... in order from beg to end
$stmt = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
$result = $stmt->execute(array('userid' => $_SESSION['id'], 'templateid' => $_POST['id']));


switch ($trow['name']){
	case 'Basic':
	/*
				if($trow['saved'] == 1){
						$str = file_get_contents('templates/basic/1-column.html');
				
						while($row = $stmt->fetch()){
															
								$str = str_replace('%'.$row['field'].'%', $row['value'], $str);
						}
				
						echo json_encode($str);
				} else {
					
						$str = file_get_contents('templates/basic/1-column.php');
						echo json_encode($str);
				}
				*/
	break;
	case 'Basic-1-Column':

		if($trow['saved'] == 1){
				$str = file_get_contents('templates/basic/1-column.html');
		
		
				while($row = $stmt->fetch()){
					
					//	$fields[$row['field']] = $row['value'];	
						
						$str = str_replace('%'.$row['field'].'%', $row['value'], $str);

				}


		
				echo json_encode($str);
		} else {
			
				$str = file_get_contents('templates/basic/1-column.php');
				echo json_encode($str);
		}
		
	break;
	case 'Basic-1-2-Column':
				if($trow['saved'] == 1){
						$str = file_get_contents('templates/basic/1-2-column.html');
				
						while($row = $stmt->fetch()){
															
								$str = str_replace('%'.$row['field'].'%', $row['value'], $str);
						}
				
						echo json_encode($str);
				} else {
					
						$str = file_get_contents('templates/basic/1-2-column.php');
						echo json_encode($str);
				}
	break;
	case 'Basic-1-1-2-Column':
				if($trow['saved'] == 1){
						$str = file_get_contents('templates/basic/1-1-2-column.html');
				
						while($row = $stmt->fetch()){
															
								$str = str_replace('%'.$row['field'].'%', $row['value'], $str);
						}
				
						echo json_encode($str);
				} else {
					
						$str = file_get_contents('templates/basic/1-1-2-column.php');
						echo json_encode($str);
				}
	break;
	case 'Basic-1-1-3-Column':
				if($trow['saved'] == 1){
						$str = file_get_contents('templates/basic/1-1-3-column.html');
				
						while($row = $stmt->fetch()){
															
								$str = str_replace('%'.$row['field'].'%', $row['value'], $str);
						}
				
						echo json_encode($str);
				} else {
					
						$str = file_get_contents('templates/basic/1-1-3-column.php');
						echo json_encode($str);
				}
	break;
	
}
?>