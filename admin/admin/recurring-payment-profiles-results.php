<?php require_once('../Connections/connDB.php'); ?>
<?php
// check if show all was clicked
if (!session_id()) session_start();
if(isset($_GET['show_all']))
	$_SESSION["WADbSearch1_recurringpaymentprofilesresults"] = '';
?>
<?php
//WA Database Search Include
require_once("../WADbSearch/HelperPHP.php");
?>
<?php
//WA Database Search (Copyright 2005, WebAssist.com)
//Recordset: WADApaypal_recurring_payment_profiles;
//Searchpage: recurring-payment-profiles-search.php;
//Form: WADASearchForm;
$WADbSearch1_DefaultWhere = "";
if (!session_id()) session_start();
if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //keyword array declarations

  //comparison list additions
  $WADbSearch1->addComparisonFromEdit("payment_cycle","S_payment_cycle","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("next_payment_date","S_next_payment_date","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("residence_country","S_residence_country","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("initial_payment_amount","S_initial_payment_amount","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("rp_invoice_id","S_rp_invoice_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("currency_code","S_currency_code","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("time_created","S_time_created","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("period_type","S_period_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("product_type","S_product_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_business_name","S_payer_business_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("shipping","S_shipping","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("amount_per_cycle","S_amount_per_cycle","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("profile_status","S_profile_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("amount","S_amount","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("outstanding_balance","S_outstanding_balance","AND","=",1);
  $WADbSearch1->addComparisonFromEdit("recurring_payment_id","S_recurring_payment_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("product_name","S_product_name","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
  $WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

  //save the query in a session variable
  if (1 == 1) {
    $_SESSION["WADbSearch1_recurringpaymentprofilesresults"]=$WADbSearch1->whereClause;
  }
}
else     {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //get the filter definition from a session variable
  if (1 == 1)     {
    if (isset($_SESSION["WADbSearch1_recurringpaymentprofilesresults"]) && $_SESSION["WADbSearch1_recurringpaymentprofilesresults"] != "")     {
      $WADbSearch1->whereClause = $_SESSION["WADbSearch1_recurringpaymentprofilesresults"];
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
$maxRows_WADApaypal_recurring_payment_profiles = 10;
$pageNum_WADApaypal_recurring_payment_profiles = 0;
if (isset($_GET['pageNum_WADApaypal_recurring_payment_profiles'])) {
  $pageNum_WADApaypal_recurring_payment_profiles = $_GET['pageNum_WADApaypal_recurring_payment_profiles'];
}
$startRow_WADApaypal_recurring_payment_profiles = $pageNum_WADApaypal_recurring_payment_profiles * $maxRows_WADApaypal_recurring_payment_profiles;

mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_recurring_payment_profiles = "SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "recurring_payment_profiles ORDER BY id DESC";
setQueryBuilderSource($query_WADApaypal_recurring_payment_profiles,$WADbSearch1,false);
$query_limit_WADApaypal_recurring_payment_profiles = sprintf("%s LIMIT %d, %d", $query_WADApaypal_recurring_payment_profiles, $startRow_WADApaypal_recurring_payment_profiles, $maxRows_WADApaypal_recurring_payment_profiles);
$WADApaypal_recurring_payment_profiles = mysql_query($query_limit_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
$row_WADApaypal_recurring_payment_profiles = mysql_fetch_assoc($WADApaypal_recurring_payment_profiles);

if (isset($_GET['totalRows_WADApaypal_recurring_payment_profiles'])) {
  $totalRows_WADApaypal_recurring_payment_profiles = $_GET['totalRows_WADApaypal_recurring_payment_profiles'];
} else {
  $all_WADApaypal_recurring_payment_profiles = mysql_query($query_WADApaypal_recurring_payment_profiles);
  $totalRows_WADApaypal_recurring_payment_profiles = mysql_num_rows($all_WADApaypal_recurring_payment_profiles);
}
$totalPages_WADApaypal_recurring_payment_profiles = ceil($totalRows_WADApaypal_recurring_payment_profiles/$maxRows_WADApaypal_recurring_payment_profiles)-1;
?>
<?php
$queryString_WADApaypal_recurring_payment_profiles = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_WADApaypal_recurring_payment_profiles") == false && 
        stristr($param, "totalRows_WADApaypal_recurring_payment_profiles") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_WADApaypal_recurring_payment_profiles = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_WADApaypal_recurring_payment_profiles = sprintf("&totalRows_WADApaypal_recurring_payment_profiles=%d%s", $totalRows_WADApaypal_recurring_payment_profiles, $queryString_WADApaypal_recurring_payment_profiles);
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
<title>Results paypal_recurring_payment_profiles</title>
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
        <div id="WADAPageTitle">PayPal Recurring Payment Profiles</div>
        <div><a href="recurring-payment-profiles-search.php">New Search</a> | <a href="recurring-payment-profiles-results.php?show_all=1">Show All</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <div class="WADAResults">
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_recurring_payment_profiles + 1) ?> to <?php echo min($startRow_WADApaypal_recurring_payment_profiles + $maxRows_WADApaypal_recurring_payment_profiles, $totalRows_WADApaypal_recurring_payment_profiles) ?> of <?php echo $totalRows_WADApaypal_recurring_payment_profiles ?> </div>
          <div class="WADAResultsNavTop">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, 0, $queryString_WADApaypal_recurring_payment_profiles); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, max(0, $pageNum_WADApaypal_recurring_payment_profiles - 1), $queryString_WADApaypal_recurring_payment_profiles); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles < $totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, min($totalPages_WADApaypal_recurring_payment_profiles, $pageNum_WADApaypal_recurring_payment_profiles + 1), $queryString_WADApaypal_recurring_payment_profiles); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles < $totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, $totalPages_WADApaypal_recurring_payment_profiles, $queryString_WADApaypal_recurring_payment_profiles); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
          <div class="WADAResultsInsertButton"> <a href="recurring-payment-profiles-insert.php" title="Insert"><img border="0" name="Insert" id="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
          <tr>
            <th width="11%" class="WADAResultsTableHeader">IPN  Date</th>
            <th width="18%" class="WADAResultsTableHeader">Name</th>
            <th width="14%" class="WADAResultsTableHeader">Company</th>
            <th width="10%" class="WADAResultsTableHeader">Invoice </th>
            <th width="11%" class="WADAResultsTableHeader">Profile ID</th>
            <th width="11%" class="WADAResultsTableHeader">Profile Status</th>
            <th width="13%" class="WADAResultsTableHeader">Outstanding Balance</th>
            <th width="12%">&nbsp;</th>
          </tr>
          <?php do { ?>
          <tr 
		  <?php 
		  if($row_WADApaypal_recurring_payment_profiles['test_ipn'] == 1) 
		  	echo 'style="background-color:#FF9"';
		  elseif($row_WADApaypal_recurring_payment_profiles['ipn_status'] == 'Invalid')
		  	echo 'style="background-color:#F33; color:#FF9;"';
			?> 
            class="<?php echo $WARRT_AltClass1->getClass(true); ?>">
            <td class="WADAResultsTableCell"><?php 
			echo date('m.d.Y g:i:s A', strtotime($row_WADApaypal_recurring_payment_profiles['creation_timestamp']));
			?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['first_name']); ?> <?php echo($row_WADApaypal_recurring_payment_profiles['last_name']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['payer_business_name']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['rp_invoice_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['recurring_payment_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_recurring_payment_profiles['profile_status']); ?></td>
            <td class="WADAResultsTableCell">$<?php echo(number_format($row_WADApaypal_recurring_payment_profiles['outstanding_balance'],2)); ?></td>
            <td class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
              <tr>
                <td><a href="recurring-payment-profiles-detail.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" id="View<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" alt="View" src="../WA_DataAssist/images/Pacifica/Refined_zoom.gif" /></a></td>
                <td><a href="recurring-payment-profiles-update.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="Update"><img border="0" name="Update<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" id="Update<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_edit.gif" /></a></td>
                <td><a href="recurring-payment-profiles-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" id="Delete<?php echo(rawurlencode($row_WADApaypal_recurring_payment_profiles['id'])); ?>" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_trash.gif" /></a></td>
                </tr>
            </table></td>
          </tr>
          <?php } while ($row_WADApaypal_recurring_payment_profiles = mysql_fetch_assoc($WADApaypal_recurring_payment_profiles)); ?>
        </table>
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_recurring_payment_profiles + 1) ?> to <?php echo min($startRow_WADApaypal_recurring_payment_profiles + $maxRows_WADApaypal_recurring_payment_profiles, $totalRows_WADApaypal_recurring_payment_profiles) ?> of <?php echo $totalRows_WADApaypal_recurring_payment_profiles ?> </div>
          <div class="WADAResultsNavBottom">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, 0, $queryString_WADApaypal_recurring_payment_profiles); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, max(0, $pageNum_WADApaypal_recurring_payment_profiles - 1), $queryString_WADApaypal_recurring_payment_profiles); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles < $totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, min($totalPages_WADApaypal_recurring_payment_profiles, $pageNum_WADApaypal_recurring_payment_profiles + 1), $queryString_WADApaypal_recurring_payment_profiles); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_recurring_payment_profiles < $totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $currentPage, $totalPages_WADApaypal_recurring_payment_profiles, $queryString_WADApaypal_recurring_payment_profiles); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No results for your search</div>
        <div> <a href="recurring-payment-profiles-insert.php" title="Insert"><img border="0" name="Insert1" id="Insert1" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
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
mysql_free_result($WADApaypal_recurring_payment_profiles);
?>
