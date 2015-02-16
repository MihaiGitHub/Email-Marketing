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
// WA Application Builder Update
if (isset($_POST["Update_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "subscriptions";
  $WA_redirectURL = "subscriptions-detail.php?id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "custom|subscr_id|subscr_date|subscr_effective|period1|period2|period3|amount1|amount2|amount3|mc_amount1|mc_amount2|mc_amount3|recurring|reattempt|retry_at|recur_times|username|password|txn_id|payer_email|residence_country|mc_currency|verify_sign|payer_status|first_name|last_name|receiver_email|payer_id|notify_version|item_name|item_number|ipn_status|creation_timestamp|txn_type|test_ipn";
  $WA_fieldValuesStr = "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_date"]))?$_POST["subscr_date"]:"")  ."" . "|" . "".((isset($_POST["subscr_effective"]))?$_POST["subscr_effective"]:"")  ."" . "|" . "".((isset($_POST["period1"]))?$_POST["period1"]:"")  ."" . "|" . "".((isset($_POST["period2"]))?$_POST["period2"]:"")  ."" . "|" . "".((isset($_POST["period3"]))?$_POST["period3"]:"")  ."" . "|" . "".((isset($_POST["amount1"]))?$_POST["amount1"]:"")  ."" . "|" . "".((isset($_POST["amount2"]))?$_POST["amount2"]:"")  ."" . "|" . "".((isset($_POST["amount3"]))?$_POST["amount3"]:"")  ."" . "|" . "".((isset($_POST["mc_amount1"]))?$_POST["mc_amount1"]:"")  ."" . "|" . "".((isset($_POST["mc_amount2"]))?$_POST["mc_amount2"]:"")  ."" . "|" . "".((isset($_POST["mc_amount3"]))?$_POST["mc_amount3"]:"")  ."" . "|" . "".((isset($_POST["recurring"]))?$_POST["recurring"]:"")  ."" . "|" . "".((isset($_POST["reattempt"]))?$_POST["reattempt"]:"")  ."" . "|" . "".((isset($_POST["retry_at"]))?$_POST["retry_at"]:"")  ."" . "|" . "".((isset($_POST["recur_times"]))?$_POST["recur_times"]:"")  ."" . "|" . "".((isset($_POST["username"]))?$_POST["username"]:"")  ."" . "|" . "".((isset($_POST["password"]))?$_POST["password"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
  $WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|none,none,NULL";
  $WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | = | = | = | = | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | = ";
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
<title>Update paypal_subscriptions</title>
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
      <?php if ($totalRows_WADApaypal_subscriptions > 0) { // Show if recordset not empty ?>
      <form action="subscriptions-update.php?id=<?php echo(rawurlencode($row_WADApaypal_subscriptions['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['custom'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['subscr_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_date:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_date" id="subscr_date" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['subscr_date'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_effective:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_effective" id="subscr_effective" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['subscr_effective'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period1:</th>
            <td class="WADADataTableCell"><input type="text" name="period1" id="period1" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['period1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period2:</th>
            <td class="WADADataTableCell"><input type="text" name="period2" id="period2" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['period2'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period3:</th>
            <td class="WADADataTableCell"><input type="text" name="period3" id="period3" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['period3'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount1:</th>
            <td class="WADADataTableCell"><input type="text" name="amount1" id="amount1" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['amount1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount2:</th>
            <td class="WADADataTableCell"><input type="text" name="amount2" id="amount2" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['amount2'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount3:</th>
            <td class="WADADataTableCell"><input type="text" name="amount3" id="amount3" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['amount3'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount1:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_amount1" id="mc_amount1" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['mc_amount1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount2:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_amount2" id="mc_amount2" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['mc_amount2'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount3:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_amount3" id="mc_amount3" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['mc_amount3'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring" id="recurring" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['recurring'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reattempt:</th>
            <td class="WADADataTableCell"><input type="text" name="reattempt" id="reattempt" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['reattempt'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">retry_at:</th>
            <td class="WADADataTableCell"><input type="text" name="retry_at" id="retry_at" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['retry_at'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recur_times:</th>
            <td class="WADADataTableCell"><input type="text" name="recur_times" id="recur_times" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['recur_times'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">username:</th>
            <td class="WADADataTableCell"><input type="text" name="username" id="username" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['username'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">password:</th>
            <td class="WADADataTableCell"><input type="text" name="password" id="password" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['password'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['txn_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['payer_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['residence_country'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_currency" id="mc_currency" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['mc_currency'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['verify_sign'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_status" id="payer_status" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['payer_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['first_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['last_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['receiver_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['payer_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['notify_version'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><input type="text" name="item_name" id="item_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['item_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><input type="text" name="item_number" id="item_number" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['item_number'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['ipn_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['txn_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_subscriptions['test_ipn'])); ?>" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscriptions-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($row_WADApaypal_subscriptions['id'])); ?>" />
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
