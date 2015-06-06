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
                        <form id="tempform" method="post" action="send.php" class="form-horizontal">
                        
                        
                        
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
	<div id="frfr4444" class="template">
	
		<button id="<?php echo $row['id']; ?>" class="button-next template-btn" type="button">
			<img id="asdf" src="../app/images/<?php echo $row['picture']; ?>">
        </button>
	
		<div class="template-text">
			<div><?php echo $row['name']; ?></div> 
		</div>

	</div>
<?php } ?>
                                 </div>
        
                                 <div class="tab-pane" id="tab2">
                                    <h4>Edit template</h4>
                                    <input type="button" onClick="window.location = 'templates.php'" value="Go Back" style="float:right;"/>
                                    
                                    <div id="continuebtn" class="btn btn-primary blue button-next" style="display:none;">
                                 	Continue <i class="icon-angle-right"></i>
                                 </div>
         <!--                           <button onClick="window.location = 'templates.php'">Go Back</button>
         <a id="backbtn" href="#" class="btn">
            <i class="icon-angle-left"></i> Back 
         </a>
         -->
                                    <div id="edittemplate" style="display:none;">
									
									</div>
                                 </div>
                                 
                                 <div class="tab-pane" id="tab3">
                                    <h4>Complete form</h4>
                                    <!--
                                                                       <input type="button" onClick="window.location = 'templates.php'" value="Go Back" style="float:right;"/>

                                    
                                <a href="javascript:;" class="btn button-previous">
                                 	<i class="icon-angle-left"></i> Back 
                                 </a>
                                    -->
                                    
                                    
                                    
                                    
                                    <div class="control-group">
                                       <label class="control-label">List Name</label>
                                       



                                       <div class="controls">
                                          <select name="lists" class="span6"><?php echo $options; ?></select>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Subject</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">The subject of your email</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">From (Name)</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">The name that will appear as having sent the email</span>
                                       </div>
                                    </div>
									<div class="control-group">
                                       <label class="control-label">From (Email)</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">The email that will appear as having sent the email</span>
                                       </div>
                                    </div>
									<div class="control-group">
                                       <label class="control-label">Reply To (Email)</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Email for end user to reply to</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-actions clearfix">
                                 <a href="javascript:;" class="btn button-previous">
                                 	<i class="icon-angle-left"></i> Back 
                                 </a>
                                 <!--
                                 <div id="continuebtn" class="btn btn-primary blue button-next" style="display:none;">
                                 	Continue <i class="icon-angle-right"></i>
                                 </div>
                                 -->
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
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

       <style>
  #progressbar {
    margin-top: 20px;
  }
 
  .progress-label {
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
 
  .ui-dialog-titlebar-close {
    display: none;
  }
  </style>
<div id="dialog" title="Sending emails...">
  <div class="progress-label">Preparing template...</div>
  <div id="progressbar"></div>
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