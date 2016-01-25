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
	 
	$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$accesstoken;
	$xmlresponse =  curl_file_get_contents($url);
	if((strlen(stristr($xmlresponse,'Authorization required'))>0) && (strlen(stristr($xmlresponse,'Error '))>0)) //At times you get Authorization error from Google.
	{
		echo "<h2>OOPS !! Something went wrong. Please try reloading the page.</h2>";
		exit;
	}
	
	$xml =  new SimpleXMLElement($xmlresponse);
	$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
	$result = $xml->xpath('//gd:email');

	foreach ($result as $title) {
			$stmt = $conn->prepare('INSERT INTO emails (list_id, email) VALUES (:id, :email)');
			$result = $stmt->execute(array('id' => $_SESSION['list'], 'email' => $title->attributes()->address));
	}
	
	// Update notifications
	$stmtn = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
	$resultn = $stmtn->execute(array('id' => $_SESSION['id'], 'notification' => "Contacts have been imported into your list.", 'timestamp' => date('Y-m-d H:i:s')));
	
}

$stmt = $conn->prepare('SELECT id, name, created FROM lists WHERE user_id = :user');
$result = $stmt->execute(array('user' => $_SESSION['id']));

$lists = true;
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
                                        <button id="lists-add" class="btn green">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="lists-names">
                                    <thead>
                                    	<tr>
									<th>#</th>
									<th>List Name</th>
									<th>Contacts</th>
									<th>Date Created</th>
									<th>View</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
                                    </thead>
                                    <tbody>
		<?php
		$i = 1;
		while($row = $stmt->fetch()){ 
			$stmtcount = $conn->prepare('SELECT COUNT(id) as Total FROM emails WHERE list_id = :listid');
			$resultcount = $stmtcount->execute(array('listid' => $row['id']));
			$rowcount = $stmtcount->fetch();
								
echo "<tr id=".$row['id']."><td>$i</td><td>".htmlentities($row['name'])."</td><td>".$rowcount['Total']."</td><td>".htmlentities($row['created'])."</td><td><a href='emails.php?id=".urlencode($row['id'])."'>View</a></td><td><a class='edit' href='#'>Edit</a></td><td><a class='delete' href='#'>Delete</a></td></tr>";

				$i++;
		} 
		if($i == 1) echo '<tr><td>&nbsp;</td><td>There are no lists to display</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>'; ?>                                   
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