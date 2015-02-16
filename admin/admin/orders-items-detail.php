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
$Paramid_WADApaypal_order_items = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_order_items = "-1";
if (isset($_SESSION['WADA_Insert_paypal_order_items'])) {
  $ParamSessionid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_order_items'] : addslashes($_SESSION['WADA_Insert_paypal_order_items']);
}
$Paramid2_WADApaypal_order_items = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_order_items = sprintf("SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM " . $db_table_prefix . "order_items WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_order_items, "int"),GetSQLValueString($Paramid2_WADApaypal_order_items, "int"),GetSQLValueString($ParamSessionid_WADApaypal_order_items, "int"));
$WADApaypal_order_items = mysql_query($query_WADApaypal_order_items, $connDB) or die(mysql_error());
$row_WADApaypal_order_items = mysql_fetch_assoc($WADApaypal_order_items);
$totalRows_WADApaypal_order_items = mysql_num_rows($WADApaypal_order_items);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_order_items</title>
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
.WADAResultsTableCell {	padding: 3px;
	text-align: left;
}
.WADAResultsTableCell {	padding-left: 14px;
	padding-right: 14px;
}
.WADAResultsTableCell {	border-left: 1px solid #BABDC2;
}
.WADAResultsTableHeader {	padding: 3px;
	text-align: left;
}
-->
</style>
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
    <div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">Order Item Details</div>
        <div><a href="orders-items-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_order_items > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="32%" class="WADADataTableHeader">ID</th>
            <td width="68%" class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($row_WADApaypal_order_items['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($row_WADApaypal_order_items['order_id'] != '' && $row_WADApaypal_order_items['order_id'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Order ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['order_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['refund_id'] != '' && $row_WADApaypal_order_items['refund_id'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Refund ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['refund_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['subscr_id'] != '' && $row_WADApaypal_order_items['subscr_id'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Standard Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['subscr_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Raw Log ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['raw_log_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($row_WADApaypal_order_items['item_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['item_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['item_number'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['item_number']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['on0'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Option 1</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on0']); ?>: <?php echo($row_WADApaypal_order_items['os0']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['on1'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Option 2</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on1']); ?>: <?php echo($row_WADApaypal_order_items['os1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 3</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on2']); ?>: <?php echo($row_WADApaypal_order_items['os2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 4</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on3']); ?>: <?php echo($row_WADApaypal_order_items['os3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 5</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on4']); ?>: <?php echo($row_WADApaypal_order_items['os4']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 6</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on5']); ?>: <?php echo($row_WADApaypal_order_items['os5']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 7</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on6']); ?>: <?php echo($row_WADApaypal_order_items['os6']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 8</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on7']); ?>: <?php echo($row_WADApaypal_order_items['os7']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 9</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['on8']); ?>: <?php echo($row_WADApaypal_order_items['os8']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['quantity'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">QTY</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['quantity']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['mc_gross'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Price</th>
            <td class="WADADataTableCell">$<?php echo(number_format($row_WADApaypal_order_items['mc_gross'],2)); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['mc_handling'] != '' && $row_WADApaypal_order_items['mc_handling'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Handling</th>
            <td class="WADADataTableCell">$<?php echo(number_format($row_WADApaypal_order_items['mc_handling'],2)); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['mc_shipping'] != '' && $row_WADApaypal_order_items['mc_shipping'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell">$<?php echo(number_format($row_WADApaypal_order_items['mc_shipping'],2)); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_order_items['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_order_items['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="order-items-update.php?id=<?php echo(rawurlencode($row_WADApaypal_order_items['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="order-items-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_order_items['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="order-items-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_order_items == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="order-items-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_order_items);
?>
