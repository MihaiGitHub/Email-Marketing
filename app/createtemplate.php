<?php

// Config
include("include/Config.inc.php");
include("include/Util.inc.php");
if($_SESSION['authenticated'] == false){
	session_destroy();
	header("Location: index.php?authen=false");
	exit();	
}

if(isset($_POST['logout'])){
if($_POST['logout'] == "Log Out"){
  session_destroy();
  header("Location: index.php");
  exit();
}}
if($_GET['submitted'] == "true"){
echo $_POST['precode'];
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Email Marketing</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel="stylesheet" type="text/css" href="styles/main_style.css" />
</head>
<body>
<div id="Container">
	<div id="Header">
		<h1><span>Efficient Email Marketing</span></h1>	
	</div>
	<div id="BodyContainer">
		<div id="LeftNav">
			<? include("include/LeftNav.php"); ?>
		</div>
			<div class="padded">		
			
<table align="center" style="width:50%;" border="0">
	<tr>
		<td>Template Name</td><td><input type="text" class="inputbox" name="name" /></td>
	</tr>
</table><br/><br/><br/><br/>
<table border="1" class="maintable" cellpadding="3px" cellspacing="3px">
<tr>

	<td width="50%">
	<form style="margin:0px" action="createtemplate.php?submitted=true" method="post" target="view" id="tryitform" name="tryitform">

	<input style="margin-bottom:5px;font-family:verdana;" name="submit" type="submit" value="Edit and Click &raquo;">

	<textarea class="code_input" width="100%" height="400px" id="precode" name="precode" wrap="logical">
<html>
<body>
<table>
	<tr><th>Table Header</th></tr>
	<tr><td>Table Body</th></tr>
</table>
</body>
</html>
	</textarea>

	</form>
	</td>
	<td valign="top">
		<p class="result_header">Your Result:</p>
		<iframe class="result_output" width="100%" height="400px" frameborder="0" name="view" id="view"></iframe>
	</td>
</tr>
</table>
			</div>
	</div>
	<div id="Footer">
		<div id="copyright">
			&copy; 2011-<?= date("Y"); ?> Designed and developed by Templar IT
		</div>
	</div>
</div>	
<!---------------------------
<table cellspacing="0" border="1" style="background-image: url(./images/bg.gif); background-color: #c5c5c5;" cellpadding="0">
	
	<tr>
		
		<td valign="top">

			<table cellspacing="0" border="0" align="center" style="background: #fff; border-right: 1px solid #ccc; border-left: 1px solid #ccc;" cellpadding="0">
				<tr>
					<td valign="top">
						<table cellspacing="0" border="0" cellpadding="0">
							<tr>
								<td class="header-text" valign="top" style="color: #999; font-family: Verdana; font-size: 10px; text-transform: uppercase; padding: 0 20px;" colspan="2">
									<br /><br />Email not looking beautiful? <webversion style="color: #990000; text-decoration: none;">View it in your browser</webversion>
								</td>
							</tr>
							<tr>
								<td class="main-title" height="13" valign="top" style="padding: 0 20px; font-size: 25px; font-family: Georgia; font-style: italic;" colspan="2">
									The Elegant Email Company<br/>
								</td>
							</tr>
							<tr>
								<td height="20" valign="top" colspan="2">
									<img src="./images/breaker.jpg" height="20" alt="" style="border: 0;" width="600" />
								</td>
							</tr>
							<tr>
								<td class="header-bar" valign="top" style="color: #999; font-family: Verdana; font-size: 10px; text-transform: uppercase; padding: 0 20px; height: 15px;">
									newsletter update
								</td>
								<td class="header-bar" valign="top" style="color: #999; font-family: Verdana; font-size: 10px; text-transform: uppercase; padding: 0 20px; height: 15px; text-align: right;">
									<img src="http://mihai007.uphero.com/emailtemplate/images/facebook.png" height="25" width="25" alt="facebook" />
								</td>
							</tr>
							<tr>
								<td valign="bottom" colspan="2">
									<img src="./images/thin-breaker.jpg" alt="" style="border: 0;" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table cellspacing="0" border="0" cellpadding="0">
							<tr>
								
								<td valign="top">
									
									<table cellspacing="0" cellpadding="0">
										
										<tr>
											
											<td style="padding: 0 0 0 20px;">
												<table cellspacing="0" cellpadding="0">
													<tr>
														<td>
															<br />
															<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">In this issue</strong>
															<table cellspacing="0" border="0" cellpadding="0">
																<tr>
																	<td height="20"><img src="./images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" style="color: #cc0000; text-transform: uppercase; font-family: Verdana; font-size: 11px; text-decoration: none;">something awesome</td>
																</tr>
																<tr>
																	<td height="20"><img src="./images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" style="color: #cc0000; text-transform: uppercase; font-family: Verdana; font-size: 11px; text-decoration: none;">a kind of cool thing</td>
																</tr>
																<tr>
																	<td height="20"><img src="./images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" style="color: #cc0000; text-transform: uppercase; font-family: Verdana; font-size: 11px; text-decoration: none;">an even more awesome thing</td>
																</tr>
																<tr>
																	<td height="20"><img src="./images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" style="color: #cc0000; text-transform: uppercase; font-family: Verdana; font-size: 11px; text-decoration: none;">the weekly joke</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
											
										</tr>
										
										<tr>
											<td class="article-title" height="45" valign="top" style="padding: 0 20px; font-family: Georgia; font-size: 20px; font-weight: bold;" width="270" colspan="2">
												<br />Recently
											</td>
										</tr>
										
										<tr>
											<td class="content-copy" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;">
												<br />
												Here are a few other things that have been happening in and around the office recently:
												<br /><br />
											</td>
										</tr>
										
										<tr>
											<td style="padding: 0 0 0 20px;">
												<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">Our Latest publication</strong>
											</td>
										</tr>
										
										<tr>
											<td class="content-copy" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;">
												Aenean pulvinar est at nibh commodo vel vehicula quam pharetra. Donec in ante lorem. Nam ullamcorper 
												luctus laoreet. Morbi quis augue vitae quam <a href="./" style="color: #cc0000; text-decoration: none;">pharetra varius</a> at at urna. Nullam 
												tempor pulvinar erat ut blandit. Nam et erat diam, vel egestas enim. <br /><br />
											</td>
										</tr>
										
										<tr>
											<td style="padding: 0 0 0 20px;">
												<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">Work for us</strong>
											</td>
										</tr>
										
										<tr>
											<td class="content-copy" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;">
												Aenean pulvinar est at nibh commodo vel vehicula quam pharetra. Donec in ante lorem. Nam ullamcorper 
												luctus laoreet. Morbi quis augue vitae quam <a href="./" style="color: #cc0000; text-decoration: none;">pharetra varius</a> at at urna. Nullam 
												tempor pulvinar erat ut blandit. Nam et erat diam, vel egestas enim. <br /><br />
											</td>
										</tr>
										
										<tr>
											<td style="padding: 0 0 0 20px;">
												<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">Before you go</strong>
											</td>
										</tr>
										
										<tr>
											<td class="content-copy" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;">
												Aenean pulvinar est at nibh commodo vel vehicula quam pharetra. Donec in ante lorem. Nam 
												ullamcorper luctus laoreet. <br /><br />
											</td>
										</tr>
										
										<tr>
											<td>
												<table cellspacing="0" border="0" cellpadding="0">
												<tr>
													<td><br /></td>
												</tr>
												<tr>
													<td valign="top"><img src="./images/spacer.gif" width="10" height="20" alt="" /></td>
													<td height="35" bgcolor="#a60000" style="border-radius: 5px; -moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; font-size: 10px; font-family: Verdana, 'Times New Roman', Times, serif; color: #333; margin: 0; padding: 0; text-align: center;"><forwardtoafriend style="text-decoration: none; color: #fff;">SHARE THIS EMAIL</forwardtoafriend></td>
												</tr>
												</table>
											</td>
										</tr>
										
									</table>
									
								</td>
								
								<td valign="top">
									
									<table cellspacing="0" style="border-left: 1px solid #ccc;" cellpadding="0">
										<tr>
											<td class="article-title" height="45" valign="top" style="padding: 0 20px; font-family: Georgia; font-size: 20px; font-weight: bold;" width="350" colspan="2">
												<br />The first article title
											</td>
										</tr>
										<tr>
											<td class="content-copy" valign="top" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;" colspan="2">
												Suspendisse imperdiet ullamcorper est at interdum. Suspendisse at felis nunc. Integer eu felis lacus, 
												id blandit augue. <a href="./" style="color: #cc0000; text-decoration: none;">Mauris commodo hendrerit risus</a>, quis vehicula mi adipiscing...
												<textarea cols="55" rows="5" name="textarea"></textarea><br /><br />
											</td>
										</tr>
										<tr>
											<td class="image" valign="top" style="padding: 10px 20px;" colspan="2">

												<img src="./images/image3.jpg" alt="Image" style="border: 0; display: block;" />
												<br /><br />

											</td>
										</tr>
										<tr>
											<td class="article-title" height="39" valign="top" style="padding: 0 20px; font-family: Georgia; font-size: 20px; font-weight: bold;" width="350" colspan="2">
												A second thingy
											</td>
										</tr>
										<tr>
											<td class="content-copy" valign="top" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;" colspan="2">
												Suspendisse imperdiet ullamcorper est at interdum. Suspendisse at felis nunc. Integer eu felis lacus, id 
												blandit augue. Mauris commodo hendrerit risus, quis vehicula mi adipiscing in. Integer nec pretium odio. Sed 
												ligula enim, scelerisque ut tempor lacinia, iaculis eget erat. id blandit augue. Mauris commodo hendrerit risus, 
												quis vehicula mi adipiscing in. Integer nec pretium odio. Sed ligula enim, scelerisque ut tempor lacinia, iaculis 
												eget erat. id blandit augue. Mauris commodo hendrerit risus, quis <a href="" style="color: #cc0000; text-decoration: none;">vehicula</a> mi adipiscing in. Integer nec pretium 
												odio. Sed ligula enim, scelerisque ut tempor lacinia, iaculis eget erat. 
												<br /><br />
											</td>
										</tr>
										<tr>
											<td class="article-title" height="39" valign="top" style="padding: 0 20px; font-family: Georgia; font-size: 20px; font-weight: bold;" width="350" colspan="2">
												With a floated images
											</td>
										</tr>
										<tr>
											<td>
												<table cellspacing="0" border="0" cellpadding="0">
													<tr>
														<td class="floated-copy" valign="top" style="padding: 0 20px 20px 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;" width="350">
															
															<img src="./images/image2.jpg" height="199" align="left" alt="" style="border: 0;" width="161" />
															
															Suspendisse imperdiet ullamcorper est at interdum. <a href="./" style="color: #cc0000; text-decoration: none;">Suspendisse at felis nunc.</a> Integer eu felis 
															lacus, id blandit augue. Mauris commodo hendrerit risus, quis vehicula mi adipiscing in. Integer nec pretium 
															odio. Sed ligula enim, scelerisque ut tempor lacinia, iaculis eget erat. Integer eu felis lacus, id blandit 
															augue. Mauris commodo hendrerit risus, quis vehicula mi adipiscing in. Integer nec pretium odio. Sed ligula 
															enim, scelerisque ut tempor lacinia, iaculis eget erat. Integer eu felis lacus, id blandit augue. Mauris 
															commodo hendrerit risus, quis vehicula mi adipiscing in. Integer nec pretium odio. Sed ligula enim, scelerisque 
															ut tempor lacinia, iaculis eget erat. 
														</td>
													</tr>
												</table>
											</td>

										</tr>
										
									</table>
									
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
			</table>
			
		</td>
	
	</tr>
	
</table>
<!-------------------------->

</body>
</html>
<?php
}
?>