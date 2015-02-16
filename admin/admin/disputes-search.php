<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search paypal_disputes</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADASearchContainer">
      <form action="disputes-results.php" method="get" name="WADASearchForm" id="WADASearchForm">
        <div class="WADAHeader">Search</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><input type="text" name="S_creation_timestamp2" id="S_creation_timestamp2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Creation Date</th>
            <td class="WADADataTableCell"><input type="text" name="S_case_creation_date2" id="S_case_creation_date2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><input type="text" name="S_payment_date" id="S_payment_date" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><input type="text" name="S_txn_type2" id="S_txn_type2" value="" size="32" /></td>
          </tr>
          <tr>
            <th width="35%" class="WADADataTableHeader">Transaction ID</th>
            <td width="65%" class="WADADataTableCell"><input type="text" name="S_txn_id" id="S_txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Type</th>
            <td class="WADADataTableCell"><select name="S_case_type" id="S_case_type">
              <option value="chargeback">chargeback</option>
              <option value="complaint">complaint</option>
              <option value="dispute" selected="selected">dispute</option>
            </select></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_case_id" id="S_case_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><input type="text" name="S_invoice2" id="S_invoice2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_id2" id="S_payer_id2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_email" id="S_payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><input type="text" name="S_reason_code" id="S_reason_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><input type="text" name="S_custom" id="S_custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_receipt_id2" id="S_receipt_id2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><input type="text" name="S_notify_version" id="S_notify_version" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><input type="text" name="S_verify_sign2" id="S_verify_sign2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><input type="text" name="S_ipn_status2" id="S_ipn_status2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><label>
              <input name="S_test_ipn" type="checkbox" id="S_test_ipn" value="1" />
            </label></td>
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
