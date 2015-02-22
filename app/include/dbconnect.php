<?php
$host = "xxxxxxxxxxxxxxxxx";
$dbname = "xxxxxxxxxx";
$user = "xxxxxxxxxxxx";
$pass = "xxxxxxxxx";

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
