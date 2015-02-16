<?php require_once("../Connections/connDB.php"); ?>
<?php require_once("../WA_DataAssist/WA_AppBuilder_PHP.php"); ?>
<?php 
// WA Application Builder Insert
if (isset($_POST["Insert_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = $db_table_prefix . "disputes";
  $WA_sessionName = "WADA_Insert_paypal_disputes";
  $WA_redirectURL = "disputes-detail.php";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "txn_id|case_id|case_type|case_creation_date|payment_date|receipt_id|verify_sign|payer_email|payer_id|invoice|reason_code|custom|notify_version|creation_timestamp|ipn_status|txn_type|test_ipn";
  $WA_fieldValuesStr = "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["case_id"]))?$_POST["case_id"]:"")  ."" . "|" . "".((isset($_POST["case_type"]))?$_POST["case_type"]:"")  ."" . "|" . "".((isset($_POST["case_creation_date"]))?$_POST["case_creation_date"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["receipt_id"]))?$_POST["receipt_id"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
  $WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|',none,''|none,none,NULL";
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
<title>Insert paypal_disputes</title>
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
      <form action="disputes-insert.php" method="post" name="WADAInsertForm" id="WADAInsertForm">
        <div class="WADAHeader">Insert New Dispute Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th class="WADADataTableHeader">Case Creation Date</th>
            <td class="WADADataTableCell"><input type="text" name="case_creation_date2" id="case_creation_date2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><input type="text" name="payment_date2" id="payment_date2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type2" id="txn_type2" value="" size="32" /></td>
          </tr>
          <tr>
            <th width="32%" class="WADADataTableHeader">Transacstion ID</th>
            <td width="68%" class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Type</th>
            <td class="WADADataTableCell"><label>
              <select name="case_type" id="case_type">
                <option value="chargeback">chargeback</option>
                <option value="complaint">complaint</option>
                <option value="dispute" selected="selected">dispute</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case ID</th>
            <td class="WADADataTableCell"><input type="text" name="case_id" id="case_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><input type="text" name="receipt_id" id="receipt_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id2" id="payer_id2" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><input type="text" name="invoice" id="invoice" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><input type="text" name="reason_code" id="reason_code" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><label>
              <input name="test_ipn" type="checkbox" id="test_ipn" value="1" />
            </label></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Insert" id="Insert" value="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="disputes-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
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
