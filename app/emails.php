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
$stmt = $conn->prepare('SELECT id, email FROM emails WHERE list_id = :listid');
$result = $stmt->execute(array('listid' => $_GET['id']));
?>
<link rel="stylesheet" type="text/css" href="css/fupload.css">
<div class="header">
	<h1 class="page-title">Email List</h1>
</div>
<ul class="breadcrumb">
	<li><a href="lists.php">Lists</a> <span class="divider">/</span></li>
	<li class="active">Emails</li>
</ul>
<div class="container-fluid">
	<div class="row-fluid">

<div id="uploademailfile">
	<form method="post" action="emails.php?id=<?php echo urlencode($_GET['id']); ?>" enctype="multipart/form-data">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td>
                    <!--
						<a href="#" title="Upload File" onclick="upload.init('<?php echo '.'; ?>', <?php echo 2097152; ?>); return false;"><img style="width:50px;height:60px;" src="images/file_upload-128.png" alt="Upload File"></a>
                        -->
            <button type="button" name="submitbtn" class="btn btn-primary" data-toggle="modal" href="#addEmail"> Add Email</button>&nbsp;
           
             <button onclick="upload.init('<?php echo '.'; ?>', <?php echo 2097152; ?>); return false;" type="button" name="submitbtn" value="uploadcsv" class="btn btn-primary"> Upload CSV</button>

                    
              
                    <!--
					    <label for="email">Upload file or add email</label>
					    <input type="text" name="email" />
                        <button type="submit" name="submitbtn" value="saveemail" class="btn btn-primary"><i class="icon-envelope-alt"></i> Save</button>
                        -->
                        
                        
                        
                        
					    &nbsp;<button data-toggle="modal" type="button" href="#importModal" name="submitbtn" value="importcontacts" class="btn btn-primary"><i class="fa fa-sign-in"></i> Import Contacts</button>
					
                    
                    
                    </td>
					<td style="text-align:right;">
					    <button type="button" name="submitbtn" class="btn"> Download CSV</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<form id="emailForm" method="post" action="emails.php?id=<?php echo urlencode($_GET['id']); ?>">
<div class="well">
    <table class="table">
      <thead>
        <tr>
			<th>Email</th><th>Email</th><th>Email</th>
	    </tr>
      </thead>
      <tbody>      
        <tr>
          <tr>
		<?php while($row = $stmt->fetch()){ 			
				echo "<td>".htmlentities($row['email'])."&nbsp;&nbsp;<a data-toggle='modal' data-id='".$row['id']."' class='deletelist' href='#myModal'><i class='icon-remove'></i></a></td>";
					
					if ($i % 3 == 0)
							echo "</tr><tr>";
						$i++;
		} 
		if($i == 1) echo '<tr><td colspan="3" style="text-align:center;" class="align-center">There are no emails to display</td></tr>'; ?>
      </tbody>
    </table>
</div>
<input type="hidden" id="deleteID" name="deleteID" value=""/>
<input type="hidden" name="submitbtn" value="deleteID"/>
</form>
<div class="modal small hide fade" id="addEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="post" action="emails.php?id=<?php echo $_GET['id']; ?>">
	    <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		   <h3 id="myModalLabel">Add New Email</h3>
	    </div>
	    <div class="modal-body edit">
		   <p class="error-text"><i class="icon-warning-sign modal-icon"></i>
		     <input type="text" name="email"/>
		   </p>
	    </div>
	    <div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <button type="submit" name="submitbtn" value="saveemail" class="btn btn-danger">Save</button>
	    </div>
    </form>
</div>
<div class="modal small hide fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form method="post" action="lists.php">
	    <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		   <h3 id="myModalLabel">Select Email Provider</h3>
	    </div>
	    <div class="modal-body edit">
		   <p class="error-text"><i class="icon-warning-sign modal-icon"></i>
		     <select name="type" onChange="location = this.options[this.selectedIndex].value;">
				<option></option>
				<option value="#">Hotmail</option>
				<option value="https://accounts.google.com/o/oauth2/auth?client_id=35316327914-4sdoc4ihn46qcc0ihnnlp06p1u0dv52n.apps.googleusercontent.com&redirect_uri=http://mihaismarandache.com/emarketing/app/lists.php&scope=https://www.google.com/m8/feeds/&response_type=code">GMail</option>
				<option value="#">Yahoo</option>
			</select>
		   </p>
	    </div>
	    <div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <button type="submit" name="submitbtn" value="edit" class="btn btn-danger">Save</button>
	    </div>
    </form>
