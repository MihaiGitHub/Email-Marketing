<?php
ob_start();
session_start();
include 'include/dbconnect.php';
if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}
//$location = file_get_contents('http://freegeoip.net/json/70.190.6.13');
//echo '<pre>';
// print_r($location);
// echo '</pre>';
$stmt = $conn->prepare('SELECT id, subject FROM campaigns WHERE user_id = :user');
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
			<th>Subscribers</th>
			<th>Open Rate</th>
			<th style="width: 26px;"></th>
		</tr>
	   </thead>
	   <tbody>
		<?php 
		$i = 1;
		while($row = $stmt->fetch()){ 				
				echo "<tr><td>$i</td><td><a href='statistics.php?id=".urlencode($row['id'])."'>".htmlentities($row['subject'])."</a></td><td>2</td><td>100%</td><td>
	    <a href='#'><i class='icon-pencil'></i></a>
	    <a href='#myModal' role='button' data-toggle='modal'><i class='icon-remove'></i></a>
     </td></tr>";
				$i++;
		} 
		if($i == 1) echo '<tr><td colspan="5" style="text-align:center;" class="align-center">There are no campaigns to display</td></tr>'; ?>
	   </tbody>
	</table>
</div>

<?php
//$data = json_decode($location);
//echo $data->country_name;
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>