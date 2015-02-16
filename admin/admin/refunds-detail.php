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
$Paramid_WADApaypal_refunds = "-1";
if (isset($_GET['id'])) {
  $Paramid_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
$ParamSessionid_WADApaypal_refunds = "-1";
if (isset($_SESSION['WADA_Insert_paypal_refunds'])) {
  $ParamSessionid_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_refunds'] : addslashes($_SESSION['WADA_Insert_paypal_refunds']);
}
$Paramid2_WADApaypal_refunds = "-1";
if (isset($_GET['id'])) {
  $Paramid2_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_refunds = sprintf("SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street, payment_date, payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, last_name, product_name, mc_fee, address_country_code, address_name, notify_version, reason_code, custom, address_country, address_city, verify_sign, payer_email, parent_txn_id, contact_phone, time_created, txn_id, payment_type, payer_business_name, address_state, receiver_email, receiver_id, mc_currency, residence_country, test_ipn, transaction_subject, rp_invoice_id, recurring_payment_id, creation_timestamp FROM " . $db_table_prefix . "refunds WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_refunds, "int"),GetSQLValueString($Paramid2_WADApaypal_refunds, "int"),GetSQLValueString($ParamSessionid_WADApaypal_refunds, "int"));
$WADApaypal_refunds = mysql_query($query_WADApaypal_refunds, $connDB) or die(mysql_error());
$row_WADApaypal_refunds = mysql_fetch_assoc($WADApaypal_refunds);
$totalRows_WADApaypal_refunds = mysql_num_rows($WADApaypal_refunds);

$varOrderID_rsOrderItems = "1";
if (isset($row_WADApaypal_refunds['id'])) {
  $varOrderID_rsOrderItems = (get_magic_quotes_gpc()) ? $row_WADApaypal_refunds['id'] : addslashes($row_WADApaypal_refunds['id']);
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
<title>Details paypal_refunds</title>
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
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Refund Details</div>
        <div><a href="refunds-search.php">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_refunds > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="31%" class="WADADataTableHeader">ID</th>
            <td width="69%" class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($row_WADApaypal_refunds['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['time_created'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Time Created</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['time_created']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['payment_date'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['payment_date']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['protection_eligibility'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Seller Protection Eligibility</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['protection_eligibility']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['payer_id']); ?></td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['payer_business_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader"> Company</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['payer_business_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['first_name']); ?> <?php echo($row_WADApaypal_refunds['last_name']); ?></td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['address_street'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Address</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['address_name']); ?><br />
              <?php echo($row_WADApaypal_refunds['address_street']); ?> <?php echo($row_WADApaypal_refunds['address_city']); ?>, <?php echo($row_WADApaypal_refunds['address_state']); ?> <?php echo($row_WADApaypal_refunds['address_zip']); ?><br />              <?php echo($row_WADApaypal_refunds['address_country']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Email Adress</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['payer_email']); ?></td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['contact_phone'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Phone Number</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['contact_phone']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Original Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['parent_txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Refund Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['txn_id']); ?></td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['transaction_subject'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Transaction Subject</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['transaction_subject']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['product_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Product Name</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['product_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['mc_shipping'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['mc_shipping']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['mc_handling'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Handling</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['mc_handling']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Total Refund</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee (refunded)</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['mc_fee']); ?></td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['mc_currency'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['mc_currency']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['memo'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Memo</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['memo']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['payment_type'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['payment_type']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['payment_status'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['payment_status']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['reason_code'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['reason_code']); ?></td>
          </tr>
          <?php
		  }
		  ?>
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
            <td valign="top" class="WADADataTableCell"><table width="80%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td width="11%" valign="top"><strong>Item #</strong></td>
                <td width="29%" valign="top"><strong>Item Name</strong></td>
                <?php
			  if($row_rsOrderItems['on0'] != '' && $row_rsOrderItems['on1'] != '')
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
				if($row_rsOrderItems['on0'] != '' && $row_rsOrderItems['on1'] != '')
				{
				?>
                <td valign="top"><?php 
				if($row_rsOrderItems['on0'] != '')
					echo $row_rsOrderItems['on0']; ?>
                  - <?php echo $row_rsOrderItems['os0'] . '<br />';
				?>
                  <?php 
				if($row_rsOrderItems['on1'] != '')
					echo $row_rsOrderItems['on1']; ?>
                  - <?php echo $row_rsOrderItems['os1']; 
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
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php 
		  if($row_WADApaypal_refunds['recurring_payment_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['recurring_payment_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['rp_invoice_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment Invoice ID</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['rp_invoice_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($row_WADApaypal_refunds['invoice'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['invoice']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['test_ipn']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Charset</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['charset']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($row_WADApaypal_refunds['verify_sign']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="refunds-update.php?id=<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="refunds-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="refunds-results.php" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_refunds == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="refunds-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
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
mysql_free_result($WADApaypal_refunds);
?>
