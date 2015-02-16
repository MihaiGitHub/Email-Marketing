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
$Paramid_WADApaypal_recurring_payment_profiles = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_recurring_payment_profiles = sprintf("SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "recurring_payment_profiles WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int"));
$WADApaypal_recurring_payment_profiles = mysql_query($query_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
$row_WADApaypal_recurring_payment_profiles = mysql_fetch_assoc($WADApaypal_recurring_payment_profiles);
$totalRows_WADApaypal_recurring_payment_profiles = mysql_num_rows($WADApaypal_recurring_payment_profiles);?>
<?php 
// WA Application Builder Delete
if (isset($_POST["Delete_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "recurring_payment_profiles";
  $WA_redirectURL = "recurring-payment-profiles-results.php";
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
<title>Delete paypal_recurring_payment_profiles</title>
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
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <form action="recurring-payment-profiles-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_cycle:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payment_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['first_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">next_payment_date:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['next_payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">initial_payment_amount:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['initial_payment_amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">currency_code:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['period_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_business_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">shipping:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount_per_cycle:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['amount_per_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">profile_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['profile_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">outstanding_balance:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['outstanding_balance']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['product_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payment-profiles-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
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
mysql_free_result($WADApaypal_recurring_payment_profiles);
?>
