<?php require_once("../Connections/connDB.php"); ?>
<?php require_once("../WA_DataAssist/WA_AppBuilder_PHP.php"); ?>
<?php 
// WA Application Builder Insert
if (isset($_POST["Insert_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = "paypal_refunds";
  $WA_sessionName = "WADA_Insert_paypal_refunds";
  $WA_redirectURL = "refunds-detail.php";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "ipn_status|mc_gross|invoice|protection_eligibility|payer_id|address_street|payment_date|payment_status|charset|address_zip|mc_shipping|mc_handling|first_name|memo|last_name|product_name|mc_fee|address_country_code|address_name|notify_version|reason_code|custom|address_country|address_city|verify_sign|payer_email|parent_txn_id|contact_phone|time_created|txn_id|payment_type|payer_business_name|address_state|receiver_email|receiver_id|mc_currency|residence_country|test_ipn|transaction_subject|rp_invoice_id|recurring_payment_id|creation_timestamp";
  $WA_fieldValuesStr = "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["protection_eligibility"]))?$_POST["protection_eligibility"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["address_street"]))?$_POST["address_street"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["payment_status"]))?$_POST["payment_status"]:"")  ."" . "|" . "".((isset($_POST["charset"]))?$_POST["charset"]:"")  ."" . "|" . "".((isset($_POST["address_zip"]))?$_POST["address_zip"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["memo"]))?$_POST["memo"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["mc_fee"]))?$_POST["mc_fee"]:"")  ."" . "|" . "".((isset($_POST["address_country_code"]))?$_POST["address_country_code"]:"")  ."" . "|" . "".((isset($_POST["address_name"]))?$_POST["address_name"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["address_country"]))?$_POST["address_country"]:"")  ."" . "|" . "".((isset($_POST["address_city"]))?$_POST["address_city"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["parent_txn_id"]))?$_POST["parent_txn_id"]:"")  ."" . "|" . "".((isset($_POST["contact_phone"]))?$_POST["contact_phone"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payment_type"]))?$_POST["payment_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["address_state"]))?$_POST["address_state"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_id"]))?$_POST["receiver_id"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."" . "|" . "".((isset($_POST["transaction_subject"]))?$_POST["transaction_subject"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."";
  $WA_columnTypesStr = "',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL";
  $WA_fieldNames = explode("|", $WA_fieldNamesStr);
  $WA_fieldValues = explode("|", $WA_fieldValuesStr);
  $WA_columns = explode("|", $WA_columnTypesStr);
  $WA_connectionDB = $database_connDB;
  mysql_select_db($WA_connectionDB, $WA_connection);
  if (!session_id()) session_start();
  $insertParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
  $WA_Sql = "INSERT INTO `" . $WA_table . "` (" . $insertParamsObj->WA_tableValues . ") VALUES (" . $insertParamsObj->WA_dbValues . ")";
  $MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
  $_SESSION[$WA_sessionName] = mysql_insert_id();
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
<title>Insert paypal_refunds</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADAInsertContainer">
      <form action="refunds-insert.php" method="post" name="WADAInsertForm" id="WADAInsertForm">
        <div class="WADAHeader">Insert Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">invoice:</th>
            <td class="WADADataTableCell"><input type="text" name="invoice" id="invoice" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">protection_eligibility:</th>
            <td class="WADADataTableCell"><input type="text" name="protection_eligibility" id="protection_eligibility" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_street:</th>
            <td class="WADADataTableCell"><input type="text" name="address_street" id="address_street" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_date:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_date" id="payment_date" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_status" id="payment_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">charset:</th>
            <td class="WADADataTableCell"><input type="text" name="charset" id="charset" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_zip:</th>
            <td class="WADADataTableCell"><input type="text" name="address_zip" id="address_zip" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_shipping" id="mc_shipping" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_handling" id="mc_handling" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">memo:</th>
            <td class="WADADataTableCell"><input type="text" name="memo" id="memo" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><input type="text" name="product_name" id="product_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_fee:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_fee" id="mc_fee" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country_code:</th>
            <td class="WADADataTableCell"><input type="text" name="address_country_code" id="address_country_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_name:</th>
            <td class="WADADataTableCell"><input type="text" name="address_name" id="address_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reason_code:</th>
            <td class="WADADataTableCell"><input type="text" name="reason_code" id="reason_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country:</th>
            <td class="WADADataTableCell"><input type="text" name="address_country" id="address_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_city:</th>
            <td class="WADADataTableCell"><input type="text" name="address_city" id="address_city" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">parent_txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="parent_txn_id" id="parent_txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">contact_phone:</th>
            <td class="WADADataTableCell"><input type="text" name="contact_phone" id="contact_phone" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><input type="text" name="time_created" id="time_created" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_type:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_type" id="payment_type" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_state:</th>
            <td class="WADADataTableCell"><input type="text" name="address_state" id="address_state" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_id:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_id" id="receiver_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_currency" id="mc_currency" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">transaction_subject:</th>
            <td class="WADADataTableCell"><input type="text" name="transaction_subject" id="transaction_subject" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><input type="text" name="rp_invoice_id" id="rp_invoice_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring_payment_id" id="recurring_payment_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Insert" id="Insert" value="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="refunds-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAInsertRecordID" type="hidden" id="WADAInsertRecordID" value="" />
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
