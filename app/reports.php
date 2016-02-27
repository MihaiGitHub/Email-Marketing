<?php
ob_start();
session_start();
$reports = true;
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
			 Campaign List
		   </h3>
		    <ul class="breadcrumb">
			   <li><a href="dashboard.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
			   <li><a href="#">Campaigns</a><span class="divider-last">&nbsp;</span></li>
		    </ul>
		   <!-- END PAGE TITLE & BREADCRUMB-->
		</div>
	  </div>
	  <!-- END PAGE HEADER-->
	  <!-- BEGIN ADVANCED TABLE widget-->
	  <div class="row-fluid">
		 <div class="span12">
			<!-- BEGIN EXAMPLE TABLE widget-->
			<div class="widget">
			    <div class="widget-title">
				   <h4><i class="icon-reorder"></i>Campaign Lists</h4>
			    </div>
			    <div class="widget-body">
				   <div class="portlet-body">
				   	  <?php if(isset($_GET['sent'])){ ?>
						  <div class="alert alert-success">
								<button class="close" data-dismiss="alert">×</button>
								<strong>Success!</strong> Your email campaign has been created and sent successfully.
						  </div>
					  <?php } ?>
					  <table class="table-striped table-hover table-bordered dataTable no-footer jTable" id="campaigns-table">
						<thead>
						  <tr>
							 <th>Campaign Name</th>
							 <th>List</th>
							 <th>Sent</th>
							 <th></th>
						  </tr>
					   </thead>
					  </table>
				   </div>
			    </div>
			</div>
			<!-- END EXAMPLE TABLE widget-->
		 </div>
	  </div>
	  <!-- END ADVANCED TABLE widget-->
	  <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
 </div>
 <!-- END PAGE -->
<div id="delete-campaign-modal" class="modal" tabindex="-1" role="dialog">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Delete Campaign</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">Are you sure you want to delete this campaign?</label>
		   	<input type="hidden" id="delete-id" value="" />
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="delete-campaign-modal-close" class="btn-close close-modal">Close</button>
		<button id="delete-campaign-btn" class="btn-primary">Delete</button>
	</div>
</div>
<div class="ui-widget-overlay"></div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>
<script>App.setCampaignsPage(true);</script>