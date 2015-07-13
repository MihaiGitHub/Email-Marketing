<?php
ob_start();
session_start();
include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	switch ($_POST['submitbtn']){
		case 'delete':
			$stmt = $conn->prepare('DELETE FROM campaign_emails WHERE c_id = :cid');
			$result = $stmt->execute(array('cid' => $_POST['cid']));
			if($result){
				$stmt = $conn->prepare('DELETE FROM campaigns WHERE id = :cid');
				$result = $stmt->execute(array('cid' => $_POST['cid']));
			}
		break;
	}
} 
//$stmt = $conn->prepare('SELECT c.id, c.subject, c.sent, l.name FROM campaigns as c, lists as l WHERE c.user_id = :user AND c.list_id = l.id ORDER BY sent DESC');
$stmt = $conn->prepare('SELECT c.id, c.subject, c.sent, l.name FROM campaigns as c LEFT JOIN lists as l ON c.list_id = l.id WHERE c.user_id = :user ORDER BY sent DESC');
$result = $stmt->execute(array('user' => $_SESSION['id']));
$reports = true;
?>
<!-- BEGIN PAGE -->
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Campaign List
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Campaigns</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Campaign List</h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                
                                
                                <table class="table table-striped table-hover table-bordered" id="reports-list">
                                    <thead>
                                    <tr>
										<th>#</th>
										<th>Campaign Name</th>
										<th>List</th>
										<th>Sent</th>
                                        <th>View</th>
										<th>Delete</th>
									</tr>
                                    </thead>
                                    <tbody>
		<?php //<a href='statistics.php?id=".urlencode($row['id'])."'></a>
		$i = 1;
		while($row = $stmt->fetch()){	
				echo "<tr>
					<td>$i</td>
					<td>".htmlentities($row['subject'])."</td>
					<td>".htmlentities($row['name'])."</td>
					<td>".htmlentities($row['sent'])."</td>
					<td><a class='campaign' id='".$row['id']."' href='statistics.php?id=".urlencode($row['id'])."'>View</a></td>
					<td><a class='delete' href='javascript:;'>Delete</a></td>
				</tr>";
				$i++;
		} 
		if($i == 1) echo '<tr><td>&nbsp;</td><td>There are no campaigns to display</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
		?>
                                   
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
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>