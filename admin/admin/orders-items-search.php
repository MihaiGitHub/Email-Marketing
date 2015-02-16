<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search paypal_order_items</title>
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
    <div class="WADASearchContainer">
      <form action="order-items-results.php" method="get" name="WADASearchForm" id="WADASearchForm">
        <div class="WADAHeader">Search</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><input type="text" name="S_creation_timestamp" id="S_creation_timestamp" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th width="38%" class="WADADataTableHeader">Order ID</th>
            <td width="62%" class="WADADataTableCell"><input type="text" name="S_order_id" id="S_order_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Refund ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_refund_id" id="S_refund_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Standard Subscription ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_subscr_id" id="S_subscr_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Raw Log ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_raw_log_id2" id="S_raw_log_id2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><input type="text" name="S_item_name" id="S_item_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><input type="text" name="S_item_number" id="S_item_number" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Name (0)</th>
            <td class="WADADataTableCell"><input type="text" name="S_on2" id="S_on2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Selection (0)</th>
            <td class="WADADataTableCell"><input type="text" name="S_os0" id="S_os0" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Name (1)</th>
            <td class="WADADataTableCell"><input type="text" name="S_on2" id="S_on3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Selection (1)</th>
            <td class="WADADataTableCell"><input type="text" name="S_os1" id="S_os1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">QTY</th>
            <td class="WADADataTableCell"><input type="text" name="S_quantity" id="S_quantity" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Price</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_gross" id="S_mc_gross" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Handling</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_handling" id="S_mc_handling" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_shipping" id="S_mc_shipping" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><input type="text" name="S_custom2" id="S_custom2" value="" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Search" id="Search" value="Search" alt="Search" src="../WA_DataAssist/images/Pacifica/Refined_search.gif"  /></td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
  <div id="footer">
    <?php require_once('footer.php'); ?>
  </div>
</div>
</body>
</html>
