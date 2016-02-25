<?php
ob_start();
session_start();
include 'include/dbconnect.php';

$_SESSION['listid'] = $_GET['id'];
 
$stmt = $conn->prepare('SELECT name FROM lists WHERE id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetch();

$lists = true;
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
			 Emails
		   </h3>
		    <ul class="breadcrumb">
			   <li><a href="dashboard.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
			   <li><a href="lists.php">Lists</a> <span class="divider">&nbsp;</span></li>
			   <li><a href="#">Emails</a><span class="divider-last">&nbsp;</span></li>
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
				   <h4><i class="icon-reorder"></i><?php echo htmlentities($row['name']); ?></h4>
			    </div>
			    <div class="widget-body">
				   <div class="portlet-body">
				   	  <?php if(isset($_GET['upload'])){ ?>
						  <div class="alert alert-success">
								<button class="close" data-dismiss="alert">×</button>
								<strong>Success!</strong> Your file has been uploaded and saved successfully.
						  </div>
					  <?php } ?>
					  <div class="clearfix">
						 <div class="btn-group">
							<button class="btn" id="add-email" style="margin-right:5px;">
							    <i class="icon-plus"></i> Add New
							</button>
							
							<button  class="btn" id="import-contacts" style="margin-right:5px;border-radius:4px;">
							    <i class="icon-signin"></i> Import Contacts
							</button>
							<button class="btn" id="upload-file">
                                            <i class="icon-upload-alt"></i> Upload File
							</button>
						 </div>
					  </div>
					  <div class="space15"></div>
					  <table class="table-striped table-hover table-bordered dataTable no-footer jTable" id="emails-table">
						<thead>
						  <tr>
							 <th>Email Address</th>
							 <th>First Name</th>
							 <th>Last Name</th>
							 <th>Date Added</th>
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
	 
<form action="emails-upload.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">	 
	<div id="upload-file-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	
		<div class="modal-header">
			<button type="button" class="close close-modal">×</button>
			<h3>Upload File</h3>
		</div>
	
		<div class="modal-body">
			<div class="control-group">
				<div class="controls">
					<input type="file" name="fileToUpload" id="fileToUpload"/>
				</div>
			 </div>	
		</div>
	
		<div class="modal-footer">
			<button id="upload-file-close" type="button" class="btn-close close-modal">Close</button>
			<button id="" type="submit" class="btn-primary">Upload</button>
		</div>
		
	</div>	
</form>

<div id="import-contacts-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Select Email Client</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
			<select name="type" onChange="location = this.options[this.selectedIndex].value;" class="span6">
				<option></option>
				<option value="#">HotMail</option>
					<option value="https://accounts.google.com/o/oauth2/auth?client_id=35316327914-4sdoc4ihn46qcc0ihnnlp06p1u0dv52n.apps.googleusercontent.com&redirect_uri=http://msmarandache.com/emarketing/app/lists.php&scope=https://www.google.com/m8/feeds/&response_type=code&alt=json">GMail</option>
				 <option value="#">YaHoo</option>
		   	</select>
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="import-contacts-close" class="btn-primary">Close</button>
	</div>
</div>

<div id="add-email-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Create Email</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">Email Address</label>

		    <div class="controls">
			  <input id="add-email-address" type="email" class="span12" />
		    </div>
		 </div>
		 
		 <div class="control-group">
		    <label class="control-label">First Name (Optional)</label>

		    <div class="controls">
			  <input id="add-email-fname" type="text" class="span12" />
		    </div>
		 </div>
		 
		 <div class="control-group">
		    <label class="control-label">Last Name (Optional)</label>

		    <div class="controls">
			  <input id="add-email-lname" type="text" class="span12" />
		    </div>
		 </div>
	</div>

	<div class="modal-footer">
		<button id="add-email-modal-close" class="btn-close close-modal">Close</button>
		<button id="add-email-modal-save" class="btn-primary">Save</button>
	</div>
</div>

<div id="edit-email-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Edit Email</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">Email name</label>

		    <div class="controls">
			  <input id="edit-email-address" type="email" class="span12" />
			  <input id="email-id" type="hidden" value="" />
		    </div>
		 </div>
		 
		 <div class="control-group">
		    <label class="control-label">First Name (Optional)</label>

		    <div class="controls">
			  <input id="edit-email-fname" type="text" class="span12" />
		    </div>
		 </div>
		 
		 <div class="control-group">
		    <label class="control-label">Last Name (Optional)</label>

		    <div class="controls">
			  <input id="edit-email-lname" type="text" class="span12" />
		    </div>
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="edit-email-modal-close" class="btn-close close-modal">Close</button>
		<button id="edit-email-modal-save" class="btn-primary">Save</button>
	</div>
</div>
<div id="delete-email-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Delete Email</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">Are you sure you want to delete this email?</label>
		   	<input type="hidden" id="delete-id" value="" />
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="delete-email-modal-close" class="btn-close close-modal">Close</button>
		<button id="delete-email-btn" class="btn-primary">Delete</button>
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
<script>App.setEmailsPage(true);</script>