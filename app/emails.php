<?php
ob_start();
session_start();
include 'include/dbconnect.php';

$_SESSION['list'] = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	switch ($_POST['submitbtn']){	
		case 'saveemail':
			$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:listid, :email)');
			$result = $stmt->execute(array('listid' => $_GET['id'], 'email' => $_POST['email']));
		break;
		case 'deleteID':
			$stmt = $conn->prepare('DELETE FROM emails WHERE id = :id');
			$result = $stmt->execute(array('id' => $_POST['deleteID']));
		break;
	}
}

$i = 1;
$stmt = $conn->prepare('SELECT id, email, date_added FROM emails WHERE list_id = :listid');
$result = $stmt->execute(array('listid' => $_GET['id']));
?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
	     <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Emails
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a href="#">Lists</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Emails</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Emails</h4>
                           
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="email-add" class="btn green">
                                            Add New <i class="icon-plus"></i>
                                        </button>&nbsp;
										<button class="btn green">
                                            Upload CSV <i class="icon-plus"></i>
                                        </button>&nbsp;
										<button id="sample_editable_1_new" class="btn green">
                                            Import Contacts <i class="icon-plus"></i>
                                        </button>&nbsp;
										<button id="sample_editable_1_new" class="btn green">
                                            Download CSV <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                   
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="emails-list">
                                    <thead>
                                    <tr>
                                        <th>Email Address</th>
										<th>Date Added</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
<?php while($row = $stmt->fetch()){ 			
				
echo "<tr id=".$row['id']."><td>".htmlentities($row['email'])."</td><td>".htmlentities($row['date_added'])."</td><td><a class='edit' href='javascript:;'>Edit</a></td><td><a class='delete' href='javascript:;'>Delete</a></td></tr>";
					
					
						$i++;
} 
		if($i == 1) echo '<tr><td>&nbsp;</td><td>There are no emails to display</td><td>&nbsp;</td><td>&nbsp;</td></tr>'; ?>                                   

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