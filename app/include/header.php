<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!$_SESSION['auth']){ 
	header('Location: index.php?authen=false');
	exit;
}
// Session timeout after 15 minutes
if((time() - $_SESSION['last_access']) > 900){
	header('Location: index.php?timeout');
	exit;
} else {
	$_SESSION['last_access'] = time();
}

include 'include/dbconnect.php';
// total emails for user
$stmt = $conn->prepare('SELECT COUNT(id) AS count FROM emails WHERE user = :user');
$result = $stmt->execute(array('user' => $_SESSION['id']));
$row = $stmt->fetch();
$totalcount = $row['count'];
// total emails sent for user
$stmt = $conn->prepare('SELECT COUNT(id) AS count FROM emails WHERE user = :user AND sent = 1');
$result = $stmt->execute(array('user' => $_SESSION['id']));
$row = $stmt->fetch();
$emailssent = $row['count'];
// total emails opened from the sent emails
$stmt = $conn->prepare('SELECT COUNT(id) AS count FROM emails WHERE user = :user AND opened = 1');
$result = $stmt->execute(array('user' => $_SESSION['id']));
$row = $stmt->fetch();
$emailsopened = $row['count'];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Bulk Mailer</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/style_responsive.css" rel="stylesheet" />
	<link href="css/style_default.css" rel="stylesheet" id="style_color" />

	<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="dashboard.php">
				   <span style="color: white;">Bulk Mailer</span>
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu">
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/avatar-mini.png" alt="">
                                <span class="username">Mihai Smarandache</span>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> My Profile</a></li>
								<li class="divider"></li>
								<li><a href="index.php?logout"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			<!-- BEGIN SIDEBAR MENU -->
			<ul class="sidebar-menu">
				<li class="has-sub active">
					<a href="dashboard.php" class="">
					    <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                        <span class="arrow"></span>
                    </a>
				</li>
				<li class="has-sub">
					<a href="lists.php" class="">
					    <span class="icon-box"> <i class="icon-list-alt"></i></span> Lists
					    <span class="arrow"></span>
					</a>
				</li>
				<li class="has-sub">
					<a href="reports.php" class="">
					<span class="icon-box"><i class="icon-bar-chart"></i></span> Reports
					<span class="arrow"></span>
					</a>
				</li>
                
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
