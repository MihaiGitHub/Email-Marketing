<?php
ob_start();
session_start();

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] != 'all'){
	$stmt = $conn->prepare('SELECT id, name, type, picture FROM templates WHERE user_id = :userid AND type = :type');
	$result = $stmt->execute(array('userid' => $_SESSION['id'], 'type' => $_POST['type']));
} else {
	$stmt = $conn->prepare('SELECT id, name, type, picture FROM templates');
	$result = $stmt->execute();	
}
?>

      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   
                  <h3 class="page-title">
                     Email Templates
                     <small>template selection</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="dashboard.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       
                       <li><a href="#">Templates</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget box blue" id="form_wizard_1">
                     <div class="widget-title">
                        <h4>
                           <i class="icon-reorder"></i> Campaign Wizard - <span class="step-title">Step 1 of 3</span>
                        </h4>
                      
                     </div>
                     <div class="widget-body form">
                        <form action="#" class="form-horizontal">
                           <div class="form-wizard">
                              <div class="navbar steps">
                                 <div class="navbar-inner">
                                    <ul class="row-fluid">
                                       <li class="span3">
                                          <a href="#tab1" data-toggle="tab" class="step active">
                                          <span class="number">1</span>
                                          <span class="desc"><i class="icon-ok"></i> Choose template</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="#tab2" data-toggle="tab" class="step">
                                          <span class="number">2</span>
                                          <span class="desc"><i class="icon-ok"></i> Edit template</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="#tab3" data-toggle="tab" class="step">
                                          <span class="number">3</span>
                                          <span class="desc"><i class="icon-ok"></i> Complete form</span>
                                          </a>
                                       </li>
                                       
                                    </ul>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped">
                                 <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <h3>Choose template</h3>
<?php while($row = $stmt->fetch()){ ?>
	<div class="template">
	
		<button type="button" onclick="window.location = 'template.php?id=<?php echo $row['id']; ?>'">
		<img src="../app/images/<?php echo $row['picture']; ?>"></button>
	
		<div class="template-text">
			<div><?php echo $row['name']; ?></div> 
		</div>

	</div>
<?php } ?>
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Edit template</h4>
                                    <div id="edittemplate" style="display:none;">
									
									</div>
                                 </div>
                                 
                                 <div class="tab-pane" id="tab3">
                                    <h4>Complete form</h4>
                                    <div class="control-group">
                                       <label class="control-label">List Name</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your First Name</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Subject</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your Last Name</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">From (Name)</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your Last Name</span>
                                       </div>
                                    </div>
									<div class="control-group">
                                       <label class="control-label">From (Email)</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your Last Name</span>
                                       </div>
                                    </div>
									<div class="control-group">
                                       <label class="control-label">Reply To (Email)</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your Last Name</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-actions clearfix">
                                 <a id="backbtn" href="javascript:;" class="btn button-previous">
                                 	<i class="icon-angle-left"></i> Back 
                                 </a>
                                 <div id="continuebtn" data-page="1" class="btn btn-primary blue button-next">
                                 	Continue <i class="icon-angle-right"></i>
                                 </div>
                                 <a href="javascript:;" class="btn btn-success button-submit">
                                 	Submit <i class="icon-ok"></i>
                                 </a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
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