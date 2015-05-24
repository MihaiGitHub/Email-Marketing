<?php 
ob_start(); 
session_start();
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
							Dashboard
							<small> Account Information </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            
							<li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                            
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
<style>
.new-emailcampaign-div a {
	text-decoration: none;
}
.new-emailcampaign-div {
  width: 25%;
}
.new-emailcampaign *, .new-emailcampaign *:before, .new-emailcampaign *:after {
  box-sizing: border-box;
}
				.new-emailcampaign {
  border: 1px solid #D0D0D0;
  border-radius: 6px;
  padding: 24px 0px 21px;
  text-align: center;
  background: none repeat scroll 0% 0% #FFF;
}
.new-emailcampaign > .icon {
  display: block;
  height: 120px;
  width: 120px;
  margin: 0px auto 12px;
  padding: 0px 12px 12px;
}
.new-emailcampaign h1, .new-emailcampaign h2 {
  font-size: 1.625em;
  margin: 0px auto;
  max-width: 640px;
  color: #595959;
    font-weight: bold;
}
</style>
				<div id="page" class="dashboard">
                    <!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
                    <div class="row-fluid circle-state-overview">
				<div class="new-emailcampaign-div">
					<a href="templates.php">
						<div class="new-emailcampaign"> 
							<img class="icon" src="img/email-icon.svg" role="presentation">
							<h2>Create Campaign</h2> 
						</div>
					</a>
				</div>
                    <!--    <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-stat block">
                                <div class="visual">
                                    <div class="circle-state-icon">
                                        <i class="icon-envelope turquoise-color"></i>
                                    </div>
                                    <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#4CC5CD" data-bgColor="#ddd">
                                </div>
                                <div class="details">
                                    <div class="number">1000</div>
                                    <div class="title">Email Credits</div>
                                </div>

                            </div>
                        </div>
						
						<div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle turquoise-color">
                                    <i class="icon-envelope"></i>
                                </div>
                                <p>
                                    <strong>New Campaign</strong>
                                    
                                </p>
                            </div>
                        </div>
                       <a href="templates.html">New Email Campaign</a>
-->
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