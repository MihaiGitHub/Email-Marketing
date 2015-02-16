<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search paypal_mass_payments</title>
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
      <form action="mass-payments-results.php" method="get" name="WADASearchForm" id="WADASearchForm">
        <div class="WADAHeader">Search</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="32%" class="WADADataTableHeader">MassPay Transaction ID</th>
            <td width="68%" class="WADADataTableCell"><input type="text" name="S_masspay_txn_id" id="S_masspay_txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Total</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_gross" id="S_mc_gross" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_fee" id="S_mc_fee" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_currency2" id="S_mc_currency2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><input type="text" name="S_receiver_email" id="S_receiver_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Status</th>
            <td class="WADADataTableCell"><input type="text" name="S_status" id="S_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Unique ID</th>
            <td class="WADADataTableCell"><input type="text" name="S_unique_id" id="S_unique_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><label>
              <select name="S_ipn_status" id="S_ipn_status">
                <option value="Verified">Verified</option>
                <option value="Invalid">Invalid</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><label>
              <input name="S_test_ipn" type="checkbox" id="S_test_ipn" value="1" />
              <input type="hidden" name="S_txn_type" id="S_txn_type" value="masspay" size="32" />
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
