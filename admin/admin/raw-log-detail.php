<?php require_once('../Connections/connDB.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
if (!session_id()) session_start(); 
?>
<?php
$Paramid_WADApaypal_raw_log = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_raw_log = "-1";
if (isset($_SESSION['WADA_Insert_paypal_raw_log'])) {
  $ParamSessionid_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_raw_log'] : addslashes($_SESSION['WADA_Insert_paypal_raw_log']);
}
$Paramid2_WADApaypal_raw_log = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_raw_log = sprintf("SELECT id, created_timestamp, ipn_data_serialized FROM " . $db_table_prefix . "raw_log WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_raw_log, "int"),GetSQLValueString($Paramid2_WADApaypal_raw_log, "int"),GetSQLValueString($ParamSessionid_WADApaypal_raw_log, "int"));
$WADApaypal_raw_log = mysql_query($query_WADApaypal_raw_log, $connDB) or die(mysql_error());
$row_WADApaypal_raw_log = mysql_fetch_assoc($WADApaypal_raw_log);
$totalRows_WADApaypal_raw_log = mysql_num_rows($WADApaypal_raw_log);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PayPal IPN Raw Data Details</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* Title Section */
#WADAPageTitleArea {
	width: 555px;
}
#WADAPageTitleArea div, #WADAPageTitleArea p {
	font-size: 11px;
	padding-bottom: 10px;
}
#WADAPageTitleArea div#WADAPageTitle, #WADAPageTitle {
	font-size: 14px;
	font-weight: bold;
}

/* Details page CSS */
.WADADetailsContainer {
	font-size: 11px;
}
#WADADetails {
	padding-top: 10px;
}
</style>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.WADADetailsContainer1 {	font-size: 11px;
}
-->
</style>
</head>

<body>


<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal IPN Details</div>
        <div><a href="raw-log-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_raw_log > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="20%" valign="top" class="WADADataTableHeader">ID</th>
            <td width="80%" valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_raw_log['id']); ?></td>
          </tr>
          <tr>
            <th valign="top" class="WADADataTableHeader">IPN Date</th>
            <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_raw_log['created_timestamp']); ?></td>
          </tr>
          <tr>
            <th valign="top" class="WADADataTableHeader">IPN Data</th>
            <td valign="top" class="WADADataTableCell"><?php 
		  $ipn_data_unserialized = unserialize($row_WADApaypal_raw_log['ipn_data_serialized']);
		  echo '<pre>';
		  print_r($ipn_data_unserialized);
		  echo '</pre>';
		  ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="raw-log-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_raw_log['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="raw-log-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_raw_log == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="raw-log-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
  </div>
  <div id="footer">
    <?php require_once('footer.php'); ?>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($WADApaypal_raw_log);
?>
