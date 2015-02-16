<?php require_once('../Connections/connDB.php'); ?>
<?php
// check if show all was clicked
if (!session_id()) session_start();
if(isset($_GET['show_all']))
	$_SESSION["WADbSearch1_disputesresults"] = '';
?>
<?php
//WA Database Search Include
require_once("../WADbSearch/HelperPHP.php");
?>
<?php
//WA Database Search (Copyright 2005, WebAssist.com)
//Recordset: WADApaypal_disputes;
//Searchpage: disputes-search.php;
//Form: WADASearchForm;
$WADbSearch1_DefaultWhere = "";
if (!session_id()) session_start();
if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //keyword array declarations

  //comparison list additions
  $WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("case_id","S_case_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("case_type","S_case_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("case_creation_date","S_case_creation_date","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("receipt_id","S_receipt_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("invoice","S_invoice","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
  $WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
  $WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

  //save the query in a session variable
  if (1 == 1) {
    $_SESSION["WADbSearch1_disputesresults"]=$WADbSearch1->whereClause;
  }
}
else     {
  $WADbSearch1 = new FilterDef;
  $WADbSearch1->initializeQueryBuilder("MYSQL","1");
  //get the filter definition from a session variable
  if (1 == 1)     {
    if (isset($_SESSION["WADbSearch1_disputesresults"]) && $_SESSION["WADbSearch1_disputesresults"] != "")     {
      $WADbSearch1->whereClause = $_SESSION["WADbSearch1_disputesresults"];
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
$maxRows_WADApaypal_disputes = 10;
$pageNum_WADApaypal_disputes = 0;
if (isset($_GET['pageNum_WADApaypal_disputes'])) {
  $pageNum_WADApaypal_disputes = $_GET['pageNum_WADApaypal_disputes'];
}
$startRow_WADApaypal_disputes = $pageNum_WADApaypal_disputes * $maxRows_WADApaypal_disputes;

mysql_select_db($database_connDB, $connDB);
$query_WADApaypal_disputes = "SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, txn_type, test_ipn FROM " . $db_table_prefix . "disputes ORDER BY id DESC";
setQueryBuilderSource($query_WADApaypal_disputes,$WADbSearch1,false);
$query_limit_WADApaypal_disputes = sprintf("%s LIMIT %d, %d", $query_WADApaypal_disputes, $startRow_WADApaypal_disputes, $maxRows_WADApaypal_disputes);
$WADApaypal_disputes = mysql_query($query_limit_WADApaypal_disputes, $connDB) or die(mysql_error());
$row_WADApaypal_disputes = mysql_fetch_assoc($WADApaypal_disputes);

if (isset($_GET['totalRows_WADApaypal_disputes'])) {
  $totalRows_WADApaypal_disputes = $_GET['totalRows_WADApaypal_disputes'];
} else {
  $all_WADApaypal_disputes = mysql_query($query_WADApaypal_disputes);
  $totalRows_WADApaypal_disputes = mysql_num_rows($all_WADApaypal_disputes);
}
$totalPages_WADApaypal_disputes = ceil($totalRows_WADApaypal_disputes/$maxRows_WADApaypal_disputes)-1;
?>
<?php
$queryString_WADApaypal_disputes = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_WADApaypal_disputes") == false && 
        stristr($param, "totalRows_WADApaypal_disputes") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_WADApaypal_disputes = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_WADApaypal_disputes = sprintf("&totalRows_WADApaypal_disputes=%d%s", $totalRows_WADApaypal_disputes, $queryString_WADApaypal_disputes);
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
<title>Results paypal_disputes</title>
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
</head>

<body>


<div id="container">
  <div id="header"><?php require_once('header.php'); ?></div>
  <div id="menu"><?php require_once('menu.php'); ?></div>
  <div id="content">
    <div class="WADAResultsContainer"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Dispute History</div>
        <div><a href="disputes-search.php">New Search</a> | <a href="disputes-results.php?show_all=1">Show All</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($totalRows_WADApaypal_disputes > 0) { // Show if recordset not empty ?>
      <div class="WADAResults">
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_disputes + 1) ?> to <?php echo min($startRow_WADApaypal_disputes + $maxRows_WADApaypal_disputes, $totalRows_WADApaypal_disputes) ?> of <?php echo $totalRows_WADApaypal_disputes ?> </div>
          <div class="WADAResultsNavTop">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, 0, $queryString_WADApaypal_disputes); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, max(0, $pageNum_WADApaypal_disputes - 1), $queryString_WADApaypal_disputes); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes < $totalPages_WADApaypal_disputes) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, min($totalPages_WADApaypal_disputes, $pageNum_WADApaypal_disputes + 1), $queryString_WADApaypal_disputes); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes < $totalPages_WADApaypal_disputes) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, $totalPages_WADApaypal_disputes, $queryString_WADApaypal_disputes); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
          <div class="WADAResultsInsertButton"> <a href="disputes-insert.php" title="Insert"><img border="0" name="Insert" id="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
          <tr>
            <th width="23%" class="WADAResultsTableHeader">Case Creation Date</th>
            <th width="18%" class="WADAResultsTableHeader">Transaction ID</th>
            <th width="12%" class="WADAResultsTableHeader">Case ID</th>
            <th width="15%" class="WADAResultsTableHeader">Case Type</th>
            <th width="20%" class="WADAResultsTableHeader">Reason Code</th>
            <th width="12%">&nbsp;</th>
          </tr>
          <?php do { ?>
          <tr 
		  <?php 
		  if($row_WADApaypal_disputes['test_ipn'] == 1) 
		  	echo 'style="background-color:#FF9"';
		  elseif($row_WADApaypal_disputes['ipn_status'] == 'Invalid')
		  	echo 'style="background-color:#F33; color:#FF9;"';
			?> 
            class="<?php echo $WARRT_AltClass1->getClass(true); ?>">
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_disputes['case_creation_date']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_disputes['txn_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_disputes['case_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_disputes['case_type']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($row_WADApaypal_disputes['reason_code']); ?></td>
            <td class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
              <tr>
                <td><a href="disputes-detail.php?id=<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" id="View<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" alt="View" src="../WA_DataAssist/images/Pacifica/Refined_zoom.gif" /></a></td>
                <td><a href="disputes-update.php?id=<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" title="Update"><img border="0" name="Update<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" id="Update<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_edit.gif" /></a></td>
                <td><a href="disputes-delete.php?id=<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" id="Delete<?php echo(rawurlencode($row_WADApaypal_disputes['id'])); ?>" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_trash.gif" /></a></td>
                </tr>
            </table></td>
          </tr>
          <?php } while ($row_WADApaypal_disputes = mysql_fetch_assoc($WADApaypal_disputes)); ?>
        </table>
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($startRow_WADApaypal_disputes + 1) ?> to <?php echo min($startRow_WADApaypal_disputes + $maxRows_WADApaypal_disputes, $totalRows_WADApaypal_disputes) ?> of <?php echo $totalRows_WADApaypal_disputes ?> </div>
          <div class="WADAResultsNavBottom">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, 0, $queryString_WADApaypal_disputes); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, max(0, $pageNum_WADApaypal_disputes - 1), $queryString_WADApaypal_disputes); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes < $totalPages_WADApaypal_disputes) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, min($totalPages_WADApaypal_disputes, $pageNum_WADApaypal_disputes + 1), $queryString_WADApaypal_disputes); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($pageNum_WADApaypal_disputes < $totalPages_WADApaypal_disputes) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_disputes=%d%s", $currentPage, $totalPages_WADApaypal_disputes, $queryString_WADApaypal_disputes); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_WADApaypal_disputes == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No results for your search</div>
        <div> <a href="disputes-insert.php" title="Insert"><img border="0" name="Insert1" id="Insert1" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
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
mysql_free_result($WADApaypal_disputes);
?>
