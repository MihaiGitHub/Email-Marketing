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
$Paramid_WADApaypal_subscriptions = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_subscriptions = sprintf("SELECT id, custom, subscr_id, subscr_date, subscr_effective, period1, period2, period3, amount1, amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, creation_timestamp, txn_type, test_ipn FROM " . $db_table_prefix . "subscriptions WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_subscriptions, "int"));
$WADApaypal_subscriptions = mysql_query($query_WADApaypal_subscriptions, $connDB) or die(mysql_error());
$row_WADApaypal_subscriptions = mysql_fetch_assoc($WADApaypal_subscriptions);
$totalRows_WADApaypal_subscriptions = mysql_num_rows($WADApaypal_subscriptions);?>
<?php 
// WA Application Builder Delete
if (isset($_POST["Delete_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "subscriptions";
  $WA_redirectURL = "subscriptions-results.php";
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
<title>Delete paypal_subscriptions</title>
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
      <?php if ($totalRows_WADApaypal_subscriptions > 0) { // Show if recordset not empty ?>
      <form action="subscriptions-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_subscriptions['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_date:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['subscr_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_effective:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['subscr_effective']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period1:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['period1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period2:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['period2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period3:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['period3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount1:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount2:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount3:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount1:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount2:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount3:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['recurring']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reattempt:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['reattempt']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">retry_at:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['retry_at']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recur_times:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['recur_times']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">username:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['username']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">password:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['password']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['first_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_subscriptions['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscriptions-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($row_WADApaypal_subscriptions['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_subscriptions == 0) { // Show if recordset empty ?>
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
mysql_free_result($WADApaypal_subscriptions);
?>
