<?php
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

include 'include/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	switch ($_POST['action']){
		case 'save':
			$stmt = $conn->prepare('INSERT INTO lists (user_id, name, created) VALUES (:id, :name, :created)');
			$result = $stmt->execute(array('id' => $_SESSION['id'], 'name' => $_POST['name'], 'created' => date('m/d/Y')));
			if($result){
				// Update notifications
				$stmt = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:id, :notification, :timestamp)');
				$result = $stmt->execute(array('id' => $_SESSION['id'], 'notification' => "List <b>".$_POST['name']."</b> has been successfully created.", 'timestamp' => date('Y-m-d H:i:s')));	
			}
		break;
		case 'update':
			$stmt = $conn->prepare('UPDATE lists SET name = :name WHERE id = :listid');
			$result = $stmt->execute(array('name' => $_POST['name'], 'listid' => $_POST['listid']));
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
/*
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])){
	$message = true;
	$client_id='35316327914-4sdoc4ihn46qcc0ihnnlp06p1u0dv52n.apps.googleusercontent.com';
	$client_secret='rISHHURG8t7XVqMlHXNBqcVD';
	$redirect_uri='http://mmarandache.com/emarketing/app/lists.php';
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

	 // echo $title->attributes()->address . "<br>";
	}
	
	$stmtlist = $conn->prepare('SELECT id, name FROM lists WHERE id = :id');
	$resultlist = $stmtlist->execute(array('id' => $_SESSION['list']));
	$rowlist = $stmtlist->fetch();
}
*/
?>