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
$Paramid_WADApaypal_orders = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_orders = sprintf("SELECT id, receiver_email, payment_status, pending_reason, payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type, first_name, last_name, address_street, address_city, address_state, address_zip, address_country, address_status, payer_email, payer_status, payment_type, notify_version, verify_sign, address_name, protection_eligibility, ipn_status, subscr_id, custom, reason_code, contact_phone, item_name, item_number, invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item, creation_timestamp, address_country_code, payer_business_name, receiver_id, test_ipn FROM " . $db_table_prefix . "orders WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_orders, "int"));
$WADApaypal_orders = mysql_query($query_WADApaypal_orders, $connDB) or die(mysql_error());
$row_WADApaypal_orders = mysql_fetch_assoc($WADApaypal_orders);
$totalRows_WADApaypal_orders = mysql_num_rows($WADApaypal_orders);?>
<?php 
// WA Application Builder Delete
if (isset($_POST["Delete_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "orders";
  $WA_redirectURL = "orders-results.php";
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
<title>Delete paypal_orders</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
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
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADADeleteContainer">
      <?php if ($totalRows_WADApaypal_orders > 0) { // Show if recordset not empty ?>
      <form action="orders-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_orders['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="33%" class="WADADataTableHeader">ID</th>
            <td width="67%" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($row_WADApaypal_orders['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payment_date']); ?></td>
          </tr>
          <?php
		  if($row_WADApaypal_orders['protection_eligibility'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Seller Protection Eligibility</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['protection_eligibility']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($row_WADApaypal_orders['txn_type'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['txn_type']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['txn_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['txn_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['payment_type'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payment_type']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['payment_status'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payment_status']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['pending_reason'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Pending Reason</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['pending_reason']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['reason_code'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['reason_code']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['tax'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Sales Tax</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['tax']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['mc_gross'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Total</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['mc_gross']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['mc_fee'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['mc_fee']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['mc_currency'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['mc_currency']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['payer_business_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Billing Company</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payer_business_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['first_name']); ?> <?php echo($row_WADApaypal_orders['last_name']); ?></td>
          </tr>
          <?php
		  if($row_WADApaypal_orders['address_street'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['address_name']); ?><br />
              <?php echo($row_WADApaypal_orders['address_street']); ?><br />
              <?php echo($row_WADApaypal_orders['address_city']); ?>, <?php echo($row_WADApaypal_orders['address_state']); ?> <?php echo($row_WADApaypal_orders['address_zip']); ?><br />
              <?php echo($row_WADApaypal_orders['address_country']); ?><br /></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['address_status'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Address Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['address_status']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['contact_phone'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Phone Number</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['contact_phone']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payer Email Addres</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($row_WADApaypal_orders['subscr_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Standard Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['subscr_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['item_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['item_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['item_number'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['item_number']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($row_WADApaypal_orders['invoice'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['invoice']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
          if($row_WADApaypal_orders['for_auction'] != '' && $row_WADApaypal_orders['for_auction'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">eBay User ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['auction_buyer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">eBay Auction Closing Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['auction_closing_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">eBay Cart Number of Items</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['auction_multi_item']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Receiver ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_orders['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="orders-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($row_WADApaypal_orders['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_orders == 0) { // Show if recordset empty ?>
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
mysql_free_result($WADApaypal_orders);
?>
