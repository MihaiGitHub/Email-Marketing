<?php
include 'app/include/dbconnect.php';

$stmt = $conn->prepare('INSERT INTO users (username, password, role, emails) VALUES (:username, :password, :role, :emails)');
$result = $stmt->execute(array('username' => $_POST['username'], 'password' => $_POST['password'], 'role' => 'buyer', 'emails' => 5));

if($result){
	echo json_encode('success');
}
?>