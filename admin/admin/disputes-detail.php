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
$Paramid_WADApaypal_disputes = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_disputes = "-1";
if (isset($_SESSION['WADA_Insert_paypal_disputes'])) {
  $ParamSessionid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_disputes'] : addslashes($_SESSION['WADA_Insert_paypal_disputes']);
}
$Paramid2_WADApaypal_disputes = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_disputes = sprintf("SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, txn_type, test_ipn FROM " . $db_table_prefix . "disputes WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_disputes, "int"),GetSQLValueString($Paramid2_WADApaypal_disputes, "int"),GetSQLValueString($ParamSessionid_WADApaypal_disputes, "int"));
$WADApaypal_disputes = mysql_query($query_WADApaypal_disputes, $connDB) or die(mysql_error());
$row_WADApaypal_disputes = mysql_fetch_assoc($WADApaypal_disputes);
$totalRows_WADApaypal_disputes = mysql_num_rows($WADApaypal_disputes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_disputes</title>
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
.WADAResultsTableCell {	padding: 3px;
	text-align: left;
}
.WADAResultsTableCell {	padding-left: 14px;
	padding-right: 14px;
}
.WADAResultsTableCell {	border-left: 1px solid #BABDC2;
}
.WADAResultsTableHeader {	padding: 3px;
	text-align: left;
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
        <div id="WADAPageTitle">PayPal Dispute Details</div>
        <div><a href="disputes-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_disputes > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="32%" class="WADADataTableHeader">ID</th>
            <td width="68%" class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($row_WADApaypal_disputes['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <?php
		  if($row_WADApaypal_disputes['case_creation_date'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Case Creation Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['case_creation_date']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_disputes['payment_date'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['payment_date']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['case_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['case_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['reason_code']); ?></td>
          </tr>
          <?php
		  if($row_WADApaypal_disputes['receipt_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['receipt_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['payer_id']); ?></td>
          </tr>
          <?php
		  if($row_WADApaypal_disputes['invoice'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Invoice #</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['invoice']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_disputes['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['test_ipn']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_disputes['notify_version']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="disputes-update.php?id=<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="disputes-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="disputes-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_disputes == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="disputes-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
  </div>
  <div id="footer"><?php require_once('footer.php'); ?></div>
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($WADApaypal_disputes);
?>
