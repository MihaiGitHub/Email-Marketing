<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search paypal_subscriptions</title>
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
      <form action="subscriptions-results.php" method="get" name="WADASearchForm" id="WADASearchForm">
        <div class="WADAHeader">Search</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="S_custom" id="S_custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_subscr_id" id="S_subscr_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_date:</th>
            <td class="WADADataTableCell"><input type="text" name="S_subscr_date" id="S_subscr_date" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_effective:</th>
            <td class="WADADataTableCell"><input type="text" name="S_subscr_effective" id="S_subscr_effective" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period1:</th>
            <td class="WADADataTableCell"><input type="text" name="S_period1" id="S_period1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period2:</th>
            <td class="WADADataTableCell"><input type="text" name="S_period2" id="S_period2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period3:</th>
            <td class="WADADataTableCell"><input type="text" name="S_period3" id="S_period3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount1:</th>
            <td class="WADADataTableCell"><input type="text" name="S_amount1" id="S_amount1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount2:</th>
            <td class="WADADataTableCell"><input type="text" name="S_amount2" id="S_amount2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount3:</th>
            <td class="WADADataTableCell"><input type="text" name="S_amount3" id="S_amount3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount1:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_amount1" id="S_mc_amount1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount2:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_amount2" id="S_mc_amount2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount3:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_amount3" id="S_mc_amount3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring:</th>
            <td class="WADADataTableCell"><input type="text" name="S_recurring" id="S_recurring" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reattempt:</th>
            <td class="WADADataTableCell"><input type="text" name="S_reattempt" id="S_reattempt" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">retry_at:</th>
            <td class="WADADataTableCell"><input type="text" name="S_retry_at" id="S_retry_at" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recur_times:</th>
            <td class="WADADataTableCell"><input type="text" name="S_recur_times" id="S_recur_times" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">username:</th>
            <td class="WADADataTableCell"><input type="text" name="S_username" id="S_username" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">password:</th>
            <td class="WADADataTableCell"><input type="text" name="S_password" id="S_password" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_txn_id" id="S_txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_email" id="S_payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="S_residence_country" id="S_residence_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_currency" id="S_mc_currency" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="S_verify_sign" id="S_verify_sign" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_status" id="S_payer_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_first_name" id="S_first_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_last_name" id="S_last_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="S_receiver_email" id="S_receiver_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_id" id="S_payer_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="S_notify_version" id="S_notify_version" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_item_name" id="S_item_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><input type="text" name="S_item_number" id="S_item_number" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="S_ipn_status" id="S_ipn_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="S_creation_timestamp" id="S_creation_timestamp" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><input type="text" name="S_txn_type" id="S_txn_type" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="S_test_ipn" id="S_test_ipn" value="" size="32" /></td>
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
