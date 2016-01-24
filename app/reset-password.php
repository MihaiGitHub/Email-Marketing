<?php
$error = 0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['id']) && isset($_POST['password'])){
		if($_POST['password'] == $_POST['pass-confirm']){
			include 'include/dbconnect.php';
		
			require_once('phpmailer/class.phpmailer.php');	
		
			$stmt = $conn->prepare('UPDATE users SET password = :password WHERE id = :id');
			$result = $stmt->execute(array('password' => md5($_POST['password']), 'id' => $_POST['id']));
			
			$stmt = $conn->prepare('SELECT id, fname, lname, username FROM users WHERE id = :id');
			$result = $stmt->execute(array('id' => $_POST['id']));
			$row = $stmt->fetch();
			
			$mail = new PHPMailer(true);
			$mail->SMTPDebug  = 2;
			$mail->SetFrom("mihai@msmarandache.com", "Mihai");
			$mail->AddReplyTo("mihai.sanfran@gmail.com");
			
			$mail->Subject = 'Your password has been reset';
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
			
			$patterns['fname'] = "/fname/";
			$patterns['uemail'] = "/uemail/";
	
			$replacements['fname'] = $row['fname'];
			$replacements['uemail'] = $row['username'];
			
			$body = file_get_contents('templates/password-changed.html');
			$body = preg_replace($patterns, $replacements, $body);
			
			$mail->MsgHTML($body);
			$mail->AddAddress($row['username'], $row['username']);

			if($mail->Send()){
				$mail -> ClearAddresses();
			}
		} else {
			$error = 1;
		}

	}
}
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
<script>
$(document).ready(function() {
	// For password field
	var elementPass = document.getElementById('password');
	
	var text_to_show = 'Enter Password (Required)';
	elementPass.type="text"; // set the type to text for the first time
	elementPass.value = text_to_show; // set the message for the first time
	elementPass.onfocus = function(){ 
		   if (this.value == text_to_show) {
			   this.type = "password";
			   this.value = '';
		   }
	}
	elementPass.onblur = function(){ 
		   if (this.value == '') {
			   this.type = "text";
			   this.value = text_to_show;
		   }
	}
	
	// For confirm password fields
	var elementPassConfirm = document.getElementById('pass-confirm');
	
	var text_to_show_confirm = 'Confirm Password (Required)';
	elementPassConfirm.type="text"; // set the type to text for the first time
	elementPassConfirm.value = text_to_show_confirm; // set the message for the first time
	elementPassConfirm.onfocus = function(){ 
		   if (this.value == text_to_show_confirm) {
			   this.type = "password";
			   this.value = '';
		   }
	}
	elementPassConfirm.onblur = function(){ 
		   if (this.value == '') {
			   this.type = "text";
			   this.value = text_to_show_confirm;
		   }
	}
});
</script>
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
			<li><a href="../register.html">Register</a></li>
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
		<h3 class="style pull-left">Reset Password</h3>
		<ol class="breadcrumb pull-right">
		  <li><a href="../index.html">Home</a></li>
		  <li class="active">Registered</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="main_btm1"><!-- start main_btm -->
<div class="container" style="height:500px;">
	<div class="main about span_of_3">
		<div class="contact_main">

<?php if($_SERVER['REQUEST_METHOD'] == 'GET'){ ?>

<div class="col-md-8">
	<div class="contact-form">
		<h2>Provide a new password for your account</h2>
		<form method="post" action="reset-password.php?id=<?php echo $_GET['id']; ?>" id="register">
			<input type="text" id="password" name="password" value="Password (Required)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}">
			<input type="text" id="pass-confirm" name="pass-confirm" value="Confirm Password (Required)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
			
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
		
			<span><input type="submit" value="Submit"></span>
		</form>
    </div>
</div>
<?php } else { 
	if($error == 0){ ?>
		<div class="col-md-8">
				<div class="contact-form">
					<h2>Your password has been reset</h2>
						
					<form method="post" action="index.php">
						<span><input type="submit" value="Login"></span>
					</form>
			    </div>
		</div>
	<?php } else { ?>
		<div class="col-md-8">	
			<div id="errorMsgFields" class="top_grid" style="border-radius:4px;"><!-- start top_grid -->
						<div class="col-md-10 span1_of_1" style="position:relative;top:-15px;">
								<h3>Passwords do not match</h3>
								<p>Please create a password and confirm it</p>
						</div>
						<br>
			</div>
		</div>
		<div class="col-md-8">
				<div class="contact-form">
					<h2>Provide a new password for your account</h2>
					<form method="post" action="reset-password.php?id=<?php echo $_GET['id']; ?>" id="register">
						<input type="text" id="password" name="password" value="Password (Required)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}">
						<input type="text" id="pass-confirm" name="pass-confirm" value="Confirm Password (Required)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
						
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
					
						<span><input type="submit" value="Submit"></span>
					</form>
			    </div>
		</div>
	<?php } ?>
<?php } ?>
  			<div class="clearfix" style="height:400px;"></div>	
		</div>
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