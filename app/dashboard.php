<?php 
ob_start(); 
session_start();
$dashboard = true;
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
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            
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
                    
					<a class="icon-btn span2" href="templates.php" style="border-radius: 4px;">
						  <i class="icon-envelope"></i>
						  <div style="text-decoration: none;">Email Campaign</div> 
					</a>
              
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