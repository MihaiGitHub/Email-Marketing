<?php
ob_start();
session_start();

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] != 'all'){
	$stmt = $conn->prepare('SELECT id, name, type, picture FROM templates WHERE user_id = :userid AND type = :type');
	$result = $stmt->execute(array('userid' => $_SESSION['id'], 'type' => $_POST['type']));
} else {
	$stmt = $conn->prepare('SELECT id, name, type, picture FROM templates');
	$result = $stmt->execute();	
}
?>
<div class="header">
	<h1 class="page-title">Email Templates</h1>
</div>
<ul class="breadcrumb">
	<li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
	<li class="active">Email Templates</li>
</ul>
<div class="container-fluid">
    <div class="row-fluid">
	
<div id="templates">
	<form method="post" action="templates.php">
		<table style="width:100%;">
			<tr>
				<td style="text-align:left;">
						
						<select name="type" onChange="this.form.submit()">
							<option value="all">ALL</option>
							<option <?php if($_POST['type'] == 'art') echo 'selected'; ?> value="art">Art</option>
							<option <?php if($_POST['type'] == 'basic') echo 'selected'; ?> value="basic">Basic</option>
							<option <?php if($_POST['type'] == 'coupons') echo 'selected'; ?> value="coupons">Coupons</option>
							<option <?php if($_POST['type'] == 'custom') echo 'selected'; ?> value="custom">Custom</option>
							<option <?php if($_POST['type'] == 'ecommerce') echo 'selected'; ?> value="ecommerce">ECommerce</option>
							<option <?php if($_POST['type'] == 'events') echo 'selected'; ?> value="events">Events</option>
							<option <?php if($_POST['type'] == 'fitness') echo 'selected'; ?> value="fitness">Fitness</option>
							<option <?php if($_POST['type'] == 'food') echo 'selected'; ?> value="food">Food</option>
							<option <?php if($_POST['type'] == 'realestate') echo 'selected'; ?> value="realestate">Real Estate</option>
							<option <?php if($_POST['type'] == 'tech') echo 'selected'; ?> value="tech">Technology</option>
						</select>
					
				</td>
			</tr>
			<tr>
				<td>
				
<?php while($row = $stmt->fetch()){ ?>
	<div class="template">
		<button type="button" onclick="window.location = 'template.php?id=<?php echo $row['id']; ?>'"><img src="/emarketing/images/<?php echo $row['picture']; ?>"></button>
	
		<div class="template-text">
		    <div><?php echo $row['name']; ?></div> 
			<div class="body"><?php echo $row['type']; ?></div> 
		</div>
	</div>
<?php } ?>

	 			</td>
			</tr>
		</table>
	</form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>