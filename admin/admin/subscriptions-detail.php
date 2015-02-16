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
$Paramid_WADApaypal_subscriptions = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_subscriptions = "-1";
if (isset($_SESSION['WADA_Insert_paypal_subscriptions'])) {
  $ParamSessionid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_subscriptions'] : addslashes($_SESSION['WADA_Insert_paypal_subscriptions']);
}
$Paramid2_WADApaypal_subscriptions = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_subscriptions = sprintf("SELECT id, custom, subscr_id, subscr_date, memo, subscr_effective, period1, period2, period3, amount1, amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, creation_timestamp, txn_type, test_ipn FROM " . $db_table_prefix . "subscriptions WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_subscriptions, "int"),GetSQLValueString($Paramid2_WADApaypal_subscriptions, "int"),GetSQLValueString($ParamSessionid_WADApaypal_subscriptions, "int"));
$WADApaypal_subscriptions = mysql_query($query_WADApaypal_subscriptions, $connDB) or die(mysql_error());
$row_WADApaypal_subscriptions = mysql_fetch_assoc($WADApaypal_subscriptions);
$totalRows_WADApaypal_subscriptions = mysql_num_rows($WADApaypal_subscriptions);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_subscriptions</title>
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
        <div id="WADAPageTitle">PayPal Subscription Profile Details</div>
        <div><a href="subscriptions-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_subscriptions > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="32%" class="WADADataTableHeader">ID</th>
            <td width="68%" class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['subscr_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['first_name']); ?> <?php echo($row_WADApaypal_subscriptions['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Residence Country</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Customer Notes</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['memo']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription Effective</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['subscr_effective']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period 1</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['period1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount 1</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MC Amount 1</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period 2</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['period2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount 2</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MC Amount 2</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period 3</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['period3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount 3</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MC Amount 3</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['recurring']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reattempt</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['reattempt']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Retry At</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['retry_at']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recur Times</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['recur_times']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Username</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['username']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Password</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['password']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscriptions-update.php?id=<?php echo(rawurlencode($row_WADApaypal_subscriptions['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscriptions-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_subscriptions['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscriptions-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_subscriptions == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="subscriptions-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_subscriptions);
?>
