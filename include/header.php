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

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

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
                    <li id="fat-menu" class="dropdown">
                        <a href="index.php?logout" role="button" class="dropdown-toggle">
                            <i class="icon-user"></i> Log Out
                        </a>
                    </li>                   
                </ul>
                <a class="brand" href="index.html"><span class="first">Email</span> <span class="second">Marketing</span></a>
        </div>
    </div>
    <div class="sidebar-nav">
        <a href="dashboard.php" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="dashboard.php">Home</a></li>
          <!--  <li ><a href="create.php">Create</a></li> -->
            <li><a href="lists.php">Lists</a></li>
            <li><a href="reports.php">Reports</a></li>        
        </ul>
    </div>
    <div class="content">    