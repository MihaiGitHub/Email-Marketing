<?php
ob_start();
session_start();

if(array_key_exists('timeout', $_GET)){
	session_unset();
	$red = 'You have been logged out due to inactivity.';
}
if(array_key_exists('logout', $_GET)){
	session_unset();
	$green = 'You have been logged out successfully.';
}
if($_SESSION['auth'] === true){
	header('Location: dashboard.php');
	exit;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include 'include/dbconnect.php';

	$stmt = $conn->prepare('SELECT id, fname, lname, username, password, role, emails, emails_per_month, validated FROM users WHERE username = :username');
	$result = $stmt->execute(array('username' => $_POST['username']));
	while($row = $stmt->fetch()){
		if(md5(trim($_POST['password'])) == $row['password']){
			if($row['validated'] == 1){
				$_SESSION['id'] = $row['id'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['emails'] = $row['emails'];
				$_SESSION['emails_per_month'] = $row['emails_per_month'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['auth'] = true;
				$_SESSION['last_access'] = time();
				break;
			}
			else {
				$red = "This email has not been validated";	
			}
		} else {
			$_SESSION['auth'] = false;
			$red = "Invalid username or password";
		}
	}
	if($_SESSION['auth']){
		header('Location: dashboard.php');
		exit;
	}	
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Email Marketer</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/style_responsive.css" rel="stylesheet" />
  <link href="css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          <img src="img/logo.png" alt="logo" class="center" />
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" action="index.php" method="post">
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
		
		<div id="message-box">
			<?php if(isset($red)) echo "$red"; ?>
			<?php if(isset($green)) echo "$green"; ?>
		</div>

          <h4>User Login</h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span><input name="username" id="input-username" type="text" placeholder="Username" />
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-key"></i></span><input name="password" id="input-password" type="password" placeholder="Password" />
                  </div>
                  <div class="mtop10">
                      <div class="block-hint pull-left small">
                          <input type="checkbox" id=""> Remember Me
                      </div>
                      <div class="block-hint pull-right">
                          <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                      </div>
                  </div>

                  <div class="clearfix space5"></div>
              </div>

          </div>
      </div>

      <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide1" action="#">
      <p id="forgot-pass-text" class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      &copy; 2015 Designed and developed by TemplarIT
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>