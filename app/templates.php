<?php
ob_start();
session_start();

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] != 'all'){
	$stmt = $conn->prepare('SELECT id, name, type, picture, original_value FROM templates WHERE user_id = :userid AND type = :type');
	$result = $stmt->execute(array('userid' => $_SESSION['id'], 'type' => $_POST['type']));
} else {
	$stmt = $conn->prepare('SELECT id, name, type, picture, original_value FROM templates WHERE user_id = :userid');
	$result = $stmt->execute(array('userid' => $_SESSION['id']));	
}

$stmtlists = $conn->prepare('SELECT id, name FROM lists WHERE user_id = :userid');
$resultlists = $stmtlists->execute(array('userid' => $_SESSION['id']));
while($rowlists = $stmtlists->fetch()){ 
	$options .= "<option value=".$rowlists['id'].">".$rowlists['name']."</option>";
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
                        <form class="form-horizontal">
                        
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
			   
<button onClick="window.location = 'create.php'" class="btn btn-primary" style="float:right;transform: translateY(15%);" type="button"><i class="icon-plus icon-white"></i> Create Template</button>
      
                                    
								<h3>Choose template</h3>
								
								<?php while($row = $stmt->fetch()){ ?>
									<div class="template" style="float:left;">
									
										<!-- Old code
										<button id="<?php echo $row['id']; ?>" class="button-next template-btn" type="button" style="width:25%;">
											<img src="../app/templates/images/<?php echo $row['picture']; ?>" >
									   </button> -->
									   
									   <!-- Note:
									   save html of each template on server and put coresponding as iframe src
									   link to the page using a href
									   -->
									   
									   
									   <!--
									   <iframe src="templates/theme/welcome.html" style="position: relative; z-index: 0; -ms-zoom: 0.5; -moz-transform: scale(0.5); -o-transform: scale(0.5); -webkit-transform: scale(0.5); margin: -12.5%;" seamless frameborder="0" scrolling="no" width="448" height="560"></iframe>
									   <a href="//techgeniusapps.com" style="display: inline-block;"><div style="position: relative; z-index: 1; width: 224px; height: 280px; margin-left: -283px; margin-top: -362px; background-color: transparent;"></div></a>
									-->
									
									
									
									
									
									<iframe srcdoc="<?php echo $row['original_value']; ?>" style="position: relative; z-index: 0; -ms-zoom: 0.5; -moz-transform: scale(0.5); -o-transform: scale(0.5); -webkit-transform: scale(0.5); margin: -12.5%;" seamless frameborder="0" scrolling="no" width="448" height="560"></iframe>
									   <a href="//techgeniusapps.com" style="display: inline-block;"><div style="position: relative; z-index: 1; width: 224px; height: 280px; margin-left: -283px; margin-top: -362px; background-color: transparent;"></div></a>
									
									
									
										<div class="template-text">
											<div><?php echo $row['name']; ?></div> 
										</div>
								
									</div>
								<?php } ?>
                                 </div>
        
                                 <div class="tab-pane" id="tab2">
                                  
							 <button onClick="window.location = 'templates.php'" class="btn btn-primary" style="float:right;" type="button"><i class="icon-backward icon-white"></i> Go Back</button>
                                    
                                      <div id="continuebtn" class="btn btn-primary blue button-next" style="display:none;">
									Continue
							   </div>
         
                                    <div id="edittemplate" style="display:none;"></div>
							 
                                 </div>
                                 
                                 <div class="tab-pane" id="tab3">
                                    <h3>Complete Form</h3>                                   
                                    
                                    <div class="control-group">
                                       <label class="control-label">List Name</label>
                                       <div class="controls">
                                          <select id="lists" name="lists" class="span6"><?php echo $options; ?></select>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Subject</label>
                                       <div class="controls">
                                          <input id="subject" type="text" class="span6" />
                                          <span class="help-inline">The subject of your email</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">From (Name)</label>
                                       <div class="controls">
                                          <input id="from-name" type="text" class="span6" />
                                          <span class="help-inline">The name that will appear as having sent the email</span>
                                       </div>
                                    </div>
									<div class="control-group">
                                       <label class="control-label">From (Email)</label>
                                       <div class="controls">
                                          <input id="from-email" type="text" class="span6" />
                                          <span class="help-inline">The email that will appear as having sent the email</span>
                                       </div>
                                    </div>
									<div class="control-group">
                                       <label class="control-label">Reply To (Email)</label>
                                       <div class="controls">
                                          <input id="replyto" type="text" class="span6" />
                                          <span class="help-inline">Email for end user to reply to</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-actions clearfix">
						
                                 <a href="javascript:;" class="btn button-primary button-previous">
                                 	<i class="icon-backward icon-white"></i> Go Back 
                                 </a>
                                
                                 <a href="javascript:;" class="btn btn-success button-submit">
                                 		<i class="icon-envelope"></i> Send Mail
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
       <style>
 
  .progress-label {
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
 
  </style>
  
  
  
  
  
  
<div id="dialog" class="modal hide1 fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="false" style="width:560px !important;display:block;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel1">Sending Emails...</h3>
	</div>
	<div class="modal-body">
    <div class="progress-label">Preparing template...</div>
		<div id="progressbar"></div>
        
        							<div class="progress progress-striped progress-success active">
                                        <div id="email-bar" class="bar"></div>
                                    </div>
	</div>
	<div class="modal-footer">
	<!--	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
		<button id="email-bar-close" class="btn btn-primary" data-dismiss="modal">Close</button>
	</div>
</div>

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