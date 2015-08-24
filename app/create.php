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
							Template Builder
							<small> Create custom template </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            
							<li><a href="#">Builder</a><span class="divider-last">&nbsp;</span></li>
                            
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
                    <!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
                    <div class="row-fluid" style="height:1000px;">
                    
                        <div class="span12">
                        <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-columns"></i>Template Design</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="portlet-body" style="height:900px;">
                                       <iframe id="iframe" frameBorder="0" src="http://msmarandache.com/emarketing/app/assets/template-builder/digith_template_builder/index.php" style="height:100%;width:100%;"></iframe>
                                       <input type="hidden" id="user-id" value="<?php echo $_SESSION['id']; ?>" />
                                    </div>
                                </div>
                            </div>
                        <!-- END EXAMPLE TABLE widget-->
                        </div>

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
<script>App.setTemplateBuilderPage(true);</script>