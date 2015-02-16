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
$Paramid_WADApaypal_orders = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_orders = "-1";
if (isset($_SESSION['WADA_Insert_paypal_orders'])) {
  $ParamSessionid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_orders'] : addslashes($_SESSION['WADA_Insert_paypal_orders']);
}
$Paramid2_WADApaypal_orders = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_orders = sprintf("SELECT id, receiver_email, payment_status, pending_reason, memo, payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type, first_name, last_name, address_street, address_city, address_state, address_zip, address_country, address_status, payer_email, payer_status, payment_type, notify_version, verify_sign, address_name, protection_eligibility, ipn_status, subscr_id, custom, reason_code, contact_phone, item_name, item_number, invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item, handling_amount, shipping_discount, insurance_amount, creation_timestamp, address_country_code, payer_business_name, btn_id, option_name1, option_selection1, option_name2, option_selection2, shipping_method, transaction_subject, receiver_id, test_ipn, mc_shipping, shipping FROM " . $db_table_prefix . "orders WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_orders, "int"),GetSQLValueString($Paramid2_WADApaypal_orders, "int"),GetSQLValueString($ParamSessionid_WADApaypal_orders, "int"));
$WADApaypal_orders = mysql_query($query_WADApaypal_orders, $connDB) or die(mysql_error());
$row_WADApaypal_orders = mysql_fetch_assoc($WADApaypal_orders);
$totalRows_WADApaypal_orders = mysql_num_rows($WADApaypal_orders);

$varOrderID_rsOrderItems = "1";
if (isset($row_WADApaypal_orders['id'])) {
  $varOrderID_rsOrderItems = (get_magic_quotes_gpc()) ? $row_WADApaypal_orders['id'] : addslashes($row_WADApaypal_orders['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_rsOrderItems = sprintf("SELECT * FROM " . $db_table_prefix . "order_items WHERE " . $db_table_prefix . "order_items.order_id = %s", GetSQLValueString($varOrderID_rsOrderItems, "int"));
$rsOrderItems = mysql_query($query_rsOrderItems, $connDB) or die(mysql_error());
$row_rsOrderItems = mysql_fetch_assoc($rsOrderItems);
$totalRows_rsOrderItems = mysql_num_rows($rsOrderItems);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Details paypal_orders</title>
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
.WADADetailsContainer1 {
	font-size: 11px;
}
.WADAResultsTableCell {
	padding: 3px;
	text-align: left;
}
.WADAResultsTableCell {
	padding-left: 14px;
	padding-right: 14px;
}
.WADAResultsTableCell {
	border-left: 1px solid #BABDC2;
}
.WADAResultsTableHeader {
	padding: 3px;
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
        <div id="WADAPageTitle">Order #<?php echo $row_WADApaypal_orders['id']; ?></div>
        <div><a href="orders-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_orders > 0) { // Show if recordset not empty ?>
        <div id="WADADetails">
          <div class="WADAHeader">Details</div>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
            <tr>
              <th valign="top" class="WADADataTableHeader">IPN Date</th>
              <td valign="top" class="WADADataTableCell"><span class="WADAResultsTableCell">
                <?php
			$ipn_date = date('m.d.Y g:i:s A', strtotime($row_WADApaypal_orders['creation_timestamp']));
			echo $ipn_date;
			?>
                </span></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Test?</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['test_ipn']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">IPN Status</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['ipn_status']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Notify Version</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['notify_version']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Verify Sign</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['verify_sign']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Billing Name</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['first_name']); ?> <?php echo($row_WADApaypal_orders['last_name']); ?></td>
            </tr>
            <?php
		if($row_WADApaypal_orders['payer_business_name'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Company Name</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payer_business_name']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['address_street'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Shipping Address</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['address_name']); ?><br />
                <?php echo($row_WADApaypal_orders['address_street']); ?><br />
                <?php echo($row_WADApaypal_orders['address_city']); ?>, <?php echo($row_WADApaypal_orders['address_state']); ?> <?php echo($row_WADApaypal_orders['address_zip']); ?><br />
                <?php echo($row_WADApaypal_orders['address_country']); ?><br /></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Address Status</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['address_status']); ?></td>
            </tr>
            <?php
			}
		  ?>
            <?php
		if($row_WADApaypal_orders['contact_phone'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Phone Number</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['contact_phone']); ?></td>
            </tr>
            <?php
		}
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Email Address</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payer_email']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Receiver ID</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['receiver_id']); ?></td>
            </tr>
            <tr>
              <th width="23%" valign="top" class="WADADataTableHeader">Receiver Email</th>
              <td width="77%" valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['receiver_email']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Payment Date</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payment_date']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Payment Status</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payment_status']); ?></td>
            </tr>
            <?php
		if($row_WADApaypal_orders['pending_reason'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Pending Reason</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['pending_reason']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['reason_code'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Reason Code</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['reason_code']); ?></td>
            </tr>
            <?php
		}
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Transaction ID</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['txn_id']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Transaction Type</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['txn_type']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Total</th>
              <td valign="top" class="WADADataTableCell">$<?php echo(number_format($row_WADApaypal_orders['mc_gross'],2)); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">PayPal Fee</th>
              <td valign="top" class="WADADataTableCell">$<?php echo(number_format($row_WADApaypal_orders['mc_fee'],2)); ?></td>
            </tr>
            <?php
		if($row_WADApaypal_orders['tax'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Sales Tax</th>
              <td valign="top" class="WADADataTableCell">$<?php echo(number_format($row_WADApaypal_orders['tax'],2)); ?></td>
            </tr>
            <?php
		}
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Shipping</th>
              <td valign="top" class="WADADataTableCell">
              <?php
			  if($row_WADApaypal_orders['mc_shipping'] != 0)
			  	echo '$' . number_format($row_WADApaypal_orders['mc_shipping'],2);
			  else
			  	echo '$' . number_format($row_WADApaypal_orders['shipping'],2);
			  ?>
              </td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Currency</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['mc_currency']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Payer Status</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payer_status']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Payment Type</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['payment_type']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">Seller Protection</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['protection_eligibility']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
            <?php
		if($totalRows_rsOrderItems > 0)
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Order Items</th>
              <td valign="top" class="WADADataTableCell"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="11%" valign="top"><strong>Item #</strong></td>
                    <td width="29%" valign="top"><strong>Item Name</strong></td>
                    <?php
			  if($row_rsOrderItems['on0'] != '' && $row_rsOrderItems['os0'] != '')
			  {
			  ?>
                    <td width="20%" valign="top"><strong>Options</strong></td>
                    <?php
			  }
			  ?>
                    <td width="10%" align="center" valign="top"><strong>QTY</strong></td>
                    <?php
			  if($row_rsOrderItems['custom'] != '')
			  {
			  ?>
                    <td width="18%" valign="top"><strong>Custom</strong></td>
                    <?php
			  }
			  ?>
                    <td width="12%" align="right" valign="top"><strong>Price</strong></td>
                  </tr>
                  <?php do { ?>
                    <tr>
                      <td valign="top"><?php echo $row_rsOrderItems['item_number']; ?></td>
                      <td valign="top"><?php echo $row_rsOrderItems['item_name']; ?></td>
                      <?php
				if($row_rsOrderItems['on0'] != '' && $row_rsOrderItems['os0'] != '')
				{
				?>
                      <td valign="top"><?php 
				if($row_rsOrderItems['on0'] != '')
					echo $row_rsOrderItems['on0'] . ': ' . $row_rsOrderItems['os0'] . '<br />';
				?>
                        <?php 
				if($row_rsOrderItems['on1'] != '')
					echo $row_rsOrderItems['on1'] . ': ' . $row_rsOrderItems['os1'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on2'] != '')
					echo $row_rsOrderItems['on2'] . ': ' . $row_rsOrderItems['os2'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on3'] != '')
					echo $row_rsOrderItems['on3'] . ': ' . $row_rsOrderItems['os3'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on4'] != '')
					echo $row_rsOrderItems['on4'] . ': ' . $row_rsOrderItems['os4'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on5'] != '')
					echo $row_rsOrderItems['on5'] . ': ' . $row_rsOrderItems['os5'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on6'] != '')
					echo $row_rsOrderItems['on6'] . ': ' . $row_rsOrderItems['os6'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on7'] != '')
					echo $row_rsOrderItems['on7'] . ': ' . $row_rsOrderItems['os7'] . '<br />';
				?>
                <?php 
				if($row_rsOrderItems['on8'] != '')
					echo $row_rsOrderItems['on8'] . ': ' . $row_rsOrderItems['os8'] . '<br />';
				?></td>
                      <?php
				}
				?>
                      <td align="center" valign="top"><?php echo $row_rsOrderItems['quantity']; ?></td>
                      <?php
				if($row_rsOrderItems['custom'] != '')
				{
				?>
                      <td valign="top"><?php echo $row_rsOrderItems['custom']; ?></td>
                      <?php
				}
				?>
                      <td align="right" valign="top">$<?php echo number_format($row_rsOrderItems['mc_gross'],2); ?></td>
                    </tr>
                    <?php } while ($row_rsOrderItems = mysql_fetch_assoc($rsOrderItems)); ?>
              </table></td>
            </tr>
            <?php
		}
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
            <?php
		if($row_WADApaypal_orders['subscr_id'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Subscription ID</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['subscr_id']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['custom'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Custom Data</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['custom']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['transaction_subject'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Transaction Subject</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['transaction_subject']); ?></td>
            </tr>
            <?php
		}
		  ?>
            <?php
		if($row_WADApaypal_orders['item_name'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Item Name</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['item_name']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['item_number'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Item Number</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['item_number']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['option_name1'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Option 1</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['option_name1']); ?>: <?php echo($row_WADApaypal_orders['option_selection1']); ?></td>
            </tr>
            <?php
		}
		?>
        <?php
		if($row_WADApaypal_orders['option_name2'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Option 2</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['option_name2']); ?>: <?php echo($row_WADApaypal_orders['option_selection2']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['invoice'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Invoice #</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['invoice']); ?></td>
            </tr>
            <?php
		}
		?>
            <?php
		if($row_WADApaypal_orders['shipping_method'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Shipping Method</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['shipping_method']); ?></td>
            </tr>
            <?php
		}
		?>
        <?php
		if($row_WADApaypal_orders['memo'] != '')
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">Customer Notes</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['memo']); ?></td>
            </tr>
            <?php
		}
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
            <?php
		if($row_WADApaypal_orders['for_auction'] != '' && $row_WADApaypal_orders['for_auction'] != 0)
		{
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay Auction?</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['for_auction']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay User ID</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['auction_buyer_id']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay Auction Closing Date</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['auction_closing_date']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay Handling Amount</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['handling_amount']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay Shipping Discount</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['shipping_discount']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay Insurance Amount</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['insurance_amount']); ?></td>
            </tr>
            <tr>
              <th valign="top" class="WADADataTableHeader">eBay Multi-Item?</th>
              <td valign="top" class="WADADataTableCell"><?php echo($row_WADApaypal_orders['auction_multi_item']); ?></td>
            </tr>
            <?php
		}
		?>
            <tr>
              <th valign="top" class="WADADataTableHeader">&nbsp;</th>
              <td valign="top" class="WADADataTableCell">&nbsp;</td>
            </tr>
          </table>
          <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
          <div class="WADAButtonRow">
            <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="orders-update.php?id=<?php echo(rawurlencode($row_WADApaypal_orders['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
                <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="orders-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_orders['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
                <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="orders-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
              </tr>
            </table>
          </div>
        </div>
        <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_orders == 0) { // Show if recordset empty ?>
        <div class="WADANoResults">
          <div class="WADANoResultsMessage">No record found.</div>
        </div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADADetailsLinkArea">
          <div class="WADADataNavButtonCell"><a href="orders-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_orders);

mysql_free_result($rsOrderItems);
?>
