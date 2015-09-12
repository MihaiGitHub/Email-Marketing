<?php
ob_start();
session_start();

include 'include/dbconnect.php';

// Get clicked Links to list them
$stmt = $conn->prepare('SELECT count( * ) count, link FROM `campaign_emails_links` WHERE c_id = :cid');
$result = $stmt->execute(array('cid' => $_GET['id']));
$linkstotal = $stmt->fetch();

$stmt = $conn->prepare('SELECT count( * ) emails_sent FROM  `campaign_emails` WHERE c_id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
$totals = $stmt->fetch();

$emailopens = 0;
$emailbounces = 0;
$emailunsubscribes = 0;

$email = [];
$bounce = [];
$unsubscribe = [];

$stmt = $conn->prepare('SELECT email, opened, bounced, unsubscribed FROM `campaign_emails` WHERE c_id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);

while($opened = $stmt->fetch()){
	
	
		if($opened['opened'] != 0){
					$email[$opened['email']] = $opened['opened'];
					$emailopens++;
		}
		
		if($opened['bounced'] == 1){
					$bounce[$opened['email']] = $opened['bounced'];
					$emailbounces++;
		}
		
		if($opened['unsubscribed'] == 1){
					$unsubscribe[$opened['email']] = $opened['unsubscribed'];
					$emailunsubscribes++;
		}
}

// alternative
// SELECT count( * ) count, link FROM campaign_emails ce, campaign_emails_links cel WHERE ce.c_id = cel.c_id and ce.c_id = "C55a1e124d061e3.94689423" GROUP BY link
$linksstmt = $conn->prepare('SELECT count( * ) count, link FROM  `campaign_emails_links` WHERE c_id = :id GROUP BY link');
$linksresult = $linksstmt->execute(array('id' => $_GET['id']));

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
            <div class="numbers"><?php echo $totals['emails_sent']; ?></div>
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
            <div class="numbers"><?php echo $linkstotal['count']; ?></div>
            <div class="title">Link Clicks</div>
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
            <div class="numbers"><?php echo $emailunsubscribes; ?></div>
            <div class="title">Unsubscribed</div>
            <div class="progress progress-danger">
                <div style="width: 36%" class="bar"></div>
            </div>
        </div>
    </div>
</div>
<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
    <div class="metro-overview purple-color clearfix" style="border-radius:4px;">
        <div class="display">
            <i class="icon-bolt"></i>
            <div class="percent">72%</div>
        </div>
        <div class="details">
            <div class="numbers"><?php echo $emailbounces; ?></div>
            <div class="title">Bounced</div>
            <div class="progress progress-danger">
                <div style="width: 72%" class="bar"></div>
            </div>
        </div>
    </div>
</div>                       
<div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
    <div class="metro-overview gray-color clearfix" style="border-radius: 4px;">
        <div class="display">
            <i class="icon-group"></i>
            <div class="percent">26%</div>
        </div>
        <div class="details">
            <div class="numbers"><?php echo $totals['emails_sent'] - $emailopens; ?></div>
            <div class="title">Not Opened</div>
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
                            <h4><i class="icon-bar-chart"></i> Campaign: <?php echo htmlentities($row['subject']); ?> <span style="margin-left:50px;">Sent on: <?php echo $row['sent']; ?></span></h4>
                           
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
                <div class="span12">
               
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-envelope"></i> Email Breakdown</h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body" style="text-align:center;">
                                  
                                  <div id="countries-container" style="display:inline-block;width:550px;"></div>
                                  <div id="browsers-container" style="display:inline-block;width:550px;"></div>
                                
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
                            <h4><i class="icon-envelope"></i> Emails</h4>
                           
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
										<?php foreach($email as $key => $value){ ?>
											<tr><td><?php echo $key; ?></td><td><?php echo $value; ?></td><td><a href="#">View</a></td></tr>
										   <?php } ?>
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
										   <th>Unique Clicks</th>
									    </tr>
									    </thead>
									    <tbody>
									<?php while($links = $linksstmt->fetch()){ ?>
										  <tr>
											<td><a href="<?php echo $links['link']; ?>" target="_blank"><?php echo $links['link']; ?></a></td>
											<td>&nbsp;</td><td><?php echo $links['count']; ?></td><td>&nbsp;</td>
										  </tr>
									<?php } ?>
										</tbody>
									</table>                                       
								</div>
								<div class="tab-pane" id="unsubscribes">
									<table class="table table-striped table-hover table-bordered" id="unsubscribes-table">
									    <thead>
									    <tr>
										   <th>Email</th>
									    </tr>
									    </thead>
									    <tbody>
										<?php foreach($unsubscribe as $key => $value){ ?>
											<tr><td><?php echo $key; ?></td></tr>
										   <?php } ?>
									    </tbody>
									</table>
								</div>
								<div class="tab-pane" id="bounces">
									<table class="table table-striped table-hover table-bordered" id="bounces-table">
									    <thead>
									    <tr>
										   <th>Email</th>
										   <th>Bounce Type</th>
									    </tr>
									    </thead>
									    <tbody>
										<?php foreach($bounce as $key => $value){ ?>
											<tr><td><?php echo $key; ?></td><td>hard</td></tr>
										   <?php } ?>
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