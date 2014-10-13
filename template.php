<?php
ob_start();
session_start();

ini_set('max_execution_time', 1500);
ini_set('memory_limit', '2024M');

include 'include/dbconnect.php';

// Store template id for loop
if(isset($_GET['id']))
	$_SESSION['templateid'] = $_GET['id'];
	
// Load the correct template
$tstmt = $conn->prepare('SELECT name FROM templates WHERE id = :id');
$tresult = $tstmt->execute(array('id' => $_SESSION['templateid']));
$trow = $tstmt->fetch();

if($_POST['emailform'] == "submitted" || isset($_GET['processing'])){
	if(!isset($_GET['processing'])){
		$_SESSION['c_id'] = uniqid('C',true);
		$_SESSION['listid'] = $_POST['lists'];
	}

	require_once('PHPMailer_5.2.1/class.phpmailer.php');
 
	if($_POST['subject'] != ''){
		$_SESSION['from'] = $_POST['from'];
		$_SESSION['fromemail'] = $_POST['fromemail'];
		$_SESSION['replyto'] = $_POST['replyto'];
		$_SESSION['subject'] = $_POST['subject'];
		$_SESSION['maintitle'] = $_POST['maintitle'];
		$_SESSION['textarea'] = $_POST['textarea'];
		$_SESSION['emailreceipt'] = $_POST['receipt'];
	}

	// Select all emails corresponding to the chosen list
	$stmtmain = $conn->prepare('SELECT id, email FROM emails WHERE list_id = :listid');
	$resultmain = $stmtmain->execute(array('listid' => $_SESSION['listid']));
	
	$count = $stmtmain->rowCount();
		
	switch ($trow['name']){
		case 'Newsletter':
			$template = 'templates/Newsletter.html';
		break;
		case 'Basic':
			$template = 'templates/Basic.html';
		break;
		case 'Modern':
			$template = 'templates/Modern.html';
		break;
		case 'Modern Left':
			$template = 'templates/ModernLeft.html';
		break;
		case 'Modern Right':
			$template = 'templates/ModernRight.html';
		break;
		case 'Real Estate':
			$template = 'templates/RealEstate.html';
		break;
		case 'Tech Simple':
			$template = 'templates/TechSimple.html';
		break;
		case 'Tech Full':
			$template = 'templates/TechFull.html';
		break;
		case 'Tech Column':
			$template = 'templates/TechColumn.html';
		break;
	}
	
	if($count > 14){	die('Too Many Emails!');
		header('refresh: 70; template.php?processing');
		$mail = new PHPMailer();
		
			// handle file upload if there is one
			if(!isset($_GET['processing'])){
				if(isset($_FILES['attachment']['tmp_name'])){
					
					
					
				}
		
		
			// Create the campaign in the campaigns table
$stmtc = $conn->prepare('INSERT INTO campaigns (id, user_id, list_id, subject, email_from) VALUES (:cid, :userid, :listid,  :subject, :from)');
$resultc = $stmtc->execute(array('cid' => $_SESSION['c_id'], 'userid' => $_SESSION['id'], 'listid' => $_POST['lists'], 'subject' => $_POST['subject'], 'from' => $_POST['from']));
			

				while($campaignemails = $stmtmain->fetch()){ 

					// put all emails in campaign emails
					$stmcemails = $conn->prepare('INSERT INTO campaign_emails (c_id, email) VALUES (:cid, :email)');
					$resulctemails = $stmcemails->execute(array('cid' => $_SESSION['c_id'], 'email' => $campaignemails['email']));	
	
				}
	
			}
						
			// Set additional parameters for mail object
			$mail->SetFrom($_SESSION['fromemail'], $_SESSION['from']);
			$mail->AddReplyTo($_SESSION['replyto']);
			$mail->Subject    = $_SESSION['subject'];
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			
			
			
			////////////////////////////////////////////////
			// Fill in template before sending
			$patterns = array();
			$replacements = array();
			
					
			// Select all fields from template_fields and put them in template
			$stmtfields = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
			$resultfields = $stmtfields->execute(array('userid' => $_SESSION['id'], 'templateid' => $_SESSION['templateid']));
		
			while($rowfields = $stmtfields->fetch()){
				
				$patterns[$rowfields['field']] = '/FIELD'.$rowfields['field'].'/';
				$replacements[$rowfields['field']] = nl2br($rowfields['value']);
		
			}
			//////////////////////////////////
			// Select all emails from campaign_emails inserted above
			$stmtcid = $conn->prepare('SELECT id, c_id, email FROM campaign_emails WHERE c_id = :cid AND sent = 0 LIMIT 14');
			$resultcid = $stmtcid->execute(array('cid' => $_SESSION['c_id']));			
			
			
			echo '<table class="sending">';
			while($rowcid = $stmtcid->fetch()){
				
				$patterns[100] = '/emaill/';
				$patterns[120] = '/idd/';
				$replacements[100] = $rowcid['email'];
				$replacements[120] = $rowcid['id'];
	
				$body = file_get_contents($template);
				$body = preg_replace($patterns, $replacements, $body);
// ATTACH FILES FOR EACH EMAIL
$attachments = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid AND field LIKE "A%"');
$resultattach = $attachments->execute(array('userid' => $_SESSION['id'], 'templateid' => $_GET['id']));

while($rowattach = $attachments->fetch()){
	$mail->AddAttachment('files/'.$rowattach['field']);
}
/////////////////
				
				$mail->MsgHTML($body);
				$mail->AddAddress($rowcid['email']);
				if(!$mail->Send()) {
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else echo '<tr><td>Email Sent To:</td><td>'.$rowcid['email'].'</td><td>Time:</td><td>'.date('m/d/Y h:i:s A').'</td></tr>'; 
				
				$mail->ClearAllRecipients();

				// Update campaign_emails that the email has been sent so next go around it will pick the non sent ones
				$stmtupdatesent = $conn->prepare('UPDATE campaign_emails SET sent = 1 WHERE id = :id');
				$resultupdatesent = $stmtupdatesent->execute(array('id' => $rowcid['id']));
		
			} // The while loop
			echo '</table>';

	} else {
		// if there are more than 0 emails but less than 20 do once and finish right then
		if($count > 0){ 
		
			// handle file upload if there is one
			if(!isset($_GET['processing'])){
				
					
		
			$stmtc = $conn->prepare('INSERT INTO campaigns (id, user_id, list_id, subject, email_from) VALUES (:cid, :userid, :listid,  :subject, :from)');
			$resultc = $stmtc->execute(array('cid' => $_SESSION['c_id'], 'userid' => $_SESSION['id'], 'listid' => $_POST['lists'], 'subject' => $_POST['subject'], 'from' => $_POST['from']));
	
			}


			while($campaignemails = $stmtmain->fetch()){ 

					// put all emails in campaign emails
					$stmcemails = $conn->prepare('INSERT INTO campaign_emails (c_id, email) VALUES (:cid, :email)');
					$resulctemails = $stmcemails->execute(array('cid' => $_SESSION['c_id'], 'email' => $campaignemails['email']));	
	
			}
			
			$patterns = array();
			$replacements = array();
			
			///////////////
			
			// Select all fields from template_fields and put them in template
			$stmtfields = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
			$resultfields = $stmtfields->execute(array('userid' => $_SESSION['id'], 'templateid' => $_GET['id']));

			while($rowfields = $stmtfields->fetch()){
				switch($rowfields['field']){
					case 'PIC1':
						$patterns[1000] = '/PIC1/';
						$replacements[1000] = $rowfields['value'];
					break;	
					case 'LINK1':
					
					break;
					case 'FOOTER':
						$patterns['FOOTER'] = '/FOOTER/';
						$replacements['FOOTER'] = $rowfields['value'];
					break;
					default:
						$patterns[$rowfields['field']] = '/FIELD'.$rowfields['field'].'/';
						$replacements[$rowfields['field']] = nl2br($rowfields['value']);
				}
			} 
		 		
//////////////
echo '<pre>';
//print_r($replacements);
echo '</pre>';

			/// Select all emails from campaign_emails inserted above
			$stmtcid = $conn->prepare('SELECT id, c_id, email FROM campaign_emails WHERE c_id = :cid AND sent = 0 LIMIT 14');
			$resultcid = $stmtcid->execute(array('cid' => $_SESSION['c_id']));
			echo '<table class="sending">';
			
		while($rowcid = $stmtcid->fetch()){
			
			////////////////////////////REPLACING AND CONSTRUCTING THE CALLBACK LINK
			$patterns[100] = '/EMAILL/';
			$patterns[101] = '/ROOT/';
			$patterns[102] = '/IDD/';

			$replacements[100] = $rowcid['email'];
			$replacements[101] = getenv('HTTP_HOST');
			$replacements[102] = $rowcid['id'];
			///////////////////////////////////////////
			
		
			$body = file_get_contents($template);
		
			$body = preg_replace($patterns, $replacements, $body);
			
			////////////////////////////////////
//echo $body;
//exit;

			$mail = new PHPMailer();
			$mail->SMTPDebug  = 2;                    
			
			$mail->SetFrom($_SESSION['fromemail'], $_SESSION['from']);
			$mail->AddReplyTo($_SESSION['replyto']);
			
			$mail->Subject = $_SESSION['subject'];

// ATTACH FILES FOR EACH EMAIL
$attachments = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid AND field LIKE "A%"');
$resultattach = $attachments->execute(array('userid' => $_SESSION['id'], 'templateid' => $_GET['id']));

while($rowattach = $attachments->fetch()){
	$mail->AddAttachment('files/'.$rowattach['field']);
}
/////////////////

			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
			$mail->MsgHTML($body); 
			$mail->AddAddress($rowcid['email']);
			
			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "Message sent to ".$rowcid['email']."<br/>";
			}

			// Update campaign_emails that the email has been sent so next go around it will pick the non sent ones
			$stmtupdatesent = $conn->prepare('UPDATE campaign_emails SET sent = 1 WHERE id = :id');
			$resultupdatesent = $stmtupdatesent->execute(array('id' => $rowcid['id']));

	
		} // should be the while loop
			echo '</table>';
			
		//	header('Location: templates.php?finished');
		//	exit;
		
			
		}
	}
	
} else {
	if(isset($_GET['finished'])) echo '<div class="n_ok"><p>All emails have been sent</p></div>'; 
	
?>
<link rel="stylesheet" type="text/css" href="css/fupload.css">
<style type="text/css">
textarea {
	width: 300px;
	height: 150px;
}

.inline-edit {
	width: auto;
}

.inline-edit .form {
	display: none;
}

.inline-edit .hover {
	background-color: #FFFFA5;
	cursor: pointer;
}
</style>
<div class="header">
	<h1 class="page-title">Template</h1>
</div>

<ul class="breadcrumb">
	<li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
	<li class="active">Template</li>
</ul>

<div class="container-fluid">
  <div class="row-fluid">
<?php 
$stmt = $conn->prepare('SELECT id, name FROM lists WHERE user_id = :userid');
$result = $stmt->execute(array('userid' => $_SESSION['id']));
while($row = $stmt->fetch()){ 
	$options .= "<option value=".$row['id'].">".$row['name']."</option>";
}
?>
<form method="post" action="template.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
<table>
	<tr>
		<td>
			<p><label for="lists">List Name</label><select name="lists"><?php echo $options; ?></select></p>
		</td>
		<td>
			<p><label for="subject">Subject</label><input type="text" name="subject" /></p>		
		</td>
		<td>
			<p><label for="from">From (Name)</label><input type="text" name="from" /></p>	
		</td>
		<td>
			<p><label for="from">From (Email)</label><input type="text" name="fromemail" /></p>	
		</td>
		<td>
			<p><label for="replyto">Reply To (Email)</label><input type="text" name="replyto" /></p>	
		</td>
	</tr>
	<tr>
		<td>
			<a href="#" title="Upload File" onclick="upload.init('<?php echo 'attachment'; ?>', <?php echo 20097152; ?>); return false;"><img style="width:40px;height:45px;" src="images/file_upload-128.png" alt="Upload File"></a>
		</td>
		<td colspan="3">&nbsp;</td>
		<td style="text-align:right;">
			<button type="submit" name="createlist" class="btn btn-primary"><i class="icon-envelope-alt"></i> Send Email</button>
		</td>
	</tr>
</table>
<?php // DISPLAYING ALL ATTACHED FILES
$attachments = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid AND field LIKE "A%"');
$resultattach = $attachments->execute(array('userid' => $_SESSION['id'], 'templateid' => $_GET['id']));

while($rowattach = $attachments->fetch()){
	echo '<a target="_blank" href="files/'.$rowattach['field'].'">'.$rowattach['value'].'</a><br/>';
}

// Store all field values that have been completed into an array. Fields in template are named 1, 2, 3... in order from beg to end
$stmt = $conn->prepare('SELECT field, value FROM template_fields WHERE user_id = :userid AND template_id = :templateid');
$result = $stmt->execute(array('userid' => $_SESSION['id'], 'templateid' => $_GET['id']));
while($row = $stmt->fetch()){
	$fields[$row['field']] = $row['value'];	
}
		
switch ($trow['name']){
	case 'Newsletter':
		include 'templates/Newsletter.php';
	break;
	case 'Basic':
		include 'templates/Basic.php';
	break;
	case 'Modern':
		include 'templates/Modern.php';
	break;
	case 'Modern Left':
		include 'templates/ModernLeft.php';
	break;
	case 'Modern Right':
		include 'templates/ModernRight.php';
	break;
	case 'Real Estate':
		include 'templates/RealEstate.php';
	break;
	case 'Tech Simple':
		include 'templates/TechSimple.php';
	break;
	case 'Tech Full':
		include 'templates/TechFull.php';
	break;
	case 'Tech Column':
		include 'templates/TechColumn.php';
	break;
}
?>
<input type="hidden" id="templateid" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="emailform" value="submitted" />
</form>

<script type="text/javascript" src="js/editinplace.js"></script>

<script type="text/javascript">
function $(a){return document.getElementById(a)}var popup,fOp,edit,upload,shell,__AJAX_ACTIVE,__CODEMIRROR,__CODEMIRROR_MODE,__CODEMIRROR_LOADED,__CODEMIRROR_PATH="_cm",__CODEMIRROR_MODES={html:"htmlmixed",js:"javascript",py:"python",rb:"ruby",md:"markdown"};
	function ajax(b,g,e,c,a,d){
		__AJAX_ACTIVE=true;
		if(!a){
			json2markup(["div",{
				attributes:{id:"ajaxOverlay"}
			},
			"img",{
				attributes:{
					src:"?r=images/ajax.gif",
					id:"ajaxImg",
					title:"Loading",
					alt:"Loading"
				}
			}],document.body);
			$("ajaxOverlay").style.height=document.body.offsetHeight+"px";
			fade($("ajaxOverlay"),0,6,25,"in");
	}
	if(window.ActiveXObject == true){
		var f = new ActiveXObject("MSXML2.XMLHTTP.3.0");
	} else {
		var f = new XMLHttpRequest();
	}
	d&&f.upload.addEventListener("progress",d,false); 
	f.open(g,b,true);
	f.onreadystatechange=function(){
		if(f.readyState!=4){return}__AJAX_ACTIVE=false;a||fade($("ajaxOverlay"),6,0,25,"out",function(){document.body.removeChild($("ajaxOverlay"));document.body.removeChild($("ajaxImg"))});if(f.status==200||f.statusText=="OK"){if(f.responseText=="Please refresh the page and login"){alert(f.responseText)}else{c(f.responseText)}}else{alert("AJAX request unsuccessful.\nStatus Code: "+f.status+"\nStatus Text: "+f.statusText+"\nParameters: "+b)}f=null};if(g.toLowerCase()=="post"&&!a){f.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8")}f.send(e)}function json2markup(c,g){var b=0,a=c.length,d,f,e;for(;b<a;b++){if(c[b].constructor==Array){json2markup(c[b],d)}else{if(c[b].constructor==Object){if(c[b].attributes){for(f in c[b].attributes){
		switch(f.toLowerCase()){
			case"class":
				d.className=c[b].attributes[f];
			break;
			case"style":
				d.style.cssText=c[b].attributes[f];
			break;
			case"for":
				d.htmlFor=c[b].attributes[f];
			break;
			default:
				d.setAttribute(f,c[b].attributes[f])
		}}}
		if(c[b].events){
			for(e in c[b].events){
				d.addEventListener(e,c[b].events[e],false);
				
			}
		}
	if(c[b].preText){
		g.appendChild(document.createTextNode(c[b].preText))
	}
	if(c[b].text){
		d.appendChild(document.createTextNode(c[b].text))
	}
	switch(c[b].insert){case"before":g.parentNode.insertBefore(d,g);break;case"after":g.parentNode.insertBefore(d,g.nextSibling);break;case"under":default:g.appendChild(d)}if(c[b].postText){g.appendChild(document.createTextNode(c[b].postText))}}else{d=document.createElement(c[b])}}}}function fade(e,f,g,c,h,i){var d=e.style.opacity!=undefined,b,a;e.style[d?"opacity":"filter"]=d?f/10:"alpha(opacity="+f*10+")";a=setInterval(function(){if(h=="in"){f++;b=f<=g}else{if(h=="out"){f--;b=f>=g}}if(b){e.style[d?"opacity":"filter"]=d?f/10:"alpha(opacity="+f*10+")"}else{clearInterval(a);if(i){i()}}},c)}popup={init:function(d,a){json2markup(["div",{attributes:{id:"popOverlay"},events:{click:popup.close}}],document.body);json2markup(["div",{attributes:{id:"popup"}},["div",{attributes:{id:"head"}},["a",{attributes:{id:"x",href:"#"},events:{click:function(f){popup.close();f.preventDefault?f.preventDefault():f.returnValue=false}},text:"[x]"},"span",{text:d}],"div",{attributes:{id:"body"}}]],document.body);var e=$("popup"),c=$("popOverlay"),b;json2markup(a,$("body"));if(b=$("moveListUL")){if(b.offsetHeight>(document.body.offsetHeight-150)){b.style.height=document.body.offsetHeight-150+"px"}}e.style.marginTop="-"+parseInt(e.offsetHeight)/2+"px";e.style.marginLeft="-"+parseInt(e.offsetWidth)/2+"px";fade(c,0,6,25,"in");document.onkeydown=function(f){if((f||window.event).keyCode==27){popup.close();return false}}},close:function(){if(__AJAX_ACTIVE){return}if($("popup")){var a=$("popOverlay");fade(a,6,0,25,"out",function(){document.body.removeChild(a)});document.body.removeChild($("popup"))}document.onkeydown=null}};fOp={rename:function(a,b){popup.init("Rename:",["form",{attributes:{action:"?do=rename&subject="+a+"&path="+b+"&nonce="+nonce,method:"post"}},["input",{attributes:{title:"Rename To",type:"text",name:"rename",value:a}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},create:function(a,b){popup.init("Create "+a+":",["form",{attributes:{method:"post",action:"?do=create&path="+b+"&f_type="+a+"&nonce="+nonce}},["input",{attributes:{title:"Filename",type:"text",name:"f_name"}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},chmod:function(c,b,a){popup.init("Chmod "+unescape(b)+":",["form",{attributes:{method:"post",action:"?do=chmod&subject="+b+"&path="+c+"&nonce="+nonce}},["input",{attributes:{title:"chmod",type:"text",name:"mod",value:a}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},copy:function(a,b){popup.init("Copy "+unescape(a)+":",["form",{attributes:{method:"post",action:"?do=copy&subject="+a+"&path="+b+"&nonce="+nonce}},["input",{attributes:{title:"copy to",type:"text",name:"to",value:"copy-"+a}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},moveList:function(a,b,c){ajax(("?do=moveList&subject="+a+"&path="+b+"&to="+c),"get",null,function(d){if(!$("popup")){popup.init("Move "+unescape(a)+" to:",Function("return "+d)())}else{var f=$("popup"),e;$("body").innerHTML="";json2markup(Function("return "+d)(),$("body"));if((e=$("moveListUL")).offsetHeight>(document.body.offsetHeight-150)){e.style.height=document.body.offsetHeight-150+"px"}f.style.marginTop="-"+parseInt(f.offsetHeight)/2+"px";f.style.marginLeft="-"+parseInt(f.offsetWidth)/2+"px"}})},remoteCopy:function(a){popup.init("Remote Copy:",["form",{attributes:{method:"post",action:"?do=remoteCopy&path="+a+"&nonce="+nonce,id:"remote-copy"}},["legend",{text:"Location: "},["br",{},"input",{attributes:{title:"Remote Copy",type:"text",name:"location"},events:{change:function(b){$("remoteCopyName").value=this.value.substring(this.value.lastIndexOf("/")+1)}}}],"legend",{text:"Name: "},["br",{},"input",{attributes:{id:"remoteCopyName",title:"Name",type:"text",name:"to"}}],"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])}};edit={init:function(b,c,d,a){__CODEMIRROR_MODE=d;json2markup(["div",{attributes:{id:"editOverlay"}}],document.body);$("editOverlay").style.height="100%";json2markup(["div",{attributes:{id:"ea"}},["textarea",{attributes:{id:"ta",rows:"30",cols:"90"},events:{change:function(){window.__FILECHANGED=true}}},"br",{},"input",{attributes:{type:"text",value:unescape(b),readonly:""}},"input",{attributes:{type:"button",value:"CodeMirror"},events:{click:function(){if(a){edit.codeMirrorLoad()}else{if(confirm("Install CodeMirror?")){ajax("?do=installCodeMirror","get",null,function(e){if(e==""){edit.codeMirrorLoad()}else{alert("Install failed. Manually upload CodeMirrorand place it in _codemirror, in the same directory as pafm")}})}}this.disabled=true}}},"input",{attributes:{type:"button",value:"Save",id:"save"},events:{click:function(){edit.save(b,c)}}},"input",{attributes:{type:"button",value:"Exit",id:"exit"},events:{click:function(){edit.exit(b,c)}}},"span",{attributes:{id:"editMsg"}}]],document.body);document.onkeydown=function(f){if((f||window.event).keyCode==27){edit.exit(b,c);return false}};ajax("?do=readFile&path="+c+"&subject="+b,"get",null,function(e){$("ta").value=e});location="#header"},codeMirrorLoad:function(){if(!__CODEMIRROR_LOADED){json2markup(["script",{attributes:{src:__CODEMIRROR_PATH+"/cm.js",type:"text/javascript"},events:{load:function(){__CODEMIRROR_LOADED=true;edit.codeMirrorLoad()}}},"link",{attributes:{rel:"stylesheet",href:__CODEMIRROR_PATH+"/cm.css"}},],document.getElementsByTagName("head")[0])}else{var a=__CODEMIRROR_MODES[__CODEMIRROR_MODE]||__CODEMIRROR_MODE;__CODEMIRROR=CodeMirror.fromTextArea($("ta"),{onChange:function(){window.__FILECHANGED=true},lineNumbers:true});__CODEMIRROR.setOption("mode",a)}},save:function(b,c){__CODEMIRROR&&__CODEMIRROR.save();$("editMsg").innerHTML=null;var a="data="+encodeURIComponent($("ta").value);ajax("?do=saveEdit&subject="+b+"&path="+c+"&nonce="+nonce,"post",a,function(d){$("editMsg").className=d.indexOf("saved")==-1?"failed":"succeeded";$("editMsg").innerHTML=d});window.__FILESAVED=true;window.__FILECHANGED=false},exit:function(a,b){if(window.__FILECHANGED&&!confirm("Leave without saving?")){return}if(window.__FILESAVED){ajax("?do=getfs&path="+b+"&subject="+a,"get",null,function(e){var g=$("dirList").getElementsByTagName("li"),d=unescape(a),f=0,c=g.length;for(;f<c;f++){if(g[f].title==d){g[f].getElementsByTagName("span")[0].innerHTML=e;break}}})}__CODEMIRROR=null;document.body.removeChild($("ea"));document.body.removeChild($("editOverlay"));window.__FILESAVED=null;document.onkeydown=null}};shell={init:function(b,a){popup.init("Shell:",["textarea",{attributes:{id:"shell-history"},text:""},"form",{attributes:{id:"shell",action:"?do=shell&nonce="+nonce,method:"post"},events:{submit:shell.submit}},["input",{attributes:{type:"text",name:"cmd",id:"cmd","data-bash":"["+b+" "+a+"]"}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},submit:function(a){a.preventDefault();$("shell-history").innerHTML+=$("cmd").getAttribute("data-bash")+"> "+$("cmd").value;ajax($("shell").getAttribute("action"),"POST","cmd="+encodeURIComponent($("cmd").value),function(b){$("shell-history").innerHTML+="\n"+b;$("shell-history").scrollTop=$("shell-history").scrollHeight});$("cmd").value="";return false}};
	upload = {
		init:function(b,a){ 
			popup.init("Upload:",["form",{
				attributes:{
					id:"upload",action:"?do=upload&path="+b,method:"post",enctype:"multipart/form-data",encoding:"multipart/form-data"
				}
			},
			["input",{
				attributes:{
					type:"hidden",name:"MAX_FILE_SIZE",value:a
					}
				},
				"input",{
					attributes:{
						type:"file",
						id:"file_input",
						name:"file"
					},
					events:{
						change:function(c){ 
								upload.chk(c.target.files[0].name,b);	
						}
					}
				}],
					
				"div",{
					attributes:{
						id:"upload-drag"
					},
					events:{
						dragover:function(c){
							this.className = "upload-dragover";
							c.preventDefault();
						},
						dragleave:function(){
							this.className = "";
						},
						drop:function(c){
							c.preventDefault();
							upload.chk(c.dataTransfer.files[0].name,b,c.dataTransfer.files[0]);
						},
					},
					text:"drag here"
				},
				"div",{
					attributes:{
						id:"response"
					},
					text:"File upload limit: "+Math.floor(a/1048576)+" MB"}])
				},
				chk:function(a,d,b){
					var c = new FormData();
					c.append("file",b||$("file_input").files[0]);
					ajax("ajax_file.php?userid=<?php echo $_SESSION['id']; ?>&templateid=<?php echo $_GET['id']; ?>&field="+d,
						"GET",
						null,
						function(e){
							if(e=="1"){
								json2markup(["input",{
									insert:"after",
									attributes:{
										type:"button",value:"Replace?"
										},
									events:{
										click:function(f){
											upload.submit(d,c);
										}}}],
									$("file_input"))
	} else {
		upload.submit(d,c)
	}
})},
submit:function(b,a){
	ajax("ajax_file.php?userid=<?php echo $_SESSION['id']; ?>&templateid=<?php echo $_GET['id']; ?>&field="+b,"POST",a,function(c){
		$("response").innerHTML=c;
		location.reload(true); 
	},true,function(d){
		if(d.lengthComputable){
			var c=Math.round((d.loaded*100)/d.total);
			$("response").innerHTML="uploaded: "+c+"%";
		}
	}
	)
	}};
	
</script>
<?php
}
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?> 