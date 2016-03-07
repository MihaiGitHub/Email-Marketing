<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

$id = $_SESSION['id'];

if(!is_dir("templates/$id")) {
	mkdir("templates/$id", 0777, true);
}

$path = "templates/$id/".uniqid().".html";
$file = fopen($path, "w") or die("Unable to open file!");
fwrite($file, $_POST['html']);
fclose($file);

$stmt = $conn->prepare('INSERT INTO templates (user_id, name, type, picture, value, path) VALUES (:userid, :name, :type, :picture, :value, :path)');
$result = $stmt->execute(array('userid' => $_POST['userId'], 'name' => $_POST['title'], 'type' => 'custom', 'picture' => 'basic.png', 'value' => $_POST['html'], 'path' => $path)) or die(print_r($stmt->errorInfo(), true));

if($result){
	// Update notifications
	$stmt3 = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
	$result3 = $stmt3->execute(array('id' => $_SESSION['id'], 'notification' => "Template <b>".$_POST['title']."</b> has been successfully created.", 'timestamp' => date('M d, Y g:i A')));
}
?>