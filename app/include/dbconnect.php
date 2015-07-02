<?php
define( 'THIS_WEBSITE_URI', 'http://' . $_SERVER['HTTP_HOST'] . dirname( $_SERVER['REQUEST_URI'] ) );

$host = "msmarandache.com.mysql";
$dbname = "msmarandache_co";
$user = "msmarandache_co";
$pass = "wurus6Tw";
/* mihaismarandache.com 
$host = "db543846776.db.1and1.com";
$dbname = "db543846776";
$user = "dbo543846776";
$pass = "Dumbbell_007";
*/
/* servers free account 
$host = "mysql.serversfree.com";
$dbname = "u593037692_email";
$user = "u593037692_user";
$pass = "Dumbbell_007";
*/
/* mihai.sanfran@gmail.com 
$host = "mysql1.000webhost.com";
$dbname = "a4841711_emails";
$user = "a4841711_emailsu";
$pass = "Dumbbell_007";
*/
/* gustaffson account
$host = "mysql10.000webhost.com";
$dbname = "a2448210_emails";
$user = "a2448210_emailsu";
$pass = "Dumbbell_007";
*/
/* XAMPP DATABASE SERVER
$host = "localhost";
$dbname = "emails";
$user = "mihailiviu";
$pass = "Dumbbell_007";
*/
/* Mark Server 
$host = "localhost";
$dbname = "emarketing";
$user = "msmarandake";
$pass = "Romania";
*/
try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>
