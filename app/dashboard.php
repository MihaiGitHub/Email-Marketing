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
	     <div class="aalert aalert-success" role="alert">
      		<strong>Well done!</strong> You have successfully created an account. You now have <?php echo $_SESSION['emails']; ?> emails. <a href="#" class="aalert-link">Purchase more</a>.
		</div>

		<div class="new-emailcampaign-div">
			<a href="templates.php">
				<div class="new-emailcampaign"> 
					<img class="icon" src="images/email-icon.svg" role="presentation">
					<h2>New Email Campaign</h2> 
				</div>
			</a>
		</div>
<?php		  
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>