<?php
session_start();
ini_set('post_max_size', '5024M');
ini_set('upload_max_filesize', '5024M');
if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}
include 'include/dbconnect.php';

if(isset($_GET['field']) && $_GET['field'] != 'attachment'){
	
	$allowedExts = array('jpg', 'jpeg', 'gif', 'png', 'bmp', 'JPG', 'JPEG', 'GIF', 'PNG', 'BMP');
	$temp = explode(".", $_FILES['file']['name']);
	$extension = end($temp);
	
	if((in_array($extension, $allowedExts))){
		
	  if ($_FILES['file']['error'] > 0){
		    $message = 'Return Code' . $_FILES['file']['error'] . '<br/>';
       } else {
		  
		    // select old file and delete from server
		   	$stmt = $conn->prepare("SELECT value FROM template_fields WHERE user_id = :userid AND template_id = :templateid AND field = :field");
			$result = $stmt->execute(array('userid' => $_GET['userid'], 'templateid' => $_GET['templateid'], 'field' => $_GET['field']));
			$result = $stmt->execute();
			$row = $stmt->fetch();

			if($row['value'] != '')
				unlink('files/'.$row['value']);
				    
			$extension = array_pop(explode('.', $_FILES['file']['name']));
			$_FILES['file']['name'] = uniqid('I').'.'.$extension;
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], 'files/' . $_FILES['file']['name']))
				$file = true;
					    
		 
		    if($file){	
				$stmt = $conn->prepare("INSERT INTO template_fields (user_id, template_id, field, value) VALUES (:userid, :templateid, :field, :value) ON DUPLICATE KEY UPDATE value = :uvalue");
				$result = $stmt->execute(array('userid' => $_GET['userid'], 'templateid' => $_GET['templateid'], 'field' => $_GET['field'], 'value' => $_FILES['file']['name'], 'uvalue' => $_FILES['file']['name']));
				
				$result = $stmt->execute();	
		    }
	
	  }
	}
} else if (isset($_GET['field']) && $_GET['field'] == 'attachment'){
	$temp = explode(".", $_FILES['file']['name']);
	$extension = end($temp);
	
		
	  if ($_FILES['file']['error'] > 0){
		    $message = 'Return Code' . $_FILES['file']['error'] . '<br/>';
       } else {
		  
			$uuid = uniqid('A');
			$extension = array_pop(explode('.', $_FILES['file']['name']));
			$name = $uuid.'.'.$extension;
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], 'files/' . $name)){
				$file = true;
			} else { echo 'false';
				echo $_FILES['file']['error'];
			}
		 
		    if($file){	
		
			$stmt = $conn->prepare("INSERT INTO template_fields (user_id, template_id, field, value) VALUES (:userid, :templateid, :field, :value)");
			$result = $stmt->execute(array('userid' => $_GET['userid'], 'templateid' => $_GET['templateid'], 
										'field' => $name, 'value' => $_FILES['file']['name']));
			$result = $stmt->execute();
				
		    }
	  }
	
} else {

  $allowedExts = array('txt');
  $temp = explode('.', $_FILES['file']['name']);
  $extension = end($temp);

  if($_FILES['file']['type'] == 'text/plain' && in_array($extension, $allowedExts)){
 
		$file = fopen($_FILES['file']['tmp_name'],'r');
		if(!file){
			echo("ERROR:cant open file");
		} else { 
		
			$buff = fread ($file,filesize($_FILES['file']['tmp_name']));
			$emails = explode(';', $buff);
			
			foreach($emails as $email){
				
				if($email != ''){
					$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:listid, :email)');
					$result = $stmt->execute(array('listid' => $_GET['id'], 'email' => $email));
				}
			}	
		}
		echo 'success';
	}
}
?>