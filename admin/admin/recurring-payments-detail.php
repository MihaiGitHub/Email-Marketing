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
$Paramid_WADApaypal_recurring_payments = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_recurring_payments = "-1";
if (isset($_SESSION['WADA_Insert_paypal_recurring_payments'])) {
  $ParamSessionid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_recurring_payments'] : addslashes($_SESSION['WADA_Insert_paypal_recurring_payments']);
}
$Paramid2_WADApaypal_recurring_payments = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_recurring_payments = sprintf("SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM " . $db_table_prefix . "recurring_payments WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int"),GetSQLValueString($Paramid2_WADApaypal_recurring_payments, "int"),GetSQLValueString($ParamSessionid_WADApaypal_recurring_payments, "int"));
$WADApaypal_recurring_payments = mysql_query($query_WADApaypal_recurring_payments, $connDB) or die(mysql_error());
$row_WADApaypal_recurring_payments = mysql_fetch_assoc($WADApaypal_recurring_payments);
$totalRows_WADApaypal_recurring_payments = mysql_num_rows($WADApaypal_recurring_payments);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_recurring_payments</title>
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
        <div id="WADAPageTitle">Recurring Payment Details </div>
        <div><a href="recurring-payments-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_recurring_payments > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="37%" class="WADADataTableHeader">ID</th>
            <td width="63%" class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Time Created</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring Payments Invoice ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Seller Protection Eligibility</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['protection_eligibility']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payment_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payment_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Subject</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['transaction_subject']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Product Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Gross Amount</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['mc_fee']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency Code</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Residence Country</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['receipt_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payments-update.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payments['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payments-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payments['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payments-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_recurring_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="recurring-payments-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_recurring_payments);
?>
