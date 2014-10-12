<?php
ob_start();
session_start();
?>
<div class="header">
    <h1 class="page-title">Dashboard</h1>
</div>
<ul class="breadcrumb">
	<li><a href="#">Home</a> <span class="divider">/</span></li>
	<li class="active">Dashboard</li>
</ul>
<div class="container-fluid">
    <div class="row-fluid">		  
		<a href="templates.php"><img src="images/email-icon.jpg" style="height:150px;width:150px;" /></a><br/>New Email Campaign
<?php		  
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>