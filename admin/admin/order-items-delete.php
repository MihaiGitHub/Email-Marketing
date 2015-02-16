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
// WA Application Builder Delete
if (isset($_POST["Delete_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "order_items";
  $WA_redirectURL = "order-items-results.php";
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
<title>Delete paypal_order_items</title>
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
    <div class="WADADeleteContainer">
      <?php if ($totalRows_WADApaypal_order_items > 0) { // Show if recordset not empty ?>
      <form action="order-items-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_order_items['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">order_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['order_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">refund_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['refund_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os0:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['os0']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on0:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on0']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os1:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['os1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on1:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">quantity:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['quantity']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['mc_handling']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['mc_shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">raw_log_id:</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['raw_log_id']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="order-items-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($row_WADApaypal_order_items['id'])); ?>" />
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
