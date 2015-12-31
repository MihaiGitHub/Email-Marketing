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
/* step menu */
.sf-t1 .sf-nav-top {
    height: 80px;
    padding-bottom: 30px;
}
.sf-nav-wrap {
    overflow: hidden;
    width: 100%;
    position: relative;
    left: 0;
}
.sf-wizard .clearfix {
    zoom: 1;
}
.sf-wizard *, .sf-wizard *:before, .sf-wizard *:after {
    box-sizing: border-box;
}
.sf-nav-top .sf-nav, .sf-nav-bottom .sf-nav {
    width: 800px;
    position: absolute;
}
.sf-nav {
    list-style: none;
    margin: 0;
    padding: 0;
    z-index: 4;
}
.sf-t1 .sf-nav-top .sf-nav-step:first-child, .sf-t1 .sf-nav-bottom .sf-nav-step:first-child {
    padding-left: 50px;
}
.sf-t1 .sf-nav-top li.sf-active, .sf-t1 .sf-nav-bottom li.sf-active {
    background: #feaa07;
}
.sf-t1 .sf-nav-top .sf-nav-step, .sf-t1 .sf-nav-bottom .sf-nav-step {
    margin-right: 22px;
}
.sf-t1 .sf-nav-top li, .sf-t1 .sf-nav-bottom li {
    transition: margin 200ms;
}
.sf-nav li {
    float: left;
    position: relative;
}
.sf-wizard li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.sf-nav {
    list-style: none;

}
.sf-t1 {
    font-family: sans-serif;
}
.sf-t1 .sf-nav-top li.sf-active:before, .sf-t1 .sf-nav-bottom li.sf-active:before {
    border-color: #f99200 transparent #f99200 transparent;
}
.sf-t1 .sf-nav-top .sf-nav-step:before, .sf-t1 .sf-nav-bottom .sf-nav-step:before, .sf-t1 .sf-nav-left .sf-nav-step:before, .sf-t1 .sf-nav-right .sf-nav-step:before, .sf-t1 .sf-btn .sf-nav-step:before {
    content: "";
    width: 1px;
    height: 1px;
    background: transparent;
    position: absolute;
    top: 0;
    left: -13px;
    border: 20px solid transparent;
    border-width: 25px 13px 25px 13px;
    border-top-color: #ffd687;
    border-bottom-color: #ffd687;
    z-index: -1;
}
.sf-t1 .sf-nav-top li.sf-active:after, .sf-t1 .sf-nav-bottom li.sf-active:after {
    border-color: transparent transparent transparent #feaa07;
}
.sf-t1 .sf-nav-top .sf-nav-step:after, .sf-t1 .sf-nav-top.sf-btn:after, .sf-t1 .sf-nav-bottom .sf-nav-step:after, .sf-t1 .sf-nav-bottom.sf-btn:after, .sf-t1 .sf-nav-left .sf-nav-step:after, .sf-t1 .sf-nav-left.sf-btn:after, .sf-t1 .sf-nav-right .sf-nav-step:after, .sf-t1 .sf-nav-right.sf-btn:after, .sf-t1 .sf-btn .sf-nav-step:after, .sf-t1 .sf-btn.sf-btn:after {
    content: "";
    width: 1px;
    height: 1px;
    background: transparent;
    position: absolute;
    top: 0;
    right: -26px;
    border: 20px solid transparent;
    border-width: 25px 13px 25px 13px;
    border-left-color: #ffc85e;
    z-index: -1;
}

.sf-t1 .sf-li-number .sf-nav-subtext {
    padding-left: 30px;
}

.sf-t1 .sf-nav-top .sf-nav-step:first-child .sf-nav-number, .sf-t1 .sf-nav-bottom .sf-nav-step:first-child .sf-nav-number {
    width: 50px;
}
.sf-t1 .sf-nav-top li.sf-active .sf-nav-number, .sf-t1 .sf-nav-bottom li.sf-active .sf-nav-number {
    background: #f99200;
}
.sf-t1 .sf-nav li {
    font-size: 16px;
    color: #FFF;
    background: #ffc85e;
    height: 50px;
    line-height: 50px;
    padding: 0 30px 0 50px;
}
.sf-t1 .sf-nav-number {
    position: absolute;
    text-align: center;
    width: 37px;
    left: 0;
    top: 0;
    font-size: 16px;
    font-weight: 700;
    overflow: hidden;
    background: #ffd687;
}
.sf-wizard {
    position: relative;
}
/* create template button */
.finish-btn {
	background-color: rgb(254, 170, 7);
	border-bottom-color: rgb(255, 255, 255);
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
	border-bottom-style: none;
	border-bottom-width: 0px;
	border-image-outset: 0px;
	border-image-repeat: stretch;
	border-image-slice: 100%;
	border-image-source: none;
	border-image-width: 1;
	border-left-color: rgb(255, 255, 255);
	border-left-style: none;
	border-left-width: 0px;
	border-right-color: rgb(255, 255, 255);
	border-right-style: none;
	border-right-width: 0px;
	border-top-color: rgb(255, 255, 255);
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	border-top-style: none;
	border-top-width: 0px;
	box-sizing: border-box;
	color: rgb(255, 255, 255);
	cursor: pointer;
	display: block;
	float: right;
	font-family: sans-serif;
	font-size: 14px;
	font-stretch: normal;
	font-style: normal;
	font-variant: normal;
	font-weight: normal;
	height: 50px;
	letter-spacing: normal;
	line-height: 50px;
	margin-bottom: 0px;
	margin-left: 15px;
	margin-right: 0px
	margin-top: 0px;
	padding-bottom: 0px;
	padding-left: 25px;
	padding-right: 25px;
	padding-top: 0px;
	position: relative;
	text-align: center;
	text-decoration: none;
	text-indent: 0px;
	text-rendering: auto;
	text-shadow: none;
	text-transform: none;
	width: 96px;
	word-spacing: 0px;
	writing-mode: lr-tb;
	zoom: 1;
	-webkit-appearance: none;
	-webkit-rtl-ordering: logical;
	-webkit-user-select: none;
	-webkit-writing-mode: horizontal-tb;
}
.finish-btn:hover {
	background-color: rgb(249, 146, 0);
}

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
		</ul><input onClick="window.location = 'create.php'" class="finish-btn" type="button" value="Create Template" style="display: inline-block;">
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

<script src="js/iframe-html5-shiv.js"></script>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php';
?>