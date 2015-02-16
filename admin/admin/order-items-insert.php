<?php require_once("../Connections/connDB.php"); ?>
<?php require_once("../WA_DataAssist/WA_AppBuilder_PHP.php"); ?>
<?php 
// WA Application Builder Insert
if (isset($_POST["Insert_x"])) // Trigger
{
  $WA_connection = $connDB;
  $WA_table = "paypal_order_items";
  $WA_sessionName = "WADA_Insert_paypal_order_items";
  $WA_redirectURL = "orders-items-detail.php";
  $WA_keepQueryString = false;
  $WA_indexField = "id";
  $WA_fieldNamesStr = "order_id|refund_id|subscr_id|item_name|item_number|os0|on0|os1|on1|quantity|custom|mc_gross|mc_handling|mc_shipping|creation_timestamp|raw_log_id";
  $WA_fieldValuesStr = "".((isset($_POST["order_id"]))?$_POST["order_id"]:"")  ."" . "|" . "".((isset($_POST["refund_id"]))?$_POST["refund_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["os0"]))?$_POST["os0"]:"")  ."" . "|" . "".((isset($_POST["on0"]))?$_POST["on0"]:"")  ."" . "|" . "".((isset($_POST["os1"]))?$_POST["os1"]:"")  ."" . "|" . "".((isset($_POST["on1"]))?$_POST["on1"]:"")  ."" . "|" . "".((isset($_POST["quantity"]))?$_POST["quantity"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["raw_log_id"]))?$_POST["raw_log_id"]:"")  ."";
  $WA_columnTypesStr = "none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|',none,NULL|none,none,NULL";
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
<title>Insert paypal_order_items</title>
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
    <div class="WADAInsertContainer">
      <form action="order-items-insert.php" method="post" name="WADAInsertForm" id="WADAInsertForm">
        <div class="WADAHeader">Insert Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">order_id:</th>
            <td class="WADADataTableCell"><input type="text" name="order_id" id="order_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">refund_id:</th>
            <td class="WADADataTableCell"><input type="text" name="refund_id" id="refund_id" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="" size="32" /></td>
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
            <th class="WADADataTableHeader">os0:</th>
            <td class="WADADataTableCell"><input type="text" name="os0" id="os0" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on0:</th>
            <td class="WADADataTableCell"><input type="text" name="on0" id="on0" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os1:</th>
            <td class="WADADataTableCell"><input type="text" name="os1" id="os1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on1:</th>
            <td class="WADADataTableCell"><input type="text" name="on1" id="on1" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">quantity:</th>
            <td class="WADADataTableCell"><input type="text" name="quantity" id="quantity" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_handling" id="mc_handling" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_shipping" id="mc_shipping" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">raw_log_id:</th>
            <td class="WADADataTableCell"><input type="text" name="raw_log_id" id="raw_log_id" value="" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Insert" id="Insert" value="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="order-items-results.php" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
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
