<?php require_once("../Connections/connDB.php"); ?>
<?php require_once("../WA_DataAssist/WA_AppBuilder_PHP.php"); ?>
<?php 
// WA Application Builder Insert
if (isset($_POST["Insert_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "recurring_payment_profiles";
  $WA_sessionName = "WADA_Insert_paypal_recurring_payment_profiles";
  $WA_redirectURL = "recurring-payment-profiles-detail.php";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "payment_cycle|txn_type|last_name|first_name|next_payment_date|residence_country|initial_payment_amount|rp_invoice_id|currency_code|time_created|verify_sign|period_type|payer_status|payer_email|receiver_email|payer_id|product_type|payer_business_name|shipping|amount_per_cycle|profile_status|notify_version|amount|outstanding_balance|recurring_payment_id|product_name|ipn_status|creation_timestamp|test_ipn";
  $WA_fieldValuesStr = "".((isset($_POST["payment_cycle"]))?$_POST["payment_cycle"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["next_payment_date"]))?$_POST["next_payment_date"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["initial_payment_amount"]))?$_POST["initial_payment_amount"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["currency_code"]))?$_POST["currency_code"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["period_type"]))?$_POST["period_type"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["product_type"]))?$_POST["product_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["shipping"]))?$_POST["shipping"]:"")  ."" . "|" . "".((isset($_POST["amount_per_cycle"]))?$_POST["amount_per_cycle"]:"")  ."" . "|" . "".((isset($_POST["profile_status"]))?$_POST["profile_status"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["amount"]))?$_POST["amount"]:"")  ."" . "|" . "".((isset($_POST["outstanding_balance"]))?$_POST["outstanding_balance"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
  $WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL|none,none,NULL";
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
<title>Insert paypal_recurring_payment_profiles</title>
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
      <form action="recurring-payment-profiles-insert.php" method="post" name="WADAInsertForm" id="WADAInsertForm">
        <div class="WADAHeader">Insert Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">payment_cycle:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_cycle" id="payment_cycle" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">next_payment_date:</th>
            <td class="WADADataTableCell"><input type="text" name="next_payment_date" id="next_payment_date" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">initial_payment_amount:</th>
            <td class="WADADataTableCell"><input type="text" name="initial_payment_amount" id="initial_payment_amount" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><input type="text" name="rp_invoice_id" id="rp_invoice_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">currency_code:</th>
            <td class="WADADataTableCell"><input type="text" name="currency_code" id="currency_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><input type="text" name="time_created" id="time_created" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period_type:</th>
            <td class="WADADataTableCell"><input type="text" name="period_type" id="period_type" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_status" id="payer_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_type:</th>
            <td class="WADADataTableCell"><input type="text" name="product_type" id="product_type" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="shipping" id="shipping" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount_per_cycle:</th>
            <td class="WADADataTableCell"><input type="text" name="amount_per_cycle" id="amount_per_cycle" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">profile_status:</th>
            <td class="WADADataTableCell"><input type="text" name="profile_status" id="profile_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount:</th>
            <td class="WADADataTableCell"><input type="text" name="amount" id="amount" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">outstanding_balance:</th>
            <td class="WADADataTableCell"><input type="text" name="outstanding_balance" id="outstanding_balance" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring_payment_id" id="recurring_payment_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><input type="text" name="product_name" id="product_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Insert" id="Insert" value="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="recurring-payment-profiles-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
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
