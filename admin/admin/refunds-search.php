<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search paypal_refunds</title>
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
      <form action="refunds-results.php" method="get" name="WADASearchForm" id="WADASearchForm">
        <div class="WADAHeader">Search</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="S_ipn_status" id="S_ipn_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_gross" id="S_mc_gross" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">invoice:</th>
            <td class="WADADataTableCell"><input type="text" name="S_invoice" id="S_invoice" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">protection_eligibility:</th>
            <td class="WADADataTableCell"><input type="text" name="S_protection_eligibility" id="S_protection_eligibility" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_id" id="S_payer_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_street:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_street" id="S_address_street" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_date:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payment_date" id="S_payment_date" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_status:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payment_status" id="S_payment_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">charset:</th>
            <td class="WADADataTableCell"><input type="text" name="S_charset" id="S_charset" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_zip:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_zip" id="S_address_zip" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_shipping" id="S_mc_shipping" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_handling" id="S_mc_handling" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_first_name" id="S_first_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">memo:</th>
            <td class="WADADataTableCell"><input type="text" name="S_memo" id="S_memo" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_last_name" id="S_last_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_product_name" id="S_product_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_fee:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_fee" id="S_mc_fee" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country_code:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_country_code" id="S_address_country_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_name" id="S_address_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="S_notify_version" id="S_notify_version" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reason_code:</th>
            <td class="WADADataTableCell"><input type="text" name="S_reason_code" id="S_reason_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="S_custom" id="S_custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_country" id="S_address_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_city:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_city" id="S_address_city" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="S_verify_sign" id="S_verify_sign" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_email" id="S_payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">parent_txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_parent_txn_id" id="S_parent_txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">contact_phone:</th>
            <td class="WADADataTableCell"><input type="text" name="S_contact_phone" id="S_contact_phone" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><input type="text" name="S_time_created" id="S_time_created" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_txn_id" id="S_txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_type:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payment_type" id="S_payment_type" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><input type="text" name="S_payer_business_name" id="S_payer_business_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_state:</th>
            <td class="WADADataTableCell"><input type="text" name="S_address_state" id="S_address_state" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="S_receiver_email" id="S_receiver_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_receiver_id" id="S_receiver_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><input type="text" name="S_mc_currency" id="S_mc_currency" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="S_residence_country" id="S_residence_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="S_test_ipn" id="S_test_ipn" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">transaction_subject:</th>
            <td class="WADADataTableCell"><input type="text" name="S_transaction_subject" id="S_transaction_subject" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_rp_invoice_id" id="S_rp_invoice_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><input type="text" name="S_recurring_payment_id" id="S_recurring_payment_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="S_creation_timestamp" id="S_creation_timestamp" value="" size="32" /></td>
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
