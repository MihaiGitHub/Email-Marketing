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
$Paramid_WADApaypal_subscription_payments = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_subscription_payments = "-1";
if (isset($_SESSION['WADA_Insert_paypal_subscription_payments'])) {
  $ParamSessionid_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_subscription_payments'] : addslashes($_SESSION['WADA_Insert_paypal_subscription_payments']);
}
$Paramid2_WADApaypal_subscription_payments = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_subscription_payments = sprintf("SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1, quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "subscription_payments WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_subscription_payments, "int"),GetSQLValueString($Paramid2_WADApaypal_subscription_payments, "int"),GetSQLValueString($ParamSessionid_WADApaypal_subscription_payments, "int"));
$WADApaypal_subscription_payments = mysql_query($query_WADApaypal_subscription_payments, $connDB) or die(mysql_error());
$row_WADApaypal_subscription_payments = mysql_fetch_assoc($WADApaypal_subscription_payments);
$totalRows_WADApaypal_subscription_payments = mysql_num_rows($WADApaypal_subscription_payments);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_subscription_payments</title>
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
        <div id="WADAPageTitle">PayPal Standard Subscription Payment Details</div>
        <div><a href="subscription-payments-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_subscription_payments > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="33%" class="WADADataTableHeader">ID</th>
            <td width="67%" class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['first_name']); ?> <?php echo($row_WADApaypal_subscription_payments['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Address Country</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['address_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Name (0)</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['on0']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Selection (0)</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['os0']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Name(1)</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['on1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Selection (1)</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['os1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">QTY</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['quantity']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['payment_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Sales Tax</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['tax']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Gross Amount</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['mc_fee']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['payment_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Pending Reason</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['pending_reason']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['reason_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Memo</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['memo']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscription_payments['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscription-payments-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_subscription_payments['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscription-payments-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_subscription_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="subscription-payments-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_subscription_payments);
?>
