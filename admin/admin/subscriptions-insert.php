<?php require_once("../Connections/connDB.php"); ?>
<?php require_once("../WA_DataAssist/WA_AppBuilder_PHP.php"); ?>
<?php 
// WA Application Builder Insert
if (isset($_POST["Insert_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "subscriptions";
  $WA_sessionName = "WADA_Insert_paypal_subscriptions";
  $WA_redirectURL = "subscriptions-detail.php";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "custom|subscr_id|subscr_date|subscr_effective|period1|period2|period3|amount1|amount2|amount3|mc_amount1|mc_amount2|mc_amount3|recurring|reattempt|retry_at|recur_times|username|password|txn_id|payer_email|residence_country|mc_currency|verify_sign|payer_status|first_name|last_name|receiver_email|payer_id|notify_version|item_name|item_number|ipn_status|creation_timestamp|txn_type|test_ipn";
  $WA_fieldValuesStr = "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_date"]))?$_POST["subscr_date"]:"")  ."" . "|" . "".((isset($_POST["subscr_effective"]))?$_POST["subscr_effective"]:"")  ."" . "|" . "".((isset($_POST["period1"]))?$_POST["period1"]:"")  ."" . "|" . "".((isset($_POST["period2"]))?$_POST["period2"]:"")  ."" . "|" . "".((isset($_POST["period3"]))?$_POST["period3"]:"")  ."" . "|" . "".((isset($_POST["amount1"]))?$_POST["amount1"]:"")  ."" . "|" . "".((isset($_POST["amount2"]))?$_POST["amount2"]:"")  ."" . "|" . "".((isset($_POST["amount3"]))?$_POST["amount3"]:"")  ."" . "|" . "".((isset($_POST["mc_amount1"]))?$_POST["mc_amount1"]:"")  ."" . "|" . "".((isset($_POST["mc_amount2"]))?$_POST["mc_amount2"]:"")  ."" . "|" . "".((isset($_POST["mc_amount3"]))?$_POST["mc_amount3"]:"")  ."" . "|" . "".((isset($_POST["recurring"]))?$_POST["recurring"]:"")  ."" . "|" . "".((isset($_POST["reattempt"]))?$_POST["reattempt"]:"")  ."" . "|" . "".((isset($_POST["retry_at"]))?$_POST["retry_at"]:"")  ."" . "|" . "".((isset($_POST["recur_times"]))?$_POST["recur_times"]:"")  ."" . "|" . "".((isset($_POST["username"]))?$_POST["username"]:"")  ."" . "|" . "".((isset($_POST["password"]))?$_POST["password"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
  $WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|none,none,NULL";
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
<title>Insert paypal_subscriptions</title>
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
      <form action="subscriptions-insert.php" method="post" name="WADAInsertForm" id="WADAInsertForm">
        <div class="WADAHeader">Insert Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_date:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_date" id="subscr_date" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_effective:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_effective" id="subscr_effective" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period1:</th>
            <td class="WADADataTableCell"><input type="text" name="period1" id="period1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period2:</th>
            <td class="WADADataTableCell"><input type="text" name="period2" id="period2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period3:</th>
            <td class="WADADataTableCell"><input type="text" name="period3" id="period3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount1:</th>
            <td class="WADADataTableCell"><input type="text" name="amount1" id="amount1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount2:</th>
            <td class="WADADataTableCell"><input type="text" name="amount2" id="amount2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount3:</th>
            <td class="WADADataTableCell"><input type="text" name="amount3" id="amount3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount1:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_amount1" id="mc_amount1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount2:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_amount2" id="mc_amount2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount3:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_amount3" id="mc_amount3" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring" id="recurring" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reattempt:</th>
            <td class="WADADataTableCell"><input type="text" name="reattempt" id="reattempt" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">retry_at:</th>
            <td class="WADADataTableCell"><input type="text" name="retry_at" id="retry_at" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recur_times:</th>
            <td class="WADADataTableCell"><input type="text" name="recur_times" id="recur_times" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">username:</th>
            <td class="WADADataTableCell"><input type="text" name="username" id="username" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">password:</th>
            <td class="WADADataTableCell"><input type="text" name="password" id="password" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_currency" id="mc_currency" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_status" id="payer_status" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="" size="32" /></td>
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
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><input type="text" name="item_name" id="item_name" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><input type="text" name="item_number" id="item_number" value="" size="32" /></td>
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
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="" size="32" /></td>
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
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="subscriptions-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
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
