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

////////////////////////////////////////////////
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){
	$message = true;
	$client_id='35316327914-4sdoc4ihn46qcc0ihnnlp06p1u0dv52n.apps.googleusercontent.com';
	$client_secret='rISHHURG8t7XVqMlHXNBqcVD';
	$redirect_uri='http://mihaismarandache.com/emarketing/app/lists.php';
	$max_results = 1000;
	 
	$auth_code = $_GET["code"];
	 
	function curl_file_get_contents($url)
	{
	 $curl = curl_init();
	 $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
	 
	 curl_setopt($curl,CURLOPT_URL,$url);	//The URL to fetch. This can also be set when initializing a session with curl_init().
	 curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	 curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);	//The number of seconds to wait while trying to connect.	
	 
	 curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);	//The contents of the "User-Agent: " header to be used in a HTTP request.
	 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);	//To follow any "Location: " header that the server sends as part of the HTTP header.
	 curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);	//To automatically set the Referer: field in requests where it follows a Location: redirect.
	 curl_setopt($curl, CURLOPT_TIMEOUT, 10);	//The maximum number of seconds to allow cURL functions to execute.
	 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);	//To stop cURL from verifying the peer's certificate.
	 
	 $contents = curl_exec($curl);
	 curl_close($curl);
	 return $contents;
	}
	 
	$fields=array(
	    'code'=>  urlencode($auth_code),
	    'client_id'=>  urlencode($client_id),
	    'client_secret'=>  urlencode($client_secret),
	    'redirect_uri'=>  urlencode($redirect_uri),
	    'grant_type'=>  urlencode('authorization_code')
	);
	$post = '';
	foreach($fields as $key=>$value) { $post .= $key.'='.$value.'&'; }
	$post = rtrim($post,'&');
	 
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token');
	curl_setopt($curl,CURLOPT_POST,5);
	curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,FALSE);
	$result = curl_exec($curl);
	curl_close($curl);
	 
	$response =  json_decode($result);
	$accesstoken = $response->access_token;
	 
	$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$accesstoken;
	$xmlresponse =  curl_file_get_contents($url);
	if((strlen(stristr($xmlresponse,'Authorization required'))>0) && (strlen(stristr($xmlresponse,'Error '))>0)) //At times you get Authorization error from Google.
	{
		echo "<h2>OOPS !! Something went wrong. Please try reloading the page.</h2>";
		exit();
	}
	
	$xml =  new SimpleXMLElement($xmlresponse);
	$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
	$result = $xml->xpath('//gd:email');
	 
	foreach ($result as $title) {
			$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:id, :email)');
			$result = $stmt->execute(array('id' => $_SESSION['list'], 'email' => $title->attributes()->address));

	 // echo $title->attributes()->address . "<br>";
	}
	
}
///////////////////////////////////


$stmt = $conn->prepare('SELECT id, name, created FROM lists WHERE user_id = :user');
$result = $stmt->execute(array('user' => $_SESSION['id']));
?>
<div class="header">
            <h1 class="page-title">Email Lists</h1>
        </div>
          <ul class="breadcrumb">
            <li><a href="lists.php">Lists</a><span class="divider">/</span></li>
            <li class="active">Email Lists</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
		  <?php if($message){ ?>
		  	<div class="aalert aalert-success" role="alert">
      			<strong>Success!</strong> Your contacts have been imported and added to your list
			</div>
		  <?php } ?>
			<form method="post" action="lists.php">
            	<button type="button" name="submitbtn" value="save" class="btn btn-primary" data-toggle="modal" href="#addList"> Add List</button>
            <!--
				<table>
					<tr>
						<td colspan="2" style="text-align:left;"><label for="name" style="margin-bottom:0px;">List Name</label></td>
						<td><input type="text" name="name" id="name" style="margin-bottom:0px;"/></td>
						<td><button type="submit" name="submitbtn" value="save" class="btn btn-primary"><i class="icon-save"></i> Save</button></td>
					</tr>
				</table>
                -->
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
<div class="modal small hide fade" id="addList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="post" action="lists.php">
	    <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		   <h3 id="myModalLabel">Add List</h3>
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
    var listid = $(this).data('id');
	var name = $(this).attr('data-value').valueOf();
    
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