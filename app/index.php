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
if($_SESSION['auth'] == true){
	header('Location: dashboard.php');
	exit;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include 'include/dbconnect.php';

	$stmt = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
	$result = $stmt->execute(array('username' => $_POST['username']));
	while($row = $stmt->fetch()){
		if(md5($_POST['password']) == $row['password']){
			$_SESSION['id'] = $row['id'];
			$_SESSION['auth'] = true;
			$_SESSION['last_access'] = time();
			break;
		} else {
			$_SESSION['auth'] = false;
		}
	}
	if($_SESSION['auth']){
		header('Location: dashboard.php');
		exit;
	} else 
		$red = 'Invalid username or password.';	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Email Marketing</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <link rel="icon" type="image/png" href="images/email_favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
  
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Email</span> <span class="second">Marketing</span></a>
        </div>
    </div>   
    <div class="row-fluid">
	    <div class="dialog">
		   <div class="block">
			  <p class="block-heading">Sign In</p>
			  <div class="block-body">
				<?php if(isset($red)) echo "<div class='n_error'>$red</div>"; ?>
				<?php if(isset($green)) echo "<div class='n_success'>$green</div>"; ?>

				<form action="index.php" method="post">
					<label>Username</label>
					<input type="text" name="username" class="span12">
					<label>Password</label>
					<input type="password" name="password" class="span12">
					<button type="submit" class="btn btn-primary pull-right">Login</button>
					<label class="remember-me"><input type="checkbox"> Remember me</label>
					<div class="clearfix"></div>
				 </form>
			  </div>
		   </div>
	    </div>
	</div>
  </body>
</html>
<?php
$content = ob_get_contents();
ob_end_clean();
print $content;
?>