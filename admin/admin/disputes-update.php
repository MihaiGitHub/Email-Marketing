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
$Paramid_WADApaypal_disputes = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_disputes = sprintf("SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, txn_type, test_ipn FROM " . $db_table_prefix . "disputes WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_disputes, "int"));
$WADApaypal_disputes = mysql_query($query_WADApaypal_disputes, $connDB) or die(mysql_error());
$row_WADApaypal_disputes = mysql_fetch_assoc($WADApaypal_disputes);
$totalRows_WADApaypal_disputes = mysql_num_rows($WADApaypal_disputes);?>
<?php 
// WA Application Builder Update
if (isset($_POST["Update_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "disputes";
  $WA_redirectURL = "disputes-detail.php?id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "txn_id|case_id|case_type|case_creation_date|payment_date|receipt_id|verify_sign|payer_email|payer_id|invoice|reason_code|custom|notify_version|creation_timestamp|ipn_status|txn_type|test_ipn";
  $WA_fieldValuesStr = "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["case_id"]))?$_POST["case_id"]:"")  ."" . "|" . "".((isset($_POST["case_type"]))?$_POST["case_type"]:"")  ."" . "|" . "".((isset($_POST["case_creation_date"]))?$_POST["case_creation_date"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["receipt_id"]))?$_POST["receipt_id"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
  $WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|',none,''|none,none,NULL";
  $WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | = ";
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
<title>Update paypal_disputes</title>
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
      <?php if ($totalRows_WADApaypal_disputes > 0) { // Show if recordset not empty ?>
      <form action="disputes-update.php?id=<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="40%" class="WADADataTableHeader">Transaction ID</th>
            <td width="60%" class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['txn_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case ID</th>
            <td class="WADADataTableCell"><input type="text" name="case_id" id="case_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['case_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Type</th>
            <td class="WADADataTableCell"><input type="text" name="case_type" id="case_type" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['case_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Creation Date</th>
            <td class="WADADataTableCell"><input type="text" name="case_creation_date" id="case_creation_date" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['case_creation_date'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><input type="text" name="payment_date" id="payment_date" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['payment_date'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><input type="text" name="receipt_id" id="receipt_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['receipt_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['verify_sign'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['payer_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['payer_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><input type="text" name="invoice" id="invoice" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['invoice'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><input type="text" name="reason_code" id="reason_code" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['reason_code'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['custom'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['notify_version'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['ipn_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['txn_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_disputes['test_ipn'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="disputes-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_disputes == 0) { // Show if recordset empty ?>
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
mysql_free_result($WADApaypal_disputes);
?>