</div>
<script src="lib/bootstrap/js/bootstrap.js"></script>
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
	switch(c[b].insert){case"before":g.parentNode.insertBefore(d,g);break;case"after":g.parentNode.insertBefore(d,g.nextSibling);break;case"under":default:g.appendChild(d)}if(c[b].postText){g.appendChild(document.createTextNode(c[b].postText))}}else{d=document.createElement(c[b])}}}}function fade(e,f,g,c,h,i){var d=e.style.opacity!=undefined,b,a;e.style[d?"opacity":"filter"]=d?f/10:"alpha(opacity="+f*10+")";a=setInterval(function(){if(h=="in"){f++;b=f<=g}else{if(h=="out"){f--;b=f>=g}}if(b){e.style[d?"opacity":"filter"]=d?f/10:"alpha(opacity="+f*10+")"}else{clearInterval(a);if(i){i()}}},c)}popup={init:function(d,a){json2markup(["div",{attributes:{id:"popOverlay"},events:{click:popup.close}}],document.body);json2markup(["div",{attributes:{id:"popup"}},["div",{attributes:{id:"head"}},["a",{attributes:{id:"x",href:"#"},events:{click:function(f){popup.close();f.preventDefault?f.preventDefault():f.returnValue=false}},text:"[x]"},"span",{text:d}],"div",{attributes:{id:"body"}}]],document.body);var e=$("popup"),c=$("popOverlay"),b;json2markup(a,$("body"));if(b=$("moveListUL")){if(b.offsetHeight>(document.body.offsetHeight-150)){b.style.height=document.body.offsetHeight-150+"px"}}e.style.marginTop="-"+parseInt(e.offsetHeight)/2+"px";e.style.marginLeft="-"+parseInt(e.offsetWidth)/2+"px";fade(c,0,6,25,"in");document.onkeydown=function(f){if((f||window.event).keyCode==27){popup.close();return false}}},close:function(){if(__AJAX_ACTIVE){return}if($("popup")){var a=$("popOverlay");fade(a,6,0,25,"out",function(){document.body.removeChild(a)});document.body.removeChild($("popup"))}document.onkeydown=null}};fOp={rename:function(a,b){popup.init("Rename:",["form",{attributes:{action:"?do=rename&subject="+a+"&path="+b+"&nonce="+nonce,method:"post"}},["input",{attributes:{title:"Rename To",type:"text",name:"rename",value:a}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},create:function(a,b){popup.init("Create "+a+":",["form",{attributes:{method:"post",action:"?do=create&path="+b+"&f_type="+a+"&nonce="+nonce}},["input",{attributes:{title:"Filename",type:"text",name:"f_name"}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},chmod:function(c,b,a){popup.init("Chmod "+unescape(b)+":",["form",{attributes:{method:"post",action:"?do=chmod&subject="+b+"&path="+c+"&nonce="+nonce}},["input",{attributes:{title:"chmod",type:"text",name:"mod",value:a}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},copy:function(a,b){popup.init("Copy "+unescape(a)+":",["form",{attributes:{method:"post",action:"?do=copy&subject="+a+"&path="+b+"&nonce="+nonce}},["input",{attributes:{title:"copy to",type:"text",name:"to",value:"copy-"+a}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},moveList:function(a,b,c){ajax(("?do=moveList&subject="+a+"&path="+b+"&to="+c),"get",null,function(d){if(!$("popup")){popup.init("Move "+unescape(a)+" to:",Function("return "+d)())}else{var f=$("popup"),e;$("body").innerHTML="";json2markup(Function("return "+d)(),$("body"));if((e=$("moveListUL")).offsetHeight>(document.body.offsetHeight-150)){e.style.height=document.body.offsetHeight-150+"px"}f.style.marginTop="-"+parseInt(f.offsetHeight)/2+"px";f.style.marginLeft="-"+parseInt(f.offsetWidth)/2+"px"}})},remoteCopy:function(a){popup.init("Remote Copy:",["form",{attributes:{method:"post",action:"?do=remoteCopy&path="+a+"&nonce="+nonce,id:"remote-copy"}},["legend",{text:"Location: "},["br",{},"input",{attributes:{title:"Remote Copy",type:"text",name:"location"},events:{change:function(b){$("remoteCopyName").value=this.value.substring(this.value.lastIndexOf("/")+1)}}}],"legend",{text:"Name: "},["br",{},"input",{attributes:{id:"remoteCopyName",title:"Name",type:"text",name:"to"}}],"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])}};edit={init:function(b,c,d,a){__CODEMIRROR_MODE=d;json2markup(["div",{attributes:{id:"editOverlay"}}],document.body);$("editOverlay").style.height="100%";json2markup(["div",{attributes:{id:"ea"}},["textarea",{attributes:{id:"ta",rows:"30",cols:"90"},events:{change:function(){window.__FILECHANGED=true}}},"br",{},"input",{attributes:{type:"text",value:unescape(b),readonly:""}},"input",{attributes:{type:"button",value:"CodeMirror"},events:{click:function(){if(a){edit.codeMirrorLoad()}else{if(confirm("Install CodeMirror?")){ajax("?do=installCodeMirror","get",null,function(e){if(e==""){edit.codeMirrorLoad()}else{alert("Install failed. Manually upload CodeMirrorand place it in _codemirror, in the same directory as pafm")}})}}this.disabled=true}}},"input",{attributes:{type:"button",value:"Save",id:"save"},events:{click:function(){edit.save(b,c)}}},"input",{attributes:{type:"button",value:"Exit",id:"exit"},events:{click:function(){edit.exit(b,c)}}},"span",{attributes:{id:"editMsg"}}]],document.body);document.onkeydown=function(f){if((f||window.event).keyCode==27){edit.exit(b,c);return false}};ajax("?do=readFile&path="+c+"&subject="+b,"get",null,function(e){$("ta").value=e});location="#header"},codeMirrorLoad:function(){if(!__CODEMIRROR_LOADED){json2markup(["script",{attributes:{src:__CODEMIRROR_PATH+"/cm.js",type:"text/javascript"},events:{load:function(){__CODEMIRROR_LOADED=true;edit.codeMirrorLoad()}}},"link",{attributes:{rel:"stylesheet",href:__CODEMIRROR_PATH+"/cm.css"}},],document.getElementsByTagName("head")[0])}else{var a=__CODEMIRROR_MODES[__CODEMIRROR_MODE]||__CODEMIRROR_MODE;__CODEMIRROR=CodeMirror.fromTextArea($("ta"),{onChange:function(){window.__FILECHANGED=true},lineNumbers:true});__CODEMIRROR.setOption("mode",a)}},save:function(b,c){__CODEMIRROR&&__CODEMIRROR.save();$("editMsg").innerHTML=null;var a="data="+encodeURIComponent($("ta").value);ajax("?do=saveEdit&subject="+b+"&path="+c+"&nonce="+nonce,"post",a,function(d){$("editMsg").className=d.indexOf("saved")==-1?"failed":"succeeded";$("editMsg").innerHTML=d});window.__FILESAVED=true;window.__FILECHANGED=false},exit:function(a,b){if(window.__FILECHANGED&&!confirm("Leave without saving?")){return}if(window.__FILESAVED){ajax("?do=getfs&path="+b+"&subject="+a,"get",null,function(e){var g=$("dirList").getElementsByTagName("li"),d=unescape(a),f=0,c=g.length;for(;f<c;f++){if(g[f].title==d){g[f].getElementsByTagName("span")[0].innerHTML=e;break}}})}__CODEMIRROR=null;document.body.removeChild($("ea"));document.body.removeChild($("editOverlay"));window.__FILESAVED=null;document.onkeydown=null}};shell={init:function(b,a){popup.init("Shell:",["textarea",{attributes:{id:"shell-history"},text:""},"form",{attributes:{id:"shell",action:"?do=shell&nonce="+nonce,method:"post"},events:{submit:shell.submit}},["input",{attributes:{type:"text",name:"cmd",id:"cmd","data-bash":"["+b+" "+a+"]"}},"input",{attributes:{title:"Ok",type:"submit",value:"\u2713"}}]])},submit:function(a){a.preventDefault();$("shell-history").innerHTML+=$("cmd").getAttribute("data-bash")+"> "+$("cmd").value;ajax($("shell").getAttribute("action"),"POST","cmd="+encodeURIComponent($("cmd").value),function(b){$("shell-history").innerHTML+="\n"+b;$("shell-history").scrollTop=$("shell-history").scrollHeight});$("cmd").value="";return false}};upload={init:function(b,a){popup.init("Upload:",["form",{attributes:{id:"upload",action:"?do=upload&path="+b,method:"post",enctype:"multipart/form-data",encoding:"multipart/form-data"}},["input",{attributes:{type:"hidden",name:"MAX_FILE_SIZE",value:a}},"input",{
attributes:{
	type:"file",
	id:"file_input",
	name:"file"},
	events:{
		change:function(c){ 
				upload.chk(c.target.files[0].name,b);
			
		}
	}
	}],"div",{attributes:{id:"upload-drag"},events:{dragover:function(c){this.className="upload-dragover";c.preventDefault()},dragleave:function(){this.className=""},drop:function(c){c.preventDefault();upload.chk(c.dataTransfer.files[0].name,b,c.dataTransfer.files[0])},},text:"drag here"},"div",{attributes:{id:"response"},text:"php.ini upload limit: "+Math.floor(a/1048576)+" MB"}])},chk:function(a,d,b){var c=new FormData();c.append("file",b||$("file_input").files[0]);ajax("?do=fileExists&path="+d+"&subject="+a,"GET",null,function(e){if(e=="1"){json2markup(["input",{insert:"after",attributes:{type:"button",value:"Replace?"},events:{click:function(f){upload.submit(d,c)}}}],$("file_input"))
	} else {
		upload.submit(d,c)
	}
})},
submit:function(b,a){
	ajax("ajax_file.php?id=<?php echo $_GET['id']; ?>","POST",a,function(c){
		$("response").innerHTML=c;
	//	location.reload(true);
	},true,function(d){
		if(d.lengthComputable){
			var c=Math.round((d.loaded*100)/d.total);
			$("response").innerHTML="uploaded: "+c+"%"
		}
	})}};
var $j = jQuery.noConflict();

$j(document).on("click", ".deletelist", function () {
    var deleteid = $j(this).data('id');
	$j("#deleteID").val( deleteid );
	$j('#emailForm').submit();
});
</script>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>