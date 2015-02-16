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
$Paramid_WADApaypal_order_items = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_order_items = sprintf("SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM " . $db_table_prefix . "order_items WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_order_items, "int"));
$WADApaypal_order_items = mysql_query($query_WADApaypal_order_items, $connDB) or die(mysql_error());
$row_WADApaypal_order_items = mysql_fetch_assoc($WADApaypal_order_items);
$totalRows_WADApaypal_order_items = mysql_num_rows($WADApaypal_order_items);?>
<?php 
// WA Application Builder Update
if (isset($_POST["Update_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = "paypal_order_items";
  $WA_redirectURL = "orders-items-detail.php?id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "order_id|refund_id|subscr_id|item_name|item_number|os0|on0|os1|on1|quantity|custom|mc_gross|mc_handling|mc_shipping|creation_timestamp|raw_log_id";
  $WA_fieldValuesStr = "".((isset($_POST["order_id"]))?$_POST["order_id"]:"")  ."" . "|" . "".((isset($_POST["refund_id"]))?$_POST["refund_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["os0"]))?$_POST["os0"]:"")  ."" . "|" . "".((isset($_POST["on0"]))?$_POST["on0"]:"")  ."" . "|" . "".((isset($_POST["os1"]))?$_POST["os1"]:"")  ."" . "|" . "".((isset($_POST["on1"]))?$_POST["on1"]:"")  ."" . "|" . "".((isset($_POST["quantity"]))?$_POST["quantity"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["raw_log_id"]))?$_POST["raw_log_id"]:"")  ."";
  $WA_columnTypesStr = "none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|',none,NULL|none,none,NULL";
  $WA_comparisonStr = " = | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | = | = | = | = | = ";
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
<title>Update paypal_order_items</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>


<div id="container">
  <div id="header">
    <?php require_once('header.php'); ?>
  </div>
  <div id="menu">
    <?php require_once('menu.php'); ?>
  </div>
  <div id="content">
    <div class="WADAUpdateContainer">
      <?php if ($totalRows_WADApaypal_order_items > 0) { // Show if recordset not empty ?>
      <form action="order-items-update.php?id=<?php echo(rawurlencode($row_WADApaypal_order_items['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">order_id:</th>
            <td class="WADADataTableCell"><input type="text" name="order_id" id="order_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['order_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">refund_id:</th>
            <td class="WADADataTableCell"><input type="text" name="refund_id" id="refund_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['refund_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['subscr_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><input type="text" name="item_name" id="item_name" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['item_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><input type="text" name="item_number" id="item_number" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['item_number'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os0:</th>
            <td class="WADADataTableCell"><input type="text" name="os0" id="os0" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['os0'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on0:</th>
            <td class="WADADataTableCell"><input type="text" name="on0" id="on0" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['on0'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os1:</th>
            <td class="WADADataTableCell"><input type="text" name="os1" id="os1" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['os1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on1:</th>
            <td class="WADADataTableCell"><input type="text" name="on1" id="on1" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['on1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">quantity:</th>
            <td class="WADADataTableCell"><input type="text" name="quantity" id="quantity" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['quantity'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['custom'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['mc_gross'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_handling" id="mc_handling" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['mc_handling'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_shipping" id="mc_shipping" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['mc_shipping'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">raw_log_id:</th>
            <td class="WADADataTableCell"><input type="text" name="raw_log_id" id="raw_log_id" value="<?php echo(str_replace('"', '&quot;', $row_WADApaypal_order_items['raw_log_id'])); ?>" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="order-items-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($row_WADApaypal_order_items['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_order_items == 0) { // Show if recordset empty ?>
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
mysql_free_result($WADApaypal_order_items);
?>
