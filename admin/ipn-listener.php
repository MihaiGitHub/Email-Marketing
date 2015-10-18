<?php 
////////////////////////////////////////////////////////////   
// Angell EYE : PayPal IPN Template : 02.01.2009 //////////  
//////////////// angelleye.com  ////////////////////// 
/////////////////////////////////////////////////////////

require_once('admin/config.php');
require_once('../app/phpmailer/class.phpmailer.php');

require_once('includes/database.class.php');
require_once('includes/functions.php');

$mail = new PHPMailer();
$mail->SMTPDebug  = 2;                

$mail->SetFrom($email_from_address, $email_from_name);
$mail->AddReplyTo($email_from_address);				

// Configure new database object
$db = new Database($db_host, $db_username, $db_password, $db_database, $db_table_prefix);
$conn = $db -> connect();
  
// Read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';   
  
// Store each $_POST value in a NVP string: 1 string encoded and 1 string decoded   
$ipn_email = '';  
$ipn_data_array = array();

foreach ($_POST as $key => $value)   
{   
 $value = urlencode(stripslashes($value));   
 $req .= "&" . $key . "=" . $value;   
 $ipn_email .= $key . " = " . urldecode($value) . '<br />';  
 $ipn_data_array[$key] = urldecode($value);
}

// Store IPN data serialized for RAW data storage later
$ipn_serialized = serialize($ipn_data_array);
  
// Validate IPN with PayPal
require_once('validate.php');

// If there was a problem connecting to the database email site admin with the mysql error info and the raw IPN data.  Then exit.
$error_email_body = '';
if(count($db -> errors) > 0)
{	
	foreach($db -> errors as $error) 
		$error_email_body .= $error . '<br />';
		
	$mail -> Subject  =  'PayPal IPN : Connection to database failed!';
	$body =  $error_email_body . '<br /><br />' . $ipn_email;
	$mail->MsgHTML($body); 

	$mail -> AddAddress($admin_email_address, $admin_name);
	$mail -> Send();
	$mail -> ClearAddresses();
	
	exit();
}
  
// Load IPN data into PHP variables
require_once('parse-ipn-data.php');

// Store RAW IPN log in the DB
$ipn_log_data['ipn_data_serialized'] = $ipn_serialized;
$ipn_log_data_id = $db -> query_insert('raw_log', $ipn_log_data);

// Check for disputes/chargebacks/chargeback-reversals
if(
   strtoupper($txn_type) == 'NEW_CASE' || 
   strtoupper($payment_status) == 'REVERSED' || 
   strtoupper($payment_status) == 'CANCELED_REVERSAL' || 
   strtoupper($txn_type) == 'ADJUSTMENT'
   )
	require_once('dispute.php');
	
// Check if this was a refund.  
// Flag that it's a refund so you can skip entering a new order record in order.php
if(strtoupper($reason_code) == 'REFUND')
	require_once('refund.php');

// Check if this was a mass payment
if(strtoupper($txn_type) == 'MASSPAY')
	require_once('mass-payment.php');

// Check for subscription sign-up
if(
   strtoupper($txn_type) == 'SUBSCR_SIGNUP' || 
   strtoupper($txn_type) == 'SUBSCR_FAILED' || 
   strtoupper($txn_type) == 'SUBSCR_CANCEL' || 
   strtoupper($txn_type) == 'SUBSCR_EOT' || 
   strtoupper($txn_type) == 'SUBSCR_MODIFY'
   )
	require_once('subscr.php');

// Check for subscription payment
if(strtoupper($txn_type) == 'SUBSCR_PAYMENT')
	require_once('subscr-payment.php');
	
// Check for new recurring payment profile
if(
   strtoupper($txn_type) == 'RECURRING_PAYMENT_PROFILE_CREATED' || 
   strtoupper($txn_type) == 'RECURRING_PAYMENT_PROFILE_CANCEL' || 
   strtoupper($txn_type) == 'RECURRING_PAYMENT_PROFILE_MODIFY'
   )
	require_once('recurring-payment-profile.php');
	
// Check for recurring payment
if(
   strtoupper($txn_type) == 'RECURRING_PAYMENT' || 
   strtoupper($txn_type) == 'RECURRING_PAYMENT_SKIPPED' || 
   strtoupper($txn_type) == 'RECURRING_PAYMENT_FAILED' || 
   strtoupper($txn_type) == 'RECURRING_PAYMENT_SUSPENDED_DUE_TO_MAX_FAILED_PAYMENT'
   )
	require_once('recurring-payment.php');
	
// Any other type of IPN can be treated as a normal order
// Refunds come back with the same txn_type of the original payment so we skip order.php 
// for refunds because refund.php will take care of updating the existing record data
/*if(strtoupper($reason_code) != 'REFUND' && 
   (
	strtoupper($txn_type) == 'CART' || 
   	strtoupper($txn_type) == 'EXPRESS_CHECKOUT' || 
   	strtoupper($txn_type) == 'VIRTUAL_TERMINAL' || 
   	strtoupper($txn_type) == 'WEB_ACCEPT' || 
	strtoupper($txn_type) == 'SEND_MONEY'
	)
   ){ */
