<?php require_once('../Connections/connDB.php'); ?>
<?php
// check if show all was clicked
if (!session_id()) session_start();
if(isset($_GET['show_all']))
	$_SESSION["WADbSearch1_refundsresults"] = '';
?>
<?php
//WA Database Search Include
require_once("../WADbSearch/HelperPHP.php");
?>
<?php
//WA Database Search (Copyright 2005, WebAssist.com)
//Recordset: WADApaypal_refunds;
//Searchpage: refunds-search.php;
//Form: WADASearchForm;
$WADbSearch1_DefaultWhere = "";
if (!session_id()) session_start();
if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //keyword array declarations

  //comparison list additions
  $WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("invoice","S_invoice","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("protection_eligibility","S_protection_eligibility","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_street","S_address_street","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payment_status","S_payment_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("charset","S_charset","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_zip","S_address_zip","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("mc_shipping","S_mc_shipping","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("mc_handling","S_mc_handling","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("memo","S_memo","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("product_name","S_product_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("address_country_code","S_address_country_code","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_name","S_address_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_country","S_address_country","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_city","S_address_city","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("parent_txn_id","S_parent_txn_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("contact_phone","S_contact_phone","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("time_created","S_time_created","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payment_type","S_payment_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_business_name","S_payer_business_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("address_state","S_address_state","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("receiver_id","S_receiver_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("residence_country","S_residence_country","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("transaction_subject","S_transaction_subject","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("rp_invoice_id","S_rp_invoice_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("recurring_payment_id","S_recurring_payment_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);

  //save the query in a session variable
  if (1 == 1) {
    $_SESSION["WADbSearch1_refundsresults"]=$WADbSearch1->whereClause;
  }
}
else     {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //get the filter definition from a session variable
  if (1 == 1)     {
    if (isset($_SESSION["WADbSearch1_refundsresults"]) && $_SESSION["WADbSearch1_refundsresults"] != "")     {
      $WADbSearch1->whereClause = $_SESSION["WADbSearch1_refundsresults"];
    }
    else     {
      $WADbSearch1->whereClause = $WADbSearch1_DefaultWhere;
    }
  }
  else     {
    $WADbSearch1->whereClause = $WADbSearch1_DefaultWhere;
  }
}
$WADbSearch1->whereClause = str_replace("\\''", "''", $WADbSearch1->whereClause);
$WADbSearch1whereClause = '';
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];
?>
<?php
$maxRows_WADApaypal_refunds = 10;
$pageNum_WADApaypal_refunds = 0;
if (isset($_GET['pageNum_WADApaypal_refunds'])) {
  $pageNum_WADApaypal_refunds = $_GET['pageNum_WADApaypal_refunds'];
}
$startRow_WADApaypal_refunds = $pageNum_WADApaypal_refunds * $maxRows_WADApaypal_refunds;

mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_refunds = "SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street, payment_date, payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, last_name, product_name, mc_fee, address_country_code, address_name, notify_version, reason_code, custom, address_country, address_city, verify_sign, payer_email, parent_txn_id, contact_phone, time_created, txn_id, payment_type, payer_business_name, address_state, receiver_email, receiver_id, mc_currency, residence_country, test_ipn, transaction_subject, rp_invoice_id, recurring_payment_id, creation_timestamp FROM " . $db_table_prefix . "refunds";
setQueryBuilderSource($query_WADApaypal_refunds,$WADbSearch1,false);
$query_limit_WADApaypal_refunds = sprintf("%s LIMIT %d, %d", $query_WADApaypal_refunds, $startRow_WADApaypal_refunds, $maxRows_WADApaypal_refunds);
$WADApaypal_refunds = mysql_query($query_limit_WADApaypal_refunds, $connDB) or die(mysql_error());
$row_WADApaypal_refunds = mysql_fetch_assoc($WADApaypal_refunds);

if (isset($_GET['totalRows_WADApaypal_refunds'])) {
  $totalRows_WADApaypal_refunds = $_GET['totalRows_WADApaypal_refunds'];
} else {
  $all_WADApaypal_refunds = mysql_query($query_WADApaypal_refunds);
  $totalRows_WADApaypal_refunds = mysql_num_rows($all_WADApaypal_refunds);
}
$totalPages_WADApaypal_refunds = ceil($totalRows_WADApaypal_refunds/$maxRows_WADApaypal_refunds)-1;
?>
<?php
$queryString_WADApaypal_refunds = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_WADApaypal_refunds") == false && 
        stristr($param, "totalRows_WADApaypal_refunds") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_WADApaypal_refunds = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_WADApaypal_refunds = sprintf("&totalRows_WADApaypal_refunds=%d%s", $totalRows_WADApaypal_refunds, $queryString_WADApaypal_refunds);
?>
<?php
//WA AltClass Iterator
class WA_AltClassIterator     {
  var $DisplayIndex;
  var $DisplayArray;
  
  function WA_AltClassIterator($theDisplayArray = array(1)) {
    $this->ClassCounter = 0;
    $this->ClassArray   = $theDisplayArray;
  }
  
  function getClass($incrementClass)  {
    if (sizeof($this->ClassArray) == 0) return "";
  	if ($incrementClass) {
      if ($this->ClassCounter >= sizeof($this->ClassArray)) $this->ClassCounter = 0;
      $this->ClassCounter++;
    }
    if ($this->ClassCounter > 0)
      return $this->ClassArray[$this->ClassCounter-1];
    else
      return $this->ClassArray[0];
  }
}
?><?php
//WA Alternating Class
$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PayPal Refund History</title>
<link href="../WA_DataAssist/styles/Refined_Pacifica.css" rel="stylesheet" type="text/css" />
<link href="../WA_DataAssist/styles/Arial.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* Title Section */
#WADAPageTitleArea {
	width: 555px;
}
#WADAPageTitleArea div, #WADAPageTitleArea p {
	font-size: 11px;
	padding-bottom: 10px;
}
#WADAPageTitleArea div#WADAPageTitle, #WADAPageTitle {
	font-size: 14px;
	font-weight: bold;
}

.WADAResultsNavigation {
	padding-top: 5px;
	padding-bottom: 10px;
}
.WADAResultsCount {
	font-size: 11px;
}
.WADAResultsNavTop, .WADAResultsInsertButton {
	clear: none;
}
.WADAResultsNavTop {
	width: 60%;
	float: left;
}
.WADAResultsInsertButton {
	width: 30%;
	float: right;
	text-align: right;
}
.WADAResultsNavButtonCell, .WADAResultsInsertButton {
	padding: 2px;
}
.WADAResultsTable {
	font-size: 11px;
	clear: both;
	padding-top: 1px;
	padding-bottom: 1px;
}

.WADAResultsTableHeader, .WADAResultsTableCell {
	padding: 3px;
	text-align: left;
}

.WADAResultsTableHeader {
	padding-left: 12px;
	padding-right: 12px;
}

.WADAResultsTableCell {
	padding-left: 14px;
	padding-right: 14px;
}

.WADAResultsTableCell {
	border-left: 1px solid #BABDC2;
}

.WADAResultsEditButtons {
	border-left: 1px solid #BABDC2;
	border-right: 1px solid #BABDC2;
}

.WADAResultsRowDark {
	background-color: #DFE4E9;
}
</style>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.WADAResultsTableHeader1 {	padding: 3px;
	text-align: left;
}
-->
</style>
</head>

<body>


<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADAResultsContainer"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Refund History</div>
        <div><a href="refunds-search.php">New Search</a> | <a href="refunds-results.php?show_all=1">Show All</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_refunds > 0) { // Show if recordset not empty ?>
      <div class="WADAResults">
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_refunds + 1) ?> to <?php echo min($startRow_WADApaypal_refunds + $maxRows_WADApaypal_refunds, $totalRows_WADApaypal_refunds) ?> of <?php echo $totalRows_WADApaypal_refunds ?> </div>
          <div class="WADAResultsNavTop">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, 0, $queryString_WADApaypal_refunds); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, max(0, $pageNum_WADApaypal_refunds - 1), $queryString_WADApaypal_refunds); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds < $totalPages_WADApaypal_refunds) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, min($totalPages_WADApaypal_refunds, $pageNum_WADApaypal_refunds + 1), $queryString_WADApaypal_refunds); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds < $totalPages_WADApaypal_refunds) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, $totalPages_WADApaypal_refunds, $queryString_WADApaypal_refunds); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
          <div class="WADAResultsInsertButton"> <a href="refunds-insert.php" title="Insert"><img border="0" name="Insert" id="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
          <tr>
            <th width="20%" class="WADAResultsTableHeader">Name</th>
            <th width="10%" class="WADAResultsTableHeader">Total</th>
            <th width="9%" class="WADAResultsTableHeader">Fee</th>
            <th width="12%" class="WADAResultsTableHeader">Invoice </th>
            <th width="22%" class="WADAResultsTableHeader">Parent Transaction ID</th>
            <th width="15%" class="WADAResultsTableHeader">Transaction ID</th>
            <th width="12%">&nbsp;</th>
          </tr>
          <?php do { ?>
          <tr 
		  <?php 
		  if($row_WADApaypal_refunds['test_ipn'] == 1) 
		  	echo 'style="background-color:#FF9"';
		  elseif($row_WADApaypal_refunds['ipn_status'] == 'Invalid')
		  	echo 'style="background-color:#F33; color:#FF9;"';
			?> 
            class="<?php echo $WARRT_AltClass1->getClass(true); ?>">
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_refunds['first_name']); ?> <?php echo($row_WADApaypal_refunds['last_name']); ?></td>
            <td class="WADAResultsTableCell">$<?php echo(number_format($row_WADApaypal_refunds['mc_gross'],2)); ?></td>
            <td class="WADAResultsTableCell">$<?php echo(number_format($row_WADApaypal_refunds['mc_fee'],2)); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_refunds['invoice']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_refunds['parent_txn_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_refunds['txn_id']); ?></td>
            <td class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
              <tr>
                <td><a href="refunds-detail.php?id=<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" id="View<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" alt="View" src="../WA_DataAssist/images/Pacifica/Refined_zoom.gif" /></a></td>
                <td><a href="refunds-update.php?id=<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" title="Update"><img border="0" name="Update<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" id="Update<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_edit.gif" /></a></td>
                <td><a href="refunds-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" id="Delete<?php echo(rawurlencode($row_WADApaypal_refunds['id'])); ?>" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_trash.gif" /></a></td>
                </tr>
            </table></td>
          </tr>
          <?php } while ($row_WADApaypal_refunds = mysql_fetch_assoc($WADApaypal_refunds)); ?>
        </table>
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_refunds + 1) ?> to <?php echo min($startRow_WADApaypal_refunds + $maxRows_WADApaypal_refunds, $totalRows_WADApaypal_refunds) ?> of <?php echo $totalRows_WADApaypal_refunds ?> </div>
          <div class="WADAResultsNavBottom">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, 0, $queryString_WADApaypal_refunds); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, max(0, $pageNum_WADApaypal_refunds - 1), $queryString_WADApaypal_refunds); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds < $totalPages_WADApaypal_refunds) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, min($totalPages_WADApaypal_refunds, $pageNum_WADApaypal_refunds + 1), $queryString_WADApaypal_refunds); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_refunds < $totalPages_WADApaypal_refunds) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_refunds=%d%s", $currentPage, $totalPages_WADApaypal_refunds, $queryString_WADApaypal_refunds); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_refunds == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No results for your search</div>
        <div> <a href="refunds-insert.php" title="Insert"><img border="0" name="Insert1" id="Insert1" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
  </div>
  <div id="footer">
    <?php require_once('footer.php'); ?>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($WADApaypal_refunds);
?>
