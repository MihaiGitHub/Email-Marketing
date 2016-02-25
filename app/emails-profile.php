<?php
ob_start();
session_start();
include 'include/dbconnect.php';

$stmt = $conn->prepare('SELECT email, fname, lname, source, date_added FROM emails WHERE id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetch();

$lists = true;

//date_default_timezone_set('America/New_York');

$stmtactivity = $conn->prepare('SELECT e_id, link, dateandtime FROM (SELECT e_id, null as link, opened AS dateandtime FROM campaign_emails_detail UNION SELECT e_id, link, clicked AS dateandtime FROM campaign_emails_links) AS tbl WHERE e_id = :eid');
$resultactivity = $stmtactivity->execute(array('eid' => $_GET['id']));
$stmtactivity->setFetchMode(PDO::FETCH_ASSOC);
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
			 Email Profile    <?php 
			 
		//	 $timestamp = gettimeofday(true);
			 
			// echo gmdate("Y-m-d\TH:i:s\Z", $timestamp).'<br>';
			 
			 
			 
			// echo date('M d, Y g:i A');
			 ?>      
			 
			 <script>
			/*var js_timestamp = new Date(<?php echo $timestamp; ?>*1000);
			
			console.log(js_timestamp)
			*/
			/* var visitortime = new Date();
            var visitortimezone = "GMT " + -visitortime.getTimezoneOffset()/60;
		  console.log('visitortimezone ',visitortimezone)
		  */
		  </script>           
		   </h3>
		    <ul class="breadcrumb">
			   <li><a href="dashboard.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
			   <li><a href="lists.php">Lists</a> <span class="divider">&nbsp;</span></li>
			   <li><a href="emails.php?id=<?php echo $_SESSION['listid']; ?>">Emails</a><span class="divider">&nbsp;</span></li>
			   <li><a href="#">Profile</a><span class="divider-last">&nbsp;</span></li>
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
				   <h4><i class="icon-reorder"></i>Profile</h4>
			    </div>
			   <div class="widget-body">
                            <div class="span3">
                                <div class="text-center profile-pic">
                                    <img src="img/profile-pic.jpg" alt="">
                                </div>
                                
                            </div>
                            <div class="span6">
                                <h4><?php echo htmlentities($row['fname']).' '.htmlentities($row['lname']); ?> </h4>
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td class="span2">First Name :</td>
                                        <td>
                                            <?php echo htmlentities($row['fname']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="span2">Last Name :</td>
                                        <td>
                                            <?php echo htmlentities($row['lname']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="span2"> Email :</td>
                                        <td>
                                            <?php echo htmlentities($row['email']); ?>
                                        </td>
                                    </tr>
							 <tr>
                                        <td class="span2"> Date Added :</td>
                                        <td>
                                            <?php echo htmlentities($row['date_added']); ?>
                                        </td>
                                    </tr>
							 <tr>
                                        <td class="span2"> Source :</td>
                                        <td>
                                            <?php echo htmlentities($row['source']); ?>
                                        </td>
                                    </tr>
							 <tr>
                                        <td class="span2"> Timezone :</td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="space5"></div>
					   
					   <div class="timeline-messages">						 
<?php while($rowactivity = $stmtactivity->fetch()){ ?>				 
												    
		    <div class="msg-time-chat">
			   <a class="message-img" href="#"><img alt="" src="img/avatar-mini.png" class="avatar"></a>
			   <div class="message-body msg-in">
				  <div class="text">
					 <p class="attribution"><a href="#"><?php echo htmlentities($row['fname']).' '.htmlentities($row['lname']); ?></a> on <?php echo $rowactivity['dateandtime']; ?></p>
					 
						 <?php if(empty($rowactivity['link'])){ ?>
						 <p>Opened an email</p>
						 <?php } else { ?>
						 <p>Clicked a link: <?php echo $rowactivity['link']; ?>
						 <?php } ?>
				  </div>
			   </div>
		    </div>
<?php } ?>						    
											 
					
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
<script>App.setEmailsUploadPage(true);</script>