//   }
		
	
// Check for Adaptive Account creation
if($account_key != '')
	require_once('adaptive-accounts.php');

// If there were any errors adding data to the DB send an email to the site admin.
$error_email_body = '';
if(count($db -> errors) > 0)
{	
	foreach($db -> errors as $error) 
		$error_email_body .= $error . '<br />';
		
	$mail -> Subject  =  'PayPal IPN : Error(s) adding data to database.';
	$body = $error_email_body . '<br /><br />' . $ipn_email;
	$mail->MsgHTML($body); 

	$mail -> AddAddress($admin_email_address, $admin_name);
	$mail -> Send();
	$mail -> ClearAddresses();
}
else
{
	
	// Send buyer login details
	$patterns = array();
	$replacements = array();

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$password = substr( str_shuffle( $chars ), 0, 10 );
	$arr = explode(' ',trim($_POST['item_name']));
	
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////// Check to see if you need to Upgrade or Insert (Create user, duplicate default templates and insert user id in orders table)////////
include '../app/include/dbconnect.php';

$stmt1 = $conn->prepare('SELECT COUNT(id) AS count FROM users WHERE username = :username');
$result1 = $stmt1->execute(array('username' => $_POST['payer_email']));
$row1 = $stmt1->fetch();

if($row1['count'] > 0){

	$stmt2 = $conn->prepare('UPDATE users SET emails = emails + :emails WHERE username = :username');
	$result2 = $stmt2->execute(array('emails' => $arr[0], 'username' => $_POST['payer_email']));
	
	$stmt3 = $conn->prepare('SELECT id FROM users WHERE username = :username');
	$result3 = $stmt3->execute(array('username' => $_POST['payer_email']));
	$row3 = $stmt3->fetch();
	$id = $row3['id'];
	
	$mail->Subject = 'Update PayPal Purchase : Completed Successfully : '.$_POST['item_name'];
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
	
	$patterns['name'] = '/FNAME/';
	$patterns['payment'] = '/GROSS/';
	$patterns['currency'] = '/CURRENCY/';
	$patterns['username'] = '/USERNAME/';
	$patterns['password'] = '/PASSWORD/';
	$patterns['root'] = '/ROOT/';
	
	$replacements['name'] = $_POST['first_name'];
	$replacements['payment'] = $_POST['mc_gross'];
	$replacements['currency'] = $_POST['mc_currency'];
	$replacements['username'] = $_POST['payer_email'];
	$replacements['password'] = $password;
	$replacements['root'] = getenv('HTTP_HOST');
	
	$body = file_get_contents('../app/templates/confirmation.html');
	$body = preg_replace($patterns, $replacements, $body);

	$mail->MsgHTML($body); 
	$mail->AddAddress($_POST['payer_email'], $_POST['first_name']);

	$mail->Send();
	$mail -> ClearAddresses();

}
else {

$stmt4 = $conn->prepare('INSERT INTO users (username, password, role, emails) VALUES (:username, :password, :role, :emails)');
$result4 = $stmt4->execute(array('username' => $_POST['payer_email'], 'password' => md5($password), 'role' => 'buyer', 'emails' => $arr[0]));
$id = $conn->lastInsertId($result4);

if($result4){
	$stmt5 = $conn->prepare('SELECT name, type, picture, original_value FROM templates WHERE type = "basic" OR type = "theme"');
	$result5 = $stmt5->execute();
		
	while($row5 = $stmt5->fetch()){
		$stmt6 = $conn->prepare('INSERT INTO templates (user_id, name, type, picture, original_value) VALUES (:userid, :name, :type, :picture, :value)');
		$stmt6->execute(array('userid' => $id, 'name' => $row6['name'], 'type' => $row6['type'], 'picture' => $row6['picture'], 'value' => $row6['original_value']));
	}
	
	$mail->Subject = 'PayPal Purchase : Completed Successfully : '.$_POST['item_name'];
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
	
	$patterns['name'] = '/FNAME/';
	$patterns['payment'] = '/GROSS/';
	$patterns['currency'] = '/CURRENCY/';
	$patterns['username'] = '/USERNAME/';
	$patterns['password'] = '/PASSWORD/';
	$patterns['root'] = '/ROOT/';
	
	$replacements['name'] = $_POST['first_name'];
	$replacements['payment'] = $_POST['mc_gross'];
	$replacements['currency'] = $_POST['mc_currency'];
	$replacements['username'] = $_POST['payer_email'];
	$replacements['password'] = $password;
	$replacements['root'] = getenv('HTTP_HOST');
	
	$body = file_get_contents('../app/templates/confirmation.html');
	$body = preg_replace($patterns, $replacements, $body);

	$mail->MsgHTML($body); 
	$mail->AddAddress($_POST['payer_email'], $_POST['first_name']);

	$mail->Send();
	$mail -> ClearAddresses();
}

}

require_once('order.php');

}
	
$db -> close();
?>