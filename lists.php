<?php 
ob_start();
session_start();

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	switch ($_POST['submitbtn']){
		case 'save':
			$stmt = $conn->prepare('INSERT INTO lists (user_id, name, created) VALUES (:id, :name, :created)');
			$result = $stmt->execute(array('id' => $_SESSION['id'], 'name' => $_POST['name'], 'created' => date('m/d/Y')));
		break;
		case 'edit':
			$stmt = $conn->prepare('UPDATE lists SET name = :name WHERE id = :listid');
			$result = $stmt->execute(array('name' => $_POST['listname'], 'listid' => $_POST['listid']));
		break;
		case 'delete':
			$stmt = $conn->prepare('DELETE FROM emails WHERE list_id = :listid');
			$result = $stmt->execute(array('listid' => $_POST['listid']));
			if($result){
				$stmt = $conn->prepare('DELETE FROM lists WHERE id = :listid');
				$result = $stmt->execute(array('listid' => $_POST['listid']));
			}
		break;
	}
}
$stmt = $conn->prepare('SELECT id, name, created FROM lists WHERE user_id = :user');
$result = $stmt->execute(array('user' => $_SESSION['id']));
?>
<div class="header">
            <h1 class="page-title">Email Lists</h1>
        </div>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a><span class="divider">/</span></li>
            <li class="active">Email Lists</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
				<form method="post" action="lists.php">
					<table>
						<tr><td colspan="2" style="text-align:left;"><label for="name">List Name</label></td></tr>
						<tr>
							<td>
								<input type="text" name="name" id="name"/> 
							</td>
							<td>
								<button type="submit" name="submitbtn" value="save" class="btn btn-primary"><i class="icon-save"></i> Save</button>
							</td>
						</tr>
					</table>
				</form>
<div class="well">
	<table class="table">
	   <thead>
		<tr>
			<th>#</th>
			<th>List Name</th>
			<th>Subscribers</th>
			<th>Date Created</th>
			<th style="width: 26px;"></th>
		</tr>
	   </thead>
	   <tbody>
		<?php 
		$i = 1;
		while($row = $stmt->fetch()){ 
			$stmtcount = $conn->prepare('SELECT COUNT(id) as Total FROM emails WHERE list_id = :listid');
			$resultcount = $stmtcount->execute(array('listid' => $row['id']));
			$rowcount = $stmtcount->fetch();
								
echo "<tr><td>$i</td><td><a href='emails.php?id=".urlencode($row['id'])."'>".htmlentities($row['name'])."</a></td><td>".$rowcount['Total']."</td><td>".htmlentities($row['created'])."</td><td><a data-toggle=\"modal\" data-id=".$row['id']." data-value='".$row['name']."' class=\"editlist\" href=\"#editModal\"><i class='icon-pencil'></i></a>&nbsp;<a data-toggle=\"modal\" data-id=".$row['id']." class=\"deletelist\" href=\"#myModal\"><i class='icon-remove'></i></a></td></tr>";

				$i++;
		} 
		if($i == 1) echo '<tr><td colspan="5" style="text-align:center;" class="align-center">There are no lists to display</td></tr>'; ?>
	   </tbody>
	</table>
</div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="post" action="lists.php">
	    <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		   <h3 id="myModalLabel">Delete Confirmation</h3>
	    </div>
	    <div class="modal-body">
		   <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete this list?</p>
		    <input type="hidden" name="listid" id="listid" value=""/>
	    </div>
	    <div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <button type="submit" name="submitbtn" value="delete" class="btn btn-danger">Delete</button>
	    </div>
    </form>
</div>

<div class="modal small hide fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="post" action="lists.php">
	    <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		   <h3 id="myModalLabel">Edit List</h3>
	    </div>
	    <div class="modal-body edit">
		   <p class="error-text"><i class="icon-warning-sign modal-icon"></i><input type="text" name="listname" id="listname" value=""/></p>
		   <input type="hidden" name="listid" id="listid" value=""/>
	    </div>
	    <div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <button type="submit" name="submitbtn" value="edit" class="btn btn-danger">Save</button>
	    </div>
    </form>
</div>
<script src="lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).on("click", ".deletelist", function () {
     var listid = $(this).data('id');
     $(".modal-body #listid").val( listid );
});
$(document).on("click", ".editlist", function () {
	console.log(this);
     var listid = $(this).data('id');
	var name = $(this).attr('data-value').valueOf();
//	alert(name);
//	exit;
     $(".edit #listid").val( listid );
	$(".edit #listname").val( name );
});
</script>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>