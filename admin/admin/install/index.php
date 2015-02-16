<?php
if(isset($_GET['tables_created']))
	$tables_created = true;
else
	$tables_created = false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayPal IPN Installer : © Angell EYE : www.angelleye.com</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style></head>

<body>
<div id="container">
  <div id="header"> <a href="http://www.angelleye.com" target="_blank"><img src="../../images/cpp-header-image.jpg" alt="Angell EYE" width="750" height="90" border="0" /></a></div>
  <div id="content">
    <h1>Installation Instructions</h1>
    <ol>
      <li>Ensure you've filled out admin/config.php correctly.</li>
      <li>
        <?php
  if(!$tables_created)
  	echo '<a href="create-db-tables.php">Create MySQL database tables</a>';
  else
  	echo 'Create MySQL database tables';
  ?>
      </li>
      <li>Set  your IPN URL in your PayPal profile to point to the ipn-listener.php page on your server <br />
      (ie. http://www.mydomain.com/paypal-ipn/ipn-listener.php) </li>
    </ol>
  </div>
  <div id="footer"><?php require_once('../footer.php'); ?></div>
</div>
</body>
</html>