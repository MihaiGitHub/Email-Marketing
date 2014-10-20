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
$stmt = $conn->prepare('SELECT c.id, c.subject, c.sent, l.name FROM campaigns as c, lists as l WHERE c.user_id = :user AND c.list_id = l.id ORDER BY sent DESC');
$result = $stmt->execute(array('user' => $_SESSION['id']));
?>
<div class="header">
	<h1 class="page-title">Reports</h1>
</div>
<ul class="breadcrumb">
	<li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
	<li class="active">Reports</li>
</ul>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="well">
			<table class="table">
			   <thead>
				<tr>
					<th>#</th>
					<th>Campaign Name</th>
					<th>List</th>
					<th>Sent</th>
					<th style="width: 26px;"></th>
				</tr>
			   </thead>
			   <tbody>
		<?php 
		$i = 1;
		while($row = $stmt->fetch()){ 				
				echo "<tr><td>$i</td><td><a href='statistics.php?id=".urlencode($row['id'])."'>".htmlentities($row['subject'])."</a></td><td>".htmlentities($row['name'])."</td><td>".htmlentities($row['sent'])."</td><td>
					<a data-toggle=\"modal\" data-id=".$row['id']." class=\"deletelist\" href=\"#myModal\"><i class='icon-remove'></i></a>
					</td></tr>";
				$i++;
		} 
		if($i == 1) echo '<tr><td colspan="5" style="text-align:center;" class="align-center">There are no campaigns to display</td></tr>'; ?>
			   </tbody>
			</table>
		</div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="post" action="reports.php">
	    <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		   <h3 id="myModalLabel">Delete Confirmation</h3>
	    </div>
	    <div class="modal-body">
		   <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete this campaign?</p>
		    <input type="hidden" name="cid" id="cid" value=""/>
	    </div>
	    <div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <button type="submit" name="submitbtn" value="delete" class="btn btn-danger">Delete</button>
	    </div>
    </form>
</div>
<script src="lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).on("click", ".deletelist", function () {
     var cid = $(this).data('id');
     $(".modal-body #cid").val( cid );
});
</script>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>