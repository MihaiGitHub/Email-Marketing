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

				
<style>
</style>
	<div class="navbar steps sf-wizard clearfix sf-t1 sf-slide sf-s-0 sf-nomob" id="wizard_example_4_5-box">
		<div class="navbar-inner sf-nav-wrap clearfix sf-nav-smmob sf-nav-top">
			<ul class="sf-nav clearfix" style="clear: both;">
				<li id="step1" class="sf-nav-step sf-li-number sf-active sf-nav-link">
				
					<span class="sf-nav-subtext">Choose template</span>
					<div class="sf-nav-number">
						<span class="sf-nav-number-inner">1</span>
					</div>
					<div></div>
						
					<a href="#tab1" data-toggle="tab"></a>
				
				</li>
				<li id="step2" class="sf-nav-step sf-li-number sf-nav-link">
				<span class="sf-nav-subtext">Edit template</span>
	
					<div class="sf-nav-number">
						<span class="sf-nav-number-inner">2</span>
					</div>
					<div></div>
					<a href="#tab2" data-toggle="tab"></a>
				
				</li>
				<li id="step3" class="sf-nav-step sf-li-number sf-nav-link">
					
					<span class="sf-nav-subtext">Complete form</span>
					<div class="sf-nav-number">
						<span class="sf-nav-number-inner">3</span>
					</div>
					<div></div>
					<a href="#tab3" data-toggle="tab"></a>
				
				</li>
			</ul>
	<input id="createTemplateBtn" onClick="window.location = 'create.php'" class="finish-btn" type="button" value="Create Template" style="display:inline-block;">
	
		</div> 
	</div>

                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">

							<?php while($row = $stmt->fetch()){ ?>

									<div class="template" style="float:left;">

<div id="template-container">

  	<iframe class="mainiFrame" srcdoc="<?php echo $row['original_value']; ?>" src="http://msmarandache.com/emarketing/app/templates/basic/basic.html" seamless frameborder="0" scrolling="no" width="640" height="755"></iframe>
  
  	<a href="#" id="<?php echo $row['id']; ?>" class="button-next template-btn"></a>

</div>
								

									</div>

								<?php } ?>

                                 </div>

                                 <div class="tab-pane" id="tab2">
         
                                    	<div id="edittemplate" style="display:none;"></div>

								<a id="continuebtn" class="next-btn button-next" href="#" style="display: none;">NEXT</a>
								<a id="prev-btn" class="prev-btn" href="templates.php" style="display: none;">PREV</a>

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

							<a class="prev-btn button-previous" href="javascript:;" style="float:left;">PREV</a>
						     <input id="sendMailBtn" class="finish-btn button-submit" type="button" value="Send Mail" style="display:inline-block;float:left;">

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

<script src="js/iframe-html5-shiv.js"></script>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php';
?>
<script>App.setTemplatePage(true);</script>