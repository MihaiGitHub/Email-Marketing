<?php
ob_start(); 
session_start();
$dashboard = true;

include 'include/dbconnect.php';

$stmt = $conn->prepare('SELECT notification, timestamp FROM notifications WHERE user_id = :userid ORDER BY timestamp DESC LIMIT 10');
$result = $stmt->execute(array('userid' => $_SESSION['id']));
?>
<!-- BEGIN PAGE -->
<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Dashboard
					<small> Main Menu </small>
				</h3>
				<ul class="breadcrumb">
					<li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
					<li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->

		<div id="page" class="dashboard">
		<!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
		<div class="row-fluid circle-state-overview">
			<a class="icon-btn span2" href="templates.php" style="width:150px;">
				  <i class="icon-envelope"></i>
				  <div style="text-decoration: none;">Email Campaign</div> 
			</a>
		</div>
		
		<div class="row-fluid">
			<!-- BEGIN CHAT PORTLET-->
			<div class="widget" id="chats">
			    <div class="widget-title">
					<h4><i class="icon-comments-alt"></i> Notifications</h4>
			    </div>
			    <div class="widget-body">
					<div class="timeline-messages">						 
				 
						<?php while($row = $stmt->fetch()){ ?>
						    
						    <div class="msg-time-chat">
							   <a class="message-img" href="#"><img alt="" src="img/avatar-mini.png" class="avatar"></a>
							   <div class="message-body msg-in">
								  <div class="text">
									 <p class="attribution"><a href="#"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> at <?php echo date_format(date_create($row['timestamp']), 'g:i a, d F Y'); ?></p>
									 <p><?php echo $row['notification']; ?></p>
								  </div>
							   </div>
						    </div>
						    
						<?php } ?>						 
					
					</div>
				</div>
			</div>
			<!-- END CHAT PORTLET-->
		</div>
		<!-- END OVERVIEW STATISTIC BLOCKS-->
			
		</div>
		<!-- END PAGE CONTENT-->
	</div>
	<!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
<?php		  
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>