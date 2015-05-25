<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$tid = $_POST['template_id'];

$stmt = $conn->prepare('UPDATE templates SET saved = 1 WHERE id = :tid');
$result = $stmt->execute(array('tid' => $tid));

foreach($_POST as $key => $value){
	
	if($key != 'template_id'){
		$stmt = $conn->prepare('INSERT INTO template_fields (user_id, template_id, field, value) VALUES (:userid, :tid, :field, :value) ON DUPLICATE KEY UPDATE value = :uvalue');
		$result = $stmt->execute(array('userid' => $_SESSION['id'], 'tid' => $tid, 'field' => $key, 'value' => $value, 'uvalue' => $value));
	}

}
?>