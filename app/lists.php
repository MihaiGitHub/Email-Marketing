<?php 
ob_start();
session_start();

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){

	$message = true;
	$client_id='35316327914-4sdoc4ihn46qcc0ihnnlp06p1u0dv52n.apps.googleusercontent.com';
	$client_secret='rISHHURG8t7XVqMlHXNBqcVD';
	$redirect_uri='http://msmarandache.com/emarketing/app/lists.php';
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

	$url = "https://www.google.com/m8/feeds/contacts/default/full?max-results=2000&oauth_token=".$accesstoken;
	$xmlresponse =  file_get_contents($url);
	$xml =  new SimpleXMLElement($xmlresponse);
	$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');

	$output_array = array();
	foreach ($xml->entry as $entry) {
	  foreach ($entry->xpath('gd:email') as $email) {
	    $output_array[] = array((string)$entry->title, (string)$email->attributes()->address);
	  }
	}
	
	foreach ($output_array as $contact) {
		$split = explode(' ', $contact[0]);
		$fname = $split[0] ? $split[0] : "";
		$lname = count($split)-1 == 0 ? "" : $split[count($split)-1];
		
		$stmt = $conn->prepare('INSERT INTO emails (list_id, email, fname, lname, source, date_added) VALUES (:id, :email, :fname, :lname, :source, :date)');
		$result = $stmt->execute(array('id' => $_SESSION['listid'], 'email' => $contact[1], 'fname' => $fname, 'lname' => $lname, 'source' => 'Gmail Import', 'date' => date('M d, Y g:i A')));
	}
	
	// Update notifications
	$stmtn = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
	$resultn = $stmtn->execute(array('id' => $_SESSION['id'], 'notification' => "Contacts have been imported into your list.", 'timestamp' => date('M d, Y g:i A')));
}
$lists = true;
?>
 <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
	  <!-- BEGIN PAGE HEADER-->
	  <div class="row-fluid">
		<div class="span12">
		   <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
		   <h3 class="page-title">
			 Email Lists
		   </h3>
		    <ul class="breadcrumb">
			   <li>
				  <a href="dashboard.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
			   </li>
			   <li><a href="#">Lists</a><span class="divider-last">&nbsp;</span></li>
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
				   <h4><i class="icon-reorder"></i>Email Lists</h4>
			    </div>
			    <div class="widget-body">
				   <div class="portlet-body">
					  <div class="clearfix">
						 <div class="btn-group">
							<button class="btn" id="add-list">
							    <i class="icon-plus"></i> Add New
							</button>
						 </div>
					  </div>
					  <div class="space15"></div>
					  <table class="table-striped table-hover table-bordered dataTable no-footer jTable" id="lists-table">
						<thead>
						  <tr>
							 <th>List Name</th>
							 <th>Contacts</th>
							 <th>Date Created</th>
							 <th></th>
						  </tr>
					   </thead>
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
	 
<div id="add-list-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Create List</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">List name</label>

		    <div class="controls">
			  <input type="text" class="span12" />
		    </div>
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="add-list-modal-close" class="btn-close close-modal">Close</button>
		<button id="add-list-modal-save" class="btn-primary">Save</button>
	</div>
</div>

<div id="edit-list-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Edit List</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">List name</label>

		    <div class="controls">
			  <input id="list-name" type="text" class="span12" />
			  <input id="list-id" type="hidden" value="" />
		    </div>
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="edit-list-modal-close" class="btn-close close-modal">Close</button>
		<button id="edit-list-modal-save" class="btn-primary">Save</button>
	</div>
</div>
<div id="delete-list-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-header">
		<button type="button" class="close close-modal" aria-hidden="true">×</button>
		<h3>Delete List</h3>
	</div>

	<div class="modal-body">
		<div class="control-group">
		    <label class="control-label">Are you sure you want to delete this list?</label>
		   	<input type="hidden" id="delete-id" value="" />
		 </div>	
	</div>

	<div class="modal-footer">
		<button id="delete-list-modal-close" class="btn-close close-modal">Close</button>
		<button id="delete-list-btn" class="btn-primary">Delete</button>
	</div>
</div>

<div class="ui-widget-overlay"></div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>
<script>App.setListsPage(true);</script>