<?php
include 'include/dbconnect.php';

require_once('phpmailer/class.phpmailer.php');

// If registering from website
if(!isset($_GET['id'])){

$stmt = $conn->prepare('INSERT INTO users (fname, lname, username, password, role, emails, emails_per_month, timestamp) VALUES (:fname, :lname, :username, :password, :role, :emails, :emailspermonth, :timestamp)');
$result = $stmt->execute(array('fname' => $_POST['firstName'], 'lname' => $_POST['lastName'], 'username' => $_POST['email'], 'password' => md5($_POST['pass']), 'role' => 'buyer', 'emails' => 5, 'emailspermonth' => 500, 'timestamp' => date('Y-m-d H:i:s')));

	if($result){
		$id = $conn->lastInsertId($result);
		
		$mail = new PHPMailer();
		$mail->SMTPDebug  = 2;               
	
		// from email seems to matter if it the email on the domain where the email was sent from
		//$mail->From     = "mihai@msmarandache.com";
		//works, in this case have to keep the domain email address
		$mail->SetFrom("mihai@msmarandache.com", "Mihai");
		//$mail->SetFrom("mihai.sanfran@gmail.com", $_POST['fromName']);
		
		//$mail->SetFrom($_POST['fromEmail'], $_POST['fromName']);
		//$mail->SetFrom('mihai.sanfran@gmail.com', 'mihai smarandache');
		
	//	$mail->AddCustomHeader("x-email-check-id: Mihai");
	//	$mail->AddCustomHeader("Return-Path: mihai@msmarandache.com");
	
	//	$mail->AddAddress($rowcid['email']);
	
		$mail->AddReplyTo("mihai.sanfran@gmail.com");
		
		$mail->Subject = 'You have registered successfully';
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
		
		$patterns['id'] = "/idd/";

		$replacements['id'] = $id;
		
		$body = file_get_contents('templates/registration.html');
		$body = preg_replace($patterns, $replacements, $body);
	
		$mail->MsgHTML($body);
		$mail->AddAddress($_POST['email'], $_POST['email']);
	
		if($mail->Send()){
			$mail -> ClearAddresses();
	
			echo json_encode('success');
		}
		
	}
} // When validating email address
else {
	$stmt1 = $conn->prepare('UPDATE users SET validated = 1 WHERE id = :id');
	$result1 = $stmt1->execute(array('id' => $_GET['id']));
	
	$stmt2 = $conn->prepare('SELECT name, type, picture, original_value FROM templates WHERE user_id = 60 AND type != "custom"');
	$result2 = $stmt2->execute();
		
	while($row2 = $stmt2->fetch()){
		$stmt3 = $conn->prepare('INSERT INTO templates (user_id, name, type, picture, original_value) VALUES (:userid, :name, :type, :picture, :value)');
		$stmt3->execute(array('userid' => $_GET['id'], 'name' => $row2['name'], 'type' => $row2['type'], 'picture' => $row2['picture'], 'value' => $row2['original_value']));
	}
	
	// Update notifications	
	$stmt4 = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:userid, :notification, :date)');
	$result4 = $stmt4->execute(array('userid' => $_GET['id'], 'notification' => "You have successfully validated your account. You can now create a list and send email campaigns.", 'date' => date('Y-m-d H:i:s')));
	
	$stmt4 = $conn->prepare('INSERT INTO orders (user_id, mc_gross, item_name) VALUES (:userid, :mcgross, :itemname)');
	$result4 = $stmt4->execute(array('userid' => $_GET['id'], 'mcgross' => "Free Plan", 'itemname' => "500 email credits per month"));
	///////////////////////

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Email Marketing</title>
<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/blue.css" rel="stylesheet" type="text/css" media="all" />
<!----font-Awesome----->
<link rel="stylesheet" href="../fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!-- start plugins -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/menu.js" type="text/javascript"></script>
</head>
<body>
<div class="header_bg">
<div class="container">
	<div class="header">
		<div class="logo">
			<a href="index.html"><img src="../images/logo.png" alt=""/></a>
		</div>
		<div class="h_menu">
		<a id="touch-menu" class="mobile-menu" href="#">Menu</a>
		<nav>
		<ul class="menu list-unstyled">
			<li><a href="../index.html">Home</a></li>
			<li><a href="../feature.html">Features</a></li>
			<li><a href="#">Pricing</a></li>
			<li class="activate"><a href="../register.html">Register</a></li>
			<li><a href="index.php" target="_blank">Login</a></li>
			<li><a href="../contact.html">Contact</a></li>
		</ul>
		</nav>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="main_bg"><!-- start main -->
<div class="container">
	<div class="main_grid1">
		<h3 class="style pull-left">our modus</h3>
		<ol class="breadcrumb pull-right">
		  <li><a href="../index.html">Home</a></li>
		  <li class="active">registered</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="main_btm1"><!-- start main_btm -->
<div class="container" style="height:500px;">
		<div class="details">
			<h2>Thank you for validating your email address</h2>
			
			<p class="para">You will now be able to access the email marketing platform.</p><br><br><br><br><br><br><br>
			<a href="index.php" class="btn">Login</a>
		</div>
</div>
</div>
<div class="footer_bg"><!-- start footer -->
<div class="container">
	<div class="footer">
	
		<div class="col-md-12 footer1_of_3">
			<div class="f_logo">
				<a href="../index.html"><img src="../images/logo.png" alt=""/></a>
			</div>		
			<p class="f_para">TEMPLAR IT provides Information Technology services to residential and business customers offering affordable and reliable quality of service with emphasis on creativity.  Our concept is to utilize current technology and implement customized solutions specific to client needs and knowledge.​ As a result, we deliver wide range of IT services and products for small and medium size environments including server-desktop virtualization and cloud solutions.</p>
			<p>Phone:&nbsp;<span>+1 602 291 9251</span>
			<span style="float:right;">Email:&nbsp;<a href="#">mihai.sanfran@gmail.com</a></span></p>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="footer1_bg"><!-- start footer1 -->
<div class="container">
	<div class="footer1">
		<div class="copy pull-left">
			<p class="link"><span>&#169; All rights reserved </span></p>
		</div>
		<div class="soc_icons pull-right">
			<ul class="list-unstyled text-center">
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
</body>
</html>
<?php
}
?>