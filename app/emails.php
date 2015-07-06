<?php
ob_start();
session_start();
include 'include/dbconnect.php';

$_SESSION['list'] = $_GET['id'];

 
if (!empty($_FILES)) { 
     
  $allowedExts = array('txt');
  $temp = explode('.', $_FILES['file']['name']);
  $extension = end($temp);

  if($_FILES['file']['type'] == 'text/plain' && in_array($extension, $allowedExts)){
 
		$file = fopen($_FILES['file']['tmp_name'],'r');
		if(!file){
			echo("ERROR:cant open file");
		} else { 
		
			$buff = fread ($file,filesize($_FILES['file']['tmp_name']));
			$emails = explode(';', $buff);
	
			foreach($emails as $email){ 
				
				if($email != ''){ echo 'list id '.$_POST['listid'].'<br/>'.$email;
					$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:listid, :email)');
					$result = $stmt->execute(array('listid' => $_POST['listid'], 'email' => $email));
				}
			}	
		}
	
	}
	
	
	/*
	$tempFile = $_FILES['file']['tmp_name'];            
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
     
    $targetFile =  $targetPath. $_FILES['file']['name'];
 
    move_uploaded_file($tempFile,$targetFile);
	
     */
}









if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	print_r($_FILES);
	exit;
	
	
	switch ($_POST['submitbtn']){	
		case 'saveemail':
			$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:listid, :email)');
			$result = $stmt->execute(array('listid' => $_GET['id'], 'email' => $_POST['email']));
		break;
		case 'deleteID':
			$stmt = $conn->prepare('DELETE FROM emails WHERE id = :id');
			$result = $stmt->execute(array('id' => $_POST['deleteID']));
		break;
	}
}

$i = 1;
$stmt = $conn->prepare('SELECT id, email, date_added FROM emails WHERE list_id = :listid');
$result = $stmt->execute(array('listid' => $_GET['id']));
?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
	     <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

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
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a href="#">Lists</a> <span class="divider">&nbsp;</span>
                       </li>
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
                            <h4><i class="icon-reorder"></i>Emails</h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div id="emails-div" class="btn-group">
                                        <button id="email-add" class="btn green">
                                            Add New <i class="icon-plus"></i>
                                        </button>&nbsp;
										<button class="btn green uploadcsv">
                                            Upload CSV <i class="icon-plus"></i>
                                        </button>&nbsp;
										<button  class="btn green importcontacts">
                                            Import Contacts <i class="icon-plus"></i>
                                        </button>&nbsp;
										<button id="sample_editable_1_new" class="btn green">
                                            Download CSV <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                   
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="emails-list">
                                    <thead>
                                    <tr>
                                        <th>Email Address</th>
										<th>Date Added</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
<?php while($row = $stmt->fetch()){ 			
				
echo "<tr id=".$row['id']."><td>".htmlentities($row['email'])."</td><td>".htmlentities($row['date_added'])."</td><td><a class='edit' href='javascript:;'>Edit</a></td><td><a class='delete' href='javascript:;'>Delete</a></td></tr>";
					
					
						$i++;
} 
		if($i == 1) echo '<tr><td>&nbsp;</td><td>There are no emails to display</td><td>&nbsp;</td><td>&nbsp;</td></tr>'; ?>                                   

                                    </tbody>
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
<style>
.progress-label {
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
}
</style>
<div id="import-contacts-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="false" style="width:560px !important;display:block;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel1">Select Email Provider</h3>
	</div>
	<div class="modal-body">
		<select name="type" onChange="location = this.options[this.selectedIndex].value;" class="span6">
        		<option></option>
        		<option>HotMail</option>
				<option value="https://accounts.google.com/o/oauth2/auth?client_id=35316327914-4sdoc4ihn46qcc0ihnnlp06p1u0dv52n.apps.googleusercontent.com&redirect_uri=http://msmarandache.com/emarketing/app/lists.php&scope=https://www.google.com/m8/feeds/&response_type=code">GMail</option>
                <option>YaHoo</option>
        </select>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary email-modal-close" data-dismiss="modal">Close</button>
	</div>
</div>
<!------ UPLOAD FILE --------------->
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

<style>
.dropzone {
  border: 2px dashed #0087F7;
  border-radius: 5px;
  background: white;
  min-height: 150px;
  padding: 54px 54px;
  box-sizing: border-box;
}
.dropzone.dz-clickable .dz-message, .dropzone.dz-clickable .dz-message * {
  cursor: pointer;
}
.dropzone .dz-message {
	font-weight:500;
	font-size:20px;
	color: #646C7F;
  	text-align: center;
  	margin: 2em 0;
}
</style>
<div id="upload-csv-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="false" style="width:560px !important;display:block;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel1">Upload</h3>
	</div>
	<div class="modal-body">
		<div id="dropzone">

            <form action="emails.php" method="post" class="dropzone dz-clickable" id="demo-upload">
            
              <div class="dz-message">
                Drop files here or click to upload.<br>
              </div>
            <input type="hidden" name="listid" value="<?php echo $_GET['id']; ?>"/>
            </form>
        
        </div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary email-csv-close" data-dismiss="modal">Close</button>
	</div>
</div>
<!------------------------------------------------->
<style>
 .ui-widget-overlay {
  background: #aaaaaa url("img/ui-bg_flat_0_aaaaaa_40x100.png") 50% 50% repeat-x;
  opacity: .3;
 
}

.ui-widget-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
<div class="ui-widget-overlay overlay" style="z-index: 101; display: none;"></div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>