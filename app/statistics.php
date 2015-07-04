<?php
ob_start();
session_start();

include 'include/dbconnect.php';
/*
$stmt = $conn->prepare('SELECT SUM( opened ) AS total FROM  `campaign_emails` WHERE c_id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
$totals = $stmt->fetch();
*/
$emailopens = 0;
$stmt = $conn->prepare('SELECT opened FROM `campaign_emails` WHERE c_id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
while($opened = $stmt->fetch()){
		if($opened['opened'] != 0){
					$emailopens++;
		}
}

$stmt = $conn->prepare('SELECT subject, sent FROM campaigns WHERE id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
$row = $stmt->fetch();
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
                     Campaign Statistics
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a href="#">Campaigns</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Statistics</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

<!-- BEGIN ADVANCED TABLE widget-->
<div class="row-fluid">
    <div class="span12">
   
        <!-- BEGIN EXAMPLE TABLE widget-->
       <div class="row-fluid metro-overview-cont">
<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
    <div class="metro-overview blue-color clearfix" style="border-radius: 4px;">
        <div class="display">
            <i class="icon-envelope"></i>
            <div class="percent">20%</div>
        </div>
        <div class="details">
            <div class="numbers">2000</div>
            <div class="title">Emails Sent</div>
            <div class="progress progress-info">
                <div style="width: 20%" class="bar"></div>
            </div>
        </div>
    </div>
</div>
<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
    <div class="metro-overview green-color clearfix" style="border-radius: 4px;">
        <div class="display">
            <i class="icon-eye-open"></i>
            <div class="percent">46%</div>
        </div>
        <div class="details">
            <div class="numbers"><?php echo $emailopens; ?></div>
            <div class="title">Unique Opens</div>
            <div class="progress progress-success">
                <div style="width: 46%" class="bar"></div>
            </div>
        </div>
    </div>
</div>
<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
    <div class="metro-overview turquoise-color clearfix" style="border-radius: 4px;">
        <div class="display">
            <i class="icon-link"></i>
            <div class="percent">55%</div>
        </div>
        <div class="details">
            <div class="numbers">530</div>
            <div class="title">Clicked Links</div>
        </div>
        <div class="progress progress-info">
            <div style="width: 55%" class="bar"></div>
        </div>
    </div>
</div>
<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
    <div class="metro-overview red-color clearfix" style="border-radius: 4px;">
        <div class="display">
            <i class="icon-exclamation-sign"></i>
            <div class="percent">36%</div>
        </div>
        <div class="details">
            <div class="numbers">5440</div>
            <div class="title">Unsubscribed</div>
            <div class="progress progress-danger">
                <div style="width: 36%" class="bar"></div>
            </div>
        </div>
    </div>
</div>
                        
<div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
    <div class="metro-overview gray-color clearfix" style="border-radius: 4px;">
        <div class="display">
            <i class="icon-bolt"></i>
            <div class="percent">26%</div>
        </div>
        <div class="details">
            <div class="numbers">170</div>
            <div class="title">Bounced</div>
            <div class="progress progress-warning">
                <div style="width: 26%" class="bar"></div>
            </div>
        </div>
    </div>
</div>
                        
                    </div>
        <!-- END EXAMPLE TABLE widget-->
    </div>
</div>
<!-- END ADVANCED TABLE widget-->
            
            
            
            
            
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
               
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-bar-chart"></i> Campaign: <?php echo htmlentities($row['subject']); ?> <span style="margin-left:50px;">Sent on: <?php echo htmlentities($row['sent']); ?></span></h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                
                                <div id="timeframe-container"></div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>
            <!-- END ADVANCED TABLE widget-->
            
            
            
            
            
            
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span6">
               
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-envelope"></i> Email Breakdown</h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                
                                <div id="breakdown-container" style=""></div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
                
                <div class="span6">
               
                    <!-- BEGIN EXAMPLE TABLE widget-->
                   <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bell"></i> Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 365px;"><ul class="item-list scroller padding" data-height="365" data-always-visible="1" style="overflow: hidden; width: auto; height: 365px;">
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New user registered.</span>
                                            <span class="small italic">Just now</span>
                                        </li>
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New order received.</span>
                                            <span class="small italic">15 mins ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Alerting a user account balance.</span>
                                            <span class="small italic">2 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Alerting administrators staff.</span>
                                            <span class="small italic">11 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Messages are not sent to users.</span>
                                            <span class="small italic">14 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Web server #12 failed to relosd.</span>
                                            <span class="small italic">2 days ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New order received.</span>
                                            <span class="small italic">15 mins ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Alerting a user account balance.</span>
                                            <span class="small italic">2 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Alerting administrators staff.</span>
                                            <span class="small italic">11 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Messages are not sent to users.</span>
                                            <span class="small italic">14 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Web server #12 failed to relosd.</span>
                                            <span class="small italic">2 days ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New order received.</span>
                                            <span class="small italic">15 mins ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Alerting a user account balance.</span>
                                            <span class="small italic">2 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Alerting administrators support staff.</span>
                                            <span class="small italic">11 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Messages are not sent to users.</span>
                                            <span class="small italic">14 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Web server #12 failed to relosd.</span>
                                            <span class="small italic">2 days ago</span>
                                        </li>
                                    </ul><div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 232.504363001745px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                                    <div class="space5"></div>
                                    <a href="#" class="pull-right">View all notifications</a>
                                    <div class="clearfix no-top-space no-bottom-space"></div>
                                </div>
                            </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>
            <!-- END ADVANCED TABLE widget-->
          
            
            
            
            
            
            
             <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
               
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-envelope"></i> Tabs</h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                
                                
                                
                                
                                
                               <!--BEGIN TABS-->
                                 <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                       <li class="active"><a href="#unique-opens" data-toggle="tab">Unique Opens</a></li>
                                       <li><a href="#link-clicks" data-toggle="tab">Link Clicks</a></li>
                                       <li><a href="#unsubscribes" data-toggle="tab">Unsubscribes</a></li>
                                       <li><a href="#bounces" data-toggle="tab">Bounces</a></li>
                                       <li><a href="#unopened" data-toggle="tab">Not Opened</a></li>
                                    </ul>
                                    <div class="tab-content">
                                       <div class="tab-pane active" id="unique-opens">
<table class="table table-striped table-hover table-bordered" id="unique-opens-table">
    <thead>
    <tr>
        <th>Email</th>
        <th>Total Opens</th>
        <th>View</th>
    </tr>
    </thead>
    <tbody>
    	<tr><td>mihai@yahoo.com</td><td>3</td><td><a href="#">View</a></td></tr>
    	<tr><td>mattis@yahoo.com</td><td>1</td><td><a href="#">View</a></td></tr>
        <tr><td>scxelt@yahoo.com</td><td>1</td><td><a href="#">View</a></td></tr>
    </tbody>
</table>
                                       </div>
                                       <div class="tab-pane" id="link-clicks">
<table class="table table-striped table-hover table-bordered" id="link-clicks-table">
    <thead>
    <tr>
        <th>Link</th>
        <th>Email</th>
		<th>Total Clicks</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    	<tr><td>google.com</td><td>mwdowiak@yahoo.com</td><td>3</td><td>2015-12-22</td></tr>
    	<tr><td>yahoo.com</td><td>jen24@yahoo.com</td><td>1</td><td>2015-12-11</td></tr>
        <tr><td>templarit.com</td><td>anderson@yahoo.com</td><td>1</td><td>2015-12-05</td></tr>
        <tr><td>amazon.com</td><td>mwdowiak@yahoo.com</td><td>1</td><td>2015-11-02</td></tr>
    </tbody>
</table>                                       </div>
                                       <div class="tab-pane" id="unsubscribes">
<table class="table table-striped table-hover table-bordered" id="unsubscribes-table">
    <thead>
    <tr>
        <th>Email</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    	<tr><td>mwdowiak@yahoo.com</td><td>2015-12-22</td></tr>
    	<tr><td>jen24@yahoo.com</td><td>2015-12-11</td></tr>
        <tr><td>anderson@yahoo.com</td><td>2015-12-05</td></tr>
        <tr><td>mwdowiak@yahoo.com</td><td>2015-11-02</td></tr>
    </tbody>
</table>
                                       </div>
                                        <div class="tab-pane" id="bounces">
<table class="table table-striped table-hover table-bordered" id="bounces-table">
    <thead>
    <tr>
        <th>Email</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    	<tr><td>mwdowiak@yahoo.com</td><td>2015-12-22</td></tr>
    	<tr><td>jen24@yahoo.com</td><td>2015-12-11</td></tr>
        <tr><td>anderson@yahoo.com</td><td>2015-12-05</td></tr>
        <tr><td>mwdowiak@yahoo.com</td><td>2015-11-02</td></tr>
    </tbody>
</table>
                                       </div>
                                        <div class="tab-pane" id="unopened">
<table class="table table-striped table-hover table-bordered" id="unopened-table">
    <thead>
    <tr>
        <th>Email</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    	<tr><td>mwdowiak@yahoo.com</td><td>2015-12-22</td></tr>
    	<tr><td>jen24@yahoo.com</td><td>2015-12-11</td></tr>
        <tr><td>anderson@yahoo.com</td><td>2015-12-05</td></tr>
        <tr><td>mwdowiak@yahoo.com</td><td>2015-11-02</td></tr>
    </tbody>
</table>
                                       </div>
                                    </div>
                                 </div>
                                 <!--END TABS-->
                                       
                                       
                                       
                                       
                                
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

<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>
<script>App.setChartPage(true);</script>