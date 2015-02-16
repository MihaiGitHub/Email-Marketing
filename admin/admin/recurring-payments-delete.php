<?php require_once('../Connections/connDB.php'); ?>
<?php require_once("../WA_DataAssist/WA_AppBuilder_PHP.php"); ?>
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
$Paramid_WADApaypal_recurring_payments = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_recurring_payments = sprintf("SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM " . $db_table_prefix . "recurring_payments WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int"));
$WADApaypal_recurring_payments = mysql_query($query_WADApaypal_recurring_payments, $connDB) or die(mysql_error());
$row_WADApaypal_recurring_payments = mysql_fetch_assoc($WADApaypal_recurring_payments);
$totalRows_WADApaypal_recurring_payments = mysql_num_rows($WADApaypal_recurring_payments);?>
<?php 
// WA Application Builder Delete
if (isset($_POST["Delete_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "recurring_payments";
  $WA_redirectURL = "recurring-payments-results.php";
  $WA_keepQueryString = false;
  $WA_fieldNamesStr = "id";
  $WA_columnTypesStr = "none,none,NULL";
  $WA_fieldValuesStr = "".((isset($_POST["WADADeleteRecordID"]))?$_POST["WADADeleteRecordID"]:"")  ."";
  $WA_comparisonStr = "=";
  $WA_fieldNames = explode("|", $WA_fieldNamesStr);
  $WA_fieldValues = explode("|", $WA_fieldValuesStr);
  $WA_columns = explode("|", $WA_columnTypesStr);
  $WA_comparisions = explode("|", $WA_comparisonStr);
  $WA_connectionDB = $database_connDB;
  mysql_select_db($WA_connectionDB, $WA_connection);
  if (!session_id()) session_start();
  $deleteParamsObj = WA_AB_generateWhereClause($WA_fieldNames, $WA_columns, $WA_fieldValues, $WA_comparisions);
  $WA_Sql = "DELETE FROM `" . $WA_table . "` WHERE " . $deleteParamsObj->sqlWhereClause;
  $MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
  if ($WA_redirectURL != "")  {
    if ($WA_keepQueryString && $WA_redirectURL != "" && isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] !== "" && sizeof($_POST) > 0) {
      $WA_redirectURL .= ((strpos($WA_redirectURL, '?') === false)?"?":"&").$_SERVER["QUERY_STRING"];
    }
    header("Location: ".$WA_redirectURL);
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete paypal_recurring_payments</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADADeleteContainer">
      <?php if ($totalRows_WADApaypal_recurring_payments > 0) { // Show if recordset not empty ?>
      <form action="recurring-payments-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payments['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">protection_eligibility:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['protection_eligibility']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_date:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payment_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_fee:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['mc_fee']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">currency_code:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['payment_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receipt_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['receipt_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">transaction_subject:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['transaction_subject']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">shipping:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payments['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payments-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($row_WADApaypal_recurring_payments['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_recurring_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
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
