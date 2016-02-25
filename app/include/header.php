<?php
//date_default_timezone_set('America/New_York');
if(!$_SESSION['auth']){ 
	header('Location: index.php?authen=false');
	exit;
}
// Session timeout after 15 minutes
if((time() - $_SESSION['last_access']) > 5000){
	header('Location: index.php?timeout');
	exit;
} else {
	$_SESSION['last_access'] = time();
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
	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">

	<link href="css/style.css" rel="stylesheet" />
	<link href="css/style_responsive.css" rel="stylesheet" />
	<link href="css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
	
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
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
				   <img src="img/logo.png" alt="Logo">
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
                                		<span class="username"><?php echo htmlentities($_SESSION['fname'])." ".htmlentities($_SESSION['lname']); ?></span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="account.php"><i class="icon-user"></i> My Account</a></li>
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
				<li class="<?php if($dashboard) echo 'active'; ?>">
					<a href="dashboard.php" class="dashboard">
					    <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                        <span class="arrow"></span>
                    </a>
				</li>
				<li class="<?php if($lists) echo 'active'; ?>">
					<a href="lists.php" class="lists">
					    <span class="icon-box"> <i class="icon-list-alt"></i></span> Lists
					    <span class="arrow"></span>
					</a>
				</li>
				<li class="<?php if($reports) echo 'active'; ?>">
					<a href="reports.php" class="reports">
					<span class="icon-box"><i class="icon-bar-chart"></i></span> Reports
					<span class="arrow"></span>
					</a>
				</li>
                
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->