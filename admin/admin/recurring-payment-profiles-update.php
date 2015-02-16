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
// WA Application Builder Update
if (isset($_POST["Update_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "recurring_payment_profiles";
  $WA_redirectURL = "recurring-payment-profiles-detail.php?id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "payment_cycle|txn_type|last_name|first_name|next_payment_date|residence_country|initial_payment_amount|rp_invoice_id|currency_code|time_created|verify_sign|period_type|payer_status|payer_email|receiver_email|payer_id|product_type|payer_business_name|shipping|amount_per_cycle|profile_status|notify_version|amount|outstanding_balance|recurring_payment_id|product_name|ipn_status|creation_timestamp|test_ipn";
  $WA_fieldValuesStr = "".((isset($_POST["payment_cycle"]))?$_POST["payment_cycle"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["next_payment_date"]))?$_POST["next_payment_date"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["initial_payment_amount"]))?$_POST["initial_payment_amount"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["currency_code"]))?$_POST["currency_code"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["period_type"]))?$_POST["period_type"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["product_type"]))?$_POST["product_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["shipping"]))?$_POST["shipping"]:"")  ."" . "|" . "".((isset($_POST["amount_per_cycle"]))?$_POST["amount_per_cycle"]:"")  ."" . "|" . "".((isset($_POST["profile_status"]))?$_POST["profile_status"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["amount"]))?$_POST["amount"]:"")  ."" . "|" . "".((isset($_POST["outstanding_balance"]))?$_POST["outstanding_balance"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
  $WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL|none,none,NULL";
  $WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | = | LIKE | LIKE | = | = | LIKE | LIKE | LIKE | = | = ";
  $WA_fieldNames = explode("|", $WA_fieldNamesStr);
  $WA_fieldValues = explode("|", $WA_fieldValuesStr);
  $WA_columns = explode("|", $WA_columnTypesStr);
  
  $WA_where_fieldValuesStr = "".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
  $WA_where_columnTypesStr = "none,none,NULL";
  $WA_where_comparisonStr = "=";
  $WA_where_fieldNames = explode("|", $WA_indexField);
  $WA_where_fieldValues = explode("|", $WA_where_fieldValuesStr);
  $WA_where_columns = explode("|", $WA_where_columnTypesStr);
  $WA_where_comparisons = explode("|", $WA_where_comparisonStr);
  
  $WA_connectionDB = $database_connDB;
  mysql_select_db($WA_connectionDB, $WA_connection);
  if (!session_id()) session_start();
  $updateParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
  $WhereObj = WA_AB_generateWhereClause($WA_where_fieldNames, $WA_where_columns, $WA_where_fieldValues,  $WA_where_comparisons );
  $WA_Sql = "UPDATE `" . $WA_table . "` SET " . $updateParamsObj->WA_setValues . " WHERE " . $WhereObj->sqlWhereClause . "";
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
<title>Update paypal_recurring_payment_profiles</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADAUpdateContainer">
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <form action="recurring-payment-profiles-update.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">payment_cycle:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_cycle" id="payment_cycle" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['payment_cycle'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['txn_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['last_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['first_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">next_payment_date:</th>
            <td class="WADADataTableCell"><input type="text" name="next_payment_date" id="next_payment_date" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['next_payment_date'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['residence_country'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">initial_payment_amount:</th>
            <td class="WADADataTableCell"><input type="text" name="initial_payment_amount" id="initial_payment_amount" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['initial_payment_amount'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><input type="text" name="rp_invoice_id" id="rp_invoice_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['rp_invoice_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">currency_code:</th>
            <td class="WADADataTableCell"><input type="text" name="currency_code" id="currency_code" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['currency_code'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><input type="text" name="time_created" id="time_created" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['time_created'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['verify_sign'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period_type:</th>
            <td class="WADADataTableCell"><input type="text" name="period_type" id="period_type" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['period_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_status" id="payer_status" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['payer_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['payer_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['receiver_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['payer_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_type:</th>
            <td class="WADADataTableCell"><input type="text" name="product_type" id="product_type" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['product_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['payer_business_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="shipping" id="shipping" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['shipping'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount_per_cycle:</th>
            <td class="WADADataTableCell"><input type="text" name="amount_per_cycle" id="amount_per_cycle" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['amount_per_cycle'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">profile_status:</th>
            <td class="WADADataTableCell"><input type="text" name="profile_status" id="profile_status" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['profile_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['notify_version'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount:</th>
            <td class="WADADataTableCell"><input type="text" name="amount" id="amount" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['amount'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">outstanding_balance:</th>
            <td class="WADADataTableCell"><input type="text" name="outstanding_balance" id="outstanding_balance" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['outstanding_balance'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring_payment_id" id="recurring_payment_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['recurring_payment_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><input type="text" name="product_name" id="product_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['product_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['ipn_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_recurring_payment_profiles['test_ipn'])); ?>" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payment-profiles-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" />
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
