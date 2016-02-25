<?php
ob_start();
session_start();
include 'include/dbconnect.php';

$_SESSION['listid'] = $_GET['id'];

if (!empty($_FILES)) {
	
	$allowedExts = array('txt', 'csv');
	$temp = explode('.', $_FILES['fileToUpload']['name']);
	$extension = end($temp);
	
	 if($_FILES['fileToUpload']['type'] == 'text/plain' && in_array($extension, $allowedExts)){
 
		$file = fopen($_FILES['fileToUpload']['tmp_name'],'r');
		if(!file){
			echo("ERROR:cant open file");
		} else { 
		
			$buff = fread ($file,filesize($_FILES['fileToUpload']['tmp_name']));
			$emails = explode(';', $buff);
	
	
			$regex = '/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i';

	
			foreach($emails as $email){ 
				if (preg_match($regex, $email)) {
				  		$stmt = $conn->prepare('INSERT INTO emails (list_id, email, source, date_added) VALUES (:listid, :email, :source, :date)');
						$result = $stmt->execute(array('listid' => $_GET['id'], 'email' => $email, 'source' => 'Text file upload', 'date' => date('M n, Y g:i A')));
				}
			}
			
			header('Location: emails.php?id='.$_GET['id'].'&upload=true');
			exit;
			
		}
	
	} else if($_FILES['fileToUpload']['type'] == 'application/vnd.ms-excel' && in_array($extension, $allowedExts)) {
		$target_dir = "emailsupload/";
		$target_file = $target_dir . basename(uniqid().'-'.$_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
	}
}

if(isset($_POST['csvfilepath'])){
		
		$arr = [];
		foreach($_POST as $key => $value){
			if(is_numeric($key) && !empty($value)){
				switch($value){
					case 'email':
						$arr['email'] = $key;
					break;
					case 'fname':
						$arr['fname'] = $key;
					break;
					case 'lname':
						$arr['lname'] = $key;
					break;
				}
			}
		}
	
		$regex = '/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i';

		$tmpName = $_FILES['fileToUpload']['tmp_name'];
		$records = array_map('str_getcsv', file($_POST['csvfilepath']));
		
		foreach($records as $record){			
			if(preg_match($regex, $record[$arr['email']])) {
				$stmt = $conn->prepare('INSERT INTO emails (list_id, email, fname, lname, source, date_added) VALUES (:listid, :email, :fname, :lname, :source, :date)');
				$result = $stmt->execute(array('listid' => $_GET['id'], 'email' => $record[$arr['email']], 'fname' => $record[$arr['fname']], 'lname' => $record[$arr['lname']], 'source' => 'CSV file upload', 'date' => date('M n, Y g:i A')));
			}				
		}
		
		if(unlink($_POST['csvfilepath'])){
			header('Location: emails.php?id='.$_GET['id'].'&upload=true');
			exit;
		}
}

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
			 File Upload                     
		   </h3>
		    <ul class="breadcrumb">
			   <li><a href="dashboard.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
			   <li><a href="lists.php">Lists</a> <span class="divider">&nbsp;</span></li>
			   <li><a href="emails.php?id=<?php echo $_GET['id']; ?>">Emails</a><span class="divider">&nbsp;</span></li>
			   <li><a href="#">File Upload</a><span class="divider-last">&nbsp;</span></li>
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
				   <h4><i class="icon-reorder"></i>Upload CSV File</h4>
			    </div>
			    <div class="widget-body">
				   <div class="portlet-body" style="overflow:auto;">
				   		
					<div class="alert">
							<button class="close" data-dismiss="alert">×</button>
							<strong>Warning!</strong> Your file has multiple columns. Please identify the correct columns using the dropdowns.
					</div>	
						
					<form method="post" action="emails-upload.php?id=<?php echo $_GET['id']; ?>">					
						  <div class="clearfix">
							 <div class="btn-group">							
								<button class="btn" id="" type="submit">
									    <i class="icon-save"></i> Save
								</button>
							 </div>
						  </div>
						  
						  <br>
								
					  <div class="space15"></div>
						<input type="hidden" name="csvfilepath" value="<?php echo $target_file; ?>" />
							<table class="table-striped table-hover table-bordered dataTable no-footer jTable" style="font-size:12px;">
							<?php
							if (!empty($_FILES)) {
								
								  $allowedExts = array('txt', 'csv');
								  $temp = explode('.', $_FILES['fileToUpload']['name']);
								  $extension = end($temp);
								  
								if($_FILES['fileToUpload']['type'] == 'application/vnd.ms-excel' && in_array($extension, $allowedExts)) {
									
										$tmpName = $_FILES['fileToUpload']['tmp_name'];
										$records = array_map('str_getcsv', file($target_file));
										$count = 0;
										$column_num = 0;
										
										foreach($records as $record){
											
											echo '<thead><tr>';			
											foreach($record as $column){
												
												echo '<th style="width:200px;"><select name="'.$column_num.'" class="span12 area_select"><option value=""></option><option value="email">Email</option><option value="fname">First Name</option><option value="lname">Last Name</option></select></th>';
												$column_num++;
											}
											echo '</tr></thead>';
											break;
										}
										
										foreach($records as $record){
											
											echo '<tbody><tr>';
												
											foreach($record as $column){
													echo '<td style="width:200px;">'.htmlentities($column).'</td>';
											}
											
											echo '</tr></tbody>';
											$count++;
											
											if($count > 5){
												break;
											}
												
										}
								}
							}
							?>
							</table>				  
						</form>					  
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
	 	 
<form action="emails.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">	 
	<div id="upload-file-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	
		<div class="modal-header">
			<button type="button" class="close close-modal" aria-hidden="true">×</button>
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
			<button id="upload-file-close" class="btn-close close-modal">Close</button>
			<button id="" type="submit" class="btn-primary">Upload</button>
		</div>
		
	</div>	
</form>	 
	 
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
<script>App.setEmailsUploadPage(true);</script>