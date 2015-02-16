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
$Paramid_WADApaypal_recurring_payment_profiles = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_recurring_payment_profiles = "-1";
if (isset($_SESSION['WADA_Insert_paypal_recurring_payment_profiles'])) {
  $ParamSessionid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_recurring_payment_profiles'] : addslashes($_SESSION['WADA_Insert_paypal_recurring_payment_profiles']);
}
$Paramid2_WADApaypal_recurring_payment_profiles = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_recurring_payment_profiles = sprintf("SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "recurring_payment_profiles WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int"),GetSQLValueString($Paramid2_WADApaypal_recurring_payment_profiles, "int"),GetSQLValueString($ParamSessionid_WADApaypal_recurring_payment_profiles, "int"));
$WADApaypal_recurring_payment_profiles = mysql_query($query_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
$row_WADApaypal_recurring_payment_profiles = mysql_fetch_assoc($WADApaypal_recurring_payment_profiles);
$totalRows_WADApaypal_recurring_payment_profiles = mysql_num_rows($WADApaypal_recurring_payment_profiles);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_recurring_payment_profiles</title>
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
        <div id="WADAPageTitle">PayPal Recurring Payment Profile Details</div>
        <div><a href="recurring-payment-profiles-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="36%" class="WADADataTableHeader">ID</th>
            <td width="64%" class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Time Created</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['test_ipn']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Initial Payment Amount</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['initial_payment_amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Outstanding Balance</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['outstanding_balance']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Next Payment Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['next_payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Cycle</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payment_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount Per Cycle</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['amount_per_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period Time</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['period_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Profile Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['profile_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency Code</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Company</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_business_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['first_name']); ?> <?php echo($row_WADApaypal_recurring_payment_profiles['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Residence Country</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Product Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Product Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['product_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">RP Invoice ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['ipn_status']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payment-profiles-update.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payment-profiles-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payment-profiles-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="recurring-payment-profiles-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_recurring_payment_profiles);
?>